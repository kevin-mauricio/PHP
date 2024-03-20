<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plato;
use App\Models\Categoria;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plates = Plato::all();
        $categories = Categoria::all();
        return view('view_plate_list', compact('plates', 'categories'));
    }

public function getPlateByCategory(int $id_category) {
    $plates = Plato::where('id_categoria', $id_category)->get();
    $categories = Categoria::all();
    return view('view_plate_list', compact('plates', 'categories'));
}


    public function createView()
    {
        $categories = Categoria::all();
        return view('view_plate_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Plato::create($request->all()); 
        return redirect()->route('index_plate'); // pending validation
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
