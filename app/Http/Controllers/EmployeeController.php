<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
session_start();

class EmployeeController extends Controller
{   
    //Employee List View
    public function employeeList() {
        $this->authAccess();
        return view("system.main.system_page.employee.main.employee_list",
        [
            "employees"=> Employee::with('position')
                        ->where('nickname','<>', Session::get('nickname'))
                        ->get(),
            "positions" => Position::where('name','<>',Session::get('position'))
                        ->get()
        ]);
    }

    //Employee Add View
    public function employeeAdd() {
        $this->authAccess();
        return view("system.main.system_page.employee.main.employee_add",
        [
            "positions" => Position::where('name','<>',Session::get('position'))
                        ->get()
        ]);
    }

    //Employee Edit View
    public function employeeEdit(Request $request) {
        $this->authAccess();

        $employee = Employee::with('position')->find($request->id);
        return view("system.main.system_page.employee.main.employee_edit",
        [
            "employee"=> $employee,
            "positions" => Position::where('name','<>',Session::get('position'))
                        ->get()
        ]);
    }

    public function deleteEmployee($id){
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['success' => false, 'error' => 'Postion not found']);
        }

        $employee->delete();
        return response()->json(['success' => true]);
        
    }

    public function addEmployee(Request $request) {
        $data = $request->all();
        
        $data['password'] = Hash::make($data['password']);

        try {
            Employee::create($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to add your employee. The information may be duplicated or not valid. Please check again!']);
        }
    }

    public function editEmployee(Request $request, $id) {
        $data = $request->all();
        
        if (Hash::needsRehash($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        
        $employee = Employee::findOrFail($id);
        
        if (!$employee) {
            return response()->json(['success' => false, 'error' => 'Employee not found']);
        }

        try {
            $employee->update($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to edit your employee. The information may be duplicated or not valid. Please check again!']);
        }
    }

    public function filterEmployee(Request $request)
    {
        $data = $request->all();

        if (!$data['employee-filter-salary-coefficient']) {
            return response()->json(
                [
                    'employees' => Employee::with('position')
                            ->where('nickname','<>', Session::get('nickname'))
                            ->get()
                ]);
        }
        
        $employees = Employee::with('position')->where('nickname','<>', Session::get('nickname'))->where('salary_coefficient', '<=', $data['employee-filter-salary-coefficient'])->get();

        if (!$employees) {
            return response()->json(['employees' => []]);
        }

        return response()->json(['employees' => $employees]);
    }


    private function authAccess()
    {
        if (!Session::get('id')) {
            return Redirect::to('/system-access')->send();
        }
    }
}
