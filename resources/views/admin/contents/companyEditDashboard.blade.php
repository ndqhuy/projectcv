@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('saveEditCompany.dashboard')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Name</label>
                    <input type="text" class="form-control" id="username" name="company_name" value="{{$company->company_name}}" placeholder="Enter your username"
                        value="{{ old('username') }}">
                </div>
                <div class="form-group">
                    <label>Logo image</label>
                    <input type="file" name="logo_company_image" >
                </div>
                <div class="form-group">
                    <label>Background image</label>
                    <input type="file" name="background_company_image" >
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Link</label>
                    <input type="text" class="form-control" id="dob" name="company_link" value="{{$company->company_link}}">
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Address</label>
                    <input type="text" class="form-control" id="dob" name="company_address"  value="{{$company->company_address}}">
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Follower</label>
                    <input type="number" class="form-control" id="dob" name="company_follower" value="{{$company->company_follower}}">
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Employee</label>
                    <input type="number" class="form-control" id="dob" name="company_employee" value="{{$company->company_employee}}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Introduction</label>
                    <textarea class="form-control" id="ckeditor" name="company_introduction" rows="3" placeholder="Enter your address">{{$company->company_introduction}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-3" onclick="return confirm('Are you sure you want to update this company?')">Edit Company</button>
                <input type="hidden" name="company_id" value="{{ $company->company_id }}" id="">
            </form>
        </div>
    </div>
@endsection
