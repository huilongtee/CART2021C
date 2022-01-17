<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Category;
use Session;

class ProductController extends Controller
{
    //
    public function add()
    {

        //get value from input text
        $r = request();

        $image = $r->file('productImage');
        $image->move('images/phone', $image->getClientOriginalName()); //images is the location, move $image->getClientOriginalName() and assign it into images directory
        $imageName = $image->getClientOriginalName();

        $addProduct = Product::create([
            'name' => $r->productName,
            'description' => $r->productDescription,
            'price' => $r->productPrice,
            'quantity' => $r->productQuantity,
            'image' => $imageName,
            'CategoryID' => $r->categoryID,
        ]);
        Session::flash('success', "Product has been created sucessfully");
        return redirect()->route('viewProduct');
    }

    public function edit($id)
    {
        $products = Product::all()->where('id', $id);
        return view('editProduct')->with('products', $products)->with('categoryID', Category::all());
    }

    public function view()
    {
(new CartController)->cartItem();

        //all means it will generate sql select all from categories
        $viewProduct = DB::table('products')
            ->leftjoin('categories', 'categories.id', '=', 'products.CategoryID')
            ->select('products.*', 'categories.name as catName')
            ->get();
        return view('showProduct')->with('products', $viewProduct);
    }

    public function update()
    {
        //get value from input text
        $r = request();
        $products = Product::find($r->id);
        if ($r->file('productImage') != '') {
            $image = $r->file('productImage');
            $image->move('images/phone', $image->getClientOriginalName()); //images is the location, move $image->getClientOriginalName() and assign it into images directory
            $imageName = $image->getClientOriginalName();
            $products->image = $imageName;
        }

        $products->name = $r->productName;
        $products->description = $r->productDescription;
        $products->price = $r->productPrice;
        $products->quantity = $r->productQuantity;
        $products->CategoryID = $r->categoryID;
        $products->save();


        Session::flash('success', "Product has been updated sucessfully");
        return redirect()->route('viewProduct');
    }

    public function delete($id)
    {

        $deleteProduct = Product::find($id);
        $deleteProduct->delete();
        Session::flash('success', "Product has been deleted sucessfully");
        return redirect()->route('viewProduct');
    }

    public function productdetail($id)
    {
        $products = Product::all()->where('id', $id);
        return view('productDetail')->with('products', $products);
    }

    public function products()
    {
        $products = Product::all();
        return view('products')->with('products', $products);
    }

    public function searchProducts()
    {
        $r = request();
        $keyword = $r->keyword;
        $products = DB::table('products')->where('name', 'like', '%' . $keyword . '%')->get();
        return view('products')->with('products', $products);
    }

    public function phone()
    {
        $viewProduct = DB::table('products')
            ->leftjoin('categories', 'categories.id', '=', 'products.CategoryID')
            ->select('products.*', 'categories.name as catName')
            ->where('categories.name', 'phone')->get();
        return view('products')->with('products', $viewProduct);
    }

    public function computer()
    {
        $viewProduct = DB::table('products')
            ->leftjoin('categories', 'categories.id', '=', 'products.CategoryID')
            ->select('products.*', 'categories.name as catName')
            ->where('categories.name', 'computer')
            ->orWhere('categories.id', '3')
            ->get();
        return view('products')->with('products', $viewProduct);
    }
}
