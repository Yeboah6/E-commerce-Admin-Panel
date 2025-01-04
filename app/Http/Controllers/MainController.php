<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\DeliveryAddress;
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
        $data = array();
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        $contents = File::get(base_path('public/assets/dataset_asos-com-scraper.json'));
        $json = json_decode(json:$contents, associative: true);
        return view('pages.index', compact('json', 'data'));
    }

    // Displays About Page Function
    public function about() {
        $data = array();
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        return view('pages.about', compact('data'));
    }

    // Displays Wishlist Page Function
    public function wishlist() {
        $data = array();
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        return view('pages.add-to-wishlist', compact('data'));
    }

    // Display Cart Page Function
    public function cart() {
        $data = array();
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();

            $contents = File::get(base_path('public/assets/dataset_asos-com-scraper.json'));
            $json = json_decode(json:$contents, associative: true);

        $cart = Cart::all();

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
        // dd($data -> id);
            return view('pages.cart', compact('data', 'results', 'total'));
        }
        else {
            // dd($data -> id);
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
        $data = array();
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        $contents = File::get(base_path('public/assets/dataset_asos-com-scraper.json'));
        $json = json_decode(json:$contents, associative: true);

        $cart = Cart::all();

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

        return view('pages.checkout', compact('data', 'total', 'results'));
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
        $data = array();
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        return view('pages.contact', compact('data'));
    }

    // Display Men Page Function
    public function men() {
        $data = array();
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        return view('pages.men', compact('data'));
    }

    // Display Order Page Function
    public function orderComplete() {
        $data = array();
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        return view('pages.order-complete', compact('data'));
    }

    // Display Product Details Page Function
    public function productDetail($id) {
        $data = array();
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        $contents = File::get(base_path('public/assets/dataset_asos-com-scraper.json'));
        $json = json_decode(json:$contents, associative: true);

        foreach($json as $file) {
            if ($file['id'] == $id) {
                return view('pages.product-detail', compact('file', 'data'));
            }
        }
        
    }

    // Display Women Page Function
    public function women() {
        $data = array();
        if(Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId')) -> first();
        }

        return view('pages.women', compact('data'));
    }
}
