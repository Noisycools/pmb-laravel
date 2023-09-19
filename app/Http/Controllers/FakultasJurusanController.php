<?php

namespace App\Http\Controllers;

use App\DataTables\FakultasJurusanDataTable;
use App\Models\FakultasJurusan;
use Illuminate\Http\Request;

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
            'title' => 'Manajemen Pengguna',
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFakultasJurusanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FakultasJurusan  $fakultasJurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(FakultasJurusan $fakultasJurusan)
    {
        //
    }
}
