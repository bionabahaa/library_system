<?php

namespace App\Http\Controllers\Library_System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        Category::create($request->all());

        return redirect()->route('categories')
            ->with('success', 'category created successfully.');
    }
}
