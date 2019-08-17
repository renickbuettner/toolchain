<?php


namespace Toolchain;


use Toolchain\Utils\SidebarNavigationItem;

class Sidebar {

    protected $items;

    public function __construct() {
        $this->items[] = new SidebarNavigationItem('sidebar.service.all', '/dashboard', '/assets/icon-service.svg');
        $this->items[] = new SidebarNavigationItem('sidebar.service.add', '/editor', '/assets/icon-add-service.svg');
        $this->items[] = new SidebarNavigationItem('sidebar.help.center', '/help', '/assets/icon-help.svg');
    }

    public function getNavigationItems() {
        return $this->items;
    }

}
