<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // App\User::create([
        //     'fname' => 'John',
        //     'lname' => 'Doe',
        //     'email' => 'user@user.com',
        //     'address1' => 'City',
        //     'password' => Hash::make('123123123')
        // ]);

        App\Admin::create([
            'fname' => 'Admin2',
            'lname' => 'Istrator2',
            'email' => 'admin2@admin.com',
            'password' => Hash::make('123123123')
        ]);
    }
}
