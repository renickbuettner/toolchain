<?php

namespace Toolchain;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class Services {

    /**
     * @Array<slug, Service> services
     */
    protected $services = null;
    protected $categories = [];

    public function __construct() {
        if ($this->services === null) {
            $this->getFromDisk();
        }
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
        }

        return $this->services;
    }

    public function addService(Service $s) {
        $this->services[$s->getSlug()] = $s;

        if (!in_array($s->getCategory(), $this->categories)) {
            $this->categories[] = $s->getCategory();
        }
    }

    public function getCategories() {
        return $this->categories;
    }

    public function removeService(Service $s) {
        // remove from data set
    }

    public function updateService(Service $s) {
        $dump = $s->toString();
    }

    public function addServiceFromString(String $s) {
        try {
            $this->services[$s->getSlug()] = Service::fromString($s);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    protected function getFromDisk() {
        // load from database
        // but just for now: dummy data

        try {
            $serv = Service::fromString(
                Storage::disk('local')->get('dummy.service.json')
            );

            $this->addService($serv);

            $serv->setSlug('gmail');
            $serv->setTitle('gmail');
            $this->addService($serv);

            $serv->setSlug('amazon');
            $serv->setTitle('amazon');
            $serv->setCategory('shopping');
            $this->addService($serv);

        } catch (FileNotFoundException $e) {
            throw $e;
        }
    }

}
