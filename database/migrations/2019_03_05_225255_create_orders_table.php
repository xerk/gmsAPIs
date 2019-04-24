<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('user_id')->unsigned()->index();
			$table->bigInteger('worker_id')->unsigned()->index();
			$table->string('title', 100);
			$table->text('body');
			$table->tinyInteger('is_done');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}