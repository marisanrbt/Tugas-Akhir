<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Returning;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalian = Returning::all();
        return view('pengembalian.index', ['pengembalian' => $pengembalian]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return redirect('/pengembalian')->with('status', 'Anda berhasil melakukan pengembalian buku.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Returning::create($request->all());
        return redirect('/pengembalian')->with('status', 'Anda berhasil melakukan pengembalian buku.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(Pengembalian $pngmbln)
    {
        //return view('pengembalian.show', ['pengembalian' => $pngmbln]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit(Returning $pngmbln)
    {
        return view('pengembalian.edit', compact('pngmbln'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Returning $pngmbln)
    {
        $validatedData = $request->validate([
            'tgl_kembali' => 'required'
        ]);
        
        Returning::where('id', $pngmbln->id)
                ->update([
                    'tgl_kembali' => $request->tgl_kembali,
                    ]);
        return redirect('/pengembalian')->with('status', 'Anda berhasil mengubah data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengembalian $pengembalian)
    {
        //
    }
}
