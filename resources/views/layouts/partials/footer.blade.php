@php
    $currentLocale = $locale ?? 'en';
@endphp
  {{-- Footer --}}
  <footer class="footer py-12">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
      <div class="md:col-span-2">
        <div class="flex items-center mb-4">
          <div class="module-icon w-12 h-12 rounded-lg flex items-center justify-center mr-3">
            <span class="text-white font-bold text-lg">ERP</span>
          </div>
          <span class="text-2xl font-bold">{{ __('erp.hero_Name') }}</span>
        </div>
        <p class="text-gray-300 mb-4">{{ __('erp.hero_subtitle') }}</p>
        <div class="flex space-x-4">
          <a href="#"><i class="fab fa-facebook text-xl"></i></a>
          <a href="#"><i class="fab fa-twitter text-xl"></i></a>
          <a href="#"><i class="fab fa-linkedin text-xl"></i></a>
          <a href="#"><i class="fab fa-instagram text-xl"></i></a>
        </div>
      </div>
      <div>
        <h4 class="text-lg font-semibold mb-3">{{ __('erp.quick_links') }}</h4>
        <ul class="space-y-2">
          @foreach(['home','about','services','systems','partners','contact'] as $lnk)
            <li><a href="">{{ __('erp.' . $lnk) }}</a></li>
          @endforeach
        </ul>
      </div>
      <div>
        <h4 class="text-lg font-semibold mb-3">{{ __('erp.legal') }}</h4>
        <ul class="space-y-2">
          @foreach(['privacy','terms','support'] as $lnk)
            <li><a href="#">{{ __('erp.' . $lnk) }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="mt-8 border-t border-gray-700 pt-6 text-center">
      <p class="text-gray-400">{{ __('erp.copyright') }}</p>
    </div>
  </footer>