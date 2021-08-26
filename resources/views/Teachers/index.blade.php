@extends('teachers.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>Laravel 8 CRUD - Manajemen User</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>nama_guru</th>
            <th>alamat</th>
           
            <th width="280px">Action</th>
        </tr>
        @foreach ($teachers as $teacher)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->nama_guru}}</td>
            <td>{{ $user->alamat }}</td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="text-center">
        {!! $users->links() !!}
    </div>
      
@endsection