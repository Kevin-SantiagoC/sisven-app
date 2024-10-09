<?php

namespace App\Http\Controllers;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriess=Categorias::all();
        return view('categories.index',['categoriess' => $categoriess]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.new');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
     
         
       
        $request->validate([
            'name' => 'required|string|max:64|unique:categories,name',
            'descripcion' => 'nullable|string',
        ]);

        Categorias::create([
            'name' => $request->name,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente.');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
