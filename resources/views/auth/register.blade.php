@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="mb-4">Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
    
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" 
                        class="form-control @error('username') is-invalid @enderror" 
                        id="username" 
                        name="username" 
                        value="{{ old('username') }}" 
                        required 
                        autofocus>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        id="password" 
                        name="password" 
                        required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" 
                        class="form-control" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        required>
            </div>
    
            <div class="mb-3">
                <label for="bio" class="form-label">Bio (optional)</label>
                <textarea class="form-control @error('bio') is-invalid @enderror" 
                            id="bio" 
                            name="bio">{{ old('bio') }}</textarea>
                @error('bio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    
        <p class="mt-3">
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
</div>
@endsection
