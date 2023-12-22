<?php

namespace App\Http\Controllers\Admin;

use App\Models\book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(){

        $categories = Category::all();
        return view('template.vivo.design.categories.index', compact('categories'));
 }

}
