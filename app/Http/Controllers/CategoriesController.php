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
        // Encontrar la categoría por su ID
    $categoriess = Categorias::findOrFail($id);

    // Retornar la vista de edición con la categoría
    return view('categories.edit', compact('categoriess'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
    $request->validate([
        'name' => 'required|max:255',
        'descripcion' => 'required|max:255',
    ]);

    // Encontrar la categoría por su ID
    $categoriess = Categorias::findOrFail($id);

    // Actualizar los datos de la categoría
    $categoriess->name = $request->input('name');
    $categoriess->descripcion = $request->input('descripcion');
    $categoriess->save(); // Guardar los cambios

    // Redirigir con un mensaje de éxito
    return redirect()->route('categories.index')->with('success', 'Categoría actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        

    // Encontrar la categoría por su ID
    $categoriess = Categorias::findOrFail($id);

    // Eliminar la categoría
    $categoriess->delete();

    // Redirigir con un mensaje de éxito
    return redirect()->route('categories.index')->with('success', 'Categoría eliminada correctamente');


    }
}
