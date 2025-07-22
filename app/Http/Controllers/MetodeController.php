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
    public function index(Request $request)
    {
        $page = 'metode';

        $tahunList = Alternatif::query()
            ->select('tahun_ajaran')
            ->distinct()
            ->orderByDesc('tahun_ajaran')
            ->pluck('tahun_ajaran');


        $tahunAjaran = $request->input('tahun_ajaran', $tahunList->first());
        Hasil::truncate();

        $kriterias = Kriteria::orderBy('kode_kriteria', 'asc')->get();
        $alternatifs = Alternatif::where('tahun_ajaran', $tahunAjaran)
            ->orderBy('id')
            ->get();

        return view('pages.metode.index', compact(
            'page',
            'kriterias',
            'alternatifs',
            'tahunList',
            'tahunAjaran'
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
