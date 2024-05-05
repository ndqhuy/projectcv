@extends('layouts.admin.index')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{route('saveAddJob.dashboard')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Name</label>
                <input type="text" class="form-control" id="username" name="job_name" placeholder="Enter your username" value="{{ old('username') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Company name</label>
                <select class="form-select" aria-label="Default select example" name="company_id">
                    <option selected>Open this select menu</option>
                    @foreach($companys as $company)
                    <option value="{{$company->company_id}}">{{$company->company_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Career name</label>
                <select class="form-select" aria-label="Default select example" name="career_id">
                    <option selected>Open this select menu</option>
                    @foreach($careers as $career)
                    <option value="{{$career->career_id}}">{{$career->career_name}}</option>
                    @endforeach
            </div>
            <hr>
            <div class="form-group">
                <label>Background image</label>
                <input type="file" name="background_job_image">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Tittle</label>
                <input type="text" class="form-control" id="dob" name="job_tittle">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Salary</label>
                <input type="text" class="form-control" id="dob" name="job_salary">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Place</label>
                <input type="text" class="form-control" id="dob" name="job_place">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Experience</label>
                <input type="text" class="form-control" id="dob" name="job_experience">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Detail info</label>
                <textarea class="form-control" id="ckeditor" name="job_detail_info" rows="3" placeholder="Enter your address"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Add Job</button>
        </form>
    </div>
</div>
@endsection