<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'             => 1,
                'title'          => 'Admin',
                'stripe_plan_id' => null,
                'price'          => null,
            ],
            [
                'id'             => 2,
                'title'          => 'Free Plan',
                'stripe_plan_id' => null,
                'price'          => null,
            ],
            [
                'id'             => 3,
                'title'          => 'Basic',
                'stripe_plan_id' => env('STRIPE_PLAN_BASIC_ID', 'plan_H2lPOHh23ffTrS'),
                'price'          => 1990,
            ],
            [
                'id'             => 4,
                'title'          => 'Professional',
                'stripe_plan_id' => env('STRIPE_PLAN_PLUS_ID', 'plan_H2lZa0ur3B3WT8'),
                'price'          => 3990,
            ],
            [
                'id'             => 5,
                'title'          => 'Enterprise',
                'stripe_plan_id' => env('STRIPE_PLAN_PREMIUM_ID', 'plan_H2lhHwLtMFW6YI'),
                'price'          => 7990,
            ],
        ];

        Role::insert($roles);

    }
}
