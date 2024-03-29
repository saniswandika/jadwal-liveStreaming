@extends('layouts.app-master')
@section('content')
    @if ($message = Session::get('masuk'))
    <div class="alert alert-success">
        <a class="close" data-dismiss="alert">×</a>
        <p>{{ $message }}</p>
        <img src="close.soon" style="display:none;" onerror="(function(el){ setTimeout(function(){ el.parentNode.parentNode.removeChild(el.parentNode); },2000 ); })(this);" />
    </div>
    @endif
    @if ($message = Session::get('deleted'))
    <div class="alert alert-danger">
        <a class="close" data-dismiss="alert">×</a>
        <p>{{ $message }}</p>
        <img src="close.soon" style="display:none;" onerror="(function(el){ setTimeout(function(){ el.parentNode.parentNode.removeChild(el.parentNode); },2000 ); })(this);" />
    </div>
    @endif
    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
        <div class="card mt-4">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2 bd-highlight">Edit Role {{ $role->name }}</div>
                    
                    <div class="p-2 bd-highlight">
                        <ul class="list-group list-group-unbordered center">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> kembali</a>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                    src="{{ asset('assets/img/undraw_profile.svg') }}"
                    alt="User profile picture" style="max-width: 30%">
                </div>
                <h3 class="profile-username text-center"> Role {{ $role->name }}</h3>
                <div class="form-group">
                    <strong>Role :</strong>
                    <input class="form-control" name="name" placeholder="Masukan Nama" value="{{ $role->name }}">
                </div>
                <div class="row">
                 
                    @foreach($permission as $value)
                        
                        <div class="col-sm-2 mt-4">
                            <div class="content">
                                <ul class="list-group">
                                    <li class="list-group-item">  
                                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <ul class="list-group list-group-unbordered mb-3 center">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </ul>
        </div>
    {!! Form::close() !!}
@endsection