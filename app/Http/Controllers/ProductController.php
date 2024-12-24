<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
session_start();

class ProductController extends Controller
{
    public function productList() {
        return view("system.main.system_page.product.main.product_list", ["products"=> Product::with("menu")->get(), "menus" => Menu::get()]);
    }

    public function productAdd() {
        return view("system.main.system_page.product.main.product_add", ["menus" => Menu::get()]);
    }

    public function productEdit(Request $request) {
        $product = Product::with('menu')->find($request->id);
        return view("system.main.system_page.product.main.product_edit", ["product"=> $product, "menus" => Menu::get()]);
    }

    public function addProduct(Request $request) {
        $data = $request->all();

        $fileRequest = $request->file('image');
        if ($fileRequest) {
            $fileName = "product" . '-' .str_replace(' ', '-', $data['name']). '.png';
            $path = $fileRequest->move(base_path('resources/assets/system/img/products'), $fileName);
            
            if (!$path) {
                return response()->json(['success' => false, 'error' => 'Image upload failed']);
            }
            
            $path = "resources/assets/system/img/products/".$fileName;
            $data["image"] = $path;
        }

        try {
            Product::create($data);
            return response()->json(['success' => true]);
        } catch (\Exception $th) {
            return response()->json(['success' => false, 'error' => 'Unable to add your product. The information may be duplicated or not valid. Please check again!']);
        }
    }

    public function deleteProduct($id){
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['success' => false, 'error' => 'Product not found']);
        }

        if (!File::exists(base_path($product->image))) {
            return response()->json(['success' => false, 'error' => 'Image not found']);
        }

        File::delete(base_path($product->image));
        $product->delete();
        return response()->json(['success' => true]);
        
    }
    
    public function editProduct(Request $request, $id) {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json(['success' => false, 'error' => 'Product not found']);
        }

        $data = $request->all();
        $fileRequest = $request->file('image');
        

        if ($fileRequest) {
            if ($product->image && file_exists(base_path($product->image))) {
                unlink(base_path($product->image));
            }

            // Save new image
            $fileName = "product" . '-' .str_replace(' ', '-', $data['name']). '.png';
            $path = $fileRequest->move(base_path('resources/assets/system/img/products'), $fileName);
            
            if (!$path) {
                return response()->json(['success' => false, 'error' => 'Image upload failed']);
            }
            
            $path = "resources/assets/system/img/products/".$fileName;
            $data["image"] = $path;
        }

        try {
            $product->update($data);
            return response()->json(['success' => true]);
        } catch (\Exception $th) {
            return response()->json(['success' => false, 'error' => 'Unable to update your product. The information may be duplicated or not valid. Please check again!']);
        }
    }


    public function filterProduct(Request $request)
    {
        $data = $request->all();

        if ($data['product-filter-active'] === "all" && !$data['product-filter-menu'] && !$data['product-filter-price']) {
            return response()->json(['products' => Product::with("menu")->get()]);
        }
        
        $products = Product::with('menu')->get();
        
        if ($data['product-filter-active'] !== "all") {
            $products = $products->where('active', $data['product-filter-active']);
        }

        if ($data['product-filter-menu']) {
            $products = $products->where('menu_id', $data['product-filter-menu']);
        }

        if ($data['product-filter-price']) {
            $products = $products->where('price', '<=', $data['product-filter-price']);
        }

        if (!$products) {
            return response()->json(['products' => []]);
        }

        return response()->json(['products' => $products]);
    }
}
