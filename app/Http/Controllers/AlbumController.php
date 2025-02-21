<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Album;
use App\Models\Cancion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return redirect()->route('portada');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check())
            return view('albumes.create', [
                'usuarios' => User::all(),
                'canciones' => Cancion::all(),
            ]);
        else
            return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request)
    {
        $album = new Album();
        $album->nombre = $request->input('nombre');

        if ($request->hasFile('imagen')) {
            $nombreFoto = $album->id . '.jpg';
            $archivo = $request->file('imagen');
            $archivo->storeAs('imagenes', $nombreFoto, 'public');
            $album->imagen = asset("storage/imagenes/{$nombreFoto}");
        }

        $album->save();

        if ($request->hasFile('imagen')) {
            $nombreFoto = $album->id . '.jpg';
            $archivo = $request->file('imagen');
            $archivo->storeAs('imagenes', $nombreFoto, 'public');
            $album->imagen = asset("storage/imagenes/{$nombreFoto}");
            $album->save();
        }

        $album->users()->sync($request->input('usuarios'));
        $album->canciones()->sync($request->input('canciones'));

        return redirect()->route('albumes.index')->with('success', 'Album created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Album $album)
    {
        $artistasUnicos = $album->canciones->flatMap->artistas->unique('id');
        $duracionTotal = $album->canciones->reduce(function ($carry, $cancion) {
            list($minutos, $segundos) = explode(':', $cancion->duracion);
            $carry += ($minutos * 60) + $segundos;
            return $carry;
        }, 0);
        $minutosTotal = floor($duracionTotal / 60);
        $segundosTotal = $duracionTotal % 60;
        $duracionTotalFormateada = sprintf("%02d:%02d", $minutosTotal, $segundosTotal);

        $ordenCampo = $request->input('orden', 'titulo');
        $ordenTipo = $request->input('tipo', 'asc');

        $canciones = $album->canciones()->orderBy($ordenCampo, $ordenTipo)->paginate(5);

        return view('albumes.show', [
            'album' => $album,
            'duracionTotalFormateada' => $duracionTotalFormateada,
            'artistasUnicos' => $artistasUnicos,
            'canciones' => $canciones,
            'ordenCampo' => $ordenCampo,
            'ordenTipo' => $ordenTipo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albumes.edit', [
            'album' => $album,
            'usuarios' => User::all(),
            'canciones' => Cancion::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $album->nombre = $request->input('nombre');

        if ($request->hasFile('imagen')) {
            $nombreFoto = $album->id . '.jpg';
            $archivo = $request->file('imagen');
            $archivo->storeAs('imagenes', $nombreFoto, 'public');
            $album->imagen = asset("storage/imagenes/{$nombreFoto}");
        }

        else {
            $album->imagen = $album->imagen;
        }

        $album->save();

        $album->users()->sync($request->input('usuarios'));
        $album->canciones()->sync($request->input('canciones'));

        return redirect()->route('portada')->with('success', 'Album updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        if ($album->canciones()->count() > 0) {
            return redirect()->back()
                ->withErrors(['album_' . $album->id => 'No puede eliminar el artista.'])
                ->withInput();
        }
        $album->delete();
        return redirect()->route('albumes.index');
    }
}
