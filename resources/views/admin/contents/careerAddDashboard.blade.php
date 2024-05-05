@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('saveAddCareer.dashboard')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Name</label>
                    <input type="text" class="form-control" id="username" name="career_name" placeholder="Enter your username"
                        value="{{ old('username') }}">
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-3">Add Career</button>
            </form>
        </div>
    </div>
@endsection
