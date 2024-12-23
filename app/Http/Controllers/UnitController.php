<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Unit;
use Illuminate\Support\Facades\Session;
session_start();

class UnitController extends Controller
{
    //Unit List View
     public function unitList() {
        $this->authAccess();
        return view("system.main.system_page.unit.main.unit_list", ["units"=> Unit::all()]);
    }

    //Unit Add View
    public function unitAdd() {
        $this->authAccess();
        return view("system.main.system_page.unit.main.unit_add");
    }

    //Unit Edit View
    public function unitEdit(Request $request) {
        $this->authAccess();

        $unit = Unit::find($request->id);
        return view("system.main.system_page.unit.main.unit_edit", ["unit"=> $unit]);
    }

    public function deleteUnit($id){
        $unit = Unit::find($id);

        if (!$unit) {
            return response()->json(['success' => false, 'error' => 'Postion not found']);
        }

        $unit->delete();
        return response()->json(['success' => true]);
        
    }

    public function addUnit(Request $request) {
        $data = $request->all();

        try {
            Unit::create($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to add your unit. The name may be duplicated. Please check again!']);
        }
    }

    public function editUnit(Request $request, $id) {
        $data = $request->all();
        $unit = Unit::findOrFail($id);
        
        if (!$unit) {
            return response()->json(['success' => false, 'error' => 'Unit not found']);
        }

        try {
            $unit->update($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to edit your unit. The name may be duplicated. Please check again!']);
        }
    }

    public function filterUnit(Request $request)
    {
        $data = $request->all();

        if ($data['unit-filter-active'] === "all") {
            return response()->json(['units' => Unit::all()]);
        }

        $units = Unit::where('active', $data['unit-filter-active'])->get();

        if (!$units) {
            return response()->json(['units' => []]);
        }

        return response()->json(['units' => $units]);
    }


    private function authAccess()
    {
        if (!Session::get('id')) {
            return Redirect::to('/system-access')->send();
        }
    }
}
