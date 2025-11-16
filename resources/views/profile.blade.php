@extends('layouts.app')

@section('title', __('erp.profile_title'))

@section('content')

{{-- Hero Section --}}
<section id="profile-hero" class="hero section pattern-bg flex items-center justify-center text-center pt-20">
    <div class="hero-content max-w-3xl mx-auto">
        <h1 class="hero-title font-bold mb-6">{{ __('erp.welcome_user', ['name' => auth()->user()->first_name]) }}</h1>
        <p class="text-lg md:text-xl mb-8">{{ __('erp.profile_subtitle') }}</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ url('/dashboard') }}" class="btn-modern">
                <i class="fas fa-rocket ml-2"></i>
                {{ __('erp.go_to_dashboard') }}
            </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn-outline-modern">
                <i class="fas fa-sign-out-alt ml-2"></i>
                {{ __('erp.logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</section>

{{-- User Info Section --}}
<section id="user-info" class="section bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 fade-in-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ __('erp.profile_info_title') }}</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">{{ __('erp.profile_info_subtitle') }}</p>
        </div>

        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8 fade-in-up">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-xl font-bold mb-2">{{ __('erp.first_name') }}</h3>
                    <p class="text-gray-700">{{ auth()->user()->first_name }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">{{ __('erp.email') }}</h3>
                    <p class="text-gray-700">{{ auth()->user()->email }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">{{ __('erp.phone') }}</h3>
                    <p class="text-gray-700">{{ auth()->user()->phone ?? __('erp.not_provided') }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">{{ __('erp.company_name') }}</h3>
                    <p class="text-gray-700">{{ auth()->user()->company_name ?? __('erp.not_provided') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Edit Profile Section --}}
<section id="edit-profile" class="section bg-white">
<div class="auth-container dark:bg-gray-900">
    <div class="auth-card">
        <div class="auth-header">
            <div class="auth-icon">
                <i class="fas fa-user"></i>
            </div>
            <h1 class="auth-title">{{ __('erp.profile') }}</h1>
            <p class="auth-subtitle">
                {{ __('erp.update_profile_information') }}
            </p>
        </div>

        @if(session('status') === 'profile-updated')
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                {{ __('erp.profile_updated_successfully') }}
            </div>
        @endif

        <form class="auth-form" method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="input-wrapper">
                    <i class="fas fa-user input-icon"></i>
                    <input 
                        type="text" 
                        name="username" 
                        id="username"
                        class="form-input"
                        placeholder="{{ __('erp.username') }}"
                        value="{{ old('username', $user->username) }}"
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
                        name="first_name" 
                        id="first_name"
                        class="form-input"
                        placeholder="{{ __('erp.first_name') }}"
                        value="{{ old('first_name', $user->first_name) }}"
                        required
                        autocomplete="given-name"
                    >
                    <label for="first_name" class="form-label">{{ __('erp.first_name') }}</label>
                </div>
                @error('first_name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-wrapper">
                    <i class="fas fa-user input-icon"></i>
                    <input 
                        type="text" 
                        name="last_name" 
                        id="last_name"
                        class="form-input"
                        placeholder="{{ __('erp.last_name') }}"
                        value="{{ old('last_name', $user->last_name) }}"
                        autocomplete="family-name"
                    >
                    <label for="last_name" class="form-label">{{ __('erp.last_name') }}</label>
                </div>
                @error('last_name')
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
                        value="{{ old('email', $user->email) }}"
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
                        value="{{ old('phone', $user->phone) }}"
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
                        value="{{ old('date_of_birth', $user->date_of_birth) }}"
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
                        <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>{{ __('erp.male') }}</option>
                        <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>{{ __('erp.female') }}</option>
                        <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>{{ __('erp.other') }}</option>
                    </select>
                    <label for="gender" class="form-label">{{ __('erp.gender') }}</label>
                </div>
                @error('gender')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="auth-submit-btn">
                <i class="fas fa-user-edit mr-2"></i>
                {{ __('erp.update_profile') }}
            </button>
        </form>
    </div>
</div>
</section>

{{-- Additional Features Section (Optional) --}}
<section id="profile-features" class="section bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 fade-in-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ __('erp.profile_features_title') }}</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">{{ __('erp.profile_features_subtitle') }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            @foreach([
                ['icon' => 'fas fa-user-edit', 'title' => __('erp.edit_profile'), 'desc' => __('erp.edit_profile_desc')],
                ['icon' => 'fas fa-key', 'title' => __('erp.change_password'), 'desc' => __('erp.change_password_desc')],
                ['icon' => 'fas fa-history', 'title' => __('erp.activity_log'), 'desc' => __('erp.activity_log_desc')],
            ] as $feature)
            <div class="modern-card p-6 fade-in-up">
                <div class="icon-wrapper mb-4">
                    <i class="{{ $feature['icon'] }} text-xl text-primary-500"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">{{ $feature['title'] }}</h3>
                <p class="text-gray-600">{{ $feature['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
