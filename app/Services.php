<?php

namespace Toolchain;

use Dotenv\Exception\InvalidFileException;
use http\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Services {

    /**
     * @Array<slug, Service> services
     */
    protected $services = null;
    protected $categories = [];

    public function __construct() {
        $this->readFromDisk();
    }

    public function getServices($category = null) {
        if ($category !== null && in_array($category, $this->categories)) {
            $filtered = [];
            foreach ($this->services as $s) {
                if ($s instanceof Service) {
                    if ($s->getCategory() === $category) {
                        $filtered[$s->getSlug()] = $s;
                    }
                }
            }

            return $filtered;
        }

        if ($this->services === null) {
            $this->readFromDisk();
        }

        return $this->services;
    }

    /**
     * Get a service by slug
     * @param String $slug
     * @return Service
     */
    public function getService(String $slug): Service {
        try {
            return $this->services[$slug];
        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }
    }

    public function addService(Service $s, $writeToDisk = false): String {
        /**
         * prevent overwrites by slug with
         * checking and appending a string
         * at the end of the slug.
         * But only for the first iteration
         * then it just overwrites the
         * second revision #edgecase.
         */
        if (array_key_exists($s->getSlug(), $this->services)) {
            $s->setSlug($s->getSlug() . "-2");
        }

        $this->services[$s->getSlug()] = $s;

        if ($writeToDisk) {
            $this->writeToDisk([$s]);
        }

        if (!in_array($s->getCategory(), $this->categories)) {
            $this->categories[] = $s->getCategory();
        }

        return $s->getSlug();
    }

    public function getCategories() {
        return $this->categories;
    }

    public function removeService(String $slug, $removeFromDisk = true) {
        try {
            unset($this->services[$slug]);
            Storage::disk('local')->delete($this->getInternalServiceFilePath($slug));

        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function updateService(Service $s) {
        $this->removeService($s->getSlug(), true);
        $this->addService($s, true);
    }

    public function addServiceFromString(String $s) {
        try {
            $this->services[$s->getSlug()] = Service::fromString($s);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    const SERVICE_PATH = '/services/';

    protected function writeToDisk(Array $services): void {
        try {
            if (!Storage::disk('local')->exists(self::SERVICE_PATH)) {
                Storage::disk('local')->makeDirectory(self::SERVICE_PATH);
            }

            foreach ($services as $s) {
                if (!$s instanceof Service) {
                    throw new InvalidArgumentException('Items is not instance of service');
                }

                Storage::disk('local')->put(
                    $this->getInternalServiceFilePath($s->getSlug()),
                    $s->toString()
                );
            }

        } catch (\Exception $e) {
            throw $e;
        }
    }

    protected function readFromDisk(): void {
        if ($this->services === null) {
            $this->services = [];
        }

        try {
            foreach (Storage::disk('local')->files(self::SERVICE_PATH) as $file) {
                try {
                    $service = Service::fromString(Storage::disk('local')->get($file));

                } catch (\Exception $e) {
                    throw new InvalidFileException('The service ('.$file.') could not be loaded. '.$e->getMessage());
                }

                $this->addService($service);
            }

        } catch (\Exception $e) {
            throw $e;
        }
    }

    protected function getInternalServiceFilePath(String $slug): String {
        return self::SERVICE_PATH.$slug;
    }

}
