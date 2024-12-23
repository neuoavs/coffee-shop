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

    public function deletePostion($id){
        $position = Position::find($id);

        if (!$position) {
            return response()->json(['success' => false, 'error' => 'Postion not found']);
        }

        $position->delete();
        return response()->json(['success' => true]);
        
    }

    public function addPostion(Request $request) {
        $data = $request->all();

        try {
            Position::create($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to add your position. The position may already exist or the information may be duplicated. Please check again!']);
        }
    }

    public function editPostion(Request $request, $id) {
        $data = $request->all();
        $position = Position::findOrFail($id);
        
        if (!$position) {
            return response()->json(['success' => false, 'error' => 'Position not found']);
        }

        try {
            $position->update($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to edit your position. The name may be duplicated. Please check again!']);
        }
    }

    public function filterPostion(Request $request)
    {
        $data = $request->all();

        if ($data['position-filter-active'] === "all") {
            return response()->json(['positions' => Position::all()]);
        }

        $positions = Position::where('active', $data['position-filter-active'])->get();

        if (!$positions) {
            return response()->json(['positions' => []]);
        }

        return response()->json(['positions' => $positions]);
    }


    private function authAccess()
    {
        if (!Session::get('id')) {
            return Redirect::to('/system-access')->send();
        }
    }
}
