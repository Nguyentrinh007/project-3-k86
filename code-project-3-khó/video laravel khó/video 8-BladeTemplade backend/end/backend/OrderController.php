<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function ListOrder()
    {
        return view('backend.order.order');
    }
    public function DetailOrder()
    {
        return view('backend.order.detailorder');
    }
    public function Processed()
    {
        return view('backend.order.orderprocessed');
    }
}
