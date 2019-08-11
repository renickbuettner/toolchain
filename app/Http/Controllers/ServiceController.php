<?php

namespace Toolchain\Http\Controllers;

use Illuminate\Http\Request;
use Toolchain\Services;

class ServiceController extends Controller
{

    private $services;

    public function __construct() {
        $this->services = new Services();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('dashboard', ["services" => $this->services]);
    }
}
