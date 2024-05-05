@extends('layouts.admin.index')

@section('content')
<div class="row">
    <form action="{{url('dashboard/save-edit-user')}}" method="post">
        @if ($errors->any())
            <div class="alert alert-danger text-center">
                Vui lòng kiểm tra lại dữ liệu
            </div>
        @endif
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" placeholder="Enter your username" value="{{old('username')}}">
            @error('username')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Enter your email" value="{{old('email')}}">
            @error('email')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" value="{{$user->dob}}" name="dob">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address">{{$user->address}}</textarea>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{$user->phone}}" placeholder="Enter your phone number">
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-3">Edit User</button>
        <input type="hidden" name="password" value="123456789">
        <input type="hidden" name="role" value="0">
        <input type="hidden" name="id" value="{{$user->id}}">
    </form>
</div>
@endsection
