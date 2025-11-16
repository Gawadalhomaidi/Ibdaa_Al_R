@extends('layouts.app')

@section('title', __('erp.login_title'))

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <div class="auth-icon">
                <i class="fas fa-sign-in-alt"></i>
            </div>
            <h1 class="auth-title">{{ __('erp.login_title') }}</h1>
            <p class="auth-subtitle">{{ __('erp.login_subtitle') }}</p>
        </div>

        <form class="auth-form" method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-group">
                <div class="input-wrapper">
                    <i class="fas fa-envelope input-icon"></i>
                    <input 
                        type="email" 
                        name="email" 
                        id="email"
                        class="form-input"
                        placeholder="{{ __('erp.email') }}"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                    >
                    <label for="email" class="form-label">{{ __('erp.email') }}</label>
                </div>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-wrapper">
                    <i class="fas fa-lock input-icon"></i>
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        class="form-input"
                        placeholder="{{ __('erp.password') }}"
                        required
                        autocomplete="current-password"
                    >
                    <label for="password" class="form-label">{{ __('erp.password') }}</label>
                    <button type="button" class="toggle-password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-options">
                <label class="checkbox-wrapper">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                    {{ __('erp.remember_me') }}
                </label>
                
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-password">
                        {{ __('erp.forgot_password') }}
                    </a>
                @endif
            </div>
            
            <button type="submit" class="auth-submit-btn">
                <i class="fas fa-sign-in-alt mr-2"></i>
                {{ __('erp.login') }}
            </button>

            <div class="auth-divider">
                <span>{{ __('erp.or_continue_with') }}</span>
            </div>

            <div class="social-login">
                <button type="button" class="social-btn google-btn">
                    <i class="fab fa-google"></i>
                    Google
                </button>
                <button type="button" class="social-btn microsoft-btn">
                    <i class="fab fa-microsoft"></i>
                    Microsoft
                </button>
            </div>

            <div class="auth-footer">
                <p>{{ __('erp.no_account') }}
                    <a href="{{ route('register') }}" class="auth-link">
                        {{ __('erp.create_account') }}
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection