<?php

namespace Toolchain;

use http\Exception\InvalidArgumentException;
use Illuminate\Queue\InvalidPayloadException;

class Service {

    protected $title;
    protected $slug;
    protected $url;
    protected $description;
    protected $icon;
    protected $category;

    public function getTitle(): String {
        return $this->title;
    }

    public function setTitle(String $title) {
        $this->title = $title;
        return $this;
    }

    public function getSlug(): String {
        return $this->slug;
    }

    public function setRawSlug(String $slug) {
        $this->slug = $slug;
        return $this;
    }

    public function getDescription(): String {
        return $this->description;
    }

    public function setDescription(String $desc) {
        $this->description = $desc;
        return $this;
    }

    public function getCategory(): String {
        return $this->category;
    }

    public function getInternalUrl(): String {
        return url("/service/{$this->getSlug()}");
    }

    /**
     * Convert a category in a safe state.
     * Because it has to be equal on multiple
     * services.
     *
     * @param $string
     * @return string
     */
    public function setCategory(String $cat) {
        $this->category = strtolower(
            explode(' ', $cat)[0]
        );
        return $this;
    }

    public function getIcon(): String {
        return $this->icon;
    }

    public function setIcon(String $icon) {
        $this->icon = $icon;
        return $this;
    }

    public function getUrl(): String {
        return $this->url;
    }

    public function setUrl(String $url) {
        $this->url = $url;
        return $this;
    }

    public function setSlug(String $title) {

        // replace non letter or digits by -
        $slug = preg_replace('~[^\pL\d]+~u', '-', $title);

        // transliterate
        $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);

        // remove unwanted characters
        $slug = preg_replace('~[^-\w]+~', '', $slug);

        // trim
        $slug = trim($slug, '-');

        // remove duplicated - symbols
        $slug = preg_replace('~-+~', '-', $slug);

        // lowercase
        $slug = strtolower($slug);

        if (empty($slug)) {
            return 'n-a';
        }

        $this->slug = $slug;
        return $this;
    }

    public static function fromString(String $string): Service {
        $s = new Service();

        try {
            $obj = json_decode($string, false);

            return $s->setUrl($obj->url)
                ->setTitle($obj->title)
                ->setDescription($obj->description)
                ->setIcon($obj->icon)
                ->setCategory($obj->category)
                ->setSlug($obj->slug);

        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function toString() {
        return json_encode([
            "title" => $this->title,
            "description" => $this->description,
            "url" => $this->url,
            "slug" => $this->slug,
            "icon" => $this->icon,
            "category" => $this->category
        ]);
    }

    public function getComponent() {
        return view('dashboard', ["services" => $this->services]);
    }
}
