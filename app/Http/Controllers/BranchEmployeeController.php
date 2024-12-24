<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\BranchEmployee;
use App\Models\Branch;
use App\Models\Employee;
use Illuminate\Support\Facades\Session;
session_start();

class BranchEmployeeController extends Controller
{
    //BranchEmployee List View
    public function branchEmployeeList() {
        $this->authAccess();
        return view("system.main.system_page.branch_employee.main.branch_employee_list", ["branchEmployee"=> BranchEmployee::with(['branch', 'employee'])->where('employee_id','<>', Session::get('id'))->get(), 'branches' => Branch::get()]);
    }

    //BranchEmployee Add View
    public function branchEmployeeAdd() {
        $this->authAccess();
        return view("system.main.system_page.branch_employee.main.branch_employee_add", ['branches' => Branch::get(), 'employees' => Employee::where('id','<>', Session::get('id'))->get()]);
    }

    //BranchEmployee Edit View
    public function branchEmployeeEdit(Request $request) {
        $this->authAccess();

        $branchEmployee = BranchEmployee::with(['branch', 'employee'])->find($request->id);
        return view("system.main.system_page.branch_employee.main.branch_employee_edit",
        [
            "branchEmployee"=> $branchEmployee,
            'branches' => Branch::get(),
            'employees' => Employee::where('id','<>', Session::get('id'))->get()]);
    }

    public function deleteBranchEmployee($id){
        $branchEmployee = BranchEmployee::find($id);

        if (!$branchEmployee) {
            return response()->json(['success' => false, 'error' => 'BranchEmployee not found']);
        }

        $branchEmployee->delete();
        return response()->json(['success' => true]);
        
    }

    public function addBranchEmployee(Request $request) {
        $data = $request->all();

        try {
            BranchEmployee::create($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to add your branch_employee. The name may be duplicated. Please check again!']);
        }
    }

    public function editBranchEmployee(Request $request, $id) {
        $data = $request->all();
        $branchEmployee = BranchEmployee::findOrFail($id);
        
        if (!$branchEmployee) {
            return response()->json(['success' => false, 'error' => 'BranchEmployee not found']);
        }

        try {
            $branchEmployee->update($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to edit your branch_employee. The name may be duplicated. Please check again!']);
        }
    }

    public function filterBranchEmployee(Request $request)
    {
        $data = $request->all();

        if ($data['branch-employee-filter-active'] === "all" && !$data['branch-employee-filter-branch']) {
            return response()->json(['branchEmployee' => BranchEmployee::with(['branch', 'employee'])->where('employee_id','<>', Session::get('id'))->get()]);
        }

        $branchEmployee = BranchEmployee::with(['branch', 'employee'])->where('employee_id','<>', Session::get('id'));

        if ($data['branch-employee-filter-active'] !== "all") {
            $branchEmployee = $branchEmployee->where('active', $data['branch-employee-filter-active']);
        }

        if ($data['branch-employee-filter-branch']) {
            $branchEmployee = $branchEmployee->where('branch_id', $data['branch-employee-filter-branch']);
        }

        $branchEmployee = $branchEmployee->get();

        if (!$branchEmployee) {
            return response()->json(['branchEmployee' => []]);
        }

        return response()->json(['branchEmployee' => $branchEmployee]);
    }


    private function authAccess()
    {
        if (!Session::get('id')) {
            return Redirect::to('/system-access')->send();
        }
    }
}
