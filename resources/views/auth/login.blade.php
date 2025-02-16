@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="mb-4">Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus>
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
    
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>
    
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    
        <p class="mt-3">
            Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
        </p>
    </div>
</div>
@endsection
