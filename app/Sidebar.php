<?php


namespace Toolchain;


use Toolchain\Utils\SidebarNavigationItem;

class Sidebar {

    protected $items;

    public function __construct() {
        $this->items[] = new SidebarNavigationItem('sidebar.service.all', '/dashboard', '');
        $this->items[] = new SidebarNavigationItem('sidebar.service.add', '/editor', '');
        $this->items[] = new SidebarNavigationItem('sidebar.request.approval', '/requestApproval', '');
        $this->items[] = new SidebarNavigationItem('sidebar.help.center', '/help', '');
    }

    public function getNavigationItems() {
        return $this->items;
    }

}
