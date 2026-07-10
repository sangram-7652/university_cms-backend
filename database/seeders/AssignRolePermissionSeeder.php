<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AssignRolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // --------------------------------------------------------------------
        // super_admin: Gate::before() in AppServiceProvider bypasses all
        // permission checks, so no explicit permissions are needed.
        // We still sync all to keep the DB consistent for auditing purposes.
        // --------------------------------------------------------------------

        // --------------------------------------------------------------------
        // admin: assign a sensible full-access default set.
        // Permissions can be restricted per-admin via the admin panel.
        // --------------------------------------------------------------------
        $admin = Role::findByName('admin');

        $adminPermissions = [
            // University
            'view_university',
            'create_university',
            'edit_university',
            'delete_university',

            // Users
            'view_user',
            'create_user',
            'edit_user',
            'delete_user',

            // Academic
            'view_course',
            'create_course',
            'edit_course',
            'delete_course',

            'view_specialization',
            'create_specialization',
            'edit_specialization',
            'delete_specialization',

            'view_semester',
            'create_semester',
            'edit_semester',
            'delete_semester',

            'view_subject',
            'create_subject',
            'edit_subject',
            'delete_subject',

            'view_curricula',
            'create_curricula',
            'edit_curricula',
            'delete_curricula',

            'view_fee_structure',
            'create_fee_structure',
            'edit_fee_structure',
            'delete_fee_structure',

            // Content
            'view_blog',
            'create_blog',
            'edit_blog',
            'delete_blog',

            'view_blog_faq',
            'create_blog_faq',
            'edit_blog_faq',
            'delete_blog_faq',

            'view_news',
            'create_news',
            'edit_news',
            'delete_news',

            'view_faq',
            'create_faq',
            'edit_faq',
            'delete_faq',

            // Homepage
            'view_homepage_about',
            'create_homepage_about',
            'edit_homepage_about',
            'delete_homepage_about',

            'view_homepage_hero',
            'create_homepage_hero',
            'edit_homepage_hero',
            'delete_homepage_hero',

            'view_homepage_eligibility',
            'create_homepage_eligibility',
            'edit_homepage_eligibility',
            'delete_homepage_eligibility',

            'view_homepage_faq',
            'create_homepage_faq',
            'edit_homepage_faq',
            'delete_homepage_faq',

            'view_homepage_why_choose_us',
            'create_homepage_why_choose_us',
            'edit_homepage_why_choose_us',
            'delete_homepage_why_choose_us',

            'view_homepage_program',
            'create_homepage_program',
            'edit_homepage_program',
            'delete_homepage_program',

            'view_footer_cta',
            'create_footer_cta',
            'edit_footer_cta',
            'delete_footer_cta',

            // SEO (admin can view+edit but not create/delete settings)
            'view_seo_setting',
            'edit_seo_setting',

            'view_schema_template',
            'create_schema_template',
            'edit_schema_template',
            'delete_schema_template',

            'view_sitemap_setting',
            'create_sitemap_setting',
            'edit_sitemap_setting',
            'delete_sitemap_setting',

            'view_robots_setting',
            'create_robots_setting',
            'edit_robots_setting',
            'delete_robots_setting',

            // Student Zone
            'view_admission',
            'create_admission',
            'edit_admission',
            'delete_admission',
            // Courses Fees
            'view_courses_fees',
            'create_courses_fees',
            'update_courses_fees',
            'delete_courses_fees',

            'view_hall_ticket',
            'create_hall_ticket',
            'edit_hall_ticket',
            'delete_hall_ticket',

            'view_study_material',
            'create_study_material',
            'edit_study_material',
            'delete_study_material',

            'view_result',
            'create_result',
            'edit_result',
            'delete_result',

            'view_library_portal',
            'create_library_portal',
            'edit_library_portal',
            'delete_library_portal',

            'view_assignment_status',
            'create_assignment_status',
            'edit_assignment_status',
            'delete_assignment_status',

            'view_alternative_university',
            'create_alternative_university',
            'edit_alternative_university',
            'delete_alternative_university',






        ];

        $admin->syncPermissions($adminPermissions);

        // Flush cache after assignment
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
