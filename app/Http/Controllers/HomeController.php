<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pendaftaran = null;
        $mahasiswa = Mahasiswa::where('email',auth()->user()->email)->first();
        $bayar = false;
        if ($mahasiswa != null) {
            $pendaftaran = DB::table('pendaftaran')->where('mahasiswa_id',$mahasiswa->id)->where('status_pembayaran','Dibayar')->count();
            $bayar = DB::table('pendaftaran')->where('mahasiswa_id',$mahasiswa->id)->get('status_pembayaran')->first();
            if ($bayar->status_pembayaran == 'Dibayar') {
                $bayar = true;
            } else {
                $bayar = false;
            }
        }

        $data = [
            'title' => 'Dashboard',
            'pendaftaran' => $pendaftaran,
            'mahasiswa'=> $mahasiswa,
            'bayar' => $bayar,
        ];
        return view('dashboard', $data);
    }
}
