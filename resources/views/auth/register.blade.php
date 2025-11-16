@extends('layouts.app')

@section('title', __('erp.register_title'))

@section('content')
<div class="auth-container dark:bg-gray-900">
    <div class="auth-card">
        <div class="auth-header">
            <div class="auth-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <h1 class="auth-title">{{ __('erp.register_title') }}</h1>
            <p class="auth-subtitle">{{ __('erp.register_subtitle') }}</p>
        </div>
        <form class="auth-form" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <div class="input-wrapper">
                    <i class="fas fa-user input-icon"></i>
                    <input 
                        type="text" 
                        name="username" 
                        id="username"
                        class="form-input"
                        placeholder="{{ __('erp.username') }}"
                        value="{{ old('username') }}"
                        required
                        autocomplete="username"
                        autofocus
                    >
                    <label for="username" class="form-label">{{ __('erp.username') }}</label>
                </div>
                @error('username')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-wrapper">
                    <i class="fas fa-user input-icon"></i>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        class="form-input"
                        placeholder="{{ __('erp.name') }}"
                        value="{{ old('name') }}"
                        required
                        autocomplete="given-name"
                    >
                    <label for="name" class="form-label">{{ __('erp.name') }}</label>
                </div>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

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
                    >
                    <label for="email" class="form-label">{{ __('erp.email') }}</label>
                </div>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-wrapper">
                    <i class="fas fa-phone input-icon"></i>
                    <input 
                        type="tel" 
                        name="phone" 
                        id="phone"
                        class="form-input"
                        placeholder="{{ __('erp.phone') }}"
                        value="{{ old('phone') }}"
                        autocomplete="tel"
                    >
                    <label for="phone" class="form-label">{{ __('erp.phone') }}</label>
                </div>
                @error('phone')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-wrapper">
                    <i class="fas fa-calendar input-icon"></i>
                    <input 
                        type="date" 
                        name="date_of_birth" 
                        id="date_of_birth"
                        class="form-input"
                        placeholder="{{ __('erp.date_of_birth') }}"
                        value="{{ old('date_of_birth') }}"
                    >
                    <label for="date_of_birth" class="form-label">{{ __('erp.date_of_birth') }}</label>
                </div>
                @error('date_of_birth')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-wrapper">
                    <i class="fas fa-venus-mars input-icon"></i>
                    <select name="gender" id="gender" class="form-input">
                        <option value="">{{ __('erp.select_gender') }}</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>{{ __('erp.male') }}</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>{{ __('erp.female') }}</option>
                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>{{ __('erp.other') }}</option>
                    </select>
                    <label for="gender" class="form-label">{{ __('erp.gender') }}</label>
                </div>
                @error('gender')
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
                        autocomplete="new-password"
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

            <div class="form-group">
                <div class="input-wrapper">
                    <i class="fas fa-lock input-icon"></i>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation"
                        class="form-input"
                        placeholder="{{ __('erp.confirm_password') }}"
                        required
                        autocomplete="new-password"
                    >
                    <label for="password_confirmation" class="form-label">{{ __('erp.confirm_password') }}</label>
                    <button type="button" class="toggle-password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <div class="form-group">
                <label class="checkbox-wrapper terms-checkbox">
                    <input type="checkbox" name="terms" id="terms" required>
                    <span class="checkmark"></span>
                    {!! __('erp.agree_terms', ['terms' => '#', 'privacy' => '#']) !!}
                </label>
                @error('terms')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="auth-submit-btn">
                <i class="fas fa-user-plus mr-2"></i>
                {{ __('erp.create_account') }}
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
                <p>{{ __('erp.have_account') }}
                    <a href="{{ route('login') }}" class="auth-link">
                        {{ __('erp.login_here') }}
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection