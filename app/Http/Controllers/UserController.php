<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(UsersDataTable $dataTable)
    {
        $data = [
            'title' => 'Manajemen Pengguna',
            'pendaftaran' => null,
            'bayar' => null,
        ];

        return $dataTable->render('pages.admin.manajemenPengguna', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'    => 'Manajemen Pengguna',
            'subTitle' => 'Tambah Pengguna',
            'route'    => 'user.index',
            'roles'    => Role::all(),
            'pendaftaran' => null,
            'bayar' => null,
        ];

        return view('pages.admin.createPengguna', $data);
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
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'password'  => 'required|min:4',
            'roles_id'  => 'required',
        ]);

        if ($request->password_confirmation != $validatedData['password']) {
            return back()->withErrors([
                'password_confirmation' => ['Konfirmasi password tidak sesuai!']
            ]);
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('user.index')->with('success', 'Data Pengguna Baru Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data = [
            'title'    => 'Manajemen Pengguna',
            'subTitle' => 'Edit Pengguna',
            'route'    => 'user.index',
            'roles'    => Role::all(),
            'user'     => $user,
            'pendaftaran' => null,
            'bayar' => null,
        ];

        return view('pages.admin.editPengguna', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $dataToValidate = [
            'name'      => 'required',
            'roles_id'  => 'required',
        ];

        if ($request->email != $user->email)
            $dataToValidate['email'] = 'required|unique:users';

        if ($request->password != null)
            $dataToValidate['password'] = 'required|min:4';

        $validatedData = $request->validate($dataToValidate);

        if ($request->password != null) {
            if ($request->password_confirmation != $validatedData['password']) {
                return back()->withErrors([
                    'password_confirmation' => ['Konfirmasi password tidak sesuai!']
                ]);
            }

            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect()->route('user.index')->with('success', 'Data Pengguna Baru Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect()->route('user.index')->with('success', 'Data Pengguna Baru Berhasil Dihapus!');
    }
}
