<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = 'kriteria';
        $kriterias = Kriteria::all();
        return view('pages.kriteria.index', compact('page', 'kriterias'));
    }

    public function create()
    {
        $page = 'kriteria';
        return view('pages.kriteria.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required|unique:kriterias,nama',
            'tipe' => 'required',
            'nilai' => 'required',
        ]);

        Kriteria::create([
            'kode_kriteria' => $request->code,
            'nama' => $request->name,
            'type' => $request->tipe,
            'bobot' => $request->nilai
        ]);

        return Redirect::route('kriteria.index')->with('success', 'Kriteria berhasil di tambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriterium)
    {
        $page = 'kriteria';
        return view('pages.kriteria.edit', compact('page', 'kriterium'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kriteria $kriterium)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required|unique:kriterias,nama,' . $kriterium->id,
            'tipe' => 'required',
            'nilai' => 'required',
        ]);

        $kriterium->update([
            'kode_kriteria' => $request->code,
            'nama' => $request->name,
            'type' => $request->tipe,
            'bobot' => $request->nilai
        ]);

        return Redirect::route('kriteria.index')->with('success', 'Kriteria berhasil di ubahs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriterium)
    {
        $kriterium->delete();
        return Redirect::route('kriteria.index')->with('success', 'Kriteria berhasil di hapus.');
    }
}
