<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function ListOrder()
    {
        echo 'Danh sách đơn hàng';
    }
    public function DetailOrder()
    {
        echo 'Chi tiết đơn hàng';
    }
    public function Processed()
    {
        echo 'Danh sách Đơn hàng đã xửa lý';
    }
}
