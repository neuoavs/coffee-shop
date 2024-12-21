<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

session_start();

class AccessController extends Controller
{
    public function index()
    {
        return view('system.main.access_page.access_layout');
    }

    public function accessSystem(Request $request)
    {
        $id = $request->id;
        $password = $request->password; 

        $employee = Employee::with('position')->where('id', $id)->first();

        if ($employee && Hash::check($password, $employee->password)) {
            Session::put('id', $employee->id);
            Session::put('nickname', $employee->nickname);
            Session::put('position', $employee->position->name);
            return redirect('/system');
        }

        return Redirect::to('/system-access');
    }

    public function systemLogout()
    {
        Session::flush();
        return Redirect::to('/system-access');
    }
}
