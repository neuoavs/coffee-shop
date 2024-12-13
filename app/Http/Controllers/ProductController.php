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
        $fileName = "product" . '_' .$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->move(base_path('resources/assets/system/img/products'), $fileName);
        
        if (!$path) {
            return response()->json(['success' => false, 'error' => 'Image upload failed']);
        }
        
        $path = "resources/assets/system/img/products/".$fileName;
        $data["image"] = $path;
        $product = Product::create($data);
        
        if (!$product) {
            return response()->json(['success' => false, 'error' => 'Can not add your product']);
        }

        return response()->json(['success' => true]);
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
    
        $fileRequest = $request->file('image');
        $data = $request->all();
        
        // Kiểm tra hình ảnh mới có được tải lên không
        if ($fileRequest) {
            $oldImagePath = base_path($product->image);
    
            if (File::exists($oldImagePath)) {
                // So sánh nội dung file cũ và mới
                if (md5_file($fileRequest->getRealPath()) !== md5_file($oldImagePath)) {
                    File::delete($oldImagePath);
                    $fileName = "product_" . time() . '_' . $fileRequest->getClientOriginalName(); // Tạo tên file
                    $path = $fileRequest->move(base_path('resources/assets/system/img/products'), $fileName);
                    if (!$path) {
                        return response()->json(['success' => false, 'error' => 'Image upload failed']);
                    }
                    $data["image"] = 'resources/assets/system/img/products/' . $fileName; 
                }
            } else {
                return response()->json(['success' => false, 'error' => 'Old image not found']);
            }
        } else {
            // Nếu không có hình ảnh mới, giữ lại path hình ảnh cũ
            $data["image"] = $product->image; 
        }
    
        // Kiểm tra xem tên sản phẩm đã tồn tại chưa
        if ($product->name !== $data["name"]) {
            $isExist = Product::where("name", $data["name"])->where('id', '!=', $id)->exists(); // Kiểm tra trừ sản phẩm hiện tại
            if ($isExist) {
                return response()->json(['success' => false, 'error' => 'This product already exists']);
            }
        }
    
        // Cập nhật sản phẩm
        if (!$product->update($data)) {
            return response()->json(['success'=> false, 'error'=> 'Cannot edit this product']);
        }
    
        return response()->json(['success' => true]);
    }


    public function filterProduct(Request $request)
    {
        // $data = $request->all();
        // $products = null;

        // if (!$data['product-filter-menu'] && !$data['product-filter-cost']) {
        //     return response()->json(['products' => Product::all()]);
        // }
        
        // if ($data['product-filter-menu']) {
        //     if ($data['product-filter-cost']) {
        //         $product = Product::with('menu')->where('menu_id', $data["product-filter-menu"])->where('cost', '<', $data['product-filter-cost'])->get();
        //     }
        //     $products = Product::with('menu')->where('menu_id', $data["product-filter-menu"])->get();
        // }

        // if ($data['product-filter-cost']) {
            
        //     $products =  Product::with('menu')->where('cost', '<', $data['product-filter-cost']);
        // }

        // if (!$products) {
        //     return response()->json(['products' => []]);
        // }

        // return response()->json(['products' => $products]);


        return response()->json(['products' => Product::all()]);
    }
}
