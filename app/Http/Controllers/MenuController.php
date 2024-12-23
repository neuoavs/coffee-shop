<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
session_start();


class MenuController extends Controller
{
    //Menu List View
    public function menuList() {
        $this->authAccess();
        return view("system.main.system_page.menu.main.menu_list", ["menus"=> Menu::all()]);
    }

    //Menu Add View
    public function menuAdd() {
        $this->authAccess();
        return view("system.main.system_page.menu.main.menu_add");
    }

    //Menu Edit View
    public function menuEdit(Request $request) {
        $this->authAccess();

        $menu = Menu::find($request->id);
        return view("system.main.system_page.menu.main.menu_edit", ["menu"=> $menu]);
    }

    public function deleteMenu($id){
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json(['success' => false, 'error' => 'Menu not found']);
        }

        $menu->delete();
        return response()->json(['success' => true]);
        
    }

    public function addMenu(Request $request) {
        $data = $request->all();

        try {
            Menu::create($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to add your menu. The name may be duplicated. Please check again!']);
        }
    }

    public function editMenu(Request $request, $id) {
        $data = $request->all();
        $menu = Menu::findOrFail($id);
        
        if (!$menu) {
            return response()->json(['success' => false, 'error' => 'Menu not found']);
        }

        try {
            $menu->update($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success'=> false,'error'=> 'Unable to edit your menu. The name may be duplicated. Please check again!']);
        }
    }

    public function filterMenu(Request $request)
    {
        $data = $request->all();

        if ($data['menu-filter-active'] === "all") {
            return response()->json(['menus' => Menu::all()]);
        }

        $menus = Menu::where('active', $data['menu-filter-active'])->get();

        if (!$menus) {
            return response()->json(['menus' => []]);
        }

        return response()->json(['menus' => $menus]);
    }


    private function authAccess()
    {
        if (!Session::get('id')) {
            return Redirect::to('/system-access')->send();
        }
    }
}
