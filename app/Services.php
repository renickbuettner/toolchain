<?php

namespace toolchain;

class Services {

    /**
     * @Array<slug, Service> services
     */
    protected $services = null;

    public function getServices() {
        if ($this->services === null) {
            $this->getFromDisk();
        }

        return $this->services;
    }

    public function addService(Service $s) {
        $this->services[$s->getSlug()] = $s;
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

        $this->addService(Service::fromString(file_get_contents(base_path()."dummy.service.json")));
    }

}
