@extends('layouts.admin.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <a href="{{route('companyAdd.dashboard')}}" class="btn btn-primary">Add Company</a>
            </div>
            <div class="col-md-4">
                <form action="{{ route('searchCompanyList.dashboard') }}" method="get" class="d-flex">
                    <input class="form-control me-2" type="search" name="keyword" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
        <table class="table table-striped rounded mt-3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Follower</th>
                    <th>Employee</th>
                    <th>address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1; // Khởi tạo biến số thứ tự
                @endphp
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $index++ }}</td><td>
                            <a href="{{ route('companyDetail.dashboard', ['id' => $company->company_id]) }}" class="text-dark"
                                style="text-decoration: none">{{ $company->company_name }}</a>
                        </td>
                        <td>{{ $company->company_link }}</td>
                        <td>{{ $company->company_follower }}</td>
                        <td>{{ $company->company_employee }}</td>
                        <td>{{ $company->company_address }}</td>
                        <td>
                            <a href="{{route('editCompany.dashboard', ['id' => $company->company_id])}}">Update</a>
                            <a href="{{route('deleteCompany.dashboard', ['id' => $company->company_id])}}" onclick="return confirm('Are you sure you want to delete this company?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
