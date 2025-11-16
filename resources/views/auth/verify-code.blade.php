@extends('layouts.app')

@section('title', __('erp.account_activation'))

@section('content')
<div class="auth-container dark:bg-gray-900">
    <div class="auth-card">
        <div class="auth-header">
            <div class="auth-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h1 class="auth-title">{{ __('erp.account_activation') }}</h1>
            <p class="auth-subtitle">{{ __('erp.enter_verification_code') }}</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success mb-4">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <form class="auth-form" method="POST" action="{{ route('verification.verify') }}">
            @csrf

            <div class="form-group">
                <div class="input-wrapper">
                    <i class="fas fa-key input-icon"></i>
                    <input 
                        type="text" 
                        name="verification_code" 
                        id="verification_code"
                        class="form-input text-center tracking-widest text-lg"
                        placeholder="000000"
                        maxlength="6"
                        required
                        autofocus
                        pattern="[0-9]{6}"
                        title="{{ __('erp.verification_code') }}"
                    >
                    <label for="verification_code" class="form-label">{{ __('erp.verification_code') }}</label>
                </div>
                @error('verification_code')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="auth-submit-btn">
                <i class="fas fa-check-circle mr-2"></i>
                {{ __('erp.activate_account') }}
            </button>

            <div class="auth-divider">
                <span>{{ __('erp.did_not_receive_code') }}</span>
            </div>

            <div class="text-center mt-4">
                <form method="POST" action="{{ route('verification.resend') }}" class="inline">
                    @csrf
                    <button type="submit" class="auth-link">
                        {{ __('erp.resend_code') }}
                    </button>
                </form>
            </div>

            <div class="auth-footer">
                <p>
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="auth-link">
                        {{ __('erp.logout') }}
                    </a>
                </p>
            </div>
        </form>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const codeInput = document.getElementById('verification_code');
    
    // التحقق من صحة الإدخال (أرقام فقط)
    codeInput.addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');
        
        if (this.value.length === 6) {
            this.form.submit();
        }
    });
    
    // التركيز التلقائي على الحقل
    codeInput.focus();
});
</script>
@endsection