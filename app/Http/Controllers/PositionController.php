<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Position;
use Illuminate\Support\Facades\Session;
session_start();

class PositionController extends Controller
{   

    //Position List View
    public function positionList() {
        $this->authAccess();
        return view("system.main.system_page.position.main.position_list", ["postions"=> Position::all()]);
    }

    //Position Add View
    public function positionAdd() {
        $this->authAccess();
        return view("system.main.system_page.position.main.position_add");
    }

    //Position Edit View
    public function positionEdit(Request $request) {
        $this->authAccess();

        $position = Position::find($request->id);
        return view("system.main.system_page.position.main.position_edit", ["position"=> $position]);
    }

    private function authAccess()
    {
        if (!Session::get('id')) {
            return Redirect::to('/system-access')->send();
        }
    }
}
