<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = 'alternatif';
        $alternatifs = Alternatif::latest()->get();
        return view('pages.alternatif.index', compact('alternatifs', 'page'));
    }

    public function create()
    {
        $page = 'alternatif';
        return view('pages.alternatif.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|numeric|unique:alternatifs,nisn',
        ]);

        Alternatif::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nisn' => $request->nisn,
        ]);

        return Redirect::route('alternatif.index')->with('success', 'Data santri berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Alternatif $alternatif)
    {
        $page = 'alternatif';
        return view('pages.alternatif.show', compact('page', 'alternatif'));
    }

    public function edit(Alternatif $alternatif)
    {
        $page = 'alternatif';
        return view('pages.alternatif.edit', compact('page', 'alternatif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|numeric|unique:alternatifs,nisn,' . $alternatif->id,
        ]);

        $alternatif->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nisn' => $request->nisn,
        ]);

        return Redirect::route('alternatif.index')->with('success', 'Data santri berhasil diubah.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();
        $alternatif->user()->delete();
        return Redirect::route('alternatif.index')->with('success', 'Alternatif berhasil di hapus.');
    }
}
