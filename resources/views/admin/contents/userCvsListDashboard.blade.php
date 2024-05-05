@extends('layouts.admin.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- <div class="col-2">
                <a href="{{route('jobAdd.dashboard')}}" class="btn btn-primary">Add Job</a>
            </div> --}}
            <div class="col-md-4">
                <form action="{{ route('searchJobList.dashboard') }}" method="get" class="d-flex">
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
                    <th>User name</th>
                    <th>Cv template name</th>
                    <th>Full name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1; // Khởi tạo biến số thứ tự
                @endphp
                @foreach ($userCvs as $userCv)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $userCv->users->username }}</td>
                        <td>
                            <a href="{{ route('jobDetail.dashboard', ['id' => $userCv->cvTemplates->cv_template_id]) }}" class="text-dark"
                                style="text-decoration: none">{{ $userCv->cvTemplates->cv_template_name }}</a>
                        </td>
                        <td>{{ $userCv->user_cv_fullname }}</td>
                        <td>
                            {{-- <a href="">Update</a> --}}
                            <a href="" onclick="return confirm('Are you sure you want to delete this job?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
