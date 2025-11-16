<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sections;
use App\Models\Features;
use App\Models\Modules;
use App\Models\Technologies;
use App\Models\Partners;
use App\Models\StrategyItems;
use App\Models\ContactInfos;
use App\Models\MediaServices;
use App\Models\AboutSections;  
use Illuminate\Support\Facades\App;

class ERPController extends Controller
{
    public function index()
    { 
        $locale = session('locale', App::getLocale());
        App::setLocale($locale);
 
        $aboutSection = Sections::where(function($q) {
                $q->where('name_en', 'about')
                  ->orWhere('title_en', 'about')
                  ->orWhere('section_type', 'about');
            })
            ->with(['aboutSection' => function($q) {
                $q->where('is_active', true);
            }])
            ->where('is_active', true)
            ->first();
 
        $featuresSection = Sections::where(function($q) {
                $q->where('name_en', 'features')
                  ->orWhere('title_en', 'features')
                  ->orWhere('section_type', 'features');
            })
            ->with(['features' => function($q) {
                $q->where('is_active', true)->orderBy('order');
            }])
            ->where('is_active', true)
            ->first();
 
        $modulesSection = Sections::where(function($q) {
                $q->where('name_en', 'modules')
                  ->orWhere('title_en', 'modules')
                  ->orWhere('section_type', 'modules');
            })
            ->with(['modules' => function($q) {
                $q->where('is_active', true)->orderBy('order');
            }])
            ->where('is_active', true)
            ->first();
 
        $technologiesSection = Sections::where(function($q) {
                $q->where('name_en', 'technologies')
                  ->orWhere('title_en', 'technologies')
                  ->orWhere('section_type', 'technologies');
            })
            ->with(['technologies' => function($q) {
                $q->where('is_active', true)->orderBy('order');
            }])
            ->where('is_active', true)
            ->first();
 
        $partnersSection = Sections::where(function($q) {
                $q->where('name_en', 'partners')
                  ->orWhere('title_en', 'partners')
                  ->orWhere('section_type', 'partners');
            })
            ->with(['partners' => function($q) {
                $q->where('is_active', true)->orderBy('order');
            }])
            ->where('is_active', true)
            ->first();
 
        $strategySection = Sections::where(function($q) {
                $q->where('name_en', 'strategy')
                  ->orWhere('title_en', 'strategy')
                  ->orWhere('section_type', 'strategy');
            })
            ->with(['strategyItems' => function($q) {
                $q->where('is_active', true)
                  ->orderBy('order')
                  ->with(['strategyfeatures' => function($f) {
                      $f->where('is_active', true)->orderBy('order');
                  }]);
            }])
            ->where('is_active', true)
            ->first();
 
        $contactSection = Sections::where(function($q) {
                $q->where('name_en', 'contact')
                  ->orWhere('title_en', 'contact')
                  ->orWhere('section_type', 'contact');
            })
            ->with(['contactInfo' => function($q) {
                $q->where('is_active', true);
            }])
            ->where('is_active', true)
            ->first();
 
        $mediaSection = Sections::where(function($q) {
                $q->where('name_en', 'media')
                  ->orWhere('title_en', 'media')
                  ->orWhere('section_type', 'media');
            })
            ->with(['mediaServices' => function($q) {
                $q->where('is_active', true)->orderBy('order');
            }])
            ->where('is_active', true)
            ->first();
 
        $sections = Sections::where('is_active', true)->get();
 
        $valuesSection = Sections::where(function($q) {
                $q->where('name_en', 'values')
                  ->orWhere('title_en', 'values')
                  ->orWhere('section_type', 'values');
            })
            ->with(['values' => function($q) {
                $q->where('is_active', true)->orderBy('order');
            }])
            ->where('is_active', true)
            ->first();
 
        $systemsSection = Sections::where(function($q) {
                $q->where('name_en', 'systems')
                  ->orWhere('title_en', 'systems')
                  ->orWhere('section_type', 'systems');
            })
            ->with(['systems' => function($q) {
                $q->where('is_active', true)->orderBy('order');
            }])
            ->where('is_active', true)
            ->first();
 
        $pricingSection = Sections::where(function($q) {
                $q->where('name_en', 'pricing')
                  ->orWhere('title_en', 'pricing')
                  ->orWhere('section_type', 'pricing');
            })
            ->with(['pricingPlans' => function($q) {
                $q->where('is_active', true)
                  ->orderBy('order')
                  ->with(['pricingplanfeatures' => function($f){
                      $f->where('is_available', true)->orderBy('order');
                  }]);
            }])
            ->where('is_active', true)
            ->first();
 
        return view('home', compact(
            'aboutSection',
            'featuresSection',
            'modulesSection',
            'technologiesSection',
            'partnersSection',
            'strategySection',
            'contactSection',
            'mediaSection',
            'sections',
            'locale',
            'valuesSection',
            'systemsSection',
            'pricingSection'
        ));
    }
    
    public function switchLang($locale)
    {
        if (!in_array($locale, ['en', 'ar'])) {
            return redirect('/');
        }

        session(['locale' => $locale]);

        $redirectUrl = request()->get('redirect', "/{$locale}");
        return redirect($redirectUrl);
    }
     
    private function getProgressBarColor($percentage)
    {
        if ($percentage >= 90) return 'bg-green-600';
        if ($percentage >= 80) return 'bg-blue-600';
        if ($percentage >= 70) return 'bg-indigo-600';
        if ($percentage >= 60) return 'bg-purple-600';
        return 'bg-red-600';
    }
 
    private function getIconColor($index)
    {
        $colors = [
            ['bg' => 'bg-indigo-100', 'text' => 'text-indigo-600'],
            ['bg' => 'bg-green-100', 'text' => 'text-green-600'],
            ['bg' => 'bg-purple-100', 'text' => 'text-purple-600'],
            ['bg' => 'bg-blue-100', 'text' => 'text-blue-600'],
            ['bg' => 'bg-red-100', 'text' => 'text-red-600'],
            ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-600'],
            ['bg' => 'bg-teal-100', 'text' => 'text-teal-600'],
            ['bg' => 'bg-pink-100', 'text' => 'text-pink-600'],
        ];
        
        return $colors[$index % count($colors)];
    }
}