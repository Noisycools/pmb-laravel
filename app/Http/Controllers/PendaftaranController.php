<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FakultasJurusan;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use App\Models\ProgramStudi;
use Illuminate\Support\Facades\DB;

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
        $email = auth()->user()->email;
        $pendaftaran = null;
        $mahasiswa = Mahasiswa::where('email',auth()->user()->email)->first();
        if ($mahasiswa != null) {
            $pendaftaran = DB::table('pendaftaran')->where('mahasiswa_id',$mahasiswa->id)->count();
        }
        $data = [
            'title' => 'Form Pendaftaran Mahasiswa',
            'fakultasJurusan' => FakultasJurusan::all(),
            'programStudi' => ProgramStudi::all(),
            'cekDaftar' => DB::table('mahasiswa')->where('email', $email)->count(),
            'pendaftaran' => $pendaftaran,
            'mahasiswa'=> $mahasiswa,
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
            'nama'              => 'required',
            'email'             => 'required|unique:mahasiswa',
            'alamat'            => 'required',
            'jenis_kelamin'     => 'required',
            'tanggal_lahir'     => 'required|date',
            'file_ijazah'       => 'required|file|max:2000|mimes:pdf',
            'file_kk'           => 'required|file|max:2000|mimes:pdf',
            'file_pasfoto'      => 'required|image|file|max:1024|mimes:jpg',
            'file_butawarna'    => 'file|max:2000|mimes:pdf',
            'fakultas_jurusan'  =>  'required',
            'program_studi_id'  =>  'required',
        ];

        if ($request->email != auth()->user()->email)
            $dataToValidate['email'] = 'required|unique:users|unique:mahasiswa';

        $validatedData = $request->validate($dataToValidate);

        if ($request->file('file_ijazah')) {
            $validatedData['file_ijazah'] = $request->file('file_ijazah')->store('ijazah');
        }

        if ($request->file('file_kk')) {
            $validatedData['file_kk'] = $request->file('file_kk')->store('kartu_keluarga');
        }

        if ($request->file('file_pasfoto')) {
            $validatedData['file_pasfoto'] = $request->file('file_pasfoto')->store('pas_foto');
        }

        if ($request->file('file_butawarna')) {
            $validatedData['file_butawarna'] = $request->file('file_butawarna')->store('surat_butawarna');
        }

        $insertMahasiswa = Mahasiswa::create($validatedData);
        Pendaftaran::create([
            'mahasiswa_id'          => $insertMahasiswa->id,
            'tanggal_pendaftaran'   => now(),
            'status'                => 'Proses',
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);

        return redirect()->route('formPendaftaranMahasiswa')->with('success', 'Anda telah melakukan pendaftaran! Silahkan lakukan proses pembayaran pada halaman berikut.');
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
