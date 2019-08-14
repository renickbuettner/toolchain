<?php


namespace Toolchain\Utils;


class SidebarNavigationItem {

    protected $locale;
    protected $url;
    protected $icon;

    /**
     * SidebarNavigationItem constructor.
     * @param $locale
     * @param $url
     * @param $icon
     */
    public function __construct($locale, $url, $icon) {
        $this->locale = $locale;
        $this->url = $url;
        $this->icon = $icon;
    }

    /**
     * @return mixed
     */
    public function getLocale() {
        return $this->locale;
    }

    /**
     * @param mixed $locale
     * @return SidebarNavigationItem
     */
    public function setLocale($locale) {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return SidebarNavigationItem
     */
    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIcon() {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     * @return SidebarNavigationItem
     */
    public function setIcon($icon) {
        $this->icon = $icon;
        return $this;
    }

}
