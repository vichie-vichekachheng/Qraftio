<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function dashboard(){
        $orders = Order::all();
        $products = Product::all();
        $categories = Category::all();
        $users= User::all();
        $totalOrder = Order::count();
        return view("admin.dashboard",compact("products","categories", "users", "orders", "totalOrder"));
    } 
    public function addCategory(){
        $totalOrder = Order::count();
        return view("admin.addCategory",compact('totalOrder'));
    }
    public function storeCategory(Request $request){
        $validated = $request->validate([
            'category_name'=>['required','string'],
            'description'=>['required','string'],
            'image'=>'required|image|mimes:png,jpg,webp,jpeg|max:5120',
        ]);
        $category= new Category();
        $category->category_name = $validated['category_name'];
        $category->description = $validated['description'];
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }
        $category->save();
        return redirect()->back()->with('success','Category added Successfully!');
    }
    public function viewCategory(Category $categories){
        $categories= Category::paginate(10);
        $totalOrder = Order::count();
        return view('admin.viewCategory', compact('categories', 'totalOrder'));
    }
    public function deleteCategory(Category $category){
        $category->delete();
        return redirect(route('admin.viewCategory'))->with('success','Category deleted Successfully!');
    }
    public function editCategory($id){
        $category = Category::findOrfail($id);
        return view('admin.editCategory', compact('category'));
    }
    public function updateCategory(Request $request, Category $category){
        $validated = $request->validate([
            'category_name'=>['required','string'],
            'description'=>['required','string'],
            'image'=>'required|image|mimes:png,jpg,webp,jpeg|max:5120',
        ]);
        $category->category_name = $validated['category_name'];
        $category->description = $validated['description'];
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }
        $category->save();
        return redirect()->back()->with('success','Category updated Successfully!');
    
    }
public function viewCat($id){
    $cat = Category::findOrfail($id);
    return view('admin.viewCat', compact('cat'));
}
public function addProduct(){
    $categories = Category::all();
    $totalOrder = Order::count();
    return view('admin.addProduct', compact('categories', 'totalOrder'));
}
public function storeProduct(Request $request){
    $validated = $request->validate([
        'product_name'=>"required|string|max:255",
        'price'=>"required",
        'quantity'=> 'required',
        "description"=> "required|string",
        'category_id' => 'required|exists:categories,id',
        "image"=> "required|image|mimes:png,jpeg,jpg,webp|max:5120",
    ]);
    $product = new Product();
    $product->product_name = $validated['product_name']; 
    $product->price = $validated['price']; 
    $product->quantity = $validated['quantity']; 
    $product->description = $validated['description']; 
    $product->category_id = $validated['category_id'];
    if($request->hasFile('image')){
        $imagePath= $request->file('image')->store('products', 'public');
        $product->image = $imagePath;
    }
    $product->save();
    return redirect(route("admin.addProduct"))->with('success','Product added Successfully!');
}

public function viewProduct(){
    $products = Product::paginate(7);
    $totalOrder = Order::count();
    return view('admin.viewProduct', compact('products', 'totalOrder'));

}
public function deleteProduct(Product $product){
    $product->delete();
    return redirect(route('admin.viewProduct'))->with('success','Product deleted Successfully!');
}
public function editProduct($id){
    $categories =Category::all();
    $products = Product::findOrFail($id);
    return view('admin.editProduct', compact('categories', 'products'));
}
public function updateProduct(Request $request, Product $product){
    $validated = $request->validate([
        'product_name'=>"required|string|max:255",
        'price'=>"required",
        'quantity'=> 'required',
        "description"=> "required|string",
        'category_id' => 'required|exists:categories,id',
        "image"=> "required|image|mimes:png,jpeg,jpg,webp|max:5120",
    ]);
    $product->product_name = $validated['product_name']; 
    $product->price = $validated['price']; 
    $product->quantity = $validated['quantity']; 
    $product->description = $validated['description']; 
    $product->category_id = $validated['category_id'];
    if($request->hasFile('image')){
        $imagePath= $request->file('image')->store('products', 'public');
        $product->image = $imagePath;
    }
    $product->save();
    return redirect(route("admin.addProduct"))->with('success','Product updated Successfully!');
}
public function showProduct($id){

$products = Product::findOrFail($id);
return view('admin.showProduct', compact('products'));
}
public function searchUser(Request $request){
    $users = User::where('name', 'LIKE', '%'.$request->search.'%')->paginate(10);
    return view('admin.viewUser', compact('users'));
}
public function searchProduct(Request $request){
    $products = Product::where('product_name', 'LIKE', '%'.$request->search_product. '%')->paginate(10);
    return view('admin.viewProduct', compact('products'));
}
public function viewOrder(){
    $orders = Order::all();
    return view('admin.viewOrder', compact('orders'));
}

}