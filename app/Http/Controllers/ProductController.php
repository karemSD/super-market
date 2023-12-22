<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */


    public function createWithParameter($parameter)
    {
        // Your logic here
        $company= Company::find($parameter);
        // Example: Pass the parameter to the create view
        return view('template.vivo.design.products.create', compact('company'));
    }
    public function create()
    {

        return view('template.vivo.design.products.create', [

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



 // Create a new product instance
 $product = new Product([
    'company_id' => $request->company_id,
    'name' => $request->input('name'),
    'code' => $request->input('code'),
    'price' => $request->input('price'),
    'quantity' => $request->input('quantity'),
    'production_date' => $request->input('production_date'),
    'expiry_date' => $request->input('expiry_date'),
    'company_id' => $request->input('company_id'),
]);

// Save the product to the database
$product->save();

// Redirect to a success page or return a response
return redirect()->route('company.show', ['company' => $request->company_id])->with('success', 'Product created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view('template.vivo.design.products.edit' ,compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $product->update([
        'name' => $request->input('name'),
        'code' => $request->input('code'),
        'price' => $request->input('price'),
        'quantity' => $request->input('quantity'),
        'production_date' => $request->input('production_date'),
        'expiry_date' => $request->input('expiry_date'),
        ]);
        return redirect()->route('company.show', ['company' => $product->company_id])->with('success', 'Product Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('company.show', ['company' => $product->company_id])->with('success', 'Product deleted successfully!');

    }
}
