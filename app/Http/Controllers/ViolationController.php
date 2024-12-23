<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Violation;
use Illuminate\Support\Facades\Session;
session_start();

class ViolationController extends Controller
{
    //Violation List View
    public function violationList() {
        $this->authAccess();
        return view("system.main.system_page.violation.main.violation_list", ["violations"=> Violation::all()]);
    }

    //Violation Add View
    public function violationAdd() {
        $this->authAccess();
        return view("system.main.system_page.violation.main.violation_add");
    }

    //Violation Edit View
    public function violationEdit(Request $request) {
        $this->authAccess();

        $violation = Violation::find($request->id);
        return view("system.main.system_page.violation.main.violation_edit", ["violation"=> $violation]);
    }

    public function deleteViolation($id){
        $violation = Violation::find($id);

        if (!$violation) {
            return response()->json(['success' => false, 'error' => 'Postion not found']);
        }

        $violation->delete();
        return response()->json(['success' => true]);
        
    }

    public function addViolation(Request $request) {
        $data = $request->all();

        try {
            Violation::create($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to add your violation. The name may be duplicated. Please check again!']);
        }
    }

    public function editViolation(Request $request, $id) {
        $data = $request->all();
        $violation = Violation::findOrFail($id);
        
        if (!$violation) {
            return response()->json(['success' => false, 'error' => 'Violation not found']);
        }

        try {
            $violation->update($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to edit your violation. The name may be duplicated. Please check again!']);
        }
    }

    public function filterViolation(Request $request)
    {
        $data = $request->all();

        if ($data['violation-filter-active'] === "all" && $data['violation-filter-fine-amount'] === "all") {
            return response()->json(['violations' => Violation::all()]);
        }
        
        $violations = Violation::get();
        
        if ($data['violation-filter-active'] !== "all") {
            $violations = $violations->where('active', $data['violation-filter-active']);
        }

        if ($data['violation-filter-fine-amount'] !== "all") {
            $violations = $violations->where('fine_amount', '<=', $data['violation-filter-fine-amount']);
        }

        if (!$violations) {
            return response()->json(['violations' => []]);
        }

        return response()->json(['violations' => $violations]);
    }


    private function authAccess()
    {
        if (!Session::get('id')) {
            return Redirect::to('/system-access')->send();
        }
    }
}
