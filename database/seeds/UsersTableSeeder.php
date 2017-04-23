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
    	// it will make then create
        factory(App\User::class, 40)->create()->each(
            function($user) {
                $user->profile()->save(
                    factory(App\Profile::class, 1)->make()
                );
            }
        );
    }
}
