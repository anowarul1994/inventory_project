@extends('layouts.app')

@section('page_title', 'Login')
@section('content')

    <form method="POST" action="{{ route('login') }}">
        @csrf
      
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Enter your Email">
            </div>

            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Enter your password">
            </div>

            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="d-grid">
                <button type="submit" class="btn btn-dark"> Login </button>
            </div>
               
        
    </form>
@endsection
