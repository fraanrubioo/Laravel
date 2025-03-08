<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chollo;

class CholloController extends Controller
{
    // Muestra la lista de chollos en la página principal
    public function index()
    {
        $chollos = Chollo::where('disponible', true)
            ->orderBy('puntuacion', 'desc')
            ->get();

        return view('welcome', compact('chollos'));
    }

    // Muestra el formulario para crear un chollo
    public function create()
    {
        return view('chollos.create');
    }

    // Guarda un nuevo chollo en la base de datos
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'precio_descuento' => 'required|numeric',
            'puntuacion' => 'required|integer|min:1|max:5',
            'disponible' => 'required|boolean',
            'url' => 'required|url', // Asegúrate de que 'url' sea obligatorio
            'categoria' => 'required|string', // Validar que 'categoria' esté presente
        ]);
    
        // Crear el nuevo chollo
        Chollo::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'precio_descuento' => $request->precio_descuento,
            'puntuacion' => $request->puntuacion,
            'disponible' => $request->disponible,
            'url' => $request->url, // Guardar la URL proporcionada
            'categoria' => $request->categoria, // Guardar la categoría proporcionada
        ]);
    
        // Redirigir al índice de chollos
        return redirect()->route('chollos.index');
    }

    // Muestra un chollo específico
    public function show($id)
    {
        $chollo = Chollo::findOrFail($id);
        return view('chollos.show', compact('chollo'));
    }

    // Muestra el formulario para editar un chollo
    public function edit($id)
    {
        $chollo = Chollo::findOrFail($id);
        return view('chollos.edit', compact('chollo'));
    }

    // Actualiza un chollo existente en la base de datos
    public function update(Request $request, $id)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'url' => 'nullable|url',
            'categoria' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'precio_descuento' => 'nullable|numeric',
            'disponible' => 'required|boolean',
        ]);
    
        // Buscar el chollo que se va a actualizar
        $chollo = Chollo::findOrFail($id);
    
        // Actualizar los valores
        $chollo->titulo = $validated['titulo'];
        $chollo->descripcion = $validated['descripcion'];
        $chollo->url = $validated['url'] ?? $chollo->url;  // Si no se proporciona una URL, mantener la actual
        $chollo->categoria = $validated['categoria'];
        $chollo->precio = $validated['precio'];
        $chollo->precio_descuento = $validated['precio_descuento'];
        $chollo->disponible = $validated['disponible'];
    
        // Guardar los cambios en la base de datos
        $chollo->save();
    
        // Redirigir a la lista de chollos o a una página de éxito
        return redirect()->route('chollos.index')->with('success', 'Chollo actualizado correctamente');
    }
}
