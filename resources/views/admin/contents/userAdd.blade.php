@extends('layouts.admin.index')

@section('content')
<div class="row">
    <form action="save-add-user" method="post">
        @if ($errors->any())
            <div class="alert alert-danger text-center">
                Vui lòng kiểm tra lại dữ liệu
            </div>
        @endif
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" value="{{old('username')}}">
            @error('username')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{old('email')}}">
            @error('email')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter your password">
        </div>
        <div class="mb-3">
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm-password"
                placeholder="Confirm your password">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address"></textarea>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-3">Add User</button>
        <input type="hidden" name="role" value="0">
    </form>
</div>
@endsection
