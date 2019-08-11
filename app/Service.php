<?php

namespace Toolchain;

class Service {

    protected $title;
    protected $slug;
    protected $url;
    protected $description;
    protected $icon;
    protected $category;

    public function getTitle() {
        return $this->title;
    }

    public function setTitle(String $title) {
        $this->title = $title;
        $this->slug = $this->convertSlug($title);
        return $this;
    }

    public function getSlug() {

        return $this->slug;
    }

    public function setSlug(String $slug) {
        $this->slug = $slug;
        return $this;
    }

    public function getDescription() {
        $this->description;
    }

    public function setDescription(String $desc) {
        $this->description = $desc;
        return $this;
    }

    public function getCategory() {
        return $this->category;
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

    public function getIcon() {
        return $this->icon;
    }

    public function setIcon(String $icon) {
        $this->icon = $icon;
        return $this;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl(String $url) {
        $this->url = $url;
        return $this;
    }

    private function convertSlug(String $title) {

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

        return $slug;
    }

    public static function fromString(String $string): Service {
        $s = new Service();

        try {
            $obj = json_decode($string, false);
        } catch (\Exception $e) {
            throw $e;
        }

        return $s->setUrl($obj->url)
            ->setTitle($obj->title)
            ->setDescription($obj->description)
            ->setIcon($obj->icon)
            ->setCategory($obj->category)
            ->setSlug($obj->slug);
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

}
