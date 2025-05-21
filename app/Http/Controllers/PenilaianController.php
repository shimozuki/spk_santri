<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = 'nilai';
        $alternatifs = Alternatif::latest()->get();
        return view('pages.penilaian.index', compact('alternatifs', 'page'));
    }

    public function create(Alternatif $alternatif)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'alternatif_id' => 'required',
            'kriteria_id'   => 'required',
            'nilai'         => 'required'
        ]);

        $i = 0;
        foreach ($request->nilai as $idSubkriteria) {
            $nilai = SubKriteria::where('id', $idSubkriteria)->value('nilai');
            Penilaian::create([
                'user_id'           => Auth::user()->id,
                'alternatif_id'     => $request->alternatif_id,
                'kriteria_id'       => $request->kriteria_id[$i],
                'subkriteria_id'   => $idSubkriteria,
                'nilai'             => $nilai
            ]);
            $i++;
        }

        return Redirect::route('penilaian.index')->with('success', 'Penilaian pada ' . $request->alternatif_name . ' berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatif $penilaian)
    {
        $page = 'nilai';
        $alternatif = $penilaian;
        $kriterias = Kriteria::orderBy('kode_kriteria', 'asc')->get();
        return view('pages.penilaian.create', compact('alternatif', 'page', 'kriterias'));
    }


    public function edit(Alternatif $penilaian)
    {
        $page = 'nilai';
        $alternatif = $penilaian;
        $kriterias = Kriteria::all();
        return view('pages.penilaian.edit', compact('alternatif', 'page', 'kriterias'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'alternatif_id' => 'required',
            'kriteria_id'   => 'required',
            'nilai'         => 'required'
        ]);

        Penilaian::where('alternatif_id', $request->alternatif_id)->delete();

        $i = 0;
        foreach ($request->nilai as $idSubkriteria) {
            $nilai = SubKriteria::where('id', $idSubkriteria)->value('nilai');
            Penilaian::create([
                'user_id'           => Auth::user()->id,
                'alternatif_id'     => $request->alternatif_id,
                'kriteria_id'       => $request->kriteria_id[$i],
                'subkriteria_id'   => $idSubkriteria,
                'nilai'             => $nilai
            ]);
            $i++;
        }

        return Redirect::route('penilaian.index')->with('success', 'Penilaian pada ' . $request->alternatif_name . ' berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
