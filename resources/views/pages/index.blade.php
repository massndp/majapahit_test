@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                    <a href="{{route('profile.create')}}" class="btn btn-primary btn-sm shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Add Profile
                    </a>
                </div>

                <div class="card-body">
                    <table class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No</th>
                                    <th>No</th>
                                    <th>No</th>
                                    <th>No</th>
                                    <th>No</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1 ?>
                                @forelse ($profiles as $profile)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$profile->user->name}}</td>
                                    <td>{{$profile->user->email}}</td>
                                    <td>{{$profile->nama_lengkap}}</td>
                                    <td>{{$profile->pekerjaan}}</td>
                                    <td>{{$profile->alamat}}</td>
                                    <td>{{$profile->pendidikan}}</td>
                                    <td>{{$profile->telp}}</td>
                                    
                                    <td>
                                    <a href="{{route('profile.edit', $profile->id)}}" class="btn btn-success">
                                    Edit
                                    </a>
                                    <form action="{{route('profile.destroy', $profile->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('yakin nih mau dihapus')">
                                        Hapus
                                        </button>
                                    </form>
                                    </td>
                                    <?php $no++ ?>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                    Data Kosong
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
