<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\myCart;
use Session;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CartController extends Controller
{
    //

    public function __contruct()
    {
        $this->middlewware('auth');
    }

    public function add()
    {
        //get value from input text
        $r = request();
        $addItem = myCart::create([
            'quantity' => $r->quantity,
            'orderID' => '',
            'productID' => $r->id,
            'userID' => Auth::id(),

        ]);
        Session::flash('success', "Item has been added intio the cart sucessfully");

        return redirect()->route('myCart');
    }

    public function view()
    {

        //all means it will generate sql select all from categories
        $carts = DB::table('my_carts')
            ->leftjoin('products', 'products.id', '=', 'my_carts.productID')
            ->select('my_carts.quantity as cartQty', 'my_carts.id as cid', 'products.*')
            ->where('my_carts.orderID', '=', '')
            ->where('my_carts.userID', '=', Auth::id())
            ->paginate(5); //how many items per page
        // ->get();

        $this->cartItem();
        return view('myCart')->with('products', $carts);
    }

    public function cartItem()
    {
        $cartItem = 0;
        $noItem = DB::table('my_carts')
            ->leftjoin('products', 'products.id', '=', 'my_carts.productID')
            ->select(DB::raw('COUNT(*) as count_item'))
            ->where('my_carts.userID', '=', Auth::id())
            ->where('my_carts.orderID', '=', '')
            ->groupBy('my_carts.userID')
            ->first();
        if ($noItem) {
            $cartItem = $noItem->count_item;
        }
        Session()->put('cartItem', $cartItem);
    }
}
