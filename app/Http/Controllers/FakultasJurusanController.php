<?php

namespace App\Http\Controllers;

use App\DataTables\FakultasJurusanDataTable;
use App\Models\FakultasJurusan;
use Illuminate\Http\Request;
use App\Models\Role;

class FakultasJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FakultasJurusanDataTable $dataTable)
    {
        $data = [
            'title' => 'Manajemen Fakultas Jurusan',
        ];

        return $dataTable->render('pages.stafPenerimaan.manajemenFakultasJurusan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'    => 'Manajemen Fakultas Jurusan',
            'subTitle' => 'Tambah Jurusan Fakultas',
            'route'    => 'fakultasJurusan.index',
            'roles'    => Role::all(),
        ];

        return view('pages.stafPenerimaan.createFakultasJurusan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFakultasJurusanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_fakultas_jurusan'      => 'required|unique:fakultas_jurusan',
        ]);

        FakultasJurusan::create($validatedData);

        return redirect()->route('fakultasJurusan.index')->with('success', 'Data Fakultas Baru Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FakultasJurusan  $fakultasJurusan
     * @return \Illuminate\Http\Response
     */
    public function show(FakultasJurusan $fakultasJurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FakultasJurusan  $fakultasJurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(FakultasJurusan $fakultasJurusan)
    {
        $data = [
            'title'    => 'Manajemen Fakultas Jurusan',
            'subTitle' => 'Edit Fakultas Jurusan',
            'route'    => 'fakultasJurusan.index',
            'roles'    => Role::all(),
            'fakultasJurusan' => $fakultasJurusan,
        ];

        return view('pages.stafPenerimaan.editFakultasJurusan', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFakultasJurusanRequest  $request
     * @param  \App\Models\FakultasJurusan  $fakultasJurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FakultasJurusan $fakultasJurusan)
    {
        $validatedData = $request->validate([
            'nama_fakultas_jurusan' => 'required',
        ]);

        FakultasJurusan::where('id', $fakultasJurusan->id)->update($validatedData);
        return redirect()->route('fakultasJurusan.index')->with('success', 'Data Fakultas Jurusan Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FakultasJurusan  $fakultasJurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(FakultasJurusan $fakultasJurusan)
    {
        FakultasJurusan::destroy($fakultasJurusan->id);
        return redirect()->route('fakultasJurusan.index')->with('success', 'Data Fakultas Jurusan Berhasil Dihapus!');
    }
}
