<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user =  \App\Admin::create([
            'name' => 'admin',
            'email' => 'super_admin@app.com',
            'password' => \Illuminate\Support\Facades\Hash::make('super_admin@app.com'),
            'image_path' => '55'
        ]);

    }
}
