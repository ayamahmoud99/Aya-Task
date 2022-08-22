<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function save_in_cart(Request $request): JsonResponse
    {

        if (Auth::user() !== null && $request->get('id') !== null && $request->get('qty') !== null) {
            $id = $request->get('id');
            $qty = $request->get('qty');
            $added = false;
            $removed = false;
            if ($qty < 0) {
                return response()->json(['message' => 'bad input'], 422);
            }
            $item = Cart::where(['product_id' => $id, 'user_id' => Auth::user()->id])->get()->first();
            if ($item ) {
                if ($qty < 1) {
                    $item->delete();
                    $removed = true;
                } else {
                    $item->quantity = $qty;
                    $item->save();
                }

            } else {
                $added = true;
                Cart::create(['user_id' => Auth::user()->id, 'product_id' => $id, 'quantity' => $qty]);
            }

            $count = Cart::Where('user_id',Auth::user()->id)->count();
            return response()->json(['message' => 'success', 'number_of_prod_in_cart' => $count, 'added' => $added, 'removed' => $removed], 201);
        }
        return response()->json(['message' => 'bad input'], 422);
    }


    public function show_cart()
    {
        if (Auth::user() !== null) {
            $loggedIn = true;
            $carts = Cart::where('user_id', '=', Auth::user()->id)->get();
            return view('home.includes.cart', compact('carts', 'loggedIn'));
        }


    }

}
