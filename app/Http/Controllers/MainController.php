<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
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
        // dd($total);
            return view('pages.cart', compact('data', 'results', 'total'));
        } else {
            return view('pages.cart', compact('data'));
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
