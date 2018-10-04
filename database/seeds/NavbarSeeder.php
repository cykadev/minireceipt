<?php

use App\models\Navbar;
use Illuminate\Database\Seeder;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 		DB::table('navbars')->truncate();

        Navbar::create(
        	[
        	'navbar' => 'Dashboard',
        	'is_admin' => '1',
            'navigate_to' => '/',
            'font' => 'fa fa-home',
        	'have_ancestor' => 0,
        	]
        	);

        Navbar::create(
        	[
        	'navbar' => 'Assign Charges',
        	'is_admin' => '1',
            'navigate_to' => '/charges',
            'font' => 'fa fa-dollar',
            'have_ancestor' => 0,
        	]
        	);

        Navbar::create(
            [
            'navbar' => 'Receipts',
            'is_admin' => '1',
            'navigate_to' => '/receipt',
            'font' => 'fa fa-barcode',
            'have_ancestor' => 0,
            ]
            );

    }
}
