<?php

namespace App\Http\Controllers;

use App\DataTables\ProgramStudiDataTable;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use App\Models\FakultasJurusan;

class ProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProgramStudiDataTable $dataTable)
    {
        $data = [
            'title' => 'Manajemen Program Studi',
        ];

        return $dataTable->render('pages.stafPenerimaan.manajemenProgramStudi', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'    => 'Manajemen Program studi',
            'subTitle' => 'Tambah Program Studi',
            'route'    => 'programStudi.index',
            'fakultasJurusan'    => FakultasJurusan::all(),
        ];

        return view('pages.stafPenerimaan.createProgramStudi', $data);
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
            'nama_program_studi'      => 'required|unique:program_studi',
            'fakultas_jurusan_id' => 'required',
        ]);

        ProgramStudi::create($validatedData);

        return redirect()->route('programStudi.index')->with('success', 'Data Program Studi  Baru Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgramStudi  $programStudi
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramStudi $programStudi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgramStudi  $programStudi
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramStudi $programStudi)
    {
        $data = [
            'title'    => 'Manajemen Fakultas Jurusan',
            'subTitle' => 'Edit Fakultas Jurusan',
            'route'    => 'programStudi.index',
            'fakultasJurusan' => FakultasJurusan::all(),
            'programStudi' => $programStudi,
        ];

        return view('pages.stafPenerimaan.editProgramStudi', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProgramStudi  $programStudi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramStudi $programStudi)
    {
        $validatedData = $request->validate([
            'nama_program_studi' => 'required',
            'fakultas_jurusan_id' => 'required',
        ]);

        ProgramStudi::where('id', $programStudi->id)->update($validatedData);
        return redirect()->route('programStudi.index')->with('success', 'Data Program Studi Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramStudi  $programStudi
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramStudi $programStudi)
    {
        ProgramStudi::destroy($programStudi->id);
        return redirect()->route('programStudi.index')->with('success', 'Data Program Studi Berhasil Dihapus!');
    }
}
