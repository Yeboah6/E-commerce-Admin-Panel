<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\DeliveryAddress;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    // public function scrape() {
    //     $contents = File::get(base_path('public/assets/dataset_asos-com-scraper.json'));
    //     $json = json_decode(json:$contents, associative: true);
    //     print_r($json);
    // }

    // Displays Index / Home Page Function
    public function index() {
        $data = [];
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        $cartCount = 0;
        if (!empty($data)) {
            $cartCount = Cart::where('customer_id', $data->id)->count();
        }

        $contents = File::get(base_path('public/assets/dataset_asos-com-scraper.json'));
        $json = json_decode(json:$contents, associative: true);

        return view('pages.index', compact('json', 'data', 'cartCount'));
    }

    // Displays About Page Function
    public function about() {
        $data = [];
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }
        $cartCount = 0;
        if (!empty($data)) {
            $cartCount = Cart::where('customer_id', $data->id)->count();
        }
        $cart = Cart::where('customer_id', $data->id)->get(); // Get only user's cart items

        return view('pages.about', compact('data', 'cartCount'));
    }

    // Displays Wishlist Page Function
    public function wishlist() {
        $data = [];
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        $cartCount = 0;
        if (!empty($data)) {
            $cartCount = Cart::where('customer_id', $data->id)->count();
        }
        $cart = Cart::where('customer_id', $data->id)->get(); // Get only user's cart items

        return view('pages.add-to-wishlist', compact('data', 'cartCount'));
    }

    // Display Cart Page Function
    public function cart() {
        $data = [];
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();

        $contents = File::get(base_path('public/assets/dataset_asos-com-scraper.json'));
        $json = json_decode(json:$contents, associative: true);

        $cartCount = 0;
        if (!empty($data)) {
            $cartCount = Cart::where('customer_id', $data->id)->count();
        }

        $cart = Cart::where('customer_id', $data->id)->get(); // Get only user's cart items

        $results = [];
        $total = 0;
        
        foreach ($cart as $cartItem) {
            if ($cartItem -> customer_id == $data -> id) {
            foreach ($json as $jsonItem) {
                if ($jsonItem['id'] == $cartItem->product_id) {
                    $results[] = [
                        'product' => $jsonItem,
                        'cartItem' => $cartItem
                    ];
                    $price = $jsonItem['price']['current']['value'] ?? 0;
                    $total += $price * $cartItem->quantity;
                }
            }
        }
        }
            return view('pages.cart', compact('data', 'results', 'total', 'cartCount'));
        }
        else {
            return view('pages.cart#', compact('data'));
        }
    }

    // Adds Product to Cart Function
    public function addToCart(Request $request) {
        $validateData = $request -> validate([
            'customer_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required'
        ]); 

        $addToCart = new Cart();

        $addToCart -> fill([
            'customer_id' => $validateData['customer_id'],
            'product_id' => $validateData['product_id'],
            'quantity' => $validateData['quantity']
        ]);

        $addToCart -> save();
        return redirect() -> back() -> with('success', 'Added to Cart');
    }

    // Removes Product From Cart Function
    public function removeFromCart($id) {
        $cart = Cart::findOrFail($id);

        $cart -> delete();
        return redirect() -> back() -> with('success', 'Removed From Cart');
    }

    // Display Checkout Page Function
    public function checkout() {
        $data = [];
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

       // Ensure $data is not empty before accessing its properties
        $cartCount = 0;
        if (!empty($data)) {
            $cartCount = Cart::where('customer_id', $data->id)->count();
        }

        $contents = File::get(base_path('public/assets/dataset_asos-com-scraper.json'));
        $json = json_decode(json:$contents, associative: true);

        $cart = Cart::where('customer_id', $data->id)->get(); // Get only user's cart items

        $results = [];
        $total = 0;
        
        foreach ($cart as $cartItem) {
            if ($cartItem -> customer_id == $data -> id) {
            foreach ($json as $jsonItem) {
                if ($jsonItem['id'] == $cartItem->product_id) {
                    $results[] = [
                        'product' => $jsonItem,
                        'cartItem' => $cartItem
                    ];
                    $price = $jsonItem['price']['current']['value'] ?? 0;
                    $total += $price * $cartItem->quantity;
                }
            }
        }
    }

        return view('pages.checkout', compact('data', 'total', 'results', 'cartCount'));
    }

    public function postCheckout(Request $request) {
        $validateData = $request -> validate([
            'customer_id' => 'required',

            'country' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_name' => 'string',
            'address_1' => 'required|string',
            'address_2' => 'string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required|string',
            'email' => 'required|string|email',
            'number' => 'required|string',
        ]);

        $address = new DeliveryAddress();

        $address -> fill([
            'customer_id' => $validateData['customer_id'],
            'country' => $validateData['country'],
            'first_name' => $validateData['first_name'],
            'last_name' => $validateData['last_name'],
            'company_name' => $validateData['company_name'],
            'address_1' => $validateData['address_1'],
            'address_2' => $validateData['address_2'],
            'city' => $validateData['city'],
            'state' => $validateData['state'],
            'zip_code' => $validateData['zip_code'],
            'email' => $validateData['email'],
            'number' => $validateData['number'],
        ]);

        $address -> save();
        return redirect('/order-complete') -> with('fail', 'Data Not Saved');
    }

    // Display Contact Page Function
    public function contact() {
        $data = [];
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        $cartCount = 0;
        if (!empty($data)) {
            $cartCount = Cart::where('customer_id', $data->id)->count();
        }
        $cart = Cart::where('customer_id', $data->id)->get(); // Get only user's cart items

        return view('pages.contact', compact('data', 'cartCount'));
    }

    // Display Men Page Function
    public function men() {
        $data = [];
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        $cartCount = 0;
        if (!empty($data)) {
            $cartCount = Cart::where('customer_id', $data->id)->count();
        }
        $cart = Cart::where('customer_id', $data->id)->get(); // Get only user's cart items

        return view('pages.men', compact('data', 'cartCount'));
    }

    // Display Order Page Function
    public function orderComplete() {
        $data = [];
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        $cartCount = 0;
        if (!empty($data)) {
            $cartCount = Cart::where('customer_id', $data->id)->count();
        }
        $cart = Cart::where('customer_id', $data->id)->get(); // Get only user's cart items

        return view('pages.order-complete', compact('data', 'cartCount'));
    }

    // Display Product Details Page Function
    public function productDetail($id) {
        $data = [];
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        $cartCount = 0;
        if (!empty($data)) {
            $cartCount = Cart::where('customer_id', $data->id)->count();
        }

        $contents = File::get(base_path('public/assets/dataset_asos-com-scraper.json'));
        $json = json_decode(json:$contents, associative: true);

        foreach($json as $file) {
            if ($file['id'] == $id) {
                return view('pages.product-detail', compact('file', 'data', 'cartCount'));
            }
        }
        
    }

    // Display Women Page Function
    public function women() {
        $data = [];
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        $cartCount = 0;
        if (!empty($data)) {
            $cartCount = Cart::where('customer_id', $data->id)->count();
        }
        $cart = Cart::where('customer_id', $data->id)->get(); // Get only user's cart items

        return view('pages.women', compact('data', 'cartCount'));
    }




    public function dashboard() {
        return view('Admin.dashboard');
    }

    public function product() {
        $products = Products::all();
        return view('Admin.products', compact('products'));
    }

    public function customer() {
        $customers = Customer::all();
        return view('Admin.customers',compact('customers'));
    }


    public function postProducts(Request $request) {
        $validateData = $request->validate([
            'product_name' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|string',
            'product_image' => 'nullable|file|mimes:jpeg,png,jpg,svg|max:5048', // 5MB max
            'product_image2' => 'nullable|file|mimes:jpeg,png,jpg,svg|max:5048', // 5MB max
            'product_image3' => 'nullable|file|mimes:jpeg,png,jpg,svg|max:5048', // 5MB max
            'quantity' => 'required|string',
            'description' => 'required|string'
        ]);
    
        // Generate unique product ID
        $product_id = 'PID' . uniqid();
    
        // Create new product instance
        $product = new Products();
        $product->fill([
            'product_id' => $product_id,
            'product_name' => $validateData['product_name'],
            'category' => $validateData['category'],
            'price' => $validateData['price'],
            'quantity' => $validateData['quantity'],
            'description' => $validateData['description']
        ]);
    
        // Handle file upload
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $fileName = 'IM_' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('uploads/product-images', $fileName, 'public');
            $product->product_image = $fileName; // Save file name to DB
        }
        // Handle file upload
        if ($request->hasFile('product_image2')) {
            $file = $request->file('product_image2');
            $fileName = 'IM2_' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('uploads/product-images', $fileName, 'public');
            $product->product_image2 = $fileName; // Save file name to DB
        }
        // Handle file upload
        if ($request->hasFile('product_image3')) {
            $file = $request->file('product_image3');
            $fileName = 'IM3_' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('uploads/product-images', $fileName, 'public');
            $product->product_image3 = $fileName; // Save file name to DB
        }
    
        // Save product to database
        $product->save();
    
        return redirect('/products')->with('success', 'Product Added Successfully');
    }

    // Delete Product Function
    public function delete($id) {
        $delete = Products::findOrFail($id);

        $delete -> delete();
        return redirect() -> back() -> with('success', 'Product Successfully Deleted');
    }
    

    // public function postProducts(Request $request) {
    //     $validateData = $request -> validate([
    //         'product_id' => 'required|string',
    //         'product_name' => 'required|string',
    //         'category' => 'required|string',
    //         'price' => 'required|string',
    //         'product_image' => 'required|nullable|file|mimes:jpeg,png,jpg,svg|max:5048', // 5MB max
    //         'quantity' => 'required|string',
    //     ]);

    //     $product_id = 'PID' . mt_rand(1000, 9999);

    //     $product = new Products();

    //     $product -> fill([
    //         'product_id' => $product_id,

    //         'product_name' => $validateData['product_name'],
    //         'category' => $validateData['category'],
    //         'price' => $validateData['price'],
    //         'quantity' => $validateData['quantity']
    //     ]);

    //     if($file = $request -> hasFile('product_image')) {
         
    //         $file = $request -> file('product_image');
    //         $fileName = 'IM_'.$file -> getClientOriginalName();
    //         $destinationPath = public_path().'/uploads/product-images/';
    //         $file -> move($destinationPath, $fileName);
    //         $product -> product_image = $fileName;
    //     }

    //     // dd($product);

    //     $product -> save();
    //     return redirect('/products') -> with('success', 'Products Added Successfully');

    // }
}
