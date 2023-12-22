<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        if (!Auth::guard('admin')->check()) {
            if (!Auth::check()) {
                            //  return redirect()->route('admin.login');

                return redirect()->route('login');
            }
            else{
                $categories = Category::all();
                return view('template.vivo.design.categories.index', compact('categories'));
            }

        }

        $categories = Category::all();
        return view('template.vivo.design.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('template.vivo.design.categories.create');
    }

    public function store(Request $request)
    {


        $image = $request->file('image_url')->getClientOriginalName();
        $path = $request->file('image_url')->storeAs('categories', $image, 'Images');
        // $request->validate([
        //     'name' => 'required|string',
        //     'description' => 'nullable|string',
        //     'image_url' => 'required|string',
        // ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_url'=>$path,
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully');


    }

    public function show(Category $category)
{
        // Retrieve a specific record using the Car model

        return view('template.vivo.design.categories.show', ['category' => $category]);
    }
    public function edit(Category $category)
    {
        return view('template.vivo.design.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {


        // Check if a new image is provided in the request
    if ($request->hasFile('image_url')) {
        // Delete the old image file
        Storage::delete($category->image_url);

        // Store the new image file
        $image = $request->file('image_url')->getClientOriginalName();
        $path = $request->file('image_url')->storeAs('categories', $image, 'Images');
    } else {
        // No new image provided, keep the old image URL
        $path = $category->image_url;
    }
     // Update the category with the new data
     $category->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'image_url' => $path,
    ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
