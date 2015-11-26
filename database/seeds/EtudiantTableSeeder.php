<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Etudiant;
use App\Groupe;
use App\Device;

class EtudiantTableSeeder extends Seeder {

	/**
	 * Run the users seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('etudiants')->delete();

		$data = [
			[
				'nom' => 'Assel', 'prenom' => 'Meher', 'groupes' => ['GL31', 'GL3'], 'cin' => '09984317', 'identifiant' => '1200217',
			],
			[
				'nom' => 'Ben Braik', 'prenom' => 'Houssem', 'groupes' => ['GL31', 'GL3'], 'cin' => '09983317', 'identifiant' => '1200238',
			],
			[
				'nom' => 'Louati', 'prenom' => 'Maroua', 'groupes' => ['GL31', 'GL3'], 'cin' => '07455511', 'identifiant' => '1200389',
			],
			[
				'nom' => 'Neffoussi', 'prenom' => 'Ines', 'groupes' => ['GL31', 'GL3'], 'cin' => '07454322', 'identifiant' => '1200346',
			],
		];

		foreach ($data as $k) {
			$etudiant = new Etudiant;
			$etudiant->identifiant = $k['identifiant'];
			$etudiant->nom = $k['nom'];
			$etudiant->prenom = $k['prenom'];


			foreach ($k['groupes'] as $groupe_name) {
				$etudiant->groupes()->attach(Groupe::firstOrCreate(['groupe_name' => $groupe_name])->id);
			}

			if (isset($k['token'])) {
				$etudiant->device()->create(['token' => $k['token'], 'type' => $k['type']]);
			}
			$etudiant->user()->create([
				'identifiant' => $etudiant->identifiant, 
				'password'    => bcrypt(''),
				'active'      => 0,
			]);
			$etudiant->save();
		}
		
	}

}
