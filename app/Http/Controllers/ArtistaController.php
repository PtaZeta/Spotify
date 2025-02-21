<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArtistaRequest;
use App\Http\Requests\UpdateArtistaRequest;
use App\Models\Artista;
use Illuminate\Support\Facades\Auth;

class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('artistas.index', [
            'artistas' => Artista::orderBy('created_at', 'asc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check())
            return view('artistas.create');
        else
            return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArtistaRequest $request)
    {
        $artista = new Artista();
        $artista->nombre = $request->input('nombre');
        $artista->edad = $request->input('edad');
        $artista->nacionalidad = $request->input('nacionalidad');

        if ($request->hasFile('foto')) {
            $nombreFoto = 'art_' . $artista->id . '.jpg';
            $archivo = $request->file('foto');
            $archivo->storeAs('imagenes', $nombreFoto, 'public');
            $artista->foto = asset("storage/imagenes/{$nombreFoto}");
        }

        $artista->save();

        if ($request->hasFile('foto')) {
            $nombreFoto = 'art_' . $artista->id . '.jpg';
            $archivo = $request->file('foto');
            $archivo->storeAs('imagenes', $nombreFoto, 'public');
            $artista->foto = asset("storage/imagenes/{$nombreFoto}");
            $artista->save();
        }


        return redirect()->route('artistas.index')->with('success', 'artista created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artista $artista)
    {
        return view('artistas.show', [
            'artista' => $artista,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artista $artista)
    {
        return view('artistas.edit', [
            'artista' => $artista,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtistaRequest $request, Artista $artista)
    {
        $artista->nombre = $request->input('nombre');
        $artista->edad = $request->input('edad');
        $artista->nacionalidad = $request->input('nacionalidad');

        if ($request->hasFile('foto')) {
            $nombreFoto = 'art_' . $artista->id . '.jpg';
            $archivo = $request->file('foto');
            $archivo->storeAs('imagenes', $nombreFoto, 'public');
            $artista->foto = asset("storage/imagenes/{$nombreFoto}");
        }

        $artista->save();

        return redirect()->route('artistas.index')->with('success', 'artista updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artista $artista)
    {
        if ($artista->canciones()->count() > 0) {
            return redirect()->back()
                ->withErrors(['artista_' . $artista->id => 'No puede eliminar el artista.'])
                ->withInput();
        }
        $artista->delete();
        return redirect()->route('artistas.index')->with('success', 'artista deleted successfully.');
    }
}
