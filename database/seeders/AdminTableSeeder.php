<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

/**
 * Class AdminTableSeeder
 */
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'id'             => 1,
                'created_by'     => auth()->id(),
                'name'           => auth()->user()->name,
                'email'          => auth()->user()->email,
                'password'       => auth()->user()->getAuthPassword(),
                'remember_token' => null,
                'is_admin'       => 1, // 1 - Admin/Professional | 0 - Professional
            ],
        ];

        \App\Models\Tenant\Admin::insert($admin);
    }
}
