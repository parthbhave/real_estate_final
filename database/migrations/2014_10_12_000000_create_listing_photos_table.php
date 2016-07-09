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
	 
	//Database design will have 3 tables -
	//listing - all listings data except photos
	//photo - all photos - 1 photo per row - listingId from listing table as foreign key
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
			//TODO - add address fields
		});
		
		Schema::create('photo', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('listingId')->references('id')->on('listing');
			$table->dateTime('MediaModificationTimestamp');
			$table->string('MediaURL');
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
