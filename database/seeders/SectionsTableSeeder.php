<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sections first
        $sections = $this->createSections();

        // Create features
        $this->createFeatures($sections);

        // Create modules
        $this->createModules($sections);

        // Create technologies
        $this->createTechnologies($sections);

        // Create pricing plans and their features
        $this->createPricingPlans($sections);

        // Create values
        $this->createValues($sections);
        
        // Create systems
        $this->createSystems($sections);
        
        // Create media services
        $this->createMediaServices($sections);
        
        // Create partners
        $this->createPartners($sections);
        
        // Create strategy items and their features
        $this->createStrategyItems($sections);
        
        // Create statistics
        $this->createStatistics($sections);
        
        // Create contact info
        $this->createContactInfo($sections);
        
        // Create about section
        $this->createAboutSection($sections);
    }
    
    /**
     * Create sections
     */
    private function createSections()
    {
        $sectionsData = [
            [
                'name_ar' => 'القسم الرئيسي',
                'name_en' => 'Hero',
                'title_ar' => 'نظام ERP لإدارة موارد مؤسستك بكفاءة واحترافية',
                'title_en' => 'ERP System for Managing Your Organization Resources Efficiently and Professionally',
                'subtitle_ar' => 'حلول متكاملة لإدارة الموارد البشرية، المحاسبة، المخزون، المبيعات والمشتريات بأحدث التقنيات',
                'subtitle_en' => 'Integrated solutions for managing HR, accounting, inventory, sales, and purchases with the latest technologies',
                'description_ar' => 'نظام متكامل لإدارة جميع جوانب مؤسستك',
                'description_en' => 'Integrated system for managing all aspects of your organization',
                'section_type' => 'hero',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name_ar' => 'المميزات',
                'name_en' => 'Features',
                'title_ar' => 'مميزات النظام المتكامل',
                'title_en' => 'Integrated System Features',
                'subtitle_ar' => 'نظام إدارة متكامل يوفر جميع الأدوات التي تحتاجها لإدارة مؤسستك بكفاءة وفعالية',
                'subtitle_en' => 'An integrated management system that provides all the tools you need to manage your organization efficiently and effectively',
                'description_ar' => 'مميزات قوية لتعزيز إنتاجية عملك',
                'description_en' => 'Powerful features to boost your business productivity',
                'section_type' => 'features',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name_ar' => 'الوحدات',
                'name_en' => 'Modules',
                'title_ar' => 'وحدات نظام ERP',
                'title_en' => 'ERP System Modules',
                'subtitle_ar' => 'جميع الأدوات التي تحتاجها في منصة واحدة',
                'subtitle_en' => 'All the tools you need in one platform',
                'description_ar' => 'وحدات متكاملة تغطي جميع جوانب عملك',
                'description_en' => 'Integrated modules covering all aspects of your business',
                'section_type' => 'modules',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name_ar' => 'التقنيات',
                'name_en' => 'Technologies',
                'title_ar' => 'تقنيات متطورة',
                'title_en' => 'Advanced Technologies',
                'subtitle_ar' => 'نظام مبني بأحدث التقنيات لضمان الأداء الأمثل والتجربة المتميزة',
                'subtitle_en' => 'System built with the latest technologies to ensure optimal performance and exceptional experience',
                'description_ar' => 'نستخدم أحدث التقنيات لتقديم أفضل حلول',
                'description_en' => 'We use the latest technologies to provide the best solutions',
                'section_type' => 'technologies',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name_ar' => 'الأسعار',
                'name_en' => 'Pricing',
                'title_ar' => 'باقات الأسعار',
                'title_en' => 'Pricing Plans',
                'subtitle_ar' => 'اختر الباقة المناسبة لمؤسستك مع إمكانية الترقية في أي وقت',
                'subtitle_en' => 'Choose the plan that best fits your business with the possibility to upgrade at any time',
                'description_ar' => 'خطط أسعار مرنة تناسب جميع الشركات',
                'description_en' => 'Flexible pricing plans suitable for all companies',
                'section_type' => 'pricing',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name_ar' => 'القيم',
                'name_en' => 'Values',
                'title_ar' => 'القيم المؤسسية',
                'title_en' => 'Corporate Values',
                'subtitle_ar' => 'قيمنا الأساسية التي توجه كل قرار نتخذه وخطوة نخطوها',
                'subtitle_en' => 'Our core values that guide every decision we make and every step we take',
                'description_ar' => 'القيم التي توجه أعمالنا',
                'description_en' => 'Values that guide our business',
                'section_type' => 'values',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'name_ar' => 'الأنظمة',
                'name_en' => 'Systems',
                'title_ar' => 'أنظمتنا',
                'title_en' => 'Our Systems',
                'subtitle_ar' => 'أنظمتنا المتكاملة تعمل معاً لتقديم حلول شاملة',
                'subtitle_en' => 'Our integrated systems work together to provide comprehensive solutions',
                'description_ar' => 'أنظمة متخصصة تلبي احتياجات عملك',
                'description_en' => 'Specialized systems that meet your business needs',
                'section_type' => 'systems',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'name_ar' => 'الوسائط والتدريب',
                'name_en' => 'Media & Training',
                'title_ar' => 'ريادة ميديا والتدريب',
                'title_en' => 'Riyada Media and Training',
                'subtitle_ar' => 'نقدم مجموعة متكاملة من خدمات الوسائط والتدريب المتطورة لدعم نمو أعمالك',
                'subtitle_en' => 'We provide a comprehensive suite of advanced media and training services to support your business growth',
                'description_ar' => 'خدمات إنتاج وتدريب احترافية',
                'description_en' => 'Professional production and training services',
                'section_type' => 'media',
                'order' => 8,
                'is_active' => true,
            ],
            [
                'name_ar' => 'الشركاء',
                'name_en' => 'Partners',
                'title_ar' => 'شركاؤنا',
                'title_en' => 'Our Partners',
                'subtitle_ar' => 'نعمل مع أفضل الشركاء العالميين لتقديم حلول متكاملة',
                'subtitle_en' => 'We work with the best global partners to provide integrated solutions',
                'description_ar' => 'شركاء نجاحنا',
                'description_en' => 'Our success partners',
                'section_type' => 'partners',
                'order' => 9,
                'is_active' => true,
            ],
            [
                'name_ar' => 'الاستراتيجية',
                'name_en' => 'Strategy',
                'title_ar' => 'رؤيتنا ورسالتنا وأهدافنا',
                'title_en' => 'Our Vision, Mission & Goals',
                'subtitle_ar' => 'إطار استراتيجي متكامل يوجه مسيرتنا نحو التميز',
                'subtitle_en' => 'An integrated strategic framework guiding our journey towards excellence',
                'description_ar' => 'استراتيجيتنا للنجاح',
                'description_en' => 'Our strategy for success',
                'section_type' => 'strategy',
                'order' => 10,
                'is_active' => true,
            ],
            [
                'name_ar' => 'الإحصائيات',
                'name_en' => 'Statistics',
                'title_ar' => 'إحصائياتنا',
                'title_en' => 'Our Statistics',
                'subtitle_ar' => 'أرقام تعكس نجاحنا',
                'subtitle_en' => 'Numbers that reflect our success',
                'description_ar' => 'إنجازاتنا بالأرقام',
                'description_en' => 'Our achievements in numbers',
                'section_type' => 'statistics',
                'order' => 11,
                'is_active' => true,
            ],
            [
                'name_ar' => 'التواصل',
                'name_en' => 'Contact',
                'title_ar' => 'اتصل بنا',
                'title_en' => 'Contact Us',
                'subtitle_ar' => 'نحن هنا لمساعدتك، تواصل معنا لأي استفسار أو طلب عرض خاص',
                'subtitle_en' => 'We are here to help you, contact us for any inquiry or special offer request',
                'description_ar' => 'تواصل معنا للحصول على المساعدة',
                'description_en' => 'Contact us for assistance',
                'section_type' => 'contact',
                'order' => 12,
                'is_active' => true,
            ],
            [
                'name_ar' => 'من نحن',
                'name_en' => 'About',
                'title_ar' => 'من نحن',
                'title_en' => 'About Us',
                'subtitle_ar' => 'شركة رائدة في تقديم حلول ERP متكاملة',
                'subtitle_en' => 'A leading company in providing integrated ERP solutions',
                'description_ar' => 'نبذة عن شركتنا وخدماتنا',
                'description_en' => 'About our company and services',
                'section_type' => 'about',
                'order' => 13,
                'is_active' => true,
            ],
        ];
        
        $sections = [];
        foreach ($sectionsData as $sectionData) {
            $section = DB::table('sections')->insertGetId([
                'name_ar' => $sectionData['name_ar'],
                'name_en' => $sectionData['name_en'],
                'title_ar' => $sectionData['title_ar'],
                'title_en' => $sectionData['title_en'],
                'subtitle_ar' => $sectionData['subtitle_ar'],
                'subtitle_en' => $sectionData['subtitle_en'],
                'description_ar' => $sectionData['description_ar'],
                'description_en' => $sectionData['description_en'],
                'background_image' => null,
                'section_type' => $sectionData['section_type'],
                'order' => $sectionData['order'],
                'is_active' => $sectionData['is_active'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            $sections[$sectionData['section_type']] = $section;
        }
        
        return $sections;
    }
    
    /**
     * Create features
     */
    private function createFeatures($sections)
    {
        $featuresData = [
            [
                'title_ar' => 'أداء فائق السرعة',
                'title_en' => 'Ultra-Fast Performance',
                'description_ar' => 'نظام سريع الاستجابة مصمم لتقديم تجربة مستخدم سلسة وفعالة حتى مع الأحمال الكبيرة',
                'description_en' => 'A responsive system designed to deliver a smooth and effective user experience even with heavy loads',
                'icon' => 'fas fa-bolt',
                'order' => 1,
            ],
            [
                'title_ar' => 'أمان متقدم',
                'title_en' => 'Advanced Security',
                'description_ar' => 'طبقات أمان متعددة تحمي بياناتك مع توفير صلاحيات دقيقة للمستخدمين',
                'description_en' => 'Multiple security layers protect your data while providing precise permissions for users',
                'icon' => 'fas fa-shield-alt',
                'order' => 2,
            ],
            [
                'title_ar' => 'مزامنة فورية',
                'title_en' => 'Instant Synchronization',
                'description_ar' => 'مزامنة فورية للبيانات بين جميع الأقسام والأجهزة بدون أي تأخير',
                'description_en' => 'Instant data synchronization between all departments and devices without any delay',
                'icon' => 'fas fa-sync',
                'order' => 3,
            ],
            [
                'title_ar' => 'تقارير متقدمة',
                'title_en' => 'Advanced Reports',
                'description_ar' => 'تقارير وتحليلات مفصلة تساعدك في اتخاذ القرارات الصحيحة لمؤسستك',
                'description_en' => 'Detailed reports and analytics that help you make the right decisions for your organization',
                'icon' => 'fas fa-chart-line',
                'order' => 4,
            ],
            [
                'title_ar' => 'متعدد المنصات',
                'title_en' => 'Multi-Platform',
                'description_ar' => 'استخدم النظام على جميع الأجهزة من حواسيب، أجهزة لوحية وهواتف ذكية',
                'description_en' => 'Use the system on all devices including computers, tablets and smartphones',
                'icon' => 'fas fa-mobile-alt',
                'order' => 5,
            ],
            [
                'title_ar' => 'تخصيص كامل',
                'title_en' => 'Full Customization',
                'description_ar' => 'قابلية تخصيص شاملة لتلبية احتياجات مؤسستك الفريدة ومتطلبات العمل',
                'description_en' => 'Comprehensive customization capabilities to meet your organization unique needs and business requirements',
                'icon' => 'fas fa-cogs',
                'order' => 6,
            ],
        ];
        
        foreach ($featuresData as $featureData) {
            DB::table('features')->insert([
                'section_id' => $sections['features'],
                'title_ar' => $featureData['title_ar'],
                'title_en' => $featureData['title_en'],
                'description_ar' => $featureData['description_ar'],
                'description_en' => $featureData['description_en'],
                'icon' => $featureData['icon'],
                'background_image' => null,
                'order' => $featureData['order'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
    /**
     * Create modules
     */
    private function createModules($sections)
    {
        $modulesData = [
            [
                'title_ar' => 'إدارة الموارد البشرية',
                'title_en' => 'Human Resources Management',
                'description_ar' => 'نظام متكامل لإدارة شؤون الموظفين والرواتب والمزايا.',
                'description_en' => 'Integrated system for managing employee affairs, payroll, and benefits.',
                'icon' => 'fas fa-users',
                'color' => 'from-blue-500 to-blue-600',
                'order' => 1,
            ],
            [
                'title_ar' => 'المحاسبة',
                'title_en' => 'Accounting',
                'description_ar' => 'نظام محاسبي متكامل يلبي جميع متطلباتك المالية.',
                'description_en' => 'Integrated accounting system that meets all your financial requirements.',
                'icon' => 'fas fa-calculator',
                'color' => 'from-green-500 to-green-600',
                'order' => 2,
            ],
            [
                'title_ar' => 'إدارة المخزون',
                'title_en' => 'Inventory Management',
                'description_ar' => 'تحكم كامل في المخزون ومستوياته وتقارير الحركة.',
                'description_en' => 'Complete control over inventory, its levels, and movement reports.',
                'icon' => 'fas fa-warehouse',
                'color' => 'from-purple-500 to-purple-600',
                'order' => 3,
            ],
            [
                'title_ar' => 'المبيعات',
                'title_en' => 'Sales',
                'description_ar' => 'إدارة عملية المبيعات من الطلب حتى التحصيل.',
                'description_en' => 'Managing the sales process from order to collection.',
                'icon' => 'fas fa-shopping-cart',
                'color' => 'from-orange-500 to-orange-600',
                'order' => 4,
            ],
            [
                'title_ar' => 'المشتريات',
                'title_en' => 'Purchases',
                'description_ar' => 'إدارة عمليات الشراء والموردين والعروض.',
                'description_en' => 'Managing purchasing operations, suppliers, and offers.',
                'icon' => 'fas fa-shopping-bag',
                'color' => 'from-red-500 to-red-600',
                'order' => 5,
            ],
            [
                'title_ar' => 'الإعدادات',
                'title_en' => 'Settings',
                'description_ar' => 'تهيئة النظام وإدارة الصلاحيات والمستخدمين.',
                'description_en' => 'System configuration and permissions and users management.',
                'icon' => 'fas fa-cog',
                'color' => 'from-indigo-500 to-indigo-600',
                'order' => 6,
            ],
            [
                'title_ar' => 'التحليلات',
                'title_en' => 'Analytics',
                'description_ar' => 'تحليلات متقدمة ورسوم بيانية تفاعلية.',
                'description_en' => 'Advanced analytics and interactive charts.',
                'icon' => 'fas fa-chart-bar',
                'color' => 'from-teal-500 to-teal-600',
                'order' => 7,
            ],
            [
                'title_ar' => 'الفواتير',
                'title_en' => 'Invoicing',
                'description_ar' => 'إدارة الفواتير والمدفوعات الإلكترونية.',
                'description_en' => 'Invoice management and electronic payments.',
                'icon' => 'fas fa-file-invoice',
                'color' => 'from-pink-500 to-pink-600',
                'order' => 8,
            ],
        ];
        
        foreach ($modulesData as $moduleData) {
            DB::table('modules')->insert([
                'section_id' => $sections['modules'],
                'title_ar' => $moduleData['title_ar'],
                'title_en' => $moduleData['title_en'],
                'description_ar' => $moduleData['description_ar'],
                'description_en' => $moduleData['description_en'],
                'icon' => $moduleData['icon'],
                'color' => $moduleData['color'],
                'background_image' => null,
                'order' => $moduleData['order'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
    /**
     * Create technologies
     */
    private function createTechnologies($sections)
    {
        $technologiesData = [
            [
                'title_ar' => 'الأداء العالي',
                'title_en' => 'High Performance',
                'description_ar' => 'نظام مصمم للأداء العالي حتى مع البيانات الضخمة',
                'description_en' => 'System designed for high performance even with large data',
                'icon' => 'fas fa-tachometer-alt',
                'percentage' => 95,
                'order' => 1,
            ],
            [
                'title_ar' => 'الأمان',
                'title_en' => 'Security',
                'description_ar' => 'حماية متقدمة للبيانات والمعاملات',
                'description_en' => 'Advanced protection for data and transactions',
                'icon' => 'fas fa-lock',
                'percentage' => 98,
                'order' => 2,
            ],
            [
                'title_ar' => 'سهولة الاستخدام',
                'title_en' => 'Usability',
                'description_ar' => 'واجهة سهلة الاستخدام ومريحة للمستخدم',
                'description_en' => 'Easy to use and user-friendly interface',
                'icon' => 'fas fa-user-check',
                'percentage' => 92,
                'order' => 3,
            ],
            [
                'title_ar' => 'التكامل',
                'title_en' => 'Integration',
                'description_ar' => 'قدرة عالية على التكامل مع الأنظمة الأخرى',
                'description_en' => 'High ability to integrate with other systems',
                'icon' => 'fas fa-plug',
                'percentage' => 90,
                'order' => 4,
            ],
        ];
        
        foreach ($technologiesData as $techData) {
            DB::table('technologies')->insert([
                'section_id' => $sections['technologies'],
                'title_ar' => $techData['title_ar'],
                'title_en' => $techData['title_en'],
                'description_ar' => $techData['description_ar'],
                'description_en' => $techData['description_en'],
                'icon' => $techData['icon'],
                'percentage' => $techData['percentage'],
                'background_image' => null,
                'order' => $techData['order'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
    /**
     * Create pricing plans and their features
     */
    private function createPricingPlans($sections)
    {
        $pricingPlansData = [
            [
                'name_ar' => 'الباقة الأساسية',
                'name_en' => 'Basic Plan',
                'description_ar' => 'مناسبة للشركات الناشئة',
                'description_en' => 'Suitable for startups',
                'price' => 199.00,
                'currency' => 'SAR',
                'period_ar' => 'شهري',
                'period_en' => 'Monthly',
                'is_popular' => false,
                'order' => 1,
                'features' => [
                    ['feature_ar' => 'حتى 10 مستخدمين', 'feature_en' => 'Up to 10 users'],
                    ['feature_ar' => '5 وحدات أساسية', 'feature_en' => '5 basic modules'],
                    ['feature_ar' => 'دعم فني عبر البريد', 'feature_en' => 'Email support'],
                    ['feature_ar' => 'تخزين 10 جيجابايت', 'feature_en' => '10GB storage'],
                    ['feature_ar' => 'تقارير متقدمة', 'feature_en' => 'Advanced reports', 'is_available' => false],
                ]
            ],
            [
                'name_ar' => 'الباقة المتقدمة',
                'name_en' => 'Advanced Plan',
                'description_ar' => 'مناسبة للشركات المتوسطة',
                'description_en' => 'Suitable for medium companies',
                'price' => 399.00,
                'currency' => 'SAR',
                'period_ar' => 'شهري',
                'period_en' => 'Monthly',
                'is_popular' => true,
                'order' => 2,
                'features' => [
                    ['feature_ar' => 'حتى 50 مستخدم', 'feature_en' => 'Up to 50 users'],
                    ['feature_ar' => 'جميع الوحدات', 'feature_en' => 'All modules'],
                    ['feature_ar' => 'دعم فني هاتفي', 'feature_en' => 'Phone support'],
                    ['feature_ar' => 'تخزين 50 جيجابايت', 'feature_en' => '50GB storage'],
                    ['feature_ar' => 'تقارير متقدمة', 'feature_en' => 'Advanced reports'],
                ]
            ],
            [
                'name_ar' => 'الباقة المؤسسية',
                'name_en' => 'Enterprise Plan',
                'description_ar' => 'مناسبة للشركات الكبيرة',
                'description_en' => 'Suitable for large companies',
                'price' => 699.00,
                'currency' => 'SAR',
                'period_ar' => 'شهري',
                'period_en' => 'Monthly',
                'is_popular' => false,
                'order' => 3,
                'features' => [
                    ['feature_ar' => 'مستخدمين غير محدودين', 'feature_en' => 'Unlimited users'],
                    ['feature_ar' => 'جميع الوحدات + مخصص', 'feature_en' => 'All modules + custom'],
                    ['feature_ar' => 'دعم فني مخصص', 'feature_en' => 'Dedicated support'],
                    ['feature_ar' => 'تخزين غير محدود', 'feature_en' => 'Unlimited storage'],
                    ['feature_ar' => 'تقارير متقدمة + ذكاء اصطناعي', 'feature_en' => 'Advanced reports + AI'],
                ]
            ],
        ];
        
        foreach ($pricingPlansData as $planData) {
            $planId = DB::table('pricing_plans')->insertGetId([
                'section_id' => $sections['pricing'],
                'name_ar' => $planData['name_ar'],
                'name_en' => $planData['name_en'],
                'description_ar' => $planData['description_ar'],
                'description_en' => $planData['description_en'],
                'price' => $planData['price'],
                'currency' => $planData['currency'],
                'period_ar' => $planData['period_ar'],
                'period_en' => $planData['period_en'],
                'is_popular' => $planData['is_popular'],
                'background_image' => null,
                'order' => $planData['order'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            // Add features for this plan
            foreach ($planData['features'] as $index => $feature) {
                DB::table('pricing_plan_features')->insert([
                    'pricing_plan_id' => $planId,
                    'feature_ar' => $feature['feature_ar'],
                    'feature_en' => $feature['feature_en'],
                    'order' => $index + 1,
                    'is_available' => $feature['is_available'] ?? true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
    
    /**
     * Create values
     */
    private function createValues($sections)
    {
        $valuesData = [
            [
                'title_ar' => 'الجودة',
                'title_en' => 'Quality',
                'description_ar' => 'نلتزم بأعلى معايير الجودة في جميع منتجاتنا وخدماتنا.',
                'description_en' => 'We commit to the highest quality standards in all our products and services.',
                'icon' => 'fas fa-award',
                'color' => 'from-emerald-500 to-green-600',
                'order' => 1,
            ],
            [
                'title_ar' => 'الابتكار',
                'title_en' => 'Innovation',
                'description_ar' => 'نسعى دائماً لتطوير حلول مبتكرة تلبي احتياجات السوق المتغيرة.',
                'description_en' => 'We always strive for development and innovation in our technical solutions.',
                'icon' => 'fas fa-bolt',
                'color' => 'from-blue-500 to-indigo-600',
                'order' => 2,
            ],
            [
                'title_ar' => 'الثقة',
                'title_en' => 'Trust',
                'description_ar' => 'نعمل على بناء علاقات قائمة على الثقة والشفافية مع عملائنا.',
                'description_en' => 'We build long-term relationships with our clients based on trust.',
                'icon' => 'fas fa-shield-alt',
                'color' => 'from-purple-500 to-violet-600',
                'order' => 3,
            ],
            [
                'title_ar' => 'التميز',
                'title_en' => 'Excellence',
                'description_ar' => 'نسعى للتميز في كل ما نقدمه من خدمات وحلول.',
                'description_en' => 'We strive for excellence in everything we offer in services and products.',
                'icon' => 'fas fa-heart',
                'color' => 'from-pink-500 to-rose-600',
                'order' => 4,
            ],
        ];
        
        foreach ($valuesData as $valueData) {
            DB::table('values')->insert([
                'section_id' => $sections['values'],
                'title_ar' => $valueData['title_ar'],
                'title_en' => $valueData['title_en'],
                'description_ar' => $valueData['description_ar'],
                'description_en' => $valueData['description_en'],
                'icon' => $valueData['icon'],
                'color' => $valueData['color'],
                'background_image' => null,
                'order' => $valueData['order'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
    /**
     * Create systems
     */
    private function createSystems($sections)
    {
        $systemsData = [
            [
                'title_ar' => 'نظام الرياض إكس',
                'title_en' => 'Riyadex System',
                'description_ar' => 'منصة متكاملة للتجارة الإلكترونية.',
                'description_en' => 'Integrated e-commerce platform.',
                'icon' => 'fas fa-rocket',
                'level' => 'top',
                'color' => 'from-purple-500 to-indigo-600',
                'progress' => 95,
                'order' => 1,
            ],
            [
                'title_ar' => 'نظام الرياضة',
                'title_en' => 'Riyadah System',
                'description_ar' => 'نظام متكامل لإدارة النوادي والمراكز الرياضية.',
                'description_en' => 'Integrated system for managing clubs and sports centers.',
                'icon' => 'fas fa-briefcase',
                'level' => 'middle',
                'color' => 'from-blue-500 to-cyan-600',
                'progress' => 88,
                'order' => 2,
            ],
            [
                'title_ar' => 'نظام الواي فاي',
                'title_en' => 'WiFi System',
                'description_ar' => 'حلول إنترنت متكاملة للشركات والمؤسسات.',
                'description_en' => 'Integrated internet solutions for companies and institutions.',
                'icon' => 'fas fa-wifi',
                'level' => 'middle',
                'color' => 'from-green-500 to-emerald-600',
                'progress' => 92,
                'order' => 3,
            ],
            [
                'title_ar' => 'نظام أي تاسك',
                'title_en' => 'iTask System',
                'description_ar' => 'نظام إدارة المهام والمشاريع.',
                'description_en' => 'Task and project management system.',
                'icon' => 'fas fa-check-circle',
                'level' => 'base',
                'color' => 'from-orange-500 to-amber-600',
                'progress' => 85,
                'order' => 4,
            ],
        ];
        
        foreach ($systemsData as $systemData) {
            DB::table('systems')->insert([
                'section_id' => $sections['systems'],
                'title_ar' => $systemData['title_ar'],
                'title_en' => $systemData['title_en'],
                'description_ar' => $systemData['description_ar'],
                'description_en' => $systemData['description_en'],
                'icon' => $systemData['icon'],
                'level' => $systemData['level'],
                'color' => $systemData['color'],
                'progress' => $systemData['progress'],
                'background_image' => null,
                'order' => $systemData['order'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
    /**
     * Create media services
     */
    private function createMediaServices($sections)
    {
        $mediaServicesData = [
            [
                'title_ar' => 'إنتاج الوسائط',
                'title_en' => 'Media Production',
                'description_ar' => 'خدمات إنتاج محتوى احترافي تشمل الفيديو، الصوت، والرسومات لتعزيز حضورك الرقمي',
                'description_en' => 'Professional content production services including video, audio, and graphics to enhance your digital presence',
                'icon' => 'fas fa-video',
                'color' => 'from-blue-500 to-purple-600',
                'background_color' => 'blue',
                'order' => 1,
            ],
            [
                'title_ar' => 'التسويق الرقمي',
                'title_en' => 'Digital Marketing',
                'description_ar' => 'حلول تسويق متكاملة تشمل إدارة وسائل التواصل الاجتماعي والإعلانات الرقمية وتحليل الأداء',
                'description_en' => 'Integrated marketing solutions including social media management, digital advertising, and performance analytics',
                'icon' => 'fas fa-bullhorn',
                'color' => 'from-green-500 to-emerald-600',
                'background_color' => 'green',
                'order' => 2,
            ],
            [
                'title_ar' => 'التدريب والتطوير',
                'title_en' => 'Training & Development',
                'description_ar' => 'برامج تدريبية متخصصة لتنمية مهارات فريقك وتحسين أداء المؤسسة باستخدام أحدث التقنيات',
                'description_en' => 'Specialized training programs to develop your team\'s skills and improve organizational performance using latest technologies',
                'icon' => 'fas fa-graduation-cap',
                'color' => 'from-orange-500 to-amber-600',
                'background_color' => 'orange',
                'order' => 3,
            ],
        ];
        
        foreach ($mediaServicesData as $serviceData) {
            DB::table('media_services')->insert([
                'section_id' => $sections['media'],
                'title_ar' => $serviceData['title_ar'],
                'title_en' => $serviceData['title_en'],
                'description_ar' => $serviceData['description_ar'],
                'description_en' => $serviceData['description_en'],
                'icon' => $serviceData['icon'],
                'color' => $serviceData['color'],
                'background_color' => $serviceData['background_color'],
                'background_image' => null,
                'order' => $serviceData['order'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
    /**
     * Create partners
     */
    private function createPartners($sections)
    {
        $partnersData = [
            [
                'name_ar' => 'مايكروسوفت',
                'name_en' => 'Microsoft',
                'logo' => 'fab fa-microsoft',
                'icon' => 'fab fa-microsoft',
                'sector_ar' => 'التقنية',
                'sector_en' => 'technology',
                'color' => 'from-blue-500 to-blue-700',
                'years' => 5,
                'rating' => 'A+',
                'order' => 1,
            ],
            [
                'name_ar' => 'جوجل',
                'name_en' => 'Google',
                'logo' => 'fab fa-google',
                'icon' => 'fab fa-google',
                'sector_ar' => 'التقنية',
                'sector_en' => 'technology',
                'color' => 'from-green-500 to-green-600',
                'years' => 7,
                'rating' => 'A+',
                'order' => 2,
            ],
            [
                'name_ar' => 'أمازون',
                'name_en' => 'Amazon',
                'logo' => 'fab fa-amazon',
                'icon' => 'fab fa-amazon',
                'sector_ar' => 'التجارة الإلكترونية',
                'sector_en' => 'ecommerce',
                'color' => 'from-orange-500 to-amber-600',
                'years' => 6,
                'rating' => 'A+',
                'order' => 3,
            ],
            [
                'name_ar' => 'آبل',
                'name_en' => 'Apple',
                'logo' => 'fab fa-apple',
                'icon' => 'fab fa-apple',
                'sector_ar' => 'التقنية',
                'sector_en' => 'technology',
                'color' => 'from-gray-500 to-gray-700',
                'years' => 8,
                'rating' => 'A+',
                'order' => 4,
            ],
            [
                'name_ar' => 'سامسونج',
                'name_en' => 'Samsung',
                'logo' => 'fas fa-mobile-alt',
                'icon' => 'fas fa-mobile-alt',
                'sector_ar' => 'الإلكترونيات',
                'sector_en' => 'electronics',
                'color' => 'from-blue-600 to-indigo-700',
                'years' => 5,
                'rating' => 'A+',
                'order' => 5,
            ],
            [
                'name_ar' => 'آي بي إم',
                'name_en' => 'IBM',
                'logo' => 'fas fa-server',
                'icon' => 'fas fa-server',
                'sector_ar' => 'التقنية',
                'sector_en' => 'technology',
                'color' => 'from-blue-700 to-blue-900',
                'years' => 10,
                'rating' => 'A+',
                'order' => 6,
            ],
            [
                'name_ar' => 'أوراكل',
                'name_en' => 'Oracle',
                'logo' => 'fas fa-database',
                'icon' => 'fas fa-database',
                'sector_ar' => 'البرمجيات',
                'sector_en' => 'software',
                'color' => 'from-red-500 to-red-700',
                'years' => 7,
                'rating' => 'A+',
                'order' => 7,
            ],
            [
                'name_ar' => 'إنتل',
                'name_en' => 'Intel',
                'logo' => 'fas fa-microchip',
                'icon' => 'fas fa-microchip',
                'sector_ar' => 'العتاد',
                'sector_en' => 'hardware',
                'color' => 'from-blue-400 to-blue-600',
                'years' => 9,
                'rating' => 'A+',
                'order' => 8,
            ],
        ];
        
        foreach ($partnersData as $partnerData) {
            DB::table('partners')->insert([
                'section_id' => $sections['partners'],
                'name_ar' => $partnerData['name_ar'],
                'name_en' => $partnerData['name_en'],
                'logo' => $partnerData['logo'],
                'icon' => $partnerData['icon'],
                'sector_ar' => $partnerData['sector_ar'],
                'sector_en' => $partnerData['sector_en'],
                'color' => $partnerData['color'],
                'background_image' => null,
                'years' => $partnerData['years'],
                'rating' => $partnerData['rating'],
                'order' => $partnerData['order'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
    /**
     * Create strategy items and their features
     */
    private function createStrategyItems($sections)
    {
        $strategyItemsData = [
            [
                'title_ar' => 'الرؤية',
                'title_en' => 'Vision',
                'description_ar' => 'نسعى لأن نكون الرواد في تقديم حلول ERP متكاملة ومبتكرة تحقق التميز والكفاءة لعملائنا',
                'description_en' => 'We strive to be the leading company in developing innovative technical solutions in the region',
                'icon' => 'fas fa-eye',
                'type' => 'vision',
                'position' => 'left',
                'level' => 'top',
                'color' => 'from-indigo-500 to-purple-600',
                'progress' => 80,
                'order' => 1,
                'features' => [
                    ['feature_ar' => 'ريادة في مجال التقنية', 'feature_en' => 'Leadership in technology field'],
                    ['feature_ar' => 'ابتكار حلول مستقبلية', 'feature_en' => 'Innovating future solutions'],
                    ['feature_ar' => 'توسع عالمي مستدام', 'feature_en' => 'Sustainable global expansion'],
                ]
            ],
            [
                'title_ar' => 'الرسالة',
                'title_en' => 'Mission',
                'description_ar' => 'تطوير وتقديم حلول تقنية متكاملة تساعد الشركات على تحسين كفاءة عملياتها وزيادة إنتاجيتها ونموها',
                'description_en' => 'Provide advanced technical solutions that help organizations achieve their goals with high efficiency',
                'icon' => 'fas fa-bullseye',
                'type' => 'mission',
                'position' => 'right',
                'level' => 'middle',
                'color' => 'from-blue-500 to-cyan-600',
                'progress' => 85,
                'order' => 2,
                'features' => [
                    ['feature_ar' => 'تلبية احتياجات العملاء', 'feature_en' => 'Meeting customer needs'],
                    ['feature_ar' => 'تطوير حلول متميزة', 'feature_en' => 'Developing distinguished solutions'],
                    ['feature_ar' => 'بناء شراكات استراتيجية', 'feature_en' => 'Building strategic partnerships'],
                ]
            ],
            [
                'title_ar' => 'الأهداف',
                'title_en' => 'Goals',
                'description_ar' => 'تحقيق التميز في خدمة العملاء، والابتكار المستمر، والمساهمة في نجاح شركائنا من خلال حلول متكاملة',
                'description_en' => 'Build strategic partnerships and provide integrated systems that meet local and regional market needs',
                'icon' => 'fas fa-flag',
                'type' => 'goals',
                'position' => 'left',
                'level' => 'bottom',
                'color' => 'from-green-500 to-emerald-600',
                'progress' => 90,
                'order' => 3,
                'features' => [
                    ['feature_ar' => 'تحقيق نمو مستمر', 'feature_en' => 'Achieving sustainable growth'],
                    ['feature_ar' => 'تعزيز الابتكار', 'feature_en' => 'Enhancing innovation'],
                    ['feature_ar' => 'تطوير الكوادر البشرية', 'feature_en' => 'Developing human resources'],
                ]
            ],
        ];
        
        foreach ($strategyItemsData as $itemData) {
            $itemId = DB::table('strategy_items')->insertGetId([
                'section_id' => $sections['strategy'],
                'title_ar' => $itemData['title_ar'],
                'title_en' => $itemData['title_en'],
                'description_ar' => $itemData['description_ar'],
                'description_en' => $itemData['description_en'],
                'icon' => $itemData['icon'],
                'type' => $itemData['type'],
                'position' => $itemData['position'],
                'level' => $itemData['level'],
                'color' => $itemData['color'],
                'progress' => $itemData['progress'],
                'background_image' => null,
                'order' => $itemData['order'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            // Add features for this strategy item
            foreach ($itemData['features'] as $index => $feature) {
                DB::table('strategy_features')->insert([
                    'strategy_item_id' => $itemId,
                    'feature_ar' => $feature['feature_ar'],
                    'feature_en' => $feature['feature_en'],
                    'order' => $index + 1,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
    
    /**
     * Create statistics
     */
    private function createStatistics($sections)
    {
        $statisticsData = [
            [
                'title_ar' => 'المشاريع',
                'title_en' => 'Projects',
                'value' => '500+',
                'icon' => 'fas fa-briefcase',
                'order' => 1,
            ],
            [
                'title_ar' => 'الشركاء',
                'title_en' => 'Partners',
                'value' => '50+',
                'icon' => 'fas fa-users',
                'order' => 2,
            ],
            [
                'title_ar' => 'العملاء',
                'title_en' => 'Clients',
                'value' => '100+',
                'icon' => 'fas fa-heart',
                'order' => 3,
            ],
            [
                'title_ar' => 'سنوات الخبرة',
                'title_en' => 'Years Experience',
                'value' => '5+',
                'icon' => 'fas fa-award',
                'order' => 4,
            ],
        ];
        
        foreach ($statisticsData as $statData) {
            DB::table('statistics')->insert([
                'section_id' => $sections['statistics'],
                'title_ar' => $statData['title_ar'],
                'title_en' => $statData['title_en'],
                'value' => $statData['value'],
                'icon' => $statData['icon'],
                'background_image' => null,
                'order' => $statData['order'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
    /**
     * Create contact info
     */
    private function createContactInfo($sections)
    {
        DB::table('contact_infos')->insert([
            'section_id' => $sections['contact'],
            'phone' => '+967771231316',
            'email' => 'info@erp-system.com',
            'address_ar' => 'جدة، المملكة العربية السعودية',
            'address_en' => 'Jeddah, Saudi Arabia',
            'background_image' => null,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
    /**
     * Create about section
     */
    private function createAboutSection($sections)
    {
        DB::table('about_sections')->insert([
            'section_id' => $sections['about'],
            
            // العنوان الرئيسي والوصف
            'title_ar' => 'من نحن',
            'title_en' => 'About Us',
            'description_ar' => 'شركة رائدة في تقديم حلول ERP متكاملة تساعد الشركات على تحسين كفاءة عملياتها واتخاذ قرارات أكثر ذكاءً',
            'description_en' => 'A leading company in providing integrated ERP solutions that help companies improve their operational efficiency and make smarter decisions',
            
            // قسم Our Mission
            'mission_title_ar' => 'مهمتنا',
            'mission_title_en' => 'Our Mission',
            'mission_description_ar' => 'نسعى لتمكين الشركات من تحقيق أقصى استفادة من مواردها عبر حلول تكنولوجية متطورة',
            'mission_description_en' => 'We strive to enable companies to maximize their resources through advanced technological solutions',
            
            // نقاط المهمة
            'mission_point1_ar' => 'توفير حلول ERP مخصصة تلبي احتياجات كل عميل',
            'mission_point1_en' => 'Providing customized ERP solutions that meet each client\'s needs',
            'mission_point2_ar' => 'دعم العملاء بخبرات استشارية متخصصة',
            'mission_point2_en' => 'Supporting customers with specialized consulting expertise',
            'mission_point3_ar' => 'مواكبة أحدث التقنيات في مجال إدارة المؤسسات',
            'mission_point3_en' => 'Keeping pace with the latest technologies in enterprise management',
            
            // قسم Why Choose Us
            'why_choose_us_title_ar' => 'لماذا تختارنا',
            'why_choose_us_title_en' => 'Why Choose Us',
            'why_choose_us_description_ar' => 'نتميز بتقديم حلول مبتكرة وخدمة عملاء استثنائية',
            'why_choose_us_description_en' => 'We excel in providing innovative solutions and exceptional customer service',
            
            // الإحصائيات
            'uptime_value' => '99.9%',
            'uptime_label_ar' => 'نسبة التشغيل',
            'uptime_label_en' => 'Uptime',
            
            'support_value' => '24/7',
            'support_label_ar' => 'دعم فني',
            'support_label_en' => 'Support',
            
            'clients_value' => '500+',
            'clients_label_ar' => 'عميل راض',
            'clients_label_en' => 'Happy Clients',
            
            'experience_value' => '5+',
            'experience_label_ar' => 'سنوات خبرة',
            'experience_label_en' => 'Years Experience',
            
            // خلفية القسم
            'background_image' => null,
            'mission_background_image' => null,
            'stats_background_image' => null,
            
            // إعدادات إضافية
            'order' => 1,
            'show_mission' => true,
            'show_stats' => true,
            'is_active' => true,
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
