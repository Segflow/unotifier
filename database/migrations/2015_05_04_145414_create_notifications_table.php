<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('content');
			$table->string('link')->nullable();
			$table->string('subject');

			$table->string('sender_id');

			$table->timestamps();
		});

		Schema::create('notification_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('notification_id')->unsigned()->index();
			$table->foreign('notification_id')->references('id')->on('notifications')->onDelete('cascade');
			$table->string('notif_id');

			$table->boolean('seen')->default(false);
			$table->timestamp('seen_at')->nullable();

			$table->string('user_id');

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
		Schema::drop('notification_user');
		Schema::drop('notifications');
	}

}
