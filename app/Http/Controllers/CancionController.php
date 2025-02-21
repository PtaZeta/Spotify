<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCancionRequest;
use App\Http\Requests\UpdateCancionRequest;
use App\Models\Album;
use App\Models\Artista;
use App\Models\Cancion;
use Illuminate\Support\Facades\Auth;

class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('canciones.index', [
            'canciones' => Cancion::orderBy('created_at', 'asc')->paginate(5),
            'artistas' => Artista::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (Auth::check())
            return view('canciones.create', [
                'artistas' => Artista::all(),
                'albumes' => Album::all(),
            ]);
        else
            return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCancionRequest $request)
    {
        $cancion = new Cancion();
        $cancion->titulo = $request->input('titulo');
        $cancion->duracion = $request->input('duracion');
        $cancion->save();

        $cancion->artistas()->sync($request->input('artistas'));
        $cancion->albumes()->sync($request->input('albumes'));

        return redirect()->route('canciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cancion $cancion)
    {
        return view('canciones.show', [
            'cancion' => $cancion,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cancion $cancion)
    {
        return view('canciones.edit', [
            'cancion' => $cancion,
            'artistas' => Artista::all(),
            'albumes' => Album::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCancionRequest $request, Cancion $cancion)
    {
        $cancion->titulo = $request->input('titulo');
        $cancion->duracion = $request->input('duracion');
        $cancion->save();

        $cancion->artistas()->sync($request->input('artistas'));
        $cancion->albumes()->sync($request->input('albumes'));

        return redirect()->route('canciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cancion $cancion)
    {
        if ($cancion->artistas()->count() > 0) {
            return redirect()->back()
                ->withErrors(['cancion_' . $cancion->id => 'No puede eliminar una canción con un artista.'])
                ->withInput();
        }

        if ($cancion->albumes()->count() > 0) {
            return redirect()->back()
                ->withErrors(['cancion_' . $cancion->id => 'No puede eliminar una canción con un album.'])
                ->withInput();
        }
        $cancion->delete();
        return redirect()->route('canciones.index');
    }
}
