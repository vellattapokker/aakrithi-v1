@extends('layouts.app')
@section('title', 'Account - Aakrithi')

@section('content')
<div class="container auth-page">
    <div class="auth-card" id="loginCard">
        <div class="auth-header">
            <h1>Welcome Back</h1>
            <p>Sign in to your Aakrithi account</p>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger" style="color:red; margin-bottom:1rem; font-size:0.875rem;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="auth-form" method="POST" action="{{ route('login') }}">
            @csrf
            @if(request()->has('redirect_to'))
                <input type="hidden" name="redirect_to" value="{{ request('redirect_to') }}">
            @endif
            <div class="input-group">
                <i data-lucide="mail"></i>
                <input type="email" name="email" placeholder="Email address" value="{{ old('email') }}" required>
            </div>
            <div class="input-group">
                <i data-lucide="lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn-dark" style="margin-top:0.5rem;">Sign In</button>
        </form>
        <p style="text-align:center; margin-top:1.5rem; font-size:0.875rem; color:var(--color-text-light);">
            Don't have an account? <a href="javascript:void(0)" onclick="toggleAuth('register')" style="font-weight:700; color:var(--color-accent);">Register Now</a>
        </p>
    </div>

    <div class="auth-card" id="registerCard" style="display:none;">
        <div class="auth-header">
            <h1>Create Account</h1>
            <p>Join the Aakrithi community</p>
        </div>
        <form class="auth-form" method="POST" action="{{ route('register') }}">
            @csrf
            @if(request()->has('redirect_to'))
                <input type="hidden" name="redirect_to" value="{{ request('redirect_to') }}">
            @endif
            <div class="input-group">
                <i data-lucide="user"></i>
                <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
            </div>
            <div class="input-group">
                <i data-lucide="mail"></i>
                <input type="email" name="email" placeholder="Email address" value="{{ old('email') }}" required>
            </div>
            <div class="input-group">
                <i data-lucide="lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <i data-lucide="lock"></i>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn-dark" style="margin-top:0.5rem;">Create Account</button>
        </form>
        <p style="text-align:center; margin-top:1.5rem; font-size:0.875rem; color:var(--color-text-light);">
            Already have an account? <a href="javascript:void(0)" onclick="toggleAuth('login')" style="font-weight:700; color:var(--color-accent);">Sign In</a>
        </p>
    </div>
</div>

<script>
function toggleAuth(type) {
    const loginCard = document.getElementById('loginCard');
    const registerCard = document.getElementById('registerCard');
    if (type === 'register') {
        loginCard.style.display = 'none';
        registerCard.style.display = 'block';
    } else {
        loginCard.style.display = 'block';
        registerCard.style.display = 'none';
    }
}
</script>
@endsection
