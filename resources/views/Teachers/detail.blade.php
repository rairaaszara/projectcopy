@extends('teachers.layout')
  
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Detail User
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>nama_guru: </b>{{$user->nama_guru}}</li>
                    <li class="list-group-item"><b>alamat: </b>{{$user->alamat}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('users.index') }}">Kembali</a>

        </div>
    </div>
</div>
@endsection