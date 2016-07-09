<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing', function (Blueprint $table) {
            $table->increments('id');
            $table->float('ListPrice');
			$table->string('ListingURL');
			$table->string('ListingURL');
			$table->smallInteger('bedrooms');
			$table->smallInteger('bathrooms');
			$table->smallInteger('bathrooms');
			$table->string('PropertyType');
			$table->string('ListingKey');
			$table->string('ListingCategory');
			$table->string('ListingStatus');
			$table->string('ListingDescription');
			$table->string('MlsId');
			$table->string('MlsName');
			$table->string('MlsNumber');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
