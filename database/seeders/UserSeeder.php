<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin'
        ]);

        $customer = Role::create([
            'name' => 'customer',
            'display_name' => 'customer'
        ]);

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'Admin@gmail.com';
        $admin->password = Hash::make('rahasia');
        $admin->save();

        $customer = new User();
        $customer->name = 'customer';
        $customer->email = 'customer@gmail.com';
        $customer->password = Hash::make('rahasia');
        $customer->save();

        $admin->attachRole($admin);
        $customer->attachRole($customer);
    }
}
