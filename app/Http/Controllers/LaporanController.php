<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Hasil;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = 'laporan';
        $hasils = Hasil::all();

        $n = $hasils->count();
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($hasils[$j]->nilai < $hasils[$j + 1]->nilai) {
                    $temp = $hasils[$j];
                    $hasils[$j] = $hasils[$j + 1];
                    $hasils[$j + 1] = $temp;
                }
            }
        }

        return view('pages.laporan.index', compact(
            'page',
            'hasils',
        ));
    }

    public function create()
    {
        $page = 'laporan';
        $hasils = Hasil::all();

        $n = $hasils->count();
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($hasils[$j]->nilai < $hasils[$j + 1]->nilai) {
                    $temp = $hasils[$j];
                    $hasils[$j] = $hasils[$j + 1];
                    $hasils[$j + 1] = $temp;
                }
            }
        }

        return view('pages.laporan.create', compact(
            'page',
            'hasils',
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
