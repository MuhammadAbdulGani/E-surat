<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Staff', 'username' => 'staff', 'password' => Hash::make('123456')
        ]);
        // Admin::create([
        //     'name' => 'Sekertaris', 'username' => 'sekertaris', 'password' => Hash::make('123456'),
        // ]);
        // Admin::create([
        //     'name' => 'Dirjen', 'username' => 'dirjen', 'password' => Hash::make('123456'),
        // ]);
        // Admin::create([
        //     'name' => 'PT', 'username' => 'pt', 'password' => Hash::make('123456'),
        // ]);
        // Admin::create([
        //     'name' => 'PN', 'username' => 'pn', 'password' => Hash::make('123456'),
        // ]);
    }
}
