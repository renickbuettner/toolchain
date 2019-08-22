<?php

namespace Toolchain\Http\Controllers;

use Illuminate\Queue\InvalidPayloadException;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Toolchain\Service;
use Toolchain\Services;

class ServiceController extends Controller
{
    private $services;
    private $oldSlug;
    private $user;

    public function __construct() {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();

            return $next($request);
        });

        $this->services = new Services();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard() {
        if (!$this->user->hasPermission('view')) {
            return redirect()->to('/');
        }

        return view('dashboard', ['services' => $this->services, 'defaultTheme' => null, 'user' => $this->user]);
    }

    /**
     * Show a service if exists.
     *
     * @param String $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function service(String $slug) {
        if (!$this->user->hasPermission('view')) {
            return redirect()->to('/');
        }

        if (request()->wantsJson()) {
            return $this->services->getService($slug)->toString();
        }

        return view('service', ['service' => $this->services->getService($slug)]);
    }

    public function api(String $slug) {
        if (!$this->user->hasPermission('manage')) {
            return redirect()->to('/');
        }

        $body = null;

        if (app()->environment('production') && !request()->secure()) {
            throw new AccessDeniedHttpException('Request is not secured. Use https to access the api');
        }

        if (strtolower(request()->method()) !== 'delete') {
            if (!request()->isJson()) {
                throw new InvalidPayloadException('Payload format have to be JSON');
            }

            try {
                $payload = json_decode(request()->getContent(), false);

                /**
                 * Get the slug from the url parameter
                 */
                $this->oldSlug = $slug;

                $service = new Service();
                $service->setTitle($payload->title);

                $service->setSlug($service->getTitle());
                if ($payload->slug !== '') {
                    $service->setSlug($payload->slug);
                }

                $service->setCategory($payload->category);
                $service->setDescription($payload->description);
                $service->setIcon($payload->icon);
                $service->setUrl($payload->url);

            } catch (\Exception $e) {
                throw new InvalidPayloadException($e);
            }
        }

        switch (strtolower(request()->method())) {
            case 'post':
                $body = $this->create($service->getSlug(), $service);
                break;
            case 'put':
                $body = $this->update($slug, $service);
                break;
            case 'delete':
                $body = $this->delete($slug);
                break;
        }

        return response($body, 200)
            ->header('Content-Type', 'application/json');
    }

    protected function create(String $slug, Service $service) {
        try {

            $slug = $this->services->addService($service, true);

            return $this->services->getService($slug)->toString();

        } catch (\Exception $e) {
            throw new InvalidPayloadException('Could not create service from payload');
        }
    }

    protected function update(String $slug, Service $service) {

        try {
            if ($service->getSlug() !== $slug) {
                $this->services->updateService($service, true);
                $this->services->removeService($slug);
                return $service->toString();
            }

            $this->services->updateService($service);
            return $service->toString();

        } catch (\Exception $e) {
            throw new InvalidPayloadException('Could not create service from payload');
        }
    }

    protected function delete(String $slug) {
        $this->services->removeService($slug);
    }

    protected function getCurrentUser() {
        return [
          "attributes" => $this->user->attributes
        ];
    }
}
