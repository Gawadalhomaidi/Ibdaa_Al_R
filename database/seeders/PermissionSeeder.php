<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissions;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // إنشاء الصلاحيات
        $permissions = [
            // صلاحيات النظام
            [
                'name' => 'access-admin-panel', 
                'display_name_ar' => 'الوصول إلى لوحة التحكم', 
                'display_name_en' => 'Access Admin Panel',
                'description_ar' => 'السماح بالوصول إلى لوحة تحكم النظام',
                'description_en' => 'Allow access to the system admin panel',
                'group_ar' => 'النظام',
                'group_en' => 'system'
            ],
            [
                'name' => 'view-dashboard', 
                'display_name_ar' => 'عرض لوحة التحكم', 
                'display_name_en' => 'View Dashboard',
                'description_ar' => 'عرض لوحة تحكم النظام الرئيسية',
                'description_en' => 'View the main system dashboard',
                'group_ar' => 'النظام',
                'group_en' => 'system'
            ],
            
            // صلاحيات إدارة المستخدمين
            [
                'name' => 'manage-users', 
                'display_name_ar' => 'إدارة المستخدمين', 
                'display_name_en' => 'Manage Users',
                'description_ar' => 'إدارة حسابات المستخدمين في النظام',
                'description_en' => 'Manage user accounts in the system',
                'group_ar' => 'المستخدمين',
                'group_en' => 'users'
            ],
            [
                'name' => 'create-users', 
                'display_name_ar' => 'إنشاء مستخدمين', 
                'display_name_en' => 'Create Users',
                'description_ar' => 'إنشاء حسابات مستخدمين جديدة',
                'description_en' => 'Create new user accounts',
                'group_ar' => 'المستخدمين',
                'group_en' => 'users'
            ],
            [
                'name' => 'edit-users', 
                'display_name_ar' => 'تعديل المستخدمين', 
                'display_name_en' => 'Edit Users',
                'description_ar' => 'تعديل بيانات المستخدمين',
                'description_en' => 'Edit user information',
                'group_ar' => 'المستخدمين',
                'group_en' => 'users'
            ],
            [
                'name' => 'delete-users', 
                'display_name_ar' => 'حذف المستخدمين', 
                'display_name_en' => 'Delete Users',
                'description_ar' => 'حذف حسابات المستخدمين',
                'description_en' => 'Delete user accounts',
                'group_ar' => 'المستخدمين',
                'group_en' => 'users'
            ],
            [
                'name' => 'view-users', 
                'display_name_ar' => 'عرض المستخدمين', 
                'display_name_en' => 'View Users',
                'description_ar' => 'عرض قائمة المستخدمين',
                'description_en' => 'View the list of users',
                'group_ar' => 'المستخدمين',
                'group_en' => 'users'
            ],
            [
                'name' => 'change-user-password', 
                'display_name_ar' => 'تغيير كلمات المرور', 
                'display_name_en' => 'Change User Passwords',
                'description_ar' => 'تغيير كلمات مرور المستخدمين',
                'description_en' => 'Change user passwords',
                'group_ar' => 'المستخدمين',
                'group_en' => 'users'
            ],
            
            // صلاحيات إدارة المحتوى
            [
                'name' => 'manage-content', 
                'display_name_ar' => 'إدارة المحتوى', 
                'display_name_en' => 'Manage Content',
                'description_ar' => 'إدارة محتوى الموقع',
                'description_en' => 'Manage website content',
                'group_ar' => 'المحتوى',
                'group_en' => 'content'
            ],
            [
                'name' => 'manage-MediaService', 
                'display_name_ar' => 'إدارة خدمات الوسائط', 
                'display_name_en' => 'Manage Media Service',
                'description_ar' => 'إدارة خدمات الوسائط ',
                'description_en' => 'Manage website Media Service',
                'group_ar' => 'المحتوى',
                'group_en' => 'content'
            ],
            [
                'name' => 'manage-sections', 
                'display_name_ar' => 'إدارة الأقسام', 
                'display_name_en' => 'Manage Sections',
                'description_ar' => 'إدارة أقسام الموقع',
                'description_en' => 'Manage website sections',
                'group_ar' => 'المحتوى',
                'group_en' => 'content'
            ],
            [
                'name' => 'manage-features', 
                'display_name_ar' => 'إدارة الميزات', 
                'display_name_en' => 'Manage Features',
                'description_ar' => 'إدارة ميزات النظام',
                'description_en' => 'Manage system features',
                'group_ar' => 'المحتوى',
                'group_en' => 'content'
            ],
            [
                'name' => 'manage-modules', 
                'display_name_ar' => 'إدارة الوحدات', 
                'display_name_en' => 'Manage Modules',
                'description_ar' => 'إدارة وحدات النظام',
                'description_en' => 'Manage system modules',
                'group_ar' => 'المحتوى',
                'group_en' => 'content'
            ],
            [
                'name' => 'manage-technologies', 
                'display_name_ar' => 'إدارة التقنيات', 
                'display_name_en' => 'Manage Technologies',
                'description_ar' => 'إدارة التقنيات المستخدمة',
                'description_en' => 'Manage used technologies',
                'group_ar' => 'المحتوى',
                'group_en' => 'content'
            ],
            [
                'name' => 'manage-pricing', 
                'display_name_ar' => 'إدارة التسعير', 
                'display_name_en' => 'Manage Pricing',
                'description_ar' => 'إدارة أسعار الخدمات',
                'description_en' => 'Manage service pricing',
                'group_ar' => 'المحتوى',
                'group_en' => 'content'
            ],
            [
                'name' => 'manage-partners', 
                'display_name_ar' => 'إدارة الشركاء', 
                'display_name_en' => 'Manage Partners',
                'description_ar' => 'إدارة الشركاء التجاريين',
                'description_en' => 'Manage business partners',
                'group_ar' => 'المحتوى',
                'group_en' => 'content'
            ],
            
            // صلاحيات الإعدادات
            [
                'name' => 'manage-settings', 
                'display_name_ar' => 'إدارة الإعدادات', 
                'display_name_en' => 'Manage Settings',
                'description_ar' => 'إدارة إعدادات النظام',
                'description_en' => 'Manage system settings',
                'group_ar' => 'الإعدادات',
                'group_en' => 'settings'
            ],
            [
                'name' => 'manage-roles', 
                'display_name_ar' => 'إدارة الأدوار', 
                'display_name_en' => 'Manage Roles',
                'description_ar' => 'إدارة أدوار المستخدمين',
                'description_en' => 'Manage user roles',
                'group_ar' => 'الإعدادات',
                'group_en' => 'settings'
            ],
            [
                'name' => 'manage-permissions', 
                'display_name_ar' => 'إدارة الصلاحيات', 
                'display_name_en' => 'Manage Permissions',
                'description_ar' => 'إدارة صلاحيات النظام',
                'description_en' => 'Manage system permissions',
                'group_ar' => 'الإعدادات',
                'group_en' => 'settings'
            ],
            [
                'name' => 'manage-about', 
                'display_name_ar' => 'إدارة من نحن', 
                'display_name_en' => 'Manage about',
                'description_ar' => 'إدارة من نحن ',
                'description_en' => 'Manage business about use',
                'group_ar' => 'المحتوى',
                'group_en' => 'content'
            ],
            // صلاحيات إدارة الأقسام (Sections) - CRUD كامل
            [
                'name' => 'view-sections', 
                'display_name_ar' => 'عرض الأقسام', 
                'display_name_en' => 'View Sections',
                'description_ar' => 'عرض قائمة الأقسام',
                'description_en' => 'View the list of sections',
                'group_ar' => 'الأقسام',
                'group_en' => 'sections'
            ],
            [
                'name' => 'create-sections', 
                'display_name_ar' => 'إنشاء أقسام', 
                'display_name_en' => 'Create Sections',
                'description_ar' => 'إنشاء أقسام جديدة',
                'description_en' => 'Create new sections',
                'group_ar' => 'الأقسام',
                'group_en' => 'sections'
            ],
            [
                'name' => 'edit-sections', 
                'display_name_ar' => 'تعديل الأقسام', 
                'display_name_en' => 'Edit Sections',
                'description_ar' => 'تعديل بيانات الأقسام',
                'description_en' => 'Edit sections information',
                'group_ar' => 'الأقسام',
                'group_en' => 'sections'
            ],
            [
                'name' => 'delete-sections', 
                'display_name_ar' => 'حذف الأقسام', 
                'display_name_en' => 'Delete Sections',
                'description_ar' => 'حذف الأقسام',
                'description_en' => 'Delete sections',
                'group_ar' => 'الأقسام',
                'group_en' => 'sections'
            ],

            // صلاحيات إدارة قسم من نحن (About Sections) - CRUD كامل
            [
                'name' => 'view-about-sections', 
                'display_name_ar' => 'عرض قسم من نحن', 
                'display_name_en' => 'View About Sections',
                'description_ar' => 'عرض محتوى قسم من نحن',
                'description_en' => 'View about sections content',
                'group_ar' => 'من نحن',
                'group_en' => 'about'
            ],
            [
                'name' => 'create-about-sections', 
                'display_name_ar' => 'إنشاء قسم من نحن', 
                'display_name_en' => 'Create About Sections',
                'description_ar' => 'إنشاء محتوى قسم من نحن',
                'description_en' => 'Create about sections content',
                'group_ar' => 'من نحن',
                'group_en' => 'about'
            ],
            [
                'name' => 'edit-about-sections', 
                'display_name_ar' => 'تعديل قسم من نحن', 
                'display_name_en' => 'Edit About Sections',
                'description_ar' => 'تعديل محتوى قسم من نحن',
                'description_en' => 'Edit about sections content',
                'group_ar' => 'من نحن',
                'group_en' => 'about'
            ],
            [
                'name' => 'delete-about-sections', 
                'display_name_ar' => 'حذف قسم من نحن', 
                'display_name_en' => 'Delete About Sections',
                'description_ar' => 'حذف محتوى قسم من نحن',
                'description_en' => 'Delete about sections content',
                'group_ar' => 'من نحن',
                'group_en' => 'about'
            ],

            // صلاحيات إدارة معلومات الاتصال (Contact Info) - CRUD كامل
            [
                'name' => 'view-contact-info', 
                'display_name_ar' => 'عرض معلومات الاتصال', 
                'display_name_en' => 'View Contact Info',
                'description_ar' => 'عرض معلومات الاتصال',
                'description_en' => 'View contact information',
                'group_ar' => 'معلومات الاتصال',
                'group_en' => 'contact'
            ],
            [
                'name' => 'create-contact-info', 
                'display_name_ar' => 'إنشاء معلومات اتصال', 
                'display_name_en' => 'Create Contact Info',
                'description_ar' => 'إنشاء معلومات الاتصال',
                'description_en' => 'Create contact information',
                'group_ar' => 'معلومات الاتصال',
                'group_en' => 'contact'
            ],
            [
                'name' => 'edit-contact-info', 
                'display_name_ar' => 'تعديل معلومات الاتصال', 
                'display_name_en' => 'Edit Contact Info',
                'description_ar' => 'تعديل معلومات الاتصال',
                'description_en' => 'Edit contact information',
                'group_ar' => 'معلومات الاتصال',
                'group_en' => 'contact'
            ],
            [
                'name' => 'delete-contact-info', 
                'display_name_ar' => 'حذف معلومات الاتصال', 
                'display_name_en' => 'Delete Contact Info',
                'description_ar' => 'حذف معلومات الاتصال',
                'description_en' => 'Delete contact information',
                'group_ar' => 'معلومات الاتصال',
                'group_en' => 'contact'
            ],

            // صلاحيات إدارة الميزات (Features) - CRUD كامل
            [
                'name' => 'view-features', 
                'display_name_ar' => 'عرض الميزات', 
                'display_name_en' => 'View Features',
                'description_ar' => 'عرض قائمة الميزات',
                'description_en' => 'View the list of features',
                'group_ar' => 'الميزات',
                'group_en' => 'features'
            ],
            [
                'name' => 'create-features', 
                'display_name_ar' => 'إنشاء ميزات', 
                'display_name_en' => 'Create Features',
                'description_ar' => 'إنشاء ميزات جديدة',
                'description_en' => 'Create new features',
                'group_ar' => 'الميزات',
                'group_en' => 'features'
            ],
            [
                'name' => 'edit-features', 
                'display_name_ar' => 'تعديل الميزات', 
                'display_name_en' => 'Edit Features',
                'description_ar' => 'تعديل بيانات الميزات',
                'description_en' => 'Edit features information',
                'group_ar' => 'الميزات',
                'group_en' => 'features'
            ],
            [
                'name' => 'delete-features', 
                'display_name_ar' => 'حذف الميزات', 
                'display_name_en' => 'Delete Features',
                'description_ar' => 'حذف الميزات',
                'description_en' => 'Delete features',
                'group_ar' => 'الميزات',
                'group_en' => 'features'
            ],

            // صلاحيات إدارة خدمات الوسائط (Media Services) - CRUD كامل
            [
                'name' => 'view-media-services', 
                'display_name_ar' => 'عرض خدمات الوسائط', 
                'display_name_en' => 'View Media Services',
                'description_ar' => 'عرض قائمة خدمات الوسائط',
                'description_en' => 'View the list of media services',
                'group_ar' => 'خدمات الوسائط',
                'group_en' => 'media-services'
            ],
            [
                'name' => 'create-media-services', 
                'display_name_ar' => 'إنشاء خدمات وسائط', 
                'display_name_en' => 'Create Media Services',
                'description_ar' => 'إنشاء خدمات وسائط جديدة',
                'description_en' => 'Create new media services',
                'group_ar' => 'خدمات الوسائط',
                'group_en' => 'media-services'
            ],
            [
                'name' => 'edit-media-services', 
                'display_name_ar' => 'تعديل خدمات الوسائط', 
                'display_name_en' => 'Edit Media Services',
                'description_ar' => 'تعديل بيانات خدمات الوسائط',
                'description_en' => 'Edit media services information',
                'group_ar' => 'خدمات الوسائط',
                'group_en' => 'media-services'
            ],
            [
                'name' => 'delete-media-services', 
                'display_name_ar' => 'حذف خدمات الوسائط', 
                'display_name_en' => 'Delete Media Services',
                'description_ar' => 'حذف خدمات الوسائط',
                'description_en' => 'Delete media services',
                'group_ar' => 'خدمات الوسائط',
                'group_en' => 'media-services'
            ],

            // صلاحيات إدارة الوحدات (Modules) - CRUD كامل
            [
                'name' => 'view-modules', 
                'display_name_ar' => 'عرض الوحدات', 
                'display_name_en' => 'View Modules',
                'description_ar' => 'عرض قائمة الوحدات',
                'description_en' => 'View the list of modules',
                'group_ar' => 'الوحدات',
                'group_en' => 'modules'
            ],
            [
                'name' => 'create-modules', 
                'display_name_ar' => 'إنشاء وحدات', 
                'display_name_en' => 'Create Modules',
                'description_ar' => 'إنشاء وحدات جديدة',
                'description_en' => 'Create new modules',
                'group_ar' => 'الوحدات',
                'group_en' => 'modules'
            ],
            [
                'name' => 'edit-modules', 
                'display_name_ar' => 'تعديل الوحدات', 
                'display_name_en' => 'Edit Modules',
                'description_ar' => 'تعديل بيانات الوحدات',
                'description_en' => 'Edit modules information',
                'group_ar' => 'الوحدات',
                'group_en' => 'modules'
            ],
            [
                'name' => 'delete-modules', 
                'display_name_ar' => 'حذف الوحدات', 
                'display_name_en' => 'Delete Modules',
                'description_ar' => 'حذف الوحدات',
                'description_en' => 'Delete modules',
                'group_ar' => 'الوحدات',
                'group_en' => 'modules'
            ],

            // صلاحيات إدارة الشركاء (Partners) - CRUD كامل
            [
                'name' => 'view-partners', 
                'display_name_ar' => 'عرض الشركاء', 
                'display_name_en' => 'View Partners',
                'description_ar' => 'عرض قائمة الشركاء',
                'description_en' => 'View the list of partners',
                'group_ar' => 'الشركاء',
                'group_en' => 'partners'
            ],
            [
                'name' => 'create-partners', 
                'display_name_ar' => 'إنشاء شركاء', 
                'display_name_en' => 'Create Partners',
                'description_ar' => 'إنشاء شركاء جدد',
                'description_en' => 'Create new partners',
                'group_ar' => 'الشركاء',
                'group_en' => 'partners'
            ],
            [
                'name' => 'edit-partners', 
                'display_name_ar' => 'تعديل الشركاء', 
                'display_name_en' => 'Edit Partners',
                'description_ar' => 'تعديل بيانات الشركاء',
                'description_en' => 'Edit partners information',
                'group_ar' => 'الشركاء',
                'group_en' => 'partners'
            ],
            [
                'name' => 'delete-partners', 
                'display_name_ar' => 'حذف الشركاء', 
                'display_name_en' => 'Delete Partners',
                'description_ar' => 'حذف الشركاء',
                'description_en' => 'Delete partners',
                'group_ar' => 'الشركاء',
                'group_en' => 'partners'
            ],

            // صلاحيات إدارة خطط التسعير (Pricing Plans) - CRUD كامل
            [
                'name' => 'view-pricing-plans', 
                'display_name_ar' => 'عرض خطط التسعير', 
                'display_name_en' => 'View Pricing Plans',
                'description_ar' => 'عرض قائمة خطط التسعير',
                'description_en' => 'View the list of pricing plans',
                'group_ar' => 'خطط التسعير',
                'group_en' => 'pricing'
            ],
            [
                'name' => 'create-pricing-plans', 
                'display_name_ar' => 'إنشاء خطط تسعير', 
                'display_name_en' => 'Create Pricing Plans',
                'description_ar' => 'إنشاء خطط تسعير جديدة',
                'description_en' => 'Create new pricing plans',
                'group_ar' => 'خطط التسعير',
                'group_en' => 'pricing'
            ],
            [
                'name' => 'edit-pricing-plans', 
                'display_name_ar' => 'تعديل خطط التسعير', 
                'display_name_en' => 'Edit Pricing Plans',
                'description_ar' => 'تعديل بيانات خطط التسعير',
                'description_en' => 'Edit pricing plans information',
                'group_ar' => 'خطط التسعير',
                'group_en' => 'pricing'
            ],
            [
                'name' => 'delete-pricing-plans', 
                'display_name_ar' => 'حذف خطط التسعير', 
                'display_name_en' => 'Delete Pricing Plans',
                'description_ar' => 'حذف خطط التسعير',
                'description_en' => 'Delete pricing plans',
                'group_ar' => 'خطط التسعير',
                'group_en' => 'pricing'
            ],

            // صلاحيات إدارة ميزات خطط التسعير (Pricing Plan Features) - CRUD كامل
            [
                'name' => 'view-pricing-plan-features', 
                'display_name_ar' => 'عرض ميزات خطط التسعير', 
                'display_name_en' => 'View Pricing Plan Features',
                'description_ar' => 'عرض قائمة ميزات خطط التسعير',
                'description_en' => 'View the list of pricing plan features',
                'group_ar' => 'ميزات خطط التسعير',
                'group_en' => 'pricing-features'
            ],
            [
                'name' => 'create-pricing-plan-features', 
                'display_name_ar' => 'إنشاء ميزات خطط تسعير', 
                'display_name_en' => 'Create Pricing Plan Features',
                'description_ar' => 'إنشاء ميزات خطط تسعير جديدة',
                'description_en' => 'Create new pricing plan features',
                'group_ar' => 'ميزات خطط التسعير',
                'group_en' => 'pricing-features'
            ],
            [
                'name' => 'edit-pricing-plan-features', 
                'display_name_ar' => 'تعديل ميزات خطط التسعير', 
                'display_name_en' => 'Edit Pricing Plan Features',
                'description_ar' => 'تعديل بيانات ميزات خطط التسعير',
                'description_en' => 'Edit pricing plan features information',
                'group_ar' => 'ميزات خطط التسعير',
                'group_en' => 'pricing-features'
            ],
            [
                'name' => 'delete-pricing-plan-features', 
                'display_name_ar' => 'حذف ميزات خطط التسعير', 
                'display_name_en' => 'Delete Pricing Plan Features',
                'description_ar' => 'حذف ميزات خطط التسعير',
                'description_en' => 'Delete pricing plan features',
                'group_ar' => 'ميزات خطط التسعير',
                'group_en' => 'pricing-features'
            ],

            // صلاحيات إدارة الإحصائيات (Statistics) - CRUD كامل
            [
                'name' => 'view-statistics', 
                'display_name_ar' => 'عرض الإحصائيات', 
                'display_name_en' => 'View Statistics',
                'description_ar' => 'عرض قائمة الإحصائيات',
                'description_en' => 'View the list of statistics',
                'group_ar' => 'الإحصائيات',
                'group_en' => 'statistics'
            ],
            [
                'name' => 'create-statistics', 
                'display_name_ar' => 'إنشاء إحصائيات', 
                'display_name_en' => 'Create Statistics',
                'description_ar' => 'إنشاء إحصائيات جديدة',
                'description_en' => 'Create new statistics',
                'group_ar' => 'الإحصائيات',
                'group_en' => 'statistics'
            ],
            [
                'name' => 'edit-statistics', 
                'display_name_ar' => 'تعديل الإحصائيات', 
                'display_name_en' => 'Edit Statistics',
                'description_ar' => 'تعديل بيانات الإحصائيات',
                'description_en' => 'Edit statistics information',
                'group_ar' => 'الإحصائيات',
                'group_en' => 'statistics'
            ],
            [
                'name' => 'delete-statistics', 
                'display_name_ar' => 'حذف الإحصائيات', 
                'display_name_en' => 'Delete Statistics',
                'description_ar' => 'حذف الإحصائيات',
                'description_en' => 'Delete statistics',
                'group_ar' => 'الإحصائيات',
                'group_en' => 'statistics'
            ],

            // صلاحيات إدارة ميزات الاستراتيجية (Strategy Features) - CRUD كامل
            [
                'name' => 'view-strategy-features', 
                'display_name_ar' => 'عرض ميزات الاستراتيجية', 
                'display_name_en' => 'View Strategy Features',
                'description_ar' => 'عرض قائمة ميزات الاستراتيجية',
                'description_en' => 'View the list of strategy features',
                'group_ar' => 'ميزات الاستراتيجية',
                'group_en' => 'strategy-features'
            ],
            [
                'name' => 'create-strategy-features', 
                'display_name_ar' => 'إنشاء ميزات استراتيجية', 
                'display_name_en' => 'Create Strategy Features',
                'description_ar' => 'إنشاء ميزات استراتيجية جديدة',
                'description_en' => 'Create new strategy features',
                'group_ar' => 'ميزات الاستراتيجية',
                'group_en' => 'strategy-features'
            ],
            [
                'name' => 'edit-strategy-features', 
                'display_name_ar' => 'تعديل ميزات الاستراتيجية', 
                'display_name_en' => 'Edit Strategy Features',
                'description_ar' => 'تعديل بيانات ميزات الاستراتيجية',
                'description_en' => 'Edit strategy features information',
                'group_ar' => 'ميزات الاستراتيجية',
                'group_en' => 'strategy-features'
            ],
            [
                'name' => 'delete-strategy-features', 
                'display_name_ar' => 'حذف ميزات الاستراتيجية', 
                'display_name_en' => 'Delete Strategy Features',
                'description_ar' => 'حذف ميزات الاستراتيجية',
                'description_en' => 'Delete strategy features',
                'group_ar' => 'ميزات الاستراتيجية',
                'group_en' => 'strategy-features'
            ],

            // صلاحيات إدارة عناصر الاستراتيجية (Strategy Items) - CRUD كامل
            [
                'name' => 'view-strategy-items', 
                'display_name_ar' => 'عرض عناصر الاستراتيجية', 
                'display_name_en' => 'View Strategy Items',
                'description_ar' => 'عرض قائمة عناصر الاستراتيجية',
                'description_en' => 'View the list of strategy items',
                'group_ar' => 'عناصر الاستراتيجية',
                'group_en' => 'strategy-items'
            ],
            [
                'name' => 'create-strategy-items', 
                'display_name_ar' => 'إنشاء عناصر استراتيجية', 
                'display_name_en' => 'Create Strategy Items',
                'description_ar' => 'إنشاء عناصر استراتيجية جديدة',
                'description_en' => 'Create new strategy items',
                'group_ar' => 'عناصر الاستراتيجية',
                'group_en' => 'strategy-items'
            ],
            [
                'name' => 'edit-strategy-items', 
                'display_name_ar' => 'تعديل عناصر الاستراتيجية', 
                'display_name_en' => 'Edit Strategy Items',
                'description_ar' => 'تعديل بيانات عناصر الاستراتيجية',
                'description_en' => 'Edit strategy items information',
                'group_ar' => 'عناصر الاستراتيجية',
                'group_en' => 'strategy-items'
            ],
            [
                'name' => 'delete-strategy-items', 
                'display_name_ar' => 'حذف عناصر الاستراتيجية', 
                'display_name_en' => 'Delete Strategy Items',
                'description_ar' => 'حذف عناصر الاستراتيجية',
                'description_en' => 'Delete strategy items',
                'group_ar' => 'عناصر الاستراتيجية',
                'group_en' => 'strategy-items'
            ],

            // صلاحيات إدارة الأنظمة (Systems) - CRUD كامل
            [
                'name' => 'view-systems', 
                'display_name_ar' => 'عرض الأنظمة', 
                'display_name_en' => 'View Systems',
                'description_ar' => 'عرض قائمة الأنظمة',
                'description_en' => 'View the list of systems',
                'group_ar' => 'الأنظمة',
                'group_en' => 'systems'
            ],
            [
                'name' => 'create-systems', 
                'display_name_ar' => 'إنشاء أنظمة', 
                'display_name_en' => 'Create Systems',
                'description_ar' => 'إنشاء أنظمة جديدة',
                'description_en' => 'Create new systems',
                'group_ar' => 'الأنظمة',
                'group_en' => 'systems'
            ],
            [
                'name' => 'edit-systems', 
                'display_name_ar' => 'تعديل الأنظمة', 
                'display_name_en' => 'Edit Systems',
                'description_ar' => 'تعديل بيانات الأنظمة',
                'description_en' => 'Edit systems information',
                'group_ar' => 'الأنظمة',
                'group_en' => 'systems'
            ],
            [
                'name' => 'delete-systems', 
                'display_name_ar' => 'حذف الأنظمة', 
                'display_name_en' => 'Delete Systems',
                'description_ar' => 'حذف الأنظمة',
                'description_en' => 'Delete systems',
                'group_ar' => 'الأنظمة',
                'group_en' => 'systems'
            ],

            // صلاحيات إدارة التقنيات (Technologies) - CRUD كامل
            [
                'name' => 'view-technologies', 
                'display_name_ar' => 'عرض التقنيات', 
                'display_name_en' => 'View Technologies',
                'description_ar' => 'عرض قائمة التقنيات',
                'description_en' => 'View the list of technologies',
                'group_ar' => 'التقنيات',
                'group_en' => 'technologies'
            ],
            [
                'name' => 'create-technologies', 
                'display_name_ar' => 'إنشاء تقنيات', 
                'display_name_en' => 'Create Technologies',
                'description_ar' => 'إنشاء تقنيات جديدة',
                'description_en' => 'Create new technologies',
                'group_ar' => 'التقنيات',
                'group_en' => 'technologies'
            ],
            [
                'name' => 'edit-technologies', 
                'display_name_ar' => 'تعديل التقنيات', 
                'display_name_en' => 'Edit Technologies',
                'description_ar' => 'تعديل بيانات التقنيات',
                'description_en' => 'Edit technologies information',
                'group_ar' => 'التقنيات',
                'group_en' => 'technologies'
            ],
            [
                'name' => 'delete-technologies', 
                'display_name_ar' => 'حذف التقنيات', 
                'display_name_en' => 'Delete Technologies',
                'description_ar' => 'حذف التقنيات',
                'description_en' => 'Delete technologies',
                'group_ar' => 'التقنيات',
                'group_en' => 'technologies'
            ],

            // صلاحيات إدارة القيم (Values) - CRUD كامل
            [
                'name' => 'view-values', 
                'display_name_ar' => 'عرض القيم', 
                'display_name_en' => 'View Values',
                'description_ar' => 'عرض قائمة القيم',
                'description_en' => 'View the list of values',
                'group_ar' => 'القيم',
                'group_en' => 'values'
            ],
            [
                'name' => 'create-values', 
                'display_name_ar' => 'إنشاء قيم', 
                'display_name_en' => 'Create Values',
                'description_ar' => 'إنشاء قيم جديدة',
                'description_en' => 'Create new values',
                'group_ar' => 'القيم',
                'group_en' => 'values'
            ],
            [
                'name' => 'edit-values', 
                'display_name_ar' => 'تعديل القيم', 
                'display_name_en' => 'Edit Values',
                'description_ar' => 'تعديل بيانات القيم',
                'description_en' => 'Edit values information',
                'group_ar' => 'القيم',
                'group_en' => 'values'
            ],
            [
                'name' => 'delete-values', 
                'display_name_ar' => 'حذف القيم', 
                'display_name_en' => 'Delete Values',
                'description_ar' => 'حذف القيم',
                'description_en' => 'Delete values',
                'group_ar' => 'القيم',
                'group_en' => 'values'
            ],
        ];

        foreach ($permissions as $permission) {
            Permissions::create($permission);
        }

        // إنشاء الأدوار
        $roles = [
            [
                'name' => 'administrator',
                'name_ar' => 'مدير عام',
                'name_en' => 'Administrator',
                'description_ar' => 'مدير النظام مع جميع الصلاحيات',
                'description_en' => 'System manager with all permissions',
                'is_system' => true
            ],
            [
                'name' => 'editor',
                'name_ar' => 'موظف',
                'name_en' => 'Editor',
                'description_ar' => 'مدير النظام',
                'description_en' => 'System editor',
                'is_system' => true
            ],
            [
                'name' => 'user',
                'name_ar' => 'مستخدم',
                'name_en' => 'User',
                'description_ar' => 'مستخدم عادي',
                'description_en' => 'Regular user',
                'is_system' => true
            ]
        ];

        foreach ($roles as $role) {
            Roles::create($role);
        }

        // تعيين جميع الصلاحيات لدور administrator
        $administrator = Roles::where('name', 'administrator')->first();
        $administrator->permissions()->sync(Permissions::pluck('id'));

        $editor = Roles::where('name', 'editor')->first();
        $editorPermissions = Permissions::where('name', '!=', 'manage-roles')
            ->where('name', '!=', 'manage-permissions')
            ->where('name', '!=', 'manage-users')
            ->where('name', '!=', 'create-users')
            ->where('name', '!=', 'edit-users')
            ->where('name', '!=', 'delete-users')
            ->where('name', '!=', 'change-user-password')
            ->pluck('id');
        $editor->permissions()->sync($editorPermissions);

        // البحث عن المستخدم ذو ID 1 وتعيين دور administrator له
        $userWithId1 = User::find(1);
        
        if ($userWithId1) {
            // إزالة جميع الأدوار الحالية وتعيين دور administrator
            $userWithId1->roles()->detach();
            $userWithId1->assignRole($administrator);
            $userWithId1->setPrimaryRole($administrator);
            
            $this->command->info('تم تعيين دور administrator للمستخدم ذو ID 1');
        } else {
            $this->command->warn('لم يتم العثور على المستخدم ذو ID 1');
        }

        // إنشاء المستخدمين الإضافيين إذا لم يكونوا موجودين
        $administratorUser = User::where('email', 'administrator@erp.com')->first();
        if (!$administratorUser) {
            $administratorUser = User::create([
                'username' => 'administrator',
                'email' => 'administrator@erp.com',
                'password' => Hash::make('password'),
                'name' => 'Super Admin',
                'status' => 'active',
                'email_verified_at' => now(),
            ]);
            $administratorUser->assignRole($administrator);
            $administratorUser->setPrimaryRole($administrator);
        }

        $editorUser = User::where('email', 'editor@erp.com')->first();
        if (!$editorUser) {
            $editorUser = User::create([
                'username' => 'editor',
                'email' => 'editor@erp.com',
                'password' => Hash::make('password'),
                'name' => 'System Editor',
                'status' => 'active',
                'email_verified_at' => now(),
            ]);
            $editorUser->assignRole($editor);
            $editorUser->setPrimaryRole($editor);
        }

        $this->command->info('تم إنشاء الصلاحيات والأدوار بنجاح!');
        $this->command->info('دور administrator يحتوي على جميع الصلاحيات');
        $this->command->info('تم تعيين دور administrator للمستخدم ذو ID 1');
    }
}