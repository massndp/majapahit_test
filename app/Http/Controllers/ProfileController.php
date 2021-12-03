<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::with(['user'])->get();

        return view('pages.index', [
            'profiles' => $profiles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('pages.create', [
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|integer|exists:users,id',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'nama_lengkap' => 'required',
            'pendidikan' => 'required',
            'telp' => 'required'
        ]);

        Profile::create([
            'user_id' => $request->user_id,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'nama_lengkap' => $request->nama_lengkap,
            'pendidikan' => $request->pendidikan,
            'telp' => $request->telp
        ]);

        return redirect()->route('pages.index');
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
        $profile = Profile::find($id);
        $users = User::all();

        return view('pages.edit', [
            'profile' => $profile,
            'users' => $users
        ]);
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
        $this->validate($request, [
            'user_id' => 'required|integer|exists:users,id',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'nama_lengkap' => 'required',
            'pendidikan' => 'required',
            'telp' => 'required'
        ]);

        $profile = Profile::find($id)->update([
            'user_id' => $request->user_id,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'nama_lengkap' => $request->nama_lengkap,
            'pendidikan' => $request->pendidikan,
            'telp' => $request->telp
        ]);

        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profile::find($id)->delete();

        return redirect()->route('profile.index');
    }
}
