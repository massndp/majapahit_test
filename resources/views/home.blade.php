@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('profile.index')}}" class="btn btn-primary btn-xl shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Profile Menu
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
