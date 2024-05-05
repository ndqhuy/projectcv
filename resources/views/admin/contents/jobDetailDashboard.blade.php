@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="mb-3">
                <label for="username" class="form-label">Name</label>
                <input type="text" class="form-control" id="username" name="name" placeholder="Enter your username"
                    value="{{ $job->job_name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Company name</label>
                <input type="text" class="form-control" id="email" name="company_name" placeholder="Enter your email"
                    value="{{ $job->company_name }}">
            </div><div class="mb-3">
                <label for="email" class="form-label">Career name</label>
                <input type="text" class="form-control" id="email" name="career_name" placeholder="Enter your email"
                    value="{{ $job->career_name }}">
            </div>
            <div class="form-group">
                <label>Background image</label>
                <img src="{{ asset('images/' . $job->background_job_image) }}" width="200" alt="">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Tittle</label>
                <input type="text" class="form-control" value="{{ $job->job_tittle }}" id="dob" name="tittle">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Salary</label>
                <input type="text" class="form-control" value="{{ $job->job_salary }}" id="dob" name="salary">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Place</label>
                <input type="text" class="form-control" value="{{ $job->job_place }}" id="dob" name="place">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Experience</label>
                <input type="text" class="form-control" value="{{ $job->job_experience }}" id="dob" name="experience">
            </div>
            <div class="mb-3">
                <label for="detail_info" class="form-label">Detail info</label>
                <textarea class="form-control" id="ckeditor" name="detail_info" rows="3" placeholder="Enter your address">{{ $job->job_detail_info }}</textarea>
            </div>
        </div>
    </div>
@endsection
