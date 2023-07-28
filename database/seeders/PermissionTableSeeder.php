<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'course-list',
            'course-create',
            'course-edit',
            'course-delete',

            'topic-list',
            'topic-create',
            'topic-edit',
            'topic-delete',

            'plan-list',
            'plan-create',
            'plan-edit',
            'plan-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'order-list',
            'order-edit',
            'order-delete',

            'referral_income-list',

            'earning-list',

            'slider-list',

            'social_media_link-list',

            'instructor-list',
            'instructor-create',
            'instructor-edit',
            'instructor-delete',

            'review-list',
            'review-create',
            'review-edit',
            'review-delete',

            'media-section',

            'faq-section',

            'testimonial_video-section',

            'commission_setting-section',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'staff-list',
            'staff-create',
            'staff-edit',
            'staff-delete',
        ];

        foreach ($permissions as $permission) {
            $data=explode('-',$permission);

            $permissions_data = Permission::where('name', $permission)->first();
            if(!$permissions_data){
                $permissions_data = new Permission;
            }
            $permissions_data->name=$permission;
            $permissions_data->parent_name=$data[0];
            $permissions_data->guard_name = 'admin';
            $permissions_data->save();
        }
    }
}
