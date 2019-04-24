<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkersTable extends Migration {

	public function up()
	{
		Schema::create('workers', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('user_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->string('experience')->nullable();
			$table->text('biography')->nullable();
			$table->float('price');
			$table->string('files')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('workers');
	}
}
