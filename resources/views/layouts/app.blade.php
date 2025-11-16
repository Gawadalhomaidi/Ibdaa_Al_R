<!DOCTYPE html>
<html lang="{{ $locale ?? 'en' }}" dir="{{ ($locale ?? 'en') == 'ar' ? 'rtl' : 'ltr' }}" class="{{ ($locale ?? 'en') == 'ar' ? 'font-arabic' : '' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ibdaa Al-Riyadah ERP System')</title>

    <!-- Fonts -->
    @if(($locale ?? 'en') == 'ar')
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    @endif

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    @stack('styles')
</head>
<body class="bg-gray-50 {{ ($locale ?? 'en') == 'ar' ? 'rtl' : 'ltr' }} {{ ($locale ?? 'en') == 'ar' ? 'font-arabic' : 'font-sans' }} antialiased">
    <!-- Header -->
    <header>
        @include('layouts.partials.header')
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    <!-- Footer -->
    <footer>
        @include('layouts.partials.footer')
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
</body>
</html>
