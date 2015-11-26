<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Groupe;

class GroupeTableSeeder extends Seeder {

	/**
	 * Run the users seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('groupes')->delete();

		$data = ['GL31', 'GL32','GL33','RT31', 'RT32','RT33'];

		foreach ($data as $k) {
			Groupe::create(['groupe_name' => $k]);
		}
		
	}

}
