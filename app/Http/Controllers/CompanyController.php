<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $categoryMarket)
    {
        $categories = Category::all();
        return view('template.vivo.design.companies.create'
        ,['categoryMarket' => $categoryMarket,
           'categories' => $categories,
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $image = $request->file('image_url')->getClientOriginalName();
        $path = $request->file('image_url')->storeAs('companies', $image, 'Images');

        $company = Company::create([
            'name' => $request->name,
            'image_url' => $path,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('category.show', ['category' => $request->category_id])->with('success', 'Company created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(company $company)
    {
        return view('template.vivo.design.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('template.vivo.design.companies.edit', compact('company'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, company $company)
    {
        if ($request->hasFile('image_url')) {
            // Delete the old image file
            Storage::delete($company->image_url);

            // Store the new image file
            $image = $request->file('image_url')->getClientOriginalName();
            $path = $request->file('image_url')->storeAs('compnies', $image, 'Images');
        } else {
            // No new image provided, keep the old image URL
            $path = $company->image_url;
        }
         // Update the category with the new data
         $company->update([
            'name' => $request->input('name'),
            'category_id' => $company->category_id,
            'image_url' => $path,
        ]);
        return redirect()->route('category.show', ['category' => $company->category_id])->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(company $company)
    {
        $company->delete();
    }
}
