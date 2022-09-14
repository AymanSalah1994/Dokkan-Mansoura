<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products  = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $allCategories = Category::all();
        return view('admin.product.create', compact('allCategories'));
    }

    public function store(ProductRequest $request)
    {
        $allRequestData = $request->handleRequest();
        Product::create($allRequestData);
        return redirect()->route('products.index')->with('status', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        //TODO : Remove it From REsource
    }

    public function edit(Product $product)
    {
        $allCategories = Category::all();
        $theProduct = Product::findOrFail($product->id);
        return view('admin.product.edit', compact('theProduct', 'allCategories'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $allReuestData  = $request->handleRequest($product->id);
        $theProduct  = Product::find($product->id);
        $theProduct->update($allReuestData);
        return redirect()->route('products.index')->with('status', 'Product Updated SuccessFully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //  {{-- dispay none and still visible inspect --}}
        // TODO : Delete Protection
        if ($product['product_picture']) {
            // In Case it Has a Photo
            // Because Photo is Nullable & Can Be Empty
            Storage::delete($product['product_picture']);
        }
        $product->delete();
        return redirect()->route('products.index')->with('status', 'Product Deleted Successfully');
    }
}
