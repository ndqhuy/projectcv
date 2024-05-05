@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="mb-3">
                <label for="username" class="form-label">Name</label>
                <input type="text" class="form-control" id="username" name="name" value="{{ $company->company_name }}"
                    placeholder="Enter your username" value="{{ old('username') }}">
            </div>
            <div class="form-group">
                <label>Logo image</label>
                <img src="{{ asset('images/' . $company->logo_company_image) }}" width="200" alt="">
            </div>
            <br>
            <div class="form-group">
                <label>Background image</label>
                <img src="{{ asset('images/' . $company->background_company_image) }}" width="200" alt="">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Link</label>
                <input type="text" class="form-control" id="dob" name="link" value="{{ $company->company_link }}">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Address</label>
                <input type="text" class="form-control" id="dob" name="address" value="{{ $company->company_address }}">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Follower</label>
                <input type="number" class="form-control" id="dob" name="follower" value="{{ $company->company_follower }}">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Employee</label>
                <input type="number" class="form-control" id="dob" name="employee" value="{{ $company->company_employee }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Introduction</label>
                <textarea class="form-control" id="ckeditor" name="introduction" rows="3" placeholder="Enter your address">{{ $company->company_introduction }}</textarea>
            </div>
        </div>
    </div>
@endsection
