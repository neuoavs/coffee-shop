<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Item;
use App\Models\Branch;
use App\Models\Unit;
use Illuminate\Support\Facades\Session;
session_start();

class ItemController extends Controller
{
    //Item List View
    public function itemList() {
        $this->authAccess();
        return view("system.main.system_page.item.main.item_list", ["items"=> Item::with(['branch', 'unit'])->get(), 'branches' => Branch::get(), 'units' => Unit::get()]);
    }

    //Item Add View
    public function itemAdd() {
        $this->authAccess();
        return view("system.main.system_page.item.main.item_add", ['branches' => Branch::get(), 'units' => Unit::get()]);
    }

    //Item Edit View
    public function itemEdit(Request $request) {
        $this->authAccess();

        $item = Item::with(['branch', 'unit'])->find($request->id);
        return view("system.main.system_page.item.main.item_edit",
        [
            "item"=> $item, 'branches' => Branch::get(), 'units' => Unit::get()
        ]);
    }

    public function deleteItem($id){
        $item = Item::find($id);

        if (!$item) {
            return response()->json(['success' => false, 'error' => 'Item not found']);
        }

        if (!File::exists(base_path($item->image))) {
            return response()->json(['success' => false, 'error' => 'Image not found']);
        }

        File::delete(base_path($item->image));
        $item->delete();
        return response()->json(['success' => true]);
    }

    public function addItem(Request $request) {
        $data = $request->all();

        $fileRequest = $request->file('image');
        if ($fileRequest) {
            $fileName = "item" . '-' .str_replace(' ', '-', $data['name']). '.png';
            $path = $fileRequest->move(base_path('resources/assets/system/img/items'), $fileName);
            
            if (!$path) {
                return response()->json(['success' => false, 'error' => 'Image upload failed']);
            }
            
            $path = "resources/assets/system/img/items/".$fileName;
            $data["image"] = $path;
        }

        try {
            Item::create($data);
            return response()->json(['success' => true]);
        } catch (\Exception $th) {
            return response()->json(['success' => false, 'error' => 'Unable to add your item. The information may be duplicated or not valid. Please check again!']);
        }
    }

    public function editItem(Request $request, $id) {
        $item = Item::find($id);
    
        if (!$item) {
            return response()->json(['success' => false, 'error' => 'Item not found']);
        }

        $data = $request->all();
        $fileRequest = $request->file('image');
        
        // Handle image upload
        if ($fileRequest) {
            // Delete old image if exists
            if ($item->image && file_exists(base_path($item->image))) {
                unlink(base_path($item->image));
            }

            // Save new image
            $fileName = "item" . '-' .str_replace(' ', '-', $data['name']). '.png';
            $path = $fileRequest->move(base_path('resources/assets/system/img/items'), $fileName);
            
            if (!$path) {
                return response()->json(['success' => false, 'error' => 'Image upload failed']);
            }
            
            $path = "resources/assets/system/img/items/".$fileName;
            $data["image"] = $path;
        }

        try {
            $item->update($data);
            return response()->json(['success' => true]);
        } catch (\Exception $th) {
            return response()->json(['success' => false, 'error' => 'Unable to update your item. The information may be duplicated or not valid. Please check again!']);
        }
    }

    public function filterItem(Request $request)
    {
        $data = $request->all();

        if ($data['item-filter-active'] === "all" && !$data['item-filter-unit'] && !$data['item-filter-branch']) {
            return response()->json(['items' => Item::with(['branch', 'unit'])->get()]);
        }

        $items = Item::with(['branch', 'unit']);

        if ($data['item-filter-active'] !== "all") {
            $items = $items->where('active', $data['item-filter-active']);
        }

        if ($data['item-filter-unit']) {
            $items = $items->where('unit_id', $data['item-filter-unit']);
        }

        if ($data['item-filter-branch']) {
            $items = $items->where('branch_id', $data['item-filter-branch']);
        }

        $items = $items->get();

        if (!$items) {
            return response()->json(['items' => []]);
        }

        return response()->json(['items' => $items]);
    }


    private function authAccess()
    {
        if (!Session::get('id')) {
            return Redirect::to('/system-access')->send();
        }
    }
}
