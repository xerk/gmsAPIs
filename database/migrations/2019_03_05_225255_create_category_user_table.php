<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryUserTable extends Migration {

	public function up()
	{
		Schema::create('category_user', function(Blueprint $table) {
			$table->bigInteger('user_id')->unsigned()->index();
			$table->integer('category_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('category_user');
	}
}
