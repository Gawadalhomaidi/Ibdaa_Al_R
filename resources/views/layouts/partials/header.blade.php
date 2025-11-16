@php
    $currentLocale = $locale ?? 'en';
    $isAuthenticated = auth()->check();

@endphp
<nav class="nav-blur shadow-lg border-b border-indigo-100 dark:border-gray-800" x-data="{ mobileMenuOpen: false, darkMode: localStorage.getItem('dark-mode') === 'true' || (!('dark-mode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) }"
    x-init="$watch('darkMode', value => {
        localStorage.setItem('dark-mode', value);
        document.documentElement.classList.toggle('dark', value)
    })" :class="{ 'dark': darkMode }">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">

            <div class="flex items-center space-x-3 {{ $currentLocale == 'ar' ? 'space-x-reverse' : '' }}">
                <a href="{{ url('/' . $currentLocale) }}"
                    class="flex items-center space-x-3 {{ $currentLocale == 'ar' ? 'space-x-reverse' : '' }}">
                    <div class="module-icon w-12 h-12 rounded-xl flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold text-lg">ERP</span>
                    </div>
                    <div>
                        <span
                            class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-indigo-800 bg-clip-text text-transparent dark:from-indigo-400 dark:to-indigo-600">
                            {{ __('erp.hero_Name') }}
                        </span>
                    </div>
                </a>
            </div>

            <div class="lg:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200 p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" x-cloak></path>
                    </svg>
                </button>
            </div>

            <div class="hidden lg:flex items-center space-x-4 {{ $currentLocale == 'ar' ? 'space-x-reverse' : '' }}">
                <a href="{{ url('/' . $currentLocale) }}"
                    class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-all duration-300 font-medium hover:font-semibold">
                    {{ __('erp.home') }}
                </a>
                <a href="#about"
                    class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-all duration-300 font-medium hover:font-semibold">
                    {{ __('erp.about') }}
                </a>
                <a href="#features"
                    class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-all duration-300 font-medium hover:font-semibold">
                    {{ __('erp.features') }}
                </a>
                <a href="#systems"
                    class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-all duration-300 font-medium hover:font-semibold">
                    {{ __('erp.systems') }}
                </a>
                <a href="#modules"
                    class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-all duration-300 font-medium hover:font-semibold">
                    {{ __('erp.modules') }}
                </a>
                <a href="#animation"
                    class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-all duration-300 font-medium hover:font-semibold">
                    {{ __('erp.technologies') }}
                </a>
                <a href="#contact"
                    class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-all duration-300 font-medium hover:font-semibold">
                    {{ __('erp.contact') }}
                </a>
            </div>

            <div class="hidden lg:flex items-center space-x-4 {{ $currentLocale == 'ar' ? 'space-x-reverse' : '' }}">
                <!-- أزرار اللغة والوضع الداكن -->
                <button @click="darkMode = !darkMode" class="theme-toggle w-10 h-10">
                    <svg class="sun-icon w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"
                        x-show="!darkMode">
                        <path fill-rule="evenodd"
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="moon-icon w-5 h-5 text-indigo-400" fill="currentColor" viewBox="0 0 20 20"
                        x-show="darkMode">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                </button>

                <div
                    class="flex items-center space-x-2 {{ $currentLocale == 'ar' ? 'space-x-reverse' : '' }} bg-indigo-50 dark:bg-gray-800 rounded-lg p-1">
                    <a href="{{ route('lang.switch', ['locale' => 'en']) }}"
                        class="px-3 py-1 text-sm rounded-md transition-all duration-300 {{ $currentLocale == 'en' ? ' bg-indigo-600 text-white shadow-md' : 'text-indigo-600 dark:text-indigo-400 hover:bg-indigo-100 dark:hover:bg-gray-700' }}">
                        EN
                    </a>
                    <a href="{{ route('lang.switch', ['locale' => 'ar']) }}"
                        class="px-3 py-1 text-sm rounded-md transition-all duration-300 {{ $currentLocale == 'ar' ? 'bg-indigo-600 text-white shadow-md' : 'text-indigo-600 dark:text-indigo-400 hover:bg-indigo-100 dark:hover:bg-gray-700' }}">
                        AR
                    </a>
                </div>

                <!-- أزرار المصادقة للكمبيوتر -->
                @auth
                    <!-- المستخدم مسجل الدخول -->
                    <div class="flex items-center space-x-3 {{ $currentLocale == 'ar' ? 'space-x-reverse' : '' }}">
                        <a href="{{ route('users.index') }}" class="btn-modern text-sm">
                            <i class="fas fa-tachometer-alt mr-2"></i>
                            {{ __('erp.profile') }}
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="btn-outline-modern text-sm">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                {{ __('erp.logout') }}
                            </button>
                        </form>
                    </div>
                @else
                    <!-- المستخدم غير مسجل الدخول -->
                    <div class="flex items-center space-x-3 {{ $currentLocale == 'ar' ? 'space-x-reverse' : '' }}">
                        <a href="{{ route('login') }}" class="btn-outline-modern text-sm">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            {{ __('erp.login') }}
                        </a>
                        <a href="{{ route('register') }}" class="btn-modern text-sm">
                            <i class="fas fa-user-plus mr-2"></i>
                            {{ __('erp.register') }}
                        </a>
                    </div>
                @endauth
            </div>
        </div>

        <!-- القائمة المنسدلة للهواتف -->
        <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="lg:hidden py-4 border-t border-gray-200 dark:border-gray-700" x-cloak>
            <div class="flex flex-col space-y-4">
                <a href="#home" @click="mobileMenuOpen = false"
                    class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200 font-medium py-2">
                    {{ __('erp.home') }}
                </a>
                <a href="#about" @click="mobileMenuOpen = false"
                    class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200 font-medium py-2">
                    {{ __('erp.about') }}
                </a>
                <a href="#features" @click="mobileMenuOpen = false"
                    class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200 font-medium py-2">
                    {{ __('erp.features') }}
                </a>
                <a href="#systems" @click="mobileMenuOpen = false"
                    class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200 font-medium py-2">
                    {{ __('erp.systems') }}
                </a>
                <a href="#modules" @click="mobileMenuOpen = false"
                    class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200 font-medium py-2">
                    {{ __('erp.modules') }}
                </a>
                <a href="#animation" @click="mobileMenuOpen = false"
                    class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200 font-medium py-2">
                    {{ __('erp.technologies') }}
                </a>
                <a href="#contact" @click="mobileMenuOpen = false"
                    class="text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200 font-medium py-2">
                    {{ __('erp.contact') }}
                </a>

                <!-- أزرار المصادقة للهواتف -->
                <div class="pt-4 border-t border-gray-200 dark:border-gray-600">
                    @auth
                        <!-- المستخدم مسجل الدخول -->
                        <div class="flex flex-col space-y-3">
                            <a href="{{ route('users.index') }}" @click="mobileMenuOpen = false"
                                class="btn-modern w-full text-center justify-center">
                                <i class="fas fa-tachometer-alt mr-2"></i>
                                {{ __('erp.profile') }}
                            </a>


                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit" class="btn-outline-modern w-full text-center justify-center"
                                    @click="mobileMenuOpen = false">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    {{ __('erp.logout') }}
                                </button>
                            </form>
                        </div>
                    @else
                        <!-- المستخدم غير مسجل الدخول -->
                        <div class="flex flex-col space-y-3">
                            <a href="{{ route('login') }}" @click="mobileMenuOpen = false"
                                class="btn-outline-modern w-full text-center justify-center">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                {{ __('erp.login') }}
                            </a>
                            <a href="{{ route('register') }}" @click="mobileMenuOpen = false"
                                class="btn-modern w-full text-center justify-center">
                                <i class="fas fa-user-plus mr-2"></i>
                                {{ __('erp.register') }}
                            </a>
                        </div>
                    @endauth
                </div>

                <!-- أزرار اللغة والوضع الداكن للهواتف -->
                <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-600">
                    <button id="theme-toggle" class="theme-toggle w-10 h-10">
                        <svg class="sun-icon w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="moon-icon w-5 h-5 text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                    </button>

                    <div class="flex items-center space-x-2 bg-indigo-50 dark:bg-gray-800 rounded-lg p-1">
                        <a href="{{ route('lang.switch', ['locale' => 'en']) }}"
                            class="px-3 py-1 text-sm rounded-md transition-all duration-300 {{ $currentLocale == 'en' ? 'bg-indigo-600 text-white shadow-md' : 'text-indigo-600 dark:text-indigo-400 hover:bg-indigo-100 dark:hover:bg-gray-700' }}"
                            @click="mobileMenuOpen = false">
                            EN
                        </a>
                        <a href="{{ route('lang.switch', ['locale' => 'ar']) }}"
                            class="px-3 py-1 text-sm rounded-md transition-all duration-300 {{ $currentLocale == 'ar' ? 'bg-indigo-600 text-white shadow-md' : 'text-indigo-600 dark:text-indigo-400 hover:bg-indigo-100 dark:hover:bg-gray-700' }}"
                            @click="mobileMenuOpen = false">
                            AR
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    [x-cloak] {
        display: none !important;
    }

    /* تحسينات للأزرار في الهيدر */
    .btn-modern,
    .btn-outline-modern {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        border-radius: 0.75rem;
        font-weight: 600;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
    }

    .btn-modern {
        background: var(--primary-600);
        color: white;
        border: none;
    }

    .btn-modern:hover {
        background: var(--primary-700);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
    }

    .btn-outline-modern {
        background: transparent;
        color: hsl(var(--foreground));
        border: 1px solid hsl(var(--border));
    }

    .btn-outline-modern:hover {
        background: hsl(var(--accent));
        border-color: hsl(var(--accent-foreground) / 0.2);
        transform: translateY(-1px);
    }

    /* تحسينات للاستجابة على الهواتف */
    @media (max-width: 640px) {

        .btn-modern,
        .btn-outline-modern {
            width: 100%;
            padding: 0.75rem 1rem;
        }
    }
</style>


{{-- Jawad Alhomaidi --}}
