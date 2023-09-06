<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::latest()->searchable()->paginate(Request()->perPage ?? 10);
        return view('transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Transaction',
            'action' => route('transaction.store'),
            'method' => 'POST',
            'products' => Product::orderBy('name')->get(),
        ];
        return view('transaction.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // check if product stock is enough
        $product = Product::find($request->product_id);
        if ($product->stock < $request->quantity) {
            return redirect()->back()->withInput()->with('error', 'Product stock is not enough, please try again');
        }
        // go to getReferenceNo method in ApiController
        $response = app('App\Http\Controllers\ApiController')->getReferenceNo($request);

        // Periksa status kode respons
        if ($response['status'] == 'success') {
            // store transaction
            $transaction = Transaction::create([
                'reference_no' => $response['data']['reference_no'],
                'price' => $response['data']['price'],
                'quantity' => $response['data']['quantity'],
                'payment_amount' => $response['data']['payment_amount'],
                'product_id' => $request->product_id,
            ]);

            // update product stock
            $product->stock = $product->stock - $response['data']['quantity'];
            $product->save();
            return redirect()->route('transaction.index')->withInput()->with('success', 'Transaction created successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to create transaction');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->back()->with('success', 'Transaction deleted successfully');
    }
}
