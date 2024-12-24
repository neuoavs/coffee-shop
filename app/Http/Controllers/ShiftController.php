<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Shift;
use Illuminate\Support\Facades\Session;
session_start();

class ShiftController extends Controller
{
    //Shift List View
    public function shiftList() {
        $this->authAccess();
        return view("system.main.system_page.shift.main.shift_list", ["shifts"=> Shift::all()]);
    }

    //Shift Add View
    public function shiftAdd() {
        $this->authAccess();
        return view("system.main.system_page.shift.main.shift_add");
    }

    //Shift Edit View
    public function shiftEdit(Request $request) {
        $this->authAccess();

        $shift = Shift::find($request->id);
        return view("system.main.system_page.shift.main.shift_edit", ["shift"=> $shift]);
    }

    public function deleteShift($id){
        $shift = Shift::find($id);

        if (!$shift) {
            return response()->json(['success' => false, 'error' => 'Postion not found']);
        }

        $shift->delete();
        return response()->json(['success' => true]);
        
    }

    public function addShift(Request $request) {
        $data = $request->all();

        //Format time
        $begin_time = $data['begin_hour'].':'.$data['begin_minute'].':'.$data['begin_second'];
        $end_time = $data['end_hour'].':'.$data['end_minute'].':'.$data['end_second'];
        //Format time
        $data['begin_time'] = $begin_time;
        $data['end_time'] = $end_time;
        try {
            Shift::create($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to add your shift. The information may be duplicated. Please check again!']);
        }
    }

    public function editShift(Request $request, $id) {
        $data = $request->all();
        $shift = Shift::findOrFail($id);
        
        if (!$shift) {
            return response()->json(['success' => false, 'error' => 'Shift not found']);
        }

        //Format time
        $begin_time = $data['begin_hour'].':'.$data['begin_minute'].':'.$data['begin_second'];
        $end_time = $data['end_hour'].':'.$data['end_minute'].':'.$data['end_second'];
        //Format time
        $data['begin_time'] = $begin_time;
        $data['end_time'] = $end_time;
        try {
            $shift->update($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to edit your shift. The information may be duplicated. Please check again!']);
        }
    }

    public function filterShift(Request $request)
    {
        $data = $request->all();

        if ($data['shift-filter-active'] === "all") {
            return response()->json(['shifts' => Shift::all()]);
        }

        $shifts = Shift::where('active', $data['shift-filter-active'])->get();

        if (!$shifts) {
            return response()->json(['shifts' => []]);
        }

        return response()->json(['shifts' => $shifts]);
    }



    private function authAccess()
    {
        if (!Session::get('id')) {
            return Redirect::to('/system-access')->send();
        }
    }
}
