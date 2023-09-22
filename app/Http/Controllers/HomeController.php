<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
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
        $mahasiswa = Mahasiswa::where('email', auth()->user()->email)->first();
        $pendaftaran = null;
        if ($mahasiswa != null) {
            $pendaftaran = DB::table('pendaftaran')->where('mahasiswa_id',$mahasiswa->id)->count();
        }
        $data = [
                'title' => 'Dashboard',
                'pendaftaran' => $pendaftaran,
            ];
        
        return view('dashboard', $data);
    }
}
