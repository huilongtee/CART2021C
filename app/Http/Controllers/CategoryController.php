<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{

    public function add()
    {
        //get value from input text
        $r = request();
        $addCategory = Category::create([
            'name' => $r->categoryName,
        ]);
        Session::flash('success', "Category has been created sucessfully");

        return redirect()->route('viewCategory');
    }

    public function view()
    {
        //all means it will generate sql select all from categories
        $viewCategory = Category::all();
        return view('showCategory')->with('categories', $viewCategory);
    }
}
