<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

class HomeController extends Controller
{

    public function index()
    {
        $Products_in_cart = 0;
        $loggedIn = false;
        if (Auth::user() !== null) {
            $Products_in_cart= Cart::Where('user_id',Auth::user()->id)->count();
            $loggedIn = true;
        }
        $products = $this->getProduct();
        return view('home.userpage', compact('Products_in_cart','products', 'loggedIn'));
    }


    public function redirect()
    {
        $Products_in_cart = 0;
        $loggedIn = false;
        if (Auth::user() !== null ) {
            $loggedIn = true;
            $Products_in_cart = Cart::Where('user_id',Auth::user()->id)->count();
            $usertype = auth::user()->usertype;
            if ($usertype == "1") {
                return view(('admin.home'));
            }
        }

        $products = $this->getProduct();
        return view('home.userpage', compact('products', 'loggedIn','Products_in_cart'));


    }

    public function getProduct()
    {


        $products = Product::limit(16)->get();
        foreach ($products as $product) {
            $product->added_qty = $this->returnQtyIfInCard($product->id);
        }

        return $products;
    }

    public function returnQtyIfInCard($prodId): int
    {
        if (Auth::user() !== null) {
            $item = Cart::where(['product_id' => $prodId, 'user_id' => Auth::user()->id])->get()->first();
            if ($item) {
                return $item->quantity;
            } else {
                return 0;
            }
        }
        return 0;
    }


}
