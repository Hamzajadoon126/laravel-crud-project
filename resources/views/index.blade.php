@extends('employees.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-3">
            <div class="pull-left text-center">
                <h2>Laravel User Profile Crud</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/employee-profiles/create"> Create New Profile</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered mt-3">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{$employee->id}}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->address }}</td>
            <td>{{ $employee->contact_no }}</td>
            <td><img src="/image/{{ $employee->image }}" width="100px"></td>
            <td>
           
                <form action="{{route('employee.delete',$employee->id)}}" method="POST">
                <a class="btn btn-primary" href="{{'/employee-profiles/edit/'.$employee->id}}">Edit</a>
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
        
@endsection