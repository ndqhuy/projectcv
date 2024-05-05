@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('saveEditJob.dashboard')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Name</label>
                    <input type="text" class="form-control" id="username" name="job_name" placeholder="Enter your username"
                        value="{{ $job->job_name }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Company id</label>
                    <input type="text" class="form-control" id="email" name="company_id"
                        placeholder="Enter your email" value="{{ $job->company_id }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Career id</label>
                    <input type="text" class="form-control" id="email" name="career_id"
                        placeholder="Enter your email" value="{{ $job->career_id }}">
                </div>
                <div class="form-group">
                    <label>Background image</label>
                    <input type="file" name="background_job_image" >
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Tittle</label>
                    <input type="text" class="form-control" value="{{ $job->job_tittle }}" id="dob" name="job_tittle">
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Salary</label>
                    <input type="text" class="form-control" value="{{ $job->job_salary }}" id="dob" name="job_salary">
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Place</label>
                    <input type="text" class="form-control" value="{{ $job->job_place }}" id="dob" name="job_place">
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Experience</label>
                    <input type="text" class="form-control" value="{{ $job->job_experience }}" id="dob" name="job_experience">
                </div>
                <div class="mb-3">
                    <label for="detail_info" class="form-label">Detail info</label>
                    <textarea class="form-control" id="ckeditor" name="job_detail_info" rows="3" placeholder="Enter your address">{{ $job->job_detail_info }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-3" onclick="return confirm('Are you sure you want to update this job?')">Save Job</button>
                <input type="hidden" name="job_id" value="{{ $job->job_id }}" id="">
            </form>
        </div>
    </div>
@endsection
