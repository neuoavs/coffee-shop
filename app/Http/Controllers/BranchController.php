<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Branch;
use Illuminate\Support\Facades\Session;
session_start();

class BranchController extends Controller
{
    public function branchList() {
        $this->authAccess();
        return view("system.main.system_page.branch.main.branch_list", ["branches"=> Branch::all()]);
    }

    public function branchAdd() {
        $this->authAccess();
        return view("system.main.system_page.branch.main.branch_add");
    }
    
    public function branchEdit(Request $request) {
        $this->authAccess();

        $branch = Branch::find($request->id);
        
        Session::put('province', $branch->province);
        Session::put('district', $branch->district);
        Session::put('ward', $branch->ward);

        return view("system.main.system_page.branch.main.branch_edit", ["branch"=> $branch]);
    }

    public function deleteBranch($id){
        $branch = Branch::find($id);

        if (!$branch) {
            return response()->json(['success' => false, 'error' => 'Branch not found']);
        }

        $branch->delete();
        return response()->json(['success' => true]);
        
    }

    public function addBranch(Request $request) {
        $data = $request->all();

        $isExist = Branch::where('name', $data['name'])
        ->where('address', $data['address'])
        ->where('province', $data['province'])->exists();


        if ($isExist) {
            return response()->json(['success' => false, 'error' => 'This branch is readly exist']);
        }

        $branch = Branch::create($data);
        
        if ($branch) {
            return response()->json(['success' => true]);
        } 
        return response()->json(['success' => false, 'error' => 'Can not add your branch']);
    }

    public function editBranch(Request $request, $id) {
        $data = $request->all();
        $branch = Branch::find($id);
        $isExist = false;
        
        if (!$branch) {
            return response()->json(['success' => false, 'error' => 'Branch not found']);
        }

        if ($branch->province === $data['province']) {
            if ($branch->name !== $data['name'] && $branch->address === $data['address']) {
                $isExist = Branch::where('name', $data['name'])->where('province', $data['province'])->exists();
            } else if ($branch->name === $data['name'] && $branch->address !== $data['address']) {
                $isExist = Branch::where('address', $data['address'])->where('province', $data['province'])->exists();
            }
        }

        if ($isExist) {
            return response()->json(['success' => false, 'error' => 'This new information duplicates an existing branch']);
        }
        
        if (!$branch->update($data)) {
            return response()->json(['success'=> false,'error'=> 'Can not edit this branch']);
        }
        
        return response()->json(['success' => true]);
        
    }

    public function filterBranch(Request $request)
    {
        $data = $request->all();

        if (!$data['branch-filter-province']) {
            return response()->json(['branches' => Branch::all()]);
        }

        $branches = Branch::where('province', $data["branch-filter-province"])->get();

        if (!$branches) {
            return response()->json(['branches' => []]);
        }

        return response()->json(['branches' => $branches]);
    }


    private function authAccess()
    {
        if (!Session::get('id')) {
            return Redirect::to('/system-access')->send();
        }
    }
}