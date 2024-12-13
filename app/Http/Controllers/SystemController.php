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
        return $this->authAccess();
    }

    private function authAccess()
    {
        if (Session::get('id')) {
            return view('system.main.system_page.system_layout');
        } else {
            return Redirect::to('system-access');
        }
    }
}
