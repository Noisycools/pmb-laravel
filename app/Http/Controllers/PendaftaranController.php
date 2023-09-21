<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FakultasJurusan;
use App\Models\ProgramStudi;

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
            'fakultasJurusan' => FakultasJurusan::all(),
            'programStudi' => ProgramStudi::all(),
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
            'telepon'           => 'required',
            'jenis_kelamin'     => 'required',
            'tanggal_lahir'     => 'required|date',
            'file_ijazah'       => 'required|file|max:2000|mimes:pdf',
            'file_kk'           => 'required|file|max:2000|mimes:pdf',
            'file_pasfoto'      => 'required|image|file|max:1024|mimes:jpg',
            'file_butawarna'    => 'file|max:2000|mimes:pdf',
            'fakultas_jurusan'  =>  'required',
            'program_studi'     =>  'required',
        ];

        if ($request->email != auth()->user()->email)
            $dataToValidate['email'] = 'required|unique:users|unique:mahasiswa';

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
}
