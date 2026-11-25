<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->user_type=="user"){
            return view("user.dashboard");
        } elseif (Auth::user()->user_type=="admin"){
            return view("admin.dashboard");
        } else{
            return view("welcome");
        }
        }
        
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function addUser()
    {
        return view('auth.register');
    }

    public function viewUser(){
        $users= User::paginate(10);
        return view('admin.viewUser',compact('users'));
    }
    public function home(){
        if(Auth::check()){
            $count = ProductCart::where('user_id',Auth::id())->count();
        } else{
            $count="";
        }
         $categories = Category::all();
            $products = Product::latest()->take(4)->get();
            return view('index',compact('categories','products', 'count'));
    }
   
public function deleteUser(User $user){
    $user->delete();
    return redirect(route('admin.viewUser'))->with('delete_success', "User Deleted Successfully!");
}
    public function editUser($id){
        $user = User::findOrFail($id);
        return view("admin.editUser", compact('user'));
    }
public function updateUser(Request $request, User $user){
   $validated = $request->validate([
   "name"=> "required|string|max:100",
   "email"=> "required|email|unique:users,email,".$user->id,
   "password"=> "nullable|min:8|confirmed",
   ]);
   $user->name = $validated["name"];
   $user->email = $validated["email"];
   if($request->filled("password")){
    $user->password = Hash::make($request->password);
   }
   $user->save();
   return redirect(route("admin.viewUser"))->with("success","User updated Successfully!");
}
public function viewProductDetail($id){
    if(Auth::check()){
            $count = ProductCart::where('user_id',Auth::id())->count();
        } else{
            $count="";
        }
    $product = Product::findOrFail($id);    
    return view("user.viewProductDetails",compact("product", "count"));
}
public function addToCart($id){
    $product = Product::findOrFail($id);
    $product_cart = new ProductCart();
    $product_cart->user_id= Auth::id();
    $product_cart->product_id= $product->id;
    $product_cart->save();
    return redirect()->route('user.viewProduct', $product->id)->with('success', "Product added to Cart successfully!");
}
public function allProducts(Product $product){
    if(Auth::check()){
            $count = ProductCart::where('user_id',Auth::id())->count();
        } else{
            $count=0;
        }
    $products = Product::paginate(8);
    return view('allProducts', compact('products', 'count'));
}
public function viewCart(){
     if(Auth::check()){
            $count = ProductCart::where('user_id',Auth::id())->count();
            $carts = ProductCart::where('user_id', Auth::id())->get();
        } else{
            $count=0;
        }
    return view('user.viewCart', compact('count', 'carts'));
}
public function deleteItem(ProductCart $cart){
    $cart->delete();
    return redirect()->route('viewCart')->with('success', "Item delete from Cart Successfully!");
}
public function checkOut(){
    if((Auth::check())){
        $count = ProductCart::where('user_id', Auth::id())->count();
        $carts = ProductCart::where('user_id', Auth::id())->get();
    } else{
        $count = 0;
    }
    return view('user.checkout', compact('count', 'carts'));
}
public function confirm_order(Request $request){
    $car_product_id = ProductCart::where('user_id', Auth::id())->get();
    $address = $request->address;
    $phone_number = $request->phone_number;
    foreach($car_product_id as $cart_product){
    $orders = new Order;
    $orders->address=$address;
    $orders->phone_number=$phone_number;
    $orders->user_id = Auth::id();
    $orders->product_id= $cart_product->product_id;
    $orders->save();
    }
    return redirect()->route('checkOut')->with("success", "Ordered Successfully!, Please be patient until our team contact to you!");
}
}
