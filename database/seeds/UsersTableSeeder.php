<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'     => 'Bogdan',
            'email'    => 'bogi@xeno.dev',
            'password' => bcrypt('secret')
        ]);
        factory(App\User::class, 20)->create();
    }
}
