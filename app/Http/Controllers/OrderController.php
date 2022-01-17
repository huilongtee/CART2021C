<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\myOrder;
use App\Models\myCart;
use Session;
use Auth;
Barryvdh\DomPDF\ServiceProvider::class;
Barryvdh\DomPDF\Facades::class;
use PDF;

class OrderController extends Controller
{
    //

    public function __contruct()
    {
        $this->middlewware('auth');
    }

    public function pdfReport()
    {

        $data = DB::table('my_orders')

            ->select('my_orders.*')
            ->where('my_orders.userID', '=', Auth::id())
            ->get();
        $pdf = PDF::loadView('myPDF', compact('data'));
        return $pdf->download('Order_report.pdf');
    }

    public function view()
    {

        //all means it will generate sql select all from categories
        $orders = DB::table('my_orders')

            ->select('my_orders.*')
            ->where('my_orders.userID', '=', Auth::id())
            ->get();

        return view('myOrder')->with('orders', $orders);
    }

    
}
