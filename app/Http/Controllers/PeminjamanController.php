<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Loaning;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Loaning::all();
        return view('peminjaman.index', ['peminjaman' => $peminjaman]);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peminjaman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'required|size:9',
            'judul_buku' => 'required',
            'nama_penerbit' => 'required',
            ]);
        
        Loaning::create($request->all());
        return redirect('/peminjaman')->with('status', 'Anda berhasil melakukan peminjaman buku.');
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'body.required'  => 'A message is required',
        ];
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Loaning $pmjmn)
    {
        return view('peminjaman.edit', compact('pmjmn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loaning $pmjmn)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'required|size:9',
            'judul_buku' => 'required',
            'nama_penerbit' => 'required',
        ]);
        
        
        Loaning::where('id', $pmjmn->id)
                ->update([
                    'nama' => $request->nama,
                    'nim' => $request->nim,
                    'judul_buku' => $request->judul_buku,
                    'nama_penerbit' => $request->nama_penerbit,
                    ]);
        return redirect('/peminjaman')->with('status', 'Anda berhasil mengubah data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loaning $pmjmn)
    {
        Loaning::destroy($pmjmn -> id);
        return redirect('/peminjaman')->with('status', 'Anda berhasil menghapus data.');
    }
}
