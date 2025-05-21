<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class MetodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Hasil::truncate();

        $page = 'metode';
        $kriterias = Kriteria::orderBy('kode_kriteria', 'asc')->get();
        $alternatifs = Alternatif::orderBy('id')->get();

        // $pemetaanGap = [];
        // foreach($alternatifs as )


        return view('pages.metode.index', compact(
            'page',
            'kriterias',
            'alternatifs'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
