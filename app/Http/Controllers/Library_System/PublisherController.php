<?php

namespace App\Http\Controllers\Library_System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Publisher;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();

        return view('publishers.index', compact('publishers'));
    }

    public function create()
    {
        return view('publishers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        Publisher::create($request->all());

        return redirect()->route('publishers')
            ->with('success', 'publisher created successfully.');
    }
}
