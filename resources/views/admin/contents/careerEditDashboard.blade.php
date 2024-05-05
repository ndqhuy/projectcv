@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('saveEditCareer.dashboard')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Name</label>
                    <input type="text" class="form-control" id="username" name="career_name" placeholder="Enter your username"
                        value="{{ $career->career_name }}">
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-3" onclick="return confirm('Are you sure you want to update this career?')">Save career</button>
                <input type="hidden" name="career_id" value="{{ $career->career_id }}" id="">
            </form>
        </div>
    </div>
@endsection
