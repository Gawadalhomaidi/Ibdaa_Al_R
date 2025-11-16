@extends('layouts.app')

@section('title', __('erp.hero_title'))

@section('content')

    {{-- Hero Section --}}
    <section id="home" class="hero section pattern-bg flex items-center justify-center text-center pt-20">
        <div class="hero-content max-w-3xl mx-auto">
            <h1 class="hero-title font-bold mb-6">{{ __('erp.hero_title') }}</h1>
            <p class="text-lg md:text-xl mb-8">{{ __('erp.hero_subtitle') }}</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                @auth
                    <a href="{{ url('/') }}" class="btn-modern">
                        <i class="fas fa-rocket ml-2 mr-3"></i>
                        {{ __('erp.go_to_dashboard') }}
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn-modern">
                        <i class="fas fa-rocket ml-2 mr-3"></i>
                        {{ __('erp.get_started') }}
                    </a>
                @endauth
                <a href="#demo" class="btn-outline-modern">
                    <i class="fas fa-play-circle ml-2 mr-3"></i>
                    {{ __('erp.demo') }}
                </a>
            </div>
        </div>
    </section>

     {{-- Animated Grid Section --}}
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 fade-in-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ __('erp.animated_section_title') }}</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">{{ __('erp.animated_section_desc') }}</p>
            </div>

            <div class="animated-grid max-w-5xl mx-auto mb-12">
                @foreach ([['text' => __('erp.feature1'), 'icon' => 'fas fa-warehouse'], ['text' => __('erp.feature2'), 'icon' => 'fas fa-chart-line'], ['text' => __('erp.feature3'), 'icon' => 'fas fa-users'], ['text' => __('erp.feature4'), 'icon' => 'fas fa-envelope'], ['text' => __('erp.feature5'), 'icon' => 'fas fa-chart-bar'], ['text' => __('erp.feature6'), 'icon' => 'fas fa-user-tie']] as $index => $feature)
                    <div class="grid-item group relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-primary-500/10 to-primary-600/5 rounded-lg">
                        </div>
                        <div class="relative z-10 w-full h-full flex flex-col items-center justify-center p-4 text-center">
                            <div
                                class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                                <i class="{{ $feature['icon'] }} text-white text-lg"></i>
                            </div>
                            <span class="text-white font-semibold text-sm md:text-base leading-tight">
                                {{ $feature['text'] }}
                            </span>
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-primary-600/20 to-primary-700/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg">
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center fade-in-up">
                <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">{{ __('erp.animated_section_text') }}</p>
                <button
                    class="cta-medias-btn relative overflow-hidden bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 hover:from-indigo-700 hover:to-purple-700 hover:shadow-2xl hover:scale-105 transform group">
                    <span class="relative z-10 flex items-center justify-center">
                        <i class="fas fa-play-circle ml-2 mr-3"></i>
                        {{ __('erp.learn_more') }}
                        <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-1 transition-transform"></i>
                    </span>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-300">
                    </div>
                </button>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    @if (!empty($aboutSection) && !empty($aboutSection->aboutSection))
        <section id="about"
            class="expanded-about section bg-gradient-to-br from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 py-20 relative overflow-hidden"
            @if ($aboutSection->aboutSection->background_image) style="background-image: url('{{ asset('storage/' . $aboutSection->aboutSection->background_image) }}'); background-size: cover; background-position: center;" @endif>

            <!-- تأثيرات الخلفية -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-10 -left-10 w-72 h-72 bg-indigo-500/5 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-blue-600/5 rounded-full blur-3xl animate-pulse"
                    style="animation-delay: 2s;"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-purple-400/3 rounded-full blur-2xl">
                </div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="text-center mb-12 fade-in-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
                        {{ $aboutSection->aboutSection->title }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 max-w-3xl mx-auto text-lg">
                        {{ $aboutSection->aboutSection->description }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
                    <!-- Mission Section -->
                    @if ($aboutSection->aboutSection->show_mission)
                        <div class="fade-in-up">
                            <div
                                class="mission-card bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-2xl border border-gray-200 dark:border-gray-700 relative overflow-hidden">
                                <!-- تأثير الخلفية للمهمة -->
                                @if ($aboutSection->aboutSection->mission_background_image)
                                    <div class="absolute inset-0 bg-cover bg-center opacity-5"
                                        style="background-image: url('{{ asset('storage/' . $aboutSection->aboutSection->mission_background_image) }}');">
                                    </div>
                                @endif
                                <div class="relative z-10">
                                    <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">
                                        {{ $aboutSection->aboutSection->mission_title }}
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                                        {{ $aboutSection->aboutSection->mission_description }}
                                    </p>
                                    <ul class="space-y-3">
                                        @foreach ($aboutSection->aboutSection->mission_points as $point)
                                            <li class="flex items-start group">
                                                <i
                                                    class="fas fa-check-circle text-indigo-600 dark:text-indigo-400 mt-1 mr-3 transform group-hover:scale-110 transition-transform duration-300"></i>
                                                <span
                                                    class="text-gray-600 dark:text-gray-300 group-hover:text-gray-800 dark:group-hover:text-white transition-colors duration-300">
                                                    {{ $point }}
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl opacity-0 group-hover:opacity-5 transition-opacity duration-500 -z-10">
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Stats Section -->
                    @if ($aboutSection->aboutSection->show_stats)
                        <div class="fade-in-up" style="animation-delay: 0.2s">
                            <div
                                class="stats-grid bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-2xl border border-gray-200 dark:border-gray-700 relative overflow-hidden">
                                <!-- تأثير الخلفية للإحصائيات -->
                                @if ($aboutSection->aboutSection->stats_background_image)
                                    <div class="absolute inset-0 bg-cover bg-center opacity-5"
                                        style="background-image: url('{{ asset('storage/' . $aboutSection->aboutSection->stats_background_image) }}');">
                                    </div>
                                @endif
                                <div class="relative z-10">
                                    <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">
                                        {{ $aboutSection->aboutSection->why_choose_us_title }}
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                                        {{ $aboutSection->aboutSection->why_choose_us_description }}
                                    </p>
                                    <div class="grid grid-cols-2 gap-6">
                                        @foreach ($aboutSection->aboutSection->stats as $stat)
                                            <div
                                                class="stats-item text-center group hover:transform hover:scale-105 transition-all duration-300">
                                                <div
                                                    class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mb-2 group-hover:text-indigo-700 dark:group-hover:text-indigo-300 transition-colors duration-300">
                                                    {{ $stat['value'] }}
                                                </div>
                                                <div
                                                    class="text-sm text-gray-600 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-gray-200 transition-colors duration-300">
                                                    {{ $stat['label'] }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-2xl opacity-0 group-hover:opacity-5 transition-opacity duration-500 -z-10">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Values Section --}}
    @if (!empty($valuesSection))
        <section id="values"
            class="section bg-gradient-to-br from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 py-20 relative overflow-hidden"
            @if ($valuesSection->background_image) style="background-image: url('{{ asset('storage/' . $valuesSection->background_image) }}'); background-size: cover; background-position: center;" @endif>

            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-10 -left-10 w-72 h-72 bg-primary-500/5 rounded-full blur-3xl animate-pulse">
                </div>
                <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-primary-600/5 rounded-full blur-3xl animate-pulse"
                    style="animation-delay: 2s;"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-primary-400/3 rounded-full blur-2xl">
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 relative z-10">
                <div class="text-center mb-16 fade-in-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
                        {{ $valuesSection->{"title_{$locale}"} ?? $valuesSection->title_en }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto text-lg">
                        {{ $valuesSection->{"subtitle_{$locale}"} ?? ($valuesSection->subtitle_en ?? ($valuesSection->{"description_{$locale}"} ?? $valuesSection->description_en)) }}
                    </p>
                </div>

                <div class="relative">
                    <div
                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-32 h-32 md:w-40 md:h-40 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center shadow-2xl">
                        <div class="text-center text-white">
                            <i class="fas fa-star text-xl md:text-2xl mb-1"></i>
                            <div class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
                                {{ $valuesSection->{"name_{$locale}"} ?? ($valuesSection->name_en ?? __('erp.our_values')) }}
                            </div>
                        </div>
                    </div>

                    <div class="values-circle-container relative h-96 md:h-[500px]">
                        {{-- loop على القيم المرتبطة بالقسم --}}
                        @foreach ($valuesSection->values as $index => $value)
                            @php
                                $vTitle = $value->{"title_{$locale}"} ?? ($value->title_en ?? '');
                                $vDesc = $value->{"description_{$locale}"} ?? ($value->description_en ?? '');
                                $vIcon = $value->icon ?? 'fas fa-circle';
                                $vColor = $value->color ?? 'from-emerald-500 to-green-600';
                            @endphp

                            <div
                                class="value-circle-item absolute top-1/2 left-1/2 transform transition-all duration-700 ease-in-out hover:scale-110 group value-circle-{{ $loop->index }}">
                                <div
                                    class="value-circle w-24 h-24 md:w-28 md:h-28 bg-gradient-to-br {{ $vColor }} rounded-full flex items-center justify-center text-white shadow-2xl cursor-pointer transition-all duration-500 group-hover:shadow-3xl relative overflow-hidden">
                                    <i
                                        class="{{ $vIcon }} text-xl md:text-2xl transition-transform duration-300 group-hover:scale-110"></i>
                                    <div
                                        class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity duration-300 rounded-full">
                                    </div>
                                    <div
                                        class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-white rounded-full animate-ping">
                                        </div>
                                        <div class="absolute bottom-1/4 right-1/4 w-1 h-1 bg-white rounded-full animate-ping"
                                            style="animation-delay: 0.3s;"></div>
                                    </div>
                                </div>

                                <div
                                    class="value-card absolute top-full left-1/2 transform -translate-x-1/2 mt-6 w-64 bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-500 group-hover:mt-4 z-30 border border-gray-200 dark:border-gray-700">
                                    <div
                                        class="absolute bottom-full left-1/2 transform -translate-x-1/2 border-8 border-transparent border-b-white dark:border-b-gray-800">
                                    </div>
                                    <div class="text-center">
                                        <div
                                            class="w-12 h-12 bg-gradient-to-br {{ $vColor }} rounded-xl flex items-center justify-center text-white mb-4 mx-auto">
                                            <i class="{{ $vIcon }}"></i>
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                                            {{ $vTitle }}</h3>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                                            {{ $vDesc }}
                                        </p>
                                    </div>
                                    <div
                                        class="absolute -inset-1 bg-gradient-to-r {{ $vColor }} rounded-2xl opacity-0 group-hover:opacity-10 -z-10 transition-opacity duration-500 blur-sm">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="absolute inset-0 pointer-events-none">
                        <svg class="w-full h-full" viewBox="0 0 100 100">
                            @foreach ([0, 90, 180, 270] as $angle)
                                <line x1="50" y1="50" x2="{{ 50 + 40 * cos(deg2rad($angle)) }}"
                                    y2="{{ 50 + 40 * sin(deg2rad($angle)) }}"
                                    stroke="url(#lineGradient{{ $angle }})" stroke-width="0.5"
                                    stroke-dasharray="2 2" class="animate-dash">
                                    <animate attributeName="stroke-dashoffset" from="10" to="0"
                                        dur="3s" repeatCount="indefinite" />
                                </line>
                            @endforeach
                            <defs>
                                <linearGradient id="lineGradient0" x1="0%" y1="0%" x2="100%"
                                    y2="0%">
                                    <stop offset="0%" stop-color="#10b981" stop-opacity="0.6" />
                                    <stop offset="100%" stop-color="#059669" stop-opacity="0.3" />
                                </linearGradient>
                                <linearGradient id="lineGradient90" x1="0%" y1="0%" x2="100%"
                                    y2="0%">
                                    <stop offset="0%" stop-color="#3b82f6" stop-opacity="0.6" />
                                    <stop offset="100%" stop-color="#1d4ed8" stop-opacity="0.3" />
                                </linearGradient>
                                <linearGradient id="lineGradient180" x1="0%" y1="0%" x2="100%"
                                    y2="0%">
                                    <stop offset="0%" stop-color="#8b5cf6" stop-opacity="0.6" />
                                    <stop offset="100%" stop-color="#7c3aed" stop-opacity="0.3" />
                                </linearGradient>
                                <linearGradient id="lineGradient270" x1="0%" y1="0%" x2="100%"
                                    y2="0%">
                                    <stop offset="0%" stop-color="#ec4899" stop-opacity="0.6" />
                                    <stop offset="100%" stop-color="#db2777" stop-opacity="0.3" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- features Section --}}
    @if (!empty($featuresSection) && $featuresSection->features->count() > 0)
        <section id="features"
            class="section bg-gray-50 from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 py-20 relative overflow-hidden"
            @if ($featuresSection->background_image) style="background-image: url('{{ asset('storage/' . $featuresSection->background_image) }}'); background-size: cover; background-position: center;" @endif>

            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-10 -left-10 w-72 h-72 bg-primary-500/5 rounded-full blur-3xl animate-pulse">
                </div>
                <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-primary-600/5 rounded-full blur-3xl animate-pulse"
                    style="animation-delay: 2s;"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-primary-400/3 rounded-full blur-2xl">
                </div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="text-center mb-16 fade-in-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
                        {{ $featuresSection->{"title_{$locale}"} ?? $featuresSection->title_en }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto text-lg">
                        {{ $featuresSection->{"subtitle_{$locale}"} ?? ($featuresSection->subtitle_en ?? ($featuresSection->{"description_{$locale}"} ?? $featuresSection->description_en)) }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($featuresSection->features as $index => $feature)
                        @php
                            $fTitle = $feature->{"title_{$locale}"} ?? ($feature->title_en ?? '');
                            $fDesc = $feature->{"description_{$locale}"} ?? ($feature->description_en ?? '');
                            $fIcon = $feature->icon ?? 'fas fa-circle';
                            $animationDelay = $index * 0.1;
                        @endphp

                        <div class="modern-card p-6 fade-in-up group hover:transform hover:scale-105 transition-all duration-300"
                            style="animation-delay: {{ $animationDelay }}s">
                            <div class="icon-wrapper mb-4 group-hover:scale-110 transition-transform duration-300">
                                <i class="{{ $fIcon }} text-2xl text-primary-600"></i>
                            </div>
                            <h3
                                class="text-xl font-bold mb-3 text-gray-800 dark:text-white group-hover:text-primary-600 transition-colors duration-300">
                                {{ $fTitle }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                {{ $fDesc }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- modules Section --}}
    @if (!empty($modulesSection) && $modulesSection->modules->count() > 0)
        <section id="modules"
            class="section relative overflow-hidden bg-gray-50 from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 py-20"
            @if ($modulesSection->background_image) style="background-image: url('{{ asset('storage/' . $modulesSection->background_image) }}'); background-size: cover; background-position: center;" @endif>

            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-10 -left-10 w-72 h-72 bg-primary-500/5 rounded-full blur-3xl animate-pulse">
                </div>
                <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-primary-600/5 rounded-full blur-3xl animate-pulse"
                    style="animation-delay: 2s;"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-primary-400/3 rounded-full blur-2xl">
                </div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="text-center mb-16 fade-in-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
                        {{ $modulesSection->{"title_{$locale}"} ?? $modulesSection->title_en }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto text-lg">
                        {{ $modulesSection->{"subtitle_{$locale}"} ?? ($modulesSection->subtitle_en ?? ($modulesSection->{"description_{$locale}"} ?? $modulesSection->description_en)) }}
                    </p>
                </div>

                <div class="modules-scroll-container">
                    <div class="modules-scroll-wrapper">
                        @foreach ($modulesSection->modules as $index => $module)
                            @php
                                $mTitle = $module->{"title_{$locale}"} ?? ($module->title_en ?? '');
                                $mDesc = $module->{"description_{$locale}"} ?? ($module->description_en ?? '');
                                $mIcon = $module->icon ?? 'fas fa-cube';
                                $mColor = $module->color ?? 'from-blue-500 to-blue-600';
                            @endphp

                            <div class="module-card group bg-white dark:bg-gray-800">
                                <div class="module-card-inner">
                                    <div class="module-gradient {{ $mColor }}"></div>
                                    <div class="module-content">
                                        <div class="module-icon-container">
                                            <div class="module-icon-bg {{ $mColor }}"></div>
                                            <i class="{{ $mIcon }} modules-icons"></i>
                                        </div>
                                        <h3 class="module-title">{{ $mTitle }}</h3>
                                        <p class="module-desc">{{ $mDesc }}</p>
                                        <div class="module-actions">
                                            <button class="module-btn">
                                                <span>{{ __('erp.explore_module') }}</span>
                                                <i class="fas fa-arrow-right ml-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-center mt-8 space-x-2">
                    <button class="module-nav-btn module-nav-prev">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <div class="module-indicators flex space-x-1">
                        @foreach ($modulesSection->modules as $index)
                            <button class="module-indicator {{ $index === 0 ? 'active' : '' }}"
                                data-index="{{ $index }}">
                            </button>
                        @endforeach
                    </div>
                    <button class="module-nav-btn module-nav-next">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <div class="mt-12 text-center">
                    <button
                        class="cta-medias-btn relative overflow-hidden bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 hover:from-indigo-700 hover:to-purple-700 hover:shadow-2xl hover:scale-105 transform group">
                        <span class="relative z-10 flex items-center justify-center">
                            <i class="fas fa-play-circle ml-2 mr-3"></i>
                            {{ __('erp.view_all_modules') }}
                            <i
                                class="fas fa-arrow-right ml-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </span>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-300">
                        </div>
                    </button>
                </div>
            </div>
        </section>
    @endif

    {{-- technologies Section --}}
    @if (!empty($technologiesSection) && $technologiesSection->technologies->count() > 0)
        <section id="technologies"
            class="section bg-gray-50 from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 py-20 relative overflow-hidden"
            @if ($technologiesSection->background_image) style="background-image: url('{{ asset('storage/' . $technologiesSection->background_image) }}'); background-size: cover; background-position: center;" @endif>

            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-10 -left-10 w-72 h-72 bg-primary-500/5 rounded-full blur-3xl animate-pulse">
                </div>
                <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-primary-600/5 rounded-full blur-3xl animate-pulse"
                    style="animation-delay: 2s;"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-primary-400/3 rounded-full blur-2xl">
                </div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="text-center mb-16 fade-in-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
                        {{ $technologiesSection->{"title_{$locale}"} ?? $technologiesSection->title_en }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto text-lg">
                        {{ $technologiesSection->{"subtitle_{$locale}"} ?? ($technologiesSection->subtitle_en ?? ($technologiesSection->{"description_{$locale}"} ?? $technologiesSection->description_en)) }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    {{-- الجزء الأيسر: أشرطة التقدم --}}
                    <div class="fade-in-up">
                        @foreach ($technologiesSection->technologies as $index => $tech)
                            @php
                                $techTitle = $tech->{"title_{$locale}"} ?? ($tech->title_en ?? '');
                                $techDesc = $tech->{"description_{$locale}"} ?? ($tech->description_en ?? '');
                                $techPercentage = $tech->percentage ?? 0;
                                $animationDelay = $index * 0.1;
                                // استبدال دالة getProgressBarColor بمنطق مباشر
                                $colorClass = 'bg-indigo-600';
                                if ($techPercentage >= 90) {
                                    $colorClass = 'bg-green-600';
                                } elseif ($techPercentage >= 80) {
                                    $colorClass = 'bg-blue-600';
                                } elseif ($techPercentage >= 70) {
                                    $colorClass = 'bg-indigo-600';
                                } elseif ($techPercentage >= 60) {
                                    $colorClass = 'bg-purple-600';
                                } else {
                                    $colorClass = 'bg-red-600';
                                }
                            @endphp

                            <div class="mb-8 fade-in-up" style="animation-delay: {{ $animationDelay }}s">
                                <div class="flex items-center justify-between mb-2 gap-4">
                                    <h3 class="text-xl font-bold text-gray-800 dark:text-white">{{ $techTitle }}</h3>
                                    <span class="text-indigo-600 font-bold">{{ $techPercentage }}%</span>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 text-sm mb-3">{{ $techDesc }}</p>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3 relative overflow-hidden">
                                    <div class="progress-bar h-3 rounded-full {{ $colorClass }}"
                                        data-percentage="{{ $techPercentage }}" style="width: 0%">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- الجزء الأيمن: بطاقات التقنيات --}}
                    <div class="fade-in-up" style="animation-delay: 0.2s">
                        <div class="bg-white dark:bg-gray-800 modern-card p-8 relative overflow-hidden">
                            {{-- تأثيرات خلفية --}}
                            <div
                                class="absolute top-0 right-0 w-32 h-32 bg-indigo-500/5 rounded-full -translate-y-16 translate-x-16">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 w-24 h-24 bg-green-500/5 rounded-full -translate-x-12 translate-y-12">
                            </div>

                            <h3 class="text-2xl font-bold mb-6 text-center text-gray-800 dark:text-white">
                                {{ $technologiesSection->{"name_{$locale}"} ?? ($technologiesSection->name_en ?? __('erp.used_technologies')) }}
                            </h3>

                            <div class="space-y-6 relative z-10">
                                @foreach ($technologiesSection->technologies as $index => $tech)
                                    @php
                                        $techTitle = $tech->{"title_{$locale}"} ?? ($tech->title_en ?? '');
                                        $techDesc = $tech->{"description_{$locale}"} ?? ($tech->description_en ?? '');
                                        $techIcon = $tech->icon ?? 'fas fa-cog';
                                        // استبدال دالة getIconColor بمصفوفة ألوان مباشرة
                                        $iconColors = [
                                            ['bg' => 'bg-indigo-100', 'text' => 'text-indigo-600'],
                                            ['bg' => 'bg-green-100', 'text' => 'text-green-600'],
                                            ['bg' => 'bg-purple-100', 'text' => 'text-purple-600'],
                                            ['bg' => 'bg-blue-100', 'text' => 'text-blue-600'],
                                            ['bg' => 'bg-red-100', 'text' => 'text-red-600'],
                                            ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-600'],
                                            ['bg' => 'bg-teal-100', 'text' => 'text-teal-600'],
                                            ['bg' => 'bg-pink-100', 'text' => 'text-pink-600'],
                                        ];
                                        $iconColor = $iconColors[$index % count($iconColors)];
                                    @endphp

                                    <div
                                        class="flex items-center gap-4 group hover:transform hover:scale-105 transition-all duration-300">
                                        <div
                                            class="w-12 h-12 {{ $iconColor['bg'] }} rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <i class="{{ $techIcon }} {{ $iconColor['text'] }} text-xl"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h4
                                                class="font-bold text-gray-800 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-300">
                                                {{ $techTitle }}
                                            </h4>
                                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                                                {{ $techDesc }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- تأثيرات إضافية --}}
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-indigo-500/10 to-purple-500/10 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10 blur-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- pricing Section --}}
    @if (!empty($pricingSection) && $pricingSection->pricingPlans->count() > 0)
        <section id="pricing"
            class="section bg-gray-50 from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 py-20 relative overflow-hidden"
            @if ($pricingSection->background_image) style="background-image: url('{{ asset('storage/' . $pricingSection->background_image) }}'); background-size: cover; background-position: center;" @endif>

            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-10 -left-10 w-72 h-72 bg-primary-500/5 rounded-full blur-3xl animate-pulse">
                </div>
                <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-primary-600/5 rounded-full blur-3xl animate-pulse"
                    style="animation-delay: 2s;"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-primary-400/3 rounded-full blur-2xl">
                </div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="text-center mb-16 fade-in-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
                        {{ $pricingSection->{"title_{$locale}"} ?? $pricingSection->title_en }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto text-lg">
                        {{ $pricingSection->{"subtitle_{$locale}"} ?? ($pricingSection->subtitle_en ?? ($pricingSection->{"description_{$locale}"} ?? $pricingSection->description_en)) }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                    @foreach ($pricingSection->pricingPlans as $index => $plan)
                        @php
                            $planName = $plan->{"name_{$locale}"} ?? ($plan->name_en ?? '');
                            $planDesc = $plan->{"description_{$locale}"} ?? ($plan->description_en ?? '');
                            $planPeriod = $plan->{"period_{$locale}"} ?? ($plan->period_en ?? __('erp.monthly'));
                            $animationDelay = $index * 0.1;
                            $isPopular = $plan->is_popular ?? false;
                        @endphp

                        <div class="modern-card p-8 text-center fade-in-up relative 
                                    @if ($isPopular) transform scale-105 border-2 border-indigo-500 @endif"
                            style="animation-delay: {{ $animationDelay }}s">

                            @if ($isPopular)
                                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                    <span
                                        class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                        {{ __('erp.most_popular') }}
                                    </span>
                                </div>
                            @endif

                            <h3 class="text-2xl font-bold mb-2 text-gray-800 dark:text-white">{{ $planName }}</h3>
                            <div class="text-gray-600 dark:text-gray-300 mb-6">{{ $planDesc }}</div>

                            <div class="mb-6">
                                <span class="text-4xl font-bold text-gray-800 dark:text-white">{{ $plan->price }}</span>
                                <span class="text-gray-600 dark:text-gray-300">{{ $plan->currency }} /
                                    {{ $planPeriod }}</span>
                            </div>

                            <ul class="space-y-4 mb-8 text-right">
                                @foreach ($plan->pricingplanfeatures as $feature)
                                    @php
                                        $featureText = $feature->{"feature_{$locale}"} ?? ($feature->feature_en ?? '');
                                    @endphp
                                    <li class="flex items-center justify-end">
                                        <span class="mr-2 text-gray-700 dark:text-gray-300">{{ $featureText }}</span>
                                        @if ($feature->is_available)
                                            <i class="fas fa-check text-green-500 text-lg"></i>
                                        @else
                                            <i class="fas fa-times text-red-400 text-lg"></i>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>

                            <button
                                class="w-full py-3 px-6 rounded-xl font-semibold transition-all duration-300 
                                        @if ($isPopular) bg-gradient-to-r from-indigo-600 to-purple-600 text-white hover:from-indigo-700 hover:to-purple-700 hover:shadow-2xl hover:scale-105 transform 
                                        @else 
                                            border-2 border-indigo-600 text-indigo-600 dark:text-indigo-400 hover:bg-indigo-600 hover:text-white dark:hover:text-white @endif">
                                {{ __('erp.choose_plan') }}
                            </button>

                            {{-- تأثيرات إضافية للخطة الشعبية --}}
                            @if ($isPopular)
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-2xl opacity-10 -z-10 blur-sm">
                                </div>
                                <div class="absolute top-4 right-4 w-3 h-3 bg-indigo-400 rounded-full animate-ping"></div>
                                <div class="absolute bottom-4 left-4 w-2 h-2 bg-purple-400 rounded-full animate-ping"
                                    style="animation-delay: 0.3s;"></div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- systems Section --}}
    @if (!empty($systemsSection))
        <section id="systems"
            class="section bg-gray-50 from-slate-50 to-gray-100 dark:from-gray-900 dark:to-slate-800 py-20 relative overflow-hidden"
            @if ($systemsSection->background_image) style="background-image: url('{{ asset('storage/' . $systemsSection->background_image) }}'); background-size: cover; background-position: center;" @endif>
            <div class="absolute inset-0 opacity-40">
                <div class="absolute top-10 left-10 w-32 h-32 bg-blue-500/10 rounded-full blur-3xl animate-float"></div>
                <div class="absolute top-1/3 right-20 w-24 h-24 bg-green-500/10 rounded-full blur-3xl animate-float"
                    style="animation-delay: 1s;"></div>
                <div class="absolute bottom-20 left-1/4 w-28 h-28 bg-purple-500/10 rounded-full blur-3xl animate-float"
                    style="animation-delay: 2s;"></div>
                <div class="absolute bottom-10 right-10 w-32 h-32 bg-orange-500/10 rounded-full blur-3xl animate-float"
                    style="animation-delay: 3s;"></div>
            </div>

            <div class="max-w-7xl mx-auto px-4 relative z-10">
                <div class="text-center mb-16 fade-in-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
                        {{ $systemsSection->{"title_{$locale}"} ?? $systemsSection->title_en }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto text-lg">
                        {{ $systemsSection->{"subtitle_{$locale}"} ?? ($systemsSection->subtitle_en ?? ($systemsSection->{"description_{$locale}"} ?? $systemsSection->description_en)) }}
                    </p>
                </div>

                {{-- عرض خلفية القسم إن وجدت --}}
                @if (!empty($systemsSection->background_image))
                    <div class="mb-10 text-center">
                        <img src="{{ asset('storage/' . $systemsSection->background_image) }}"
                            alt="{{ $systemsSection->{"title_{$locale}"} ?? 'section image' }}"
                            class="mx-auto rounded-lg shadow-lg w-full max-w-4xl object-cover">
                    </div>
                @endif

                <div class="systems-pyramid relative h-[600px] md:h-[700px] flex items-center justify-center">
                    @foreach ($systemsSection->systems as $index => $sys)
                        @php
                            $sTitle = $sys->{"title_{$locale}"} ?? ($sys->title_en ?? '');
                            $sDesc = $sys->{"description_{$locale}"} ?? ($sys->description_en ?? '');
                            $sIcon = $sys->icon ?? 'fas fa-cog';
                            $sColor = $sys->color ?? 'from-blue-500 to-cyan-600';
                            $level =
                                $sys->level ?? ($loop->index == 0 ? 'top' : ($loop->index <= 2 ? 'middle' : 'base'));
                        @endphp

                        <div class="system-tier absolute left-1/2 transform -translate-x-1/2 transition-all duration-700 ease-out group"
                            data-tier="{{ $level }}" style="/* JS/CSS سيحدد المواقع */">
                            <div
                                class="system-card relative bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-2xl border border-gray-200 dark:border-gray-700 transition-all duration-500 group-hover:scale-110 group-hover:shadow-3xl group-hover:z-30 cursor-pointer">
                                <div
                                    class="absolute -top-3 -right-3 w-6 h-6 bg-gradient-to-r {{ $sColor }} rounded-full flex items-center justify-center">
                                    <i class="fas fa-plus text-white text-xs"></i>
                                </div>

                                <div class="system-icon mb-4 relative">
                                    <div
                                        class="w-16 h-16 bg-gradient-to-br {{ $sColor }} rounded-2xl flex items-center justify-center text-white shadow-lg mx-auto transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-500">
                                        <i class="{{ $sIcon }} text-xl"></i>
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-br {{ $sColor }} rounded-2xl opacity-0 group-hover:opacity-20 blur-md transition-opacity duration-500 -z-10">
                                    </div>
                                </div>

                                <h3
                                    class="text-lg font-bold text-gray-800 dark:text-white mb-3 text-center transition-all duration-300">
                                    {{ $sTitle }}
                                </h3>

                                <p
                                    class="text-gray-600 dark:text-gray-300 text-sm text-center leading-relaxed opacity-0 group-hover:opacity-100 transform group-hover:translate-y-0 translate-y-4 transition-all duration-500">
                                    {{ $sDesc }}
                                </p>

                                <div
                                    class="system-connector absolute left-1/2 transform -translate-x-1/2 w-0.5 bg-gradient-to-b {{ $sColor }} opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>

                                <div
                                    class="absolute -inset-2 rounded-2xl bg-gradient-to-r {{ $sColor }} opacity-0 group-hover:opacity-10 transition-opacity duration-500 -z-10">
                                </div>
                            </div>

                            {{-- Popup (يظهر عند hover) --}}
                            <div
                                class="system-popup absolute left-1/2 transform -translate-x-1/2 mt-4 bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-2xl w-80 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:mt-6 transition-all duration-500 z-40 border border-gray-200 dark:border-gray-700">
                                <div
                                    class="absolute bottom-full left-1/2 transform -translate-x-1/2 border-8 border-transparent border-b-white dark:border-b-gray-800">
                                </div>
                                <div class="text-center">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br {{ $sColor }} rounded-xl flex items-center justify-center text-white mb-4 mx-auto">
                                        <i class="{{ $sIcon }}"></i>
                                    </div>
                                    <h4 class="text-lg font-bold text-gray-800 dark:text-white mb-3">{{ $sTitle }}
                                    </h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 leading-relaxed">
                                        {{ $sDesc }}
                                    </p>

                                    @if (method_exists($sys, 'features') && $sys->relationLoaded('features'))
                                        <div class="system-features space-y-2 text-left">
                                            @foreach ($sys->features as $feature)
                                                <div class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                                    <span>{{ $feature->{"title_{$locale}"} ?? ($feature->title_en ?? '') }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    <button
                                        class="system-action-btn w-full mt-4 py-2 px-4 bg-gradient-to-r {{ $sColor }} text-white rounded-lg font-semibold text-sm transition-all duration-300 hover:shadow-lg hover:scale-105 transform">
                                        {{ __('erp.learn_more') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- جزء ال progress --}}
                <div class="systems-progress mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        @foreach ($systemsSection->systems->take(4) as $sysProgress)
                            <div
                                class="progress-item bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all duration-300">
                                <div class="flex items-center justify-between mb-3">
                                    <span
                                        class="text-sm font-semibold text-gray-700 dark:text-gray-300">{{ $sysProgress->{"title_{$locale}"} ?? $sysProgress->title_en }}</span>
                                    <span
                                        class="text-lg font-bold text-gray-800 dark:text-white">{{ $sysProgress->progress ?? 80 }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                                    <div class="h-3 rounded-full {{ $sysProgress->color ?? 'bg-gradient-to-r from-blue-500 to-cyan-600' }} transition-all duration-1000 ease-out progress-bar"
                                        data-progress="{{ $sysProgress->progress ?? 80 }}"></div>
                                </div>
                                <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400 mt-2">
                                    <span>{{ __('erp.performance') }}</span>
                                    <span>{{ __('erp.optimized') }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- CTA --}}
                <div class="systems-cta mt-12 text-center">
                    <div
                        class="bg-gradient-to-r from-slate-800 to-gray-900 dark:from-gray-800 dark:to-slate-900 rounded-3xl p-8 md:p-12 text-white relative overflow-hidden">
                        <div class="absolute inset-0 opacity-10">
                            <div class="absolute top-0 left-0 w-32 h-32 bg-white rounded-full blur-3xl animate-pulse">
                            </div>
                            <div class="absolute bottom-0 right-0 w-40 h-40 bg-blue-400 rounded-full blur-3xl animate-pulse"
                                style="animation-delay: 2s;"></div>
                        </div>

                        <div class="relative z-10">
                            <h3 class="text-2xl md:text-3xl font-bold mb-4">
                                {{ $systemsSection->{"name_{$locale}"} ?? ($systemsSection->name_en ?? __('erp.systems_cta_title')) }}
                            </h3>
                            <p class="text-gray-300 mb-6 max-w-2xl mx-auto">
                                {{ $systemsSection->{"subtitle_{$locale}"} ?? ($systemsSection->subtitle_en ?? __('erp.systems_cta_desc')) }}
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <button
                                    class="bg-white text-gray-900 px-8 py-3 rounded-xl font-semibold hover:shadow-2xl transition-all duration-300 hover:scale-105 transform">
                                    <i class="fas fa-play-circle mr-2"></i>
                                    {{ __('erp.view_demo') }}
                                </button>
                                <button
                                    class="border-2 border-white text-white px-8 py-3 rounded-xl font-semibold hover:bg-white hover:text-gray-900 transition-all duration-300">
                                    <i class="fas fa-download mr-2"></i>
                                    {{ __('erp.download_guide') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endif

    {{-- Media Services Section --}}
    @if (!empty($mediaSection) && $mediaSection->mediaServices->count() > 0)
        <section id="media"
            class="section bg-gray-50 from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 py-20 relative overflow-hidden"
            @if ($mediaSection->background_image) style="background-image: url('{{ asset('storage/' . $mediaSection->background_image) }}'); background-size: cover; background-position: center;" @endif>

            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-10 -left-10 w-72 h-72 bg-primary-500/5 rounded-full blur-3xl animate-pulse">
                </div>
                <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-primary-600/5 rounded-full blur-3xl animate-pulse"
                    style="animation-delay: 2s;"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-primary-400/3 rounded-full blur-2xl">
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 relative z-10">
                <div class="text-center mb-16 fade-in-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
                        {{ $mediaSection->{"title_{$locale}"} ?? $mediaSection->title_en }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto text-lg">
                        {{ $mediaSection->{"subtitle_{$locale}"} ?? ($mediaSection->subtitle_en ?? ($mediaSection->{"description_{$locale}"} ?? $mediaSection->description_en)) }}
                    </p>
                </div>

                <div class="relative">
                    <div class="absolute inset-0 hidden lg:block">
                        <svg class="w-full h-full" viewBox="0 0 1000 600" fill="none">
                            <path id="connection-1" d="M200,150 L400,150 L400,450" stroke="url(#gradient1)"
                                stroke-width="2" stroke-dasharray="8 4" class="animate-pulse" />
                            <path id="connection-2" d="M500,150 L300,150 L300,450" stroke="url(#gradient2)"
                                stroke-width="2" stroke-dasharray="8 4" class="animate-pulse"
                                style="animation-delay: 1s" />
                            <path id="connection-3" d="M800,150 L600,150 L600,450" stroke="url(#gradient3)"
                                stroke-width="2" stroke-dasharray="8 4" class="animate-pulse"
                                style="animation-delay: 2s" />
                            <defs>
                                <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%"
                                    y2="0%">
                                    <stop offset="0%" stop-color="#6366f1" stop-opacity="0.6" />
                                    <stop offset="100%" stop-color="#8b5cf6" stop-opacity="0.6" />
                                </linearGradient>
                                <linearGradient id="gradient2" x1="0%" y1="0%" x2="100%"
                                    y2="0%">
                                    <stop offset="0%" stop-color="#10b981" stop-opacity="0.6" />
                                    <stop offset="100%" stop-color="#059669" stop-opacity="0.6" />
                                </linearGradient>
                                <linearGradient id="gradient3" x1="0%" y1="0%" x2="100%"
                                    y2="0%">
                                    <stop offset="0%" stop-color="#f59e0b" stop-opacity="0.6" />
                                    <stop offset="100%" stop-color="#d97706" stop-opacity="0.6" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 relative z-10">
                        @foreach ($mediaSection->mediaServices as $index => $service)
                            @php
                                $sTitle = $service->{"title_{$locale}"} ?? ($service->title_en ?? '');
                                $sDesc = $service->{"description_{$locale}"} ?? ($service->description_en ?? '');
                                $sIcon = $service->icon ?? 'fas fa-cog';
                                $sColor = $service->color ?? 'from-blue-500 to-purple-600';
                                $sBgColor = $service->background_color ?? 'blue';
                            @endphp

                            <div class="media-interactive-card group" data-media-index="{{ $index }}">
                                <div class="h-2 bg-gradient-to-r {{ $sColor }} rounded-t-2xl"></div>

                                <div
                                    class="bg-white dark:bg-gray-800 p-6 rounded-b-2xl border border-gray-200 dark:border-gray-700 transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-3">
                                    <div class="flex items-start justify-between mb-4">
                                        <div
                                            class="media-icon-container p-3 rounded-xl bg-gradient-to-br {{ $sColor }} text-white transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                                            <i class="{{ $sIcon }} text-xl"></i>
                                        </div>
                                        <span
                                            class="media-badge px-3 py-1 rounded-full text-xs font-medium bg-{{ $sBgColor }}-100 text-{{ $sBgColor }}-800 dark:bg-{{ $sBgColor }}-900 dark:text-{{ $sBgColor }}-200">
                                            {{ __('erp.service') }}
                                        </span>
                                    </div>
                                    <h3
                                        class="text-xl font-bold mb-3 text-gray-800 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white transition-colors">
                                        {{ $sTitle }}
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                                        {{ $sDesc }}
                                    </p>
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                            <span
                                                class="text-sm text-gray-500 dark:text-gray-400">{{ __('erp.active') }}</span>
                                        </div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">
                                            <i class="fas fa-clock mr-1"></i>
                                            {{ __('erp.real_time') }}
                                        </div>
                                    </div>
                                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 mb-6">
                                        <div class="h-2 rounded-full bg-gradient-to-r {{ $sColor }} transition-all duration-1000"
                                            style="width: {{ rand(80, 95) }}%">
                                        </div>
                                    </div>
                                    <button
                                        class="media-explore-btn w-full py-3 px-4 bg-transparent border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-xl font-semibold transition-all duration-300 group-hover:border-transparent group-hover:bg-gradient-to-r {{ $sColor }} group-hover:text-white group-hover:shadow-lg transform group-hover:scale-105">
                                        <span class="flex items-center justify-center">
                                            {{ __('erp.explore_service') }}
                                            <i
                                                class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                                        </span>
                                    </button>
                                    <div
                                        class="media-sparkle absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                                        <div
                                            class="absolute top-2 right-2 w-3 h-3 bg-white rounded-full opacity-60 animate-ping">
                                        </div>
                                        <div
                                            class="absolute bottom-2 left-2 w-2 h-2 bg-white rounded-full opacity-40 animate-pulse">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="text-center mt-12">
                    <button
                        class="cta-medias-btn relative overflow-hidden bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 hover:from-indigo-700 hover:to-purple-700 hover:shadow-2xl hover:scale-105 transform group">
                        <span class="relative z-10 flex items-center justify-center">
                            <i class="fas fa-play-circle ml-2 mr-3"></i>
                            {{ __('erp.view_all_services') }}
                            <i
                                class="fas fa-arrow-right ml-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </span>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-300">
                        </div>
                    </button>
                </div>
            </div>
        </section>
    @endif

    {{-- Partners Section --}}
    @if (!empty($partnersSection) && $partnersSection->partners->count() > 0)
        <section id="partners"
            class="section bg-gray-50 from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 py-20 relative overflow-hidden"
            @if ($partnersSection->background_image) style="background-image: url('{{ asset('storage/' . $partnersSection->background_image) }}'); background-size: cover; background-position: center;" @endif>

            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-10 -left-10 w-72 h-72 bg-primary-500/5 rounded-full blur-3xl animate-pulse">
                </div>
                <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-primary-600/5 rounded-full blur-3xl animate-pulse"
                    style="animation-delay: 2s;"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-primary-400/3 rounded-full blur-2xl">
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 relative z-10">
                <div class="text-center mb-16 fade-in-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
                        {{ $partnersSection->{"title_{$locale}"} ?? $partnersSection->title_en }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto text-lg">
                        {{ $partnersSection->{"subtitle_{$locale}"} ?? ($partnersSection->subtitle_en ?? ($partnersSection->{"description_{$locale}"} ?? $partnersSection->description_en)) }}
                    </p>
                </div>

                <div class="relative">
                    <div
                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-32 h-32 md:w-40 md:h-40 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center shadow-2xl">
                        <div class="text-center text-white">
                            <i class="fas fa-handshake text-xl md:text-2xl mb-1"></i>
                            <div class="text-xs md:text-sm font-bold">
                                {{ $partnersSection->{"name_{$locale}"} ?? ($partnersSection->name_en ?? __('erp.our_partners')) }}
                            </div>
                        </div>
                    </div>

                    <div class="partners-circle relative h-96 md:h-[500px]">
                        {{-- loop على الشركاء المرتبطين بالقسم --}}
                        @foreach ($partnersSection->partners as $index => $partner)
                            @php
                                $pName = $partner->{"name_{$locale}"} ?? ($partner->name_en ?? '');
                                $pSector = $partner->{"sector_{$locale}"} ?? ($partner->sector_en ?? '');
                                $pIcon = $partner->icon ?? 'fas fa-handshake';
                                $pColor = $partner->color ?? 'from-indigo-500 to-purple-600';
                                $pYears = $partner->years ?? '5+';
                                $pRating = $partner->rating ?? 'A+';
                            @endphp

                            <div
                                class="partner-item absolute top-1/2 left-1/2 transform transition-all duration-700 ease-in-out hover:scale-110 group partner-item-{{ $loop->index }}">
                                <div
                                    class="partner-circle w-20 h-20 md:w-24 md:h-24 bg-gradient-to-br {{ $pColor }} rounded-full flex items-center justify-center text-white shadow-2xl cursor-pointer transition-all duration-500 group-hover:shadow-3xl relative overflow-hidden">
                                    {{-- عرض الأيقونة فقط من حقل icon --}}
                                    <i
                                        class="{{ $pIcon }} text-xl md:text-2xl transition-transform duration-300 group-hover:scale-110"></i>
                                    <div
                                        class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity duration-300 rounded-full">
                                    </div>
                                    <div
                                        class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-white rounded-full animate-ping">
                                        </div>
                                        <div class="absolute bottom-1/4 right-1/4 w-1 h-1 bg-white rounded-full animate-ping"
                                            style="animation-delay: 0.3s;"></div>
                                    </div>
                                </div>

                                <div
                                    class="partner-card absolute top-full left-1/2 transform -translate-x-1/2 mt-6 w-64 bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-500 group-hover:mt-4 z-30 border border-gray-200 dark:border-gray-700">
                                    <div
                                        class="absolute bottom-full left-1/2 transform -translate-x-1/2 border-8 border-transparent border-b-white dark:border-b-gray-800">
                                    </div>
                                    <div class="text-center">
                                        {{-- عرض الأيقونة فقط في البطاقة أيضا --}}
                                        <div
                                            class="w-12 h-12 bg-gradient-to-br {{ $pColor }} rounded-xl flex items-center justify-center text-white mb-4 mx-auto">
                                            <i class="{{ $pIcon }}"></i>
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                                            {{ $pName }}
                                        </h3>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                                            {{ __('erp.partner_sector') }}: {{ $pSector }}
                                        </p>

                                        <div class="partner-stats flex justify-center space-x-4 text-xs">
                                            <div class="stat-item">
                                                <div class="font-bold text-gray-800 dark:text-white">{{ $pYears }}
                                                </div>
                                                <div class="text-gray-500 dark:text-gray-400">{{ __('erp.years') }}</div>
                                            </div>
                                            <div class="stat-item">
                                                <div class="font-bold text-gray-800 dark:text-white">{{ $pRating }}
                                                </div>
                                                <div class="text-gray-500 dark:text-gray-400">{{ __('erp.rating') }}
                                                </div>
                                            </div>
                                        </div>

                                        <button
                                            class="partner-action-btn w-full mt-4 py-2 px-4 bg-gradient-to-r {{ $pColor }} text-white rounded-lg font-semibold text-sm transition-all duration-300 hover:shadow-lg hover:scale-105 transform">
                                            {{ __('erp.view_profile') }}
                                        </button>
                                    </div>
                                    <div
                                        class="absolute -inset-1 bg-gradient-to-r {{ $pColor }} rounded-2xl opacity-0 group-hover:opacity-10 -z-10 transition-opacity duration-500 blur-sm">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="absolute inset-0 pointer-events-none">
                        <svg class="w-full h-full" viewBox="0 0 100 100">
                            @foreach ($partnersSection->partners as $index => $partner)
                                @php
                                    $angle = $index * (360 / $partnersSection->partners->count());
                                @endphp
                                <line x1="50" y1="50" x2="{{ 50 + 35 * cos(deg2rad($angle)) }}"
                                    y2="{{ 50 + 35 * sin(deg2rad($angle)) }}"
                                    stroke="url(#partnerGradient{{ $index }})" stroke-width="0.3"
                                    stroke-dasharray="2 2" class="animate-dash">
                                    <animate attributeName="stroke-dashoffset" from="10" to="0"
                                        dur="3s" repeatCount="indefinite" />
                                </line>
                            @endforeach
                            <defs>
                                @foreach ($partnersSection->partners as $index => $partner)
                                    @php
                                        $pColor = $partner->color ?? 'from-indigo-500 to-purple-600';
                                        // استخراج الألوان من التدرج
                                        $colors = [
                                            'from-indigo-500 to-purple-600' => ['#3b82f6', '#8b5cf6'],
                                            'from-green-500 to-green-600' => ['#10b981', '#059669'],
                                            'from-blue-500 to-blue-700' => ['#3b82f6', '#1d4ed8'],
                                            'from-orange-500 to-amber-600' => ['#f59e0b', '#d97706'],
                                            'from-gray-500 to-gray-700' => ['#6b7280', '#374151'],
                                            'from-blue-600 to-indigo-700' => ['#2563eb', '#3730a3'],
                                            'from-blue-700 to-blue-900' => ['#1d4ed8', '#1e3a8a'],
                                            'from-red-500 to-red-700' => ['#ef4444', '#dc2626'],
                                            'from-blue-400 to-blue-600' => ['#60a5fa', '#2563eb'],
                                        ];
                                        $gradientColors = $colors[$pColor] ?? ['#3b82f6', '#8b5cf6'];
                                    @endphp
                                    <linearGradient id="partnerGradient{{ $index }}" x1="0%"
                                        y1="0%" x2="100%" y2="0%">
                                        <stop offset="0%" stop-color="{{ $gradientColors[0] }}"
                                            stop-opacity="0.4" />
                                        <stop offset="100%" stop-color="{{ $gradientColors[1] }}"
                                            stop-opacity="0.2" />
                                    </linearGradient>
                                @endforeach
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Strategy Section --}}
    @if (!empty($strategySection) && $strategySection->strategyItems->count() > 0)
        <section id="strategy"
            class="section bg-gray-50 from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 py-20 relative overflow-hidden"
            @if ($strategySection->background_image) style="background-image: url('{{ asset('storage/' . $strategySection->background_image) }}'); background-size: cover; background-position: center;" @endif>

            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-10 -left-10 w-72 h-72 bg-primary-500/5 rounded-full blur-3xl animate-pulse">
                </div>
                <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-primary-600/5 rounded-full blur-3xl animate-pulse"
                    style="animation-delay: 2s;"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-primary-400/3 rounded-full blur-2xl">
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 relative z-10">
                <div class="text-center mb-16 fade-in-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
                        {{ $strategySection->{"title_{$locale}"} ?? $strategySection->title_en }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto text-lg">
                        {{ $strategySection->{"subtitle_{$locale}"} ?? ($strategySection->subtitle_en ?? ($strategySection->{"description_{$locale}"} ?? $strategySection->description_en)) }}
                    </p>
                </div>

                <div class="strategy-tree relative">
                    <div
                        class="tree-trunk absolute left-1/2 top-0 bottom-0 w-2 bg-gradient-to-b from-indigo-500 to-purple-600 transform -translate-x-1/2 z-10 rounded-full">
                    </div>

                    <div class="relative z-20">
                        @foreach ($strategySection->strategyItems as $index => $item)
                            @php
                                $itemTitle = $item->{"title_{$locale}"} ?? ($item->title_en ?? '');
                                $itemDesc = $item->{"description_{$locale}"} ?? ($item->description_en ?? '');
                                $itemIcon = $item->icon ?? 'fas fa-cog';
                                $itemPosition = $item->position ?? ($index % 2 == 0 ? 'left' : 'right');
                                $itemLevel = $item->level ?? 'middle';
                                $itemColor = $item->color ?? 'from-indigo-500 to-purple-600';
                                $itemProgress = $item->progress ?? 80;
                            @endphp

                            <div class="strategy-item strategy-{{ $itemLevel }} strategy-{{ $itemPosition }} mb-12 group"
                                data-level="{{ $itemLevel }}" data-position="{{ $itemPosition }}">
                                <div
                                    class="tree-branch absolute w-48 h-1 bg-gradient-to-r {{ $itemPosition == 'left' ? 'from-purple-500 to-indigo-500 right-0' : 'from-blue-500 to-cyan-500 left-0' }} transform {{ $itemPosition == 'left' ? 'translate-x-48' : '-translate-x-48' }} z-10 rounded-full">
                                </div>

                                <div
                                    class="strategy-card relative bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-2xl border border-gray-200 dark:border-gray-700 transition-all duration-500 group-hover:shadow-3xl group-hover:-translate-y-2 max-w-md {{ $itemPosition == 'left' ? 'mr-auto' : 'ml-auto' }}">

                                    <div
                                        class="strategy-marker absolute top-1/2 transform -translate-y-1/2 {{ $itemPosition == 'left' ? '-right-6' : '-left-6' }} w-12 h-12 bg-gradient-to-br {{ $itemColor }} rounded-full flex items-center justify-center text-white shadow-lg z-20 group-hover:scale-110 transition-transform duration-300">
                                        <i class="{{ $itemIcon }} text-lg"></i>
                                    </div>
                                    <div class="strategy-icon mb-6">
                                        <div
                                            class="w-20 h-20 bg-gradient-to-br {{ $itemColor }} rounded-2xl flex items-center justify-center text-white shadow-lg mx-auto transform group-hover:scale-110 group-hover:rotate-5 transition-all duration-500">
                                            <i class="{{ $itemIcon }} text-2xl"></i>
                                        </div>
                                    </div>
                                    <h3
                                        class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r {{ $itemColor }} transition-all duration-300">
                                        {{ $itemTitle }}
                                    </h3>

                                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6 text-center">
                                        {{ $itemDesc }}
                                    </p>
                                    <div class="strategy-features space-y-3">
                                        @foreach ($item->strategyfeatures as $feature)
                                            <div
                                                class="flex items-center text-sm text-gray-600 dark:text-gray-400 group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors">
                                                <div
                                                    class="w-2 h-2 bg-gradient-to-r {{ $itemColor }} rounded-full mr-3 group-hover:scale-150 transition-transform duration-300">
                                                </div>
                                                <span>{{ $feature->feature }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div
                                        class="absolute -inset-2 rounded-2xl bg-gradient-to-r {{ $itemColor }} opacity-0 group-hover:opacity-5 transition-opacity duration-500 -z-10">
                                    </div>
                                    <div
                                        class="absolute top-2 right-2 w-3 h-3 bg-gradient-to-r {{ $itemColor }} rounded-full opacity-0 group-hover:opacity-100 animate-ping transition-opacity duration-500">
                                    </div>
                                </div>
                                <div
                                    class="strategy-popup absolute top-1/2 transform -translate-y-1/2 {{ $itemPosition == 'left' ? 'right-full mr-8' : 'left-full ml-8' }} bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-2xl w-80 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-500 z-30 border border-gray-200 dark:border-gray-700">

                                    <div
                                        class="absolute top-1/2 transform -translate-y-1/2 {{ $itemPosition == 'left' ? 'right-0 translate-x-1/2 border-8 border-transparent border-l-white dark:border-l-gray-800' : 'left-0 -translate-x-1/2 border-8 border-transparent border-r-white dark:border-r-gray-800' }}">
                                    </div>

                                    <div class="text-center">
                                        <div
                                            class="w-12 h-12 bg-gradient-to-br {{ $itemColor }} rounded-xl flex items-center justify-center text-white mb-4 mx-auto">
                                            <i class="{{ $itemIcon }}"></i>
                                        </div>

                                        <h4 class="text-lg font-bold text-gray-800 dark:text-white mb-3">
                                            {{ $itemTitle }}</h4>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 leading-relaxed">
                                            {{ $itemDesc }}
                                        </p>

                                        <div
                                            class="progress-indicators flex justify-between text-xs text-gray-500 dark:text-gray-400 mb-4">
                                            <span>{{ __('erp.strategy_progress') }}</span>
                                            <span
                                                class="font-bold text-gray-700 dark:text-gray-300">{{ $itemProgress }}%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 mb-4">
                                            <div class="h-2 rounded-full bg-gradient-to-r {{ $itemColor }} transition-all duration-1000"
                                                style="width: {{ $itemProgress }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="tree-roots absolute bottom-0 left-1/2 transform -translate-x-1/2 flex space-x-4">
                        @foreach (['from-indigo-400 to-purple-500', 'from-blue-400 to-cyan-500', 'from-green-400 to-emerald-500'] as $rootColor)
                            <div class="w-8 h-16 bg-gradient-to-b {{ $rootColor }} rounded-t-full opacity-60"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Stats Section --}}
    <section id="stats" class="section bg-primary-800">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">{{ __('erp.stats_title') }}</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ([['icon' => 'fas fa-briefcase', 'value' => '500+', 'label' => 'stats_projects'], ['icon' => 'fas fa-users', 'value' => '50+', 'label' => 'stats_partners'], ['icon' => 'fas fa-heart', 'value' => '100+', 'label' => 'stats_clients'], ['icon' => 'fas fa-award', 'value' => '5+', 'label' => 'stats_experience']] as $st)
                    <div class="stat-card">
                        <div class="mb-3">
                            <i class="{{ $st['icon'] }} text-3xl"></i>
                        </div>
                        <div class="text-2xl font-bold">{{ $st['value'] }}</div>
                        <div class="mt-1">{{ __('erp.' . $st['label']) }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Contact Section --}}
    @if (!empty($contactSection) && $contactSection->contactInfo)
        <section id="contact"
            class="section bg-gray-50 from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 py-20 relative overflow-hidden"
            @if ($contactSection->background_image) style="background-image: url('{{ asset('storage/' . $contactSection->background_image) }}'); background-size: cover; background-position: center;" @endif>

            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-10 -left-10 w-72 h-72 bg-primary-500/5 rounded-full blur-3xl animate-pulse">
                </div>
                <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-primary-600/5 rounded-full blur-3xl animate-pulse"
                    style="animation-delay: 2s;"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-primary-400/3 rounded-full blur-2xl">
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 relative z-10">
                <div class="text-center mb-16 fade-in-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
                        {{ $contactSection->{"title_{$locale}"} ?? $contactSection->title_en }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto text-lg">
                        {{ $contactSection->{"subtitle_{$locale}"} ?? ($contactSection->subtitle_en ?? ($contactSection->{"description_{$locale}"} ?? $contactSection->description_en)) }}
                    </p>
                </div>

                <div class="max-w-4xl mx-auto modern-card p-8 md:p-12">
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label
                                    class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">{{ __('erp.full_name') }}</label>
                                <input type="text"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-600 focus:border-indigo-500 outline-none transition bg-white dark:bg-gray-800 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400">
                            </div>

                            <div>
                                <label
                                    class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">{{ __('erp.email') }}</label>
                                <input type="email"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-600 focus:border-indigo-500 outline-none transition bg-white dark:bg-gray-800 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400">
                            </div>
                        </div>
                        <div>
                            <label
                                class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">{{ __('erp.subject') }}</label>
                            <input type="text"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-600 focus:border-indigo-500 outline-none transition bg-white dark:bg-gray-800 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400">
                        </div>

                        <div>
                            <label
                                class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">{{ __('erp.message') }}</label>
                            <textarea rows="5"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-600 focus:border-indigo-500 outline-none transition bg-white dark:bg-gray-800 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 resize-none"></textarea>
                        </div>
                        <button type="submit"
                            class="btn-modern w-full hover:scale-105 transition-transform duration-200">
                            <i class="fas fa-paper-plane ml-2 mr-3"></i>
                            {{ __('erp.send_message') }}
                        </button>
                    </form>
                    <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-700">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mb-3">
                                    <i class="fas fa-phone text-indigo-600 dark:text-indigo-400"></i>
                                </div>
                                <h3 class="font-semibold text-gray-800 dark:text-white mb-1">{{ __('erp.phone') }}</h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $contactSection->contactInfo->phone ?? '' }}</p>
                            </div>

                            <div class="flex flex-col items-center">
                                <div
                                    class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mb-3">
                                    <i class="fas fa-envelope text-indigo-600 dark:text-indigo-400"></i>
                                </div>
                                <h3 class="font-semibold text-gray-800 dark:text-white mb-1">{{ __('erp.email') }}</h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $contactSection->contactInfo->email ?? '' }}</p>
                            </div>

                            <div class="flex flex-col items-center">
                                <div
                                    class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mb-3">
                                    <i class="fas fa-map-marker-alt text-indigo-600 dark:text-indigo-400"></i>
                                </div>
                                <h3 class="font-semibold text-gray-800 dark:text-white mb-1">{{ __('erp.location') }}
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $contactSection->contactInfo->address ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
