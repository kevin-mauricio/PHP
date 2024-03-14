<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categoria::all();
        return view('view_category_list', compact('categories'));
    }

    public function createView() {
        return view('view_category_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required',
            'nombre_categoria' => 'required',
        ], [
            'nombre_categoria.required' => 'All fields are required.',
            'nombre_categoria.required' => 'All fields are required.',
        ]);

        Categoria::create($request->all());
        return redirect()->route('index_category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $category)
    {   
        return view('layouts.categories.categories_show', compact('category'));
    }

    public function edit(Categoria $category) {
        return view('view_category_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $category)
    {   
        $category->update($request->all());
        return redirect()->route('index_category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Categoria $category)
    {
        $category->delete();
        return redirect()->route('index_category');
    }

}
