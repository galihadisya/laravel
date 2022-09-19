<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('create-category');
    }

    public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:25'
        ]);
        Category::create($request->all());
        return redirect('/category');
    }

    public function delete($id)
    {
        Category::destroy($id);
        return back();
    }
}
