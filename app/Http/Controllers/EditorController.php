<?php

namespace Toolchain\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller {
    public function editor() {
        if (!auth()->user()->hasPermission('manage')) {
            return redirect()->to('/dashboard');
        }

        return view('editor');
    }

}
