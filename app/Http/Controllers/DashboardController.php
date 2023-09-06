<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $items = Product::sum('stock');
        $transactions = Transaction::count();
        $item_sold = Transaction::sum('quantity');
        $revenue = Transaction::sum('payment_amount');
        $average = Transaction::avg('payment_amount');

        $data = [
            'products' => $products,
            'items' => $items,
            'transactions' => $transactions,
            'item_sold' => $item_sold,
            'revenue' => $revenue,
            'average' => $average,
        ];
        return view('dashboard', $data);
    }
}
