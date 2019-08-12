<?php


namespace Toolchain;


use Toolchain\Utils\SidebarNavigationItem;

class Sidebar {

    protected $items;

    public function __construct() {
        $this->items[] = new SidebarNavigationItem('sidebar.allServices', '/dashboard', '');
        $this->items[] = new SidebarNavigationItem('sidebar.addService', '/editor', '');
        $this->items[] = new SidebarNavigationItem('sidebar.requestApproval', '/requestApproval', '');
        $this->items[] = new SidebarNavigationItem('sidebar.helpCenter', '/help', '');
    }

    public function getNavigationItems() {
        return $this->items;
    }

}
