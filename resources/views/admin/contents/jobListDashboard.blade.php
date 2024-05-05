@extends('layouts.admin.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <a href="{{route('jobAdd.dashboard')}}" class="btn btn-primary">Add Job</a>
            </div>
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
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Career Name</th>
                    <th>Tittle</th>
                    <th>Salary</th>
                    <th>Place</th>
                    <th>Experience</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1; // Khởi tạo biến số thứ tự
                @endphp
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>
                            <a href="{{ route('jobDetail.dashboard', ['id' => $job->job_id]) }}" class="text-dark"
                                style="text-decoration: none">{{ $job->job_name }}</a>
                        </td>
                        <td>{{ $job->company_name }}</td>
                        <td>{{ $job->career_name }}</td>
                        <td>{{ $job->job_tittle }}</td>
                        <td>{{ $job->job_salary }}</td>
                        <td>{{ $job->job_place }}</td>
                        <td>{{ $job->job_experience }}</td>
                        <td>
                            <a href="{{route('editJob.dashboard', ['id' => $job->job_id])}}">Update</a>
                            <a href="{{route('deleteJob.dashboard', ['id' => $job->job_id])}}" onclick="return confirm('Are you sure you want to delete this job?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
