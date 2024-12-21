<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

session_start();

class SystemController extends Controller
{
    public function index()
    {
        $this->authAccess();
        return view('system.main.system_page.system_layout');
    }

    private function authAccess()
    {
        if (!Session::get('id')) {
            return Redirect::to('/system-access')->send();
        }
    }
}
