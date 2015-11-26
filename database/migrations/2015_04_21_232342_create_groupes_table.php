<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groupes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('groupe_name');
			$table->timestamps();
		});

		Schema::create('memberships', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('user_id');

			$table->integer('groupe_id')->unsigned()->index();
			$table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('cascade');
			
			$table->timestamps();

		});

		Schema::create('gestion_groupe', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('user_id');
			
			$table->integer('groupe_id')->unsigned()->index();
			$table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('cascade');
			
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
		Schema::drop('gestion_groupe');
		Schema::drop('memberships');
		Schema::drop('groupes');
	}

}
