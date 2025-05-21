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
            'name' => 'required|string|max:255',
            'npm' => 'required|int|unique:alternatifs,npm',
            'jurusan' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'semester1' => 'required|numeric|min:0|max:4',
            'semester2' => 'required|numeric|min:0|max:4',
            'semester3' => 'required|numeric|min:0|max:4',
            'semester4' => 'required|numeric|min:0|max:4',
            'semester5' => 'required|numeric|min:0|max:4',
            'semester6' => 'required|numeric|min:0|max:4',
            'prestasi' => 'required|string',
            'pas_foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'karya_tulis' => 'required|mimes:pdf|max:2048',
        ]);

        $pas_foto = $request->file('pas_foto');
        $path_foto = time() . '.' . $pas_foto->getClientOriginalExtension();
        $pas_foto->move('file/img/foto/', $path_foto);

        $foto_ktp = $request->file('foto_ktp');
        $path_ktp = time() . '.' . $foto_ktp->getClientOriginalExtension();
        $foto_ktp->move('file/img/ktp/', $path_ktp);


        $karya_tulis = $request->file('karya_tulis');
        $path_karya = time() . '.' . $karya_tulis->getClientOriginalExtension();
        $karya_tulis->move('file/karya/', $path_karya);

        Alternatif::create([
            'name' => $request->name,
            'npm' =>  $request->npm,
            'jurusan' =>  $request->jurusan,
            'no_telp' =>  $request->no_telp,
            'semester1' => $request->semester1,
            'semester2' => $request->semester2,
            'semester3' => $request->semester3,
            'semester4' => $request->semester4,
            'semester5' => $request->semester5,
            'semester6' => $request->semester6,
            'prestasi' => $request->prestasi,
            'pas_foto' => $path_foto,
            'foto_ktp' => $path_ktp,
            'karya_tulis' => $path_karya,
        ]);

        return Redirect::route('alternatif.index')->with('success', 'Alternatif berhasil di tambah.');
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

        $pas_foto = $request->file('pas_foto');
        $foto_ktp = $request->file('foto_ktp');
        $karya_tulis = $request->file('karya_tulis');

        $request->validate([
            'name' => 'required|string|max:255',
            'npm' => 'required|int|unique:alternatifs,npm,' . $alternatif->id,
            'jurusan' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'semester1' => 'required|numeric|min:0|max:4',
            'semester2' => 'required|numeric|min:0|max:4',
            'semester3' => 'required|numeric|min:0|max:4',
            'semester4' => 'required|numeric|min:0|max:4',
            'semester5' => 'required|numeric|min:0|max:4',
            'semester6' => 'required|numeric|min:0|max:4',
            'prestasi' => 'required|string',
            'pas_foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_ktp' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'karya_tulis' => 'mimes:pdf|max:2048',
        ]);

        $alternatif->user()->update([
            'name' => $request->name,
        ]);

        $alternatif->update([
            'npm' =>  $request->npm,
            'jurusan' =>  $request->jurusan,
            'no_telp' =>  $request->no_telp,
            'semester1' => $request->semester1,
            'semester2' => $request->semester2,
            'semester3' => $request->semester3,
            'semester4' => $request->semester4,
            'semester5' => $request->semester5,
            'semester6' => $request->semester6,
            'prestasi' => $request->prestasi,
        ]);

        if ($pas_foto) {
            $path_foto = time() . '.' . $pas_foto->getClientOriginalExtension();
            $pas_foto->move('file/img/foto/', $path_foto);

            $alternatif->update([
                'pas_foto' => $path_foto
            ]);
        }


        if ($foto_ktp) {
            $path_ktp = time() . '.' . $foto_ktp->getClientOriginalExtension();
            $foto_ktp->move('file/img/ktp/', $path_ktp);

            $alternatif->update([
                'foto_ktp' => $path_ktp
            ]);
        }


        if ($karya_tulis) {
            $path_karya = time() . '.' . $karya_tulis->getClientOriginalExtension();
            $karya_tulis->move('file/karya/', $path_karya);

            $alternatif->update([
                'karya_tulis' => $path_karya
            ]);
        }

        return Redirect::route('alternatif.index')->with('success', 'Alternatif berhasil di ubah.');
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
