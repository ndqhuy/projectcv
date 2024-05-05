@extends('layouts.admin.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <a href="{{route('careerAdd.dashboard')}}" class="btn btn-primary">Add career</a>
            </div>
            <div class="col-md-4">
                <form action="{{ route('searchCareerList.dashboard') }}" method="get" class="d-flex">
                    <input class="form-control me-2" type="search" name="keyword" placeholder="Search"
                        aria-label="Search" value="{{request()->keyword}}">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
        <table class="table table-striped rounded mt-3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1; // Khởi tạo biến số thứ tự
                @endphp
                @foreach ($careers as $career)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>
                            <a href="{{ route('careerDetail.dashboard', ['id' => $career->career_id]) }}" class="text-dark"
                                style="text-decoration: none">{{ $career->career_name }}</a>
                        </td>
                        <td>
                            <a href="{{route('editCareer.dashboard', ['id' => $career->career_id])}}">Update</a>
                            <a href="{{route('deleteCareer.dashboard', ['id' => $career->career_id])}}" onclick="return confirm('Are you sure you want to delete this career?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
