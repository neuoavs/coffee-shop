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

        try {
            Branch::create($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to add your branch. The branch may already exist or the information may be duplicated. Please check again!']);
        }
    }

    public function editBranch(Request $request, $id) {
        $data = $request->all();
        $branch = Branch::findOrFail($id);
        
        if (!$branch) {
            return response()->json(['success' => false, 'error' => 'Branch not found']);
        }

        // Nếu name, address, province không thay đổi thì district và ward không được thay dổi
        if ($branch->address === $data['address']
        && $branch->province === $data['province']
        && ($branch->district !== $data['district']
        || $branch->ward !== $data['ward'])) {
            return response()->json(['success'=> false,'error'=> 'The district and the ward cannot be changed if the name, the address and the province remain unchanged. Please check again!']);
        }

        try {
            $branch->update($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to edit your branch. The information may be duplicated. Please check again!']);
        }
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