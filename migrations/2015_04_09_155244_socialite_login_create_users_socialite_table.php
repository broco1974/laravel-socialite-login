<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SocialiteLoginCreateUsersSocialiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_socialite', function(Blueprint $table)
		{
			// columns
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->string('provider');
			$table->string('provider_id');
			$table->string('nickname')->nullable();
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->string('avatar')->nullable();

			// indexes
			$table->unique(['provider','provider_id']);

			// foreign keys
			$table->foreign('user_id')
				->references('id')->on('users')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_socialite');
	}

}
