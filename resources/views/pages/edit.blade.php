@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit') }}
                </div>

                <div class="card-body">
                    <form action="{{route('profile.update', $profile->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="user_id">Profile</label>
                          <select name="user_id" class="form-control" required>
                            <option value=""><strong>Pilih User</strong></option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">
                                  {{$user->name}}
                                </option>
                            @endforeach
                          </select><br>
                          <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{$profile->alamat}}">
                          </div>
                          <div class="form-group">
                              <label for="pekerjaan">Pekerjaan</label>
                              <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="{{$profile->pekerjaan}}">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="nama_lengkap">Nama Lengkap</label>
                          <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="{{$profile->nama_lengkap}}">
                        </div>
                        <div class="form-group">
                          <label for="pendidikan">Pendidikan</label>
                          <input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan" value="{{$profile->pendidikan}}">
                        </div>
                        <div class="form-group">
                          <label for="telp">Telpone</label>
                          <input type="text" name="telp" class="form-control" placeholder="Telpone" value="{{$profile->telp}}">
                        </div>
                        <button type="submit" class="btn-primary btn-block">Save</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
