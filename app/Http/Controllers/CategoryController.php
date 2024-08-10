<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        //unlimites level of categories
        $categories = Category::with('subcategories')
            ->whereNull('category_id')
            ->get();

        // dd($categories);

        return view('category', compact('categories'));
    }
}
