<?php

use App\models\NavAncestor;
use Illuminate\Database\Seeder;

class AncestorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	DB::table('nav_ancestors')->truncate();


/*
    COMPANY ANCESTORS
*/
        // NavAncestor::create(
        // 	[
        // 	'navbar_id' => 2,
        // 	'navbar' => 'Add New',
        // 	'navigate_to' => '/addNewCharges',
        // 	]
        // 	);

        // NavAncestor::create(
        // 	[
        // 	'navbar_id' => 2,
        // 	'navbar' => 'Charges List',
        // 	'navigate_to' => '/chargesList',
        // 	]
        // 	);


/*
    ACCOUNTS ANCESTORS
*/

        // NavAncestor::create(
        //     [
        //     'navbar_id' => 3,
        //     'navbar' => 'New Receipt',
        //     'navigate_to' => '/addNewReceipt',
        //     ]
        //     );

        // NavAncestor::create(
        //     [
        //     'navbar_id' => 3,
        //     'navbar' => 'Receipts List',
        //     'navigate_to' => '/receiptsList',
        //     ]
        //     );
    }
}
