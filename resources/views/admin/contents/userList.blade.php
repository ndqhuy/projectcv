@extends('layouts.admin.index')

@section('content')
    <div class="container-fluid">
        
        <table class="table table-striped rounded">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Dob</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->dob }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="/dashboard/user-edit/{{ $user->id }}">Update</a>
                            <a href="/dashboard/delete-user/{{ $user->id }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
