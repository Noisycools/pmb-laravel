<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function formPendaftaranMahasiswa()
    {
        $data = [
            'title' => 'Form Pendaftaran Mahasiswa',
        ];

        return view('pages.mahasiswa.pendaftaran', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataToValidate = [
            'name'              => 'required',
            'alamat'            => 'required',
            'jenis_kelamin'     => 'required',
            'tanggal_lahir'     => 'required|date',
            'file_ijazah'       => 'required|file|max:2000|mimes:pdf',
            'file_kk'           => 'required|file|max:2000|mimes:pdf',
            'file_pasfoto'      => 'required|image|file|max:1024|mimes:jpg',
            'file_butawarna'    => 'file|max:2000|mimes:pdf',
        ];

        if ($request->email != auth()->user()->email)
            $dataToValidate['email'] = 'required|unique:users|unique:mahasiswa';

        if ($request->no_telp != auth()->user()->no_telp)
            $dataToValidate['no_telp'] = 'required|unique:users|unique:mahasiswa';

        $validatedData = $request->validate($dataToValidate);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function registerPembayaran()
    {
        
        $data = [
            'title' => 'Register Pembayaran,'
        ];
        return view('pages.mahasiswa.registerpembayaran',$data);
    }
}
