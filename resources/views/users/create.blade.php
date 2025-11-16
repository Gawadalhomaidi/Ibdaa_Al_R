@extends('layouts.app')

@section('title', __('erp.create_user_title'))

@section('content')

{{-- Hero Section --}}
<section id="create-user-hero" class="hero section pattern-bg flex items-center justify-center text-center pt-20">
    <div class="hero-content max-w-3xl mx-auto">
        <h1 class="hero-title font-bold mb-6">{{ __('erp.create_user_title') }}</h1>
        <p class="text-lg md:text-xl mb-8">{{ __('erp.create_user_subtitle') }}</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('users.index') }}" class="btn-outline-modern">
                <i class="fas fa-arrow-left ml-2"></i>
                {{ __('erp.back_to_users') }}
            </a>
        </div>
    </div>
</section>

{{-- Create User Form Section --}}
<section id="create-user" class="section bg-white">
    <div class="auth-container dark:bg-gray-900">
        <div class="auth-card">
            <div class="auth-header">
                <div class="auth-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h1 class="auth-title">{{ __('erp.create_new_user') }}</h1>
                <p class="auth-subtitle">
                    {{ __('erp.create_user_form_subtitle') }}
                </p>
            </div>

            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form class="auth-form" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- Profile Image Upload --}}
                <div class="form-group">
                    <div class="flex flex-col items-center justify-center mb-6">
                        <div class="relative mb-4">
                            <div class="w-32 h-32 rounded-full border-4 border-gray-300 bg-gray-100 flex items-center justify-center overflow-hidden">
                                <img id="profile-image-preview" src="{{ asset('images/default-avatar.png') }}" 
                                     alt="Profile Preview" class="w-full h-full object-cover hidden">
                                <i class="fas fa-user text-gray-400 text-4xl" id="profile-image-icon"></i>
                            </div>
                        </div>
                        <div class="input-wrapper">
                            <input 
                                type="file" 
                                name="profile_image" 
                                id="profile_image"
                                class="form-input-file"
                                accept="image/jpeg,image/png,image/jpg,image/gif"
                                onchange="previewImage(this)"
                            >
                            <label for="profile_image" class="form-label-file">
                                <i class="fas fa-camera mr-2"></i>
                                {{ __('erp.choose_profile_image') }}
                            </label>
                        </div>
                        @error('profile_image')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                        <p class="text-xs text-gray-500 mt-2">{{ __('erp.image_requirements') }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <i class="fas fa-user input-icon"></i>
                        <input 
                            type="text" 
                            name="name" 
                            id="name"
                            class="form-input"
                            placeholder="{{ __('erp.full_name') }}"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            autofocus
                        >
                        <label for="name" class="form-label">{{ __('erp.full_name') }}</label>
                    </div>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <i class="fas fa-at input-icon"></i>
                        <input 
                            type="text" 
                            name="username" 
                            id="username"
                            class="form-input"
                            placeholder="{{ __('erp.username') }}"
                            value="{{ old('username') }}"
                            required
                            autocomplete="username"
                        >
                        <label for="username" class="form-label">{{ __('erp.username') }}</label>
                    </div>
                    @error('username')
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
                    </div>
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
                        <i class="fas fa-user-tag input-icon"></i>
                        <select name="role" id="role" class="form-input" required>
                            <option value="">{{ __('erp.select_role') }}</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                    {{ __('erp.role_' . $role->name) }}
                                </option>
                            @endforeach
                        </select>
                        <label for="role" class="form-label">{{ __('erp.role') }}</label>
                    </div>
                    @error('role')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <i class="fas fa-user-check input-icon"></i>
                        <select name="status" id="status" class="form-input" required>
                            <option value="">{{ __('erp.select_status') }}</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('erp.active') }}</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>{{ __('erp.inactive') }}</option>
                            <option value="suspended" {{ old('status') == 'suspended' ? 'selected' : '' }}>{{ __('erp.suspended') }}</option>
                        </select>
                        <label for="status" class="form-label">{{ __('erp.status') }}</label>
                    </div>
                    @error('status')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="auth-submit-btn">
                    <i class="fas fa-user-plus mr-2"></i>
                    {{ __('erp.create_user') }}
                </button>
            </form>
        </div>
    </div>
</section>

<script>
function previewImage(input) {
    const preview = document.getElementById('profile-image-preview');
    const icon = document.getElementById('profile-image-icon');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            icon.classList.add('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.classList.add('hidden');
        icon.classList.remove('hidden');
    }
}
</script>

<style>
.form-input-file {
    @apply hidden;
}

.form-label-file {
    @apply cursor-pointer bg-primary-500 text-white px-4 py-2 rounded-lg hover:bg-primary-600 transition duration-200 flex items-center justify-center;
}

.form-input-file:focus + .form-label-file {
    @apply ring-2 ring-primary-300 outline-none;
}
</style>

@endsection