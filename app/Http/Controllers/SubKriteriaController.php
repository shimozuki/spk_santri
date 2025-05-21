<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Kriteria $kriteria)
    {
        $page = 'kriteria';
        $subkriterias = SubKriteria::where('kriteria_id', $kriteria->id)->orderBy('nilai', 'desc')->get();
        return view('pages.subkriteria.index', compact('page', 'kriteria', 'subkriterias'));
    }

    public function create(Kriteria $kriteria)
    {
        $page = 'kriteria';
        return view('pages.subkriteria.create', compact('page', 'kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'name' => 'required',
            'nilai' => 'required',
        ]);

        SubKriteria::create([
            'kriteria_id' => $kriteria->id,
            'nama' => $request->name,
            'nilai' => $request->nilai
        ]);

        return Redirect::route('subkriteria.index', $kriteria)->with('success', 'Subkriteria ' . $kriteria->nama . ' berhasil di tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubKriteria $subKriteria, Kriteria $kriteria)
    {
        $page = 'kriteria';
        return view('pages.subkriteria.edit', compact('page', 'kriteria', 'subKriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubKriteria $subKriteria, Kriteria $kriteria)
    {
        $request->validate([
            'name' => 'required',
            'nilai' => 'required',
        ]);

        $subKriteria->update([
            'nama' => $request->name,
            'nilai' => $request->nilai
        ]);

        return Redirect::route('subkriteria.index', $kriteria)->with('success', 'Subkriteria ' . $kriteria->nama . ' berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubKriteria $subKriteria, Kriteria $kriteria)
    {
        $subKriteria->delete();
        return Redirect::route('subkriteria.index', $kriteria)->with('success', 'Subkriteria ' . $kriteria->nama . ' berhasil di hapus');
    }
}
