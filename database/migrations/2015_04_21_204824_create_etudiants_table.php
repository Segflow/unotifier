<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtudiantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('etudiants', function(Blueprint $table)
		{
			$table->string('identifiant');
			$table->string('nom', 15);
			$table->string('prenom', 15);
			//$table->string('cin', 15)->unique();
			$table->primary('identifiant');
			$table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('etudiants');
	}

}
