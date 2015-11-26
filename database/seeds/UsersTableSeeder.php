<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Professeur;
use App\Administrateur;
use App\Groupe;
use App\User;

class UsersTableSeeder extends Seeder {

	/**
	 * Run the professeurs seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('professeurs')->delete();
		DB::table('users')->delete();

		$data = [
			[
			'nom' => 'Azzaz', 'prenom' => 'skander', 'identifiant' => 'skan123',
			'departement' => 'informatique', 'gere' => ['GL31', 'RT31'], 
			'password' => '1', 'groupes' => ['DEPARTEMENT INFORMATIQUE']
			],
			[
			'nom' => 'Hdhili', 'prenom' => 'Aroua', 'identifiant' => 'aroua123',
			'departement' => 'informatique', 'gere' => ['GL31', 'RT32'], 
			'password' => 'aroua123', 'groupes' => ['DEPARTEMENT INFORMATIQUE']
			],
			[
			'nom' => 'Chaib', 'prenom' => 'Faten', 'identifiant' => 'feten123',
			'departement' => 'informatique', 'gere' => ['GL3', 'MPI31', 'DEPARTEMENT INFORMATIQUE'], 
			'password' => 'feten123', 'groupes' => ['DEPARTEMENT INFORMATIQUE']
			],

		];

		// Create the administrator
		$admin = new Administrateur(['identifiant' => 'adminINSAT', 'universite' => 'Insat']);
		$admin->user()->create([
			'password' => bcrypt('2'),
			'active' => true
		]);
		$admin->save();

		foreach ($data as $k) {
			$p = new Professeur([
				'identifiant' => $k['identifiant'],
				'nom' => $k['nom'],
				'prenom' => $k['prenom']
			]);
			$p->user()->create([
				'password' => bcrypt($k['password']),
				'active' => true
			]);
			

			// He has a device!
			if (isset($k['token'])) {	
				$p->device()->create(['token' => $k['token'], 'type' => $k['type']]); 
			}

			foreach ($k['groupes'] as $groupe_name) {
				$g = Groupe::firstOrCreate(['groupe_name' => $groupe_name]);
				$p->groupes()->attach($g->id);
			}

			foreach ($k['gere'] as $groupe_name) {
				$g = Groupe::firstOrCreate(['groupe_name' => $groupe_name]);
				$p->subgroupes()->attach($g->id);
			}
			
			$p->save();

		}
		
	}

}
