<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 		DB::table('users')->truncate();

        User::create(
        	['name' => 'cyka', 'role' => 1, 'email' => 'test@gmail.com', 'password' => bcrypt('12345678'), 'image' => 'dummy_image.png']
        	);
    }
}
