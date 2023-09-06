<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->searchable()->paginate(Request()->perPage ?? 10);

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Product',
            'action' => route('product.store'),
            'method' => 'POST',
        ];
        return view('product.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $product = Product::create($data);

        return redirect()->back()->withInput()->with('success', 'Product created successfully');
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
        $product = Product::findOrFail($id);
        $data = [
            'title' => 'Edit Product',
            'action' => route('product.update', $id),
            'method' => 'PUT',
            'product' => $product,
        ];
        return view('product.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $product = Product::findOrFail($id);
        $product->update($data);

        return redirect()->back()->withInput()->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        // check if product has transaction
        if ($product->transactions()->count() > 0) {
            return redirect()->back()->with('error', 'Product has transaction, cannot be deleted');
        }
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
