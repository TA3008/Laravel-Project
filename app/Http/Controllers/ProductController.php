<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // GET /products
    public function index()
    {
        $products = Product::all();
        //return response()->json($products);
        return view('products.index', compact('products'));
    }
    
    // GET /products/{id}
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function edit($id = null)
{
    $product = $id ? Product::findOrFail($id) : new Product();
    return view('products.edit', compact('product'));
}

public function save(Request $request, $id = null)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
    ]);

    if ($id) {
        // Cập nhật
        $product = Product::findOrFail($id);
        $product->update($validated);
        $message = 'Cập nhật sản phẩm thành công.';
    } else {
        // Thêm mới
        $product = Product::create($validated);
        $message = 'Thêm sản phẩm thành công.';
    }

    return redirect()->route('products.index')->with('success', $message);
}


    // DELETE /products/{id}
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'message' => 'Xóa thành công.'
        ]);
    }
}
