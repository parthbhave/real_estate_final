<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
| Routes are designed/defined here but they are NOT currently talking to controllers
*/

use App\Http\Controllers;

//This works - returning strings from route itself

Route::get('/', function () {
/*
a call to / should return a string like this - options -
/listings - all listings - parameters $listPriceSort - ascending/descending, $listingDateSort - ascending/descending, $photosOnly - boolean
/	
*/
	return 'Parths real estate agency - options below - ';
});

//But this does NOT work
//Display all listings
Route::get('/listings', 'ListingsController@getListings');

//This route is for a POST request updating the active status of a listing with a certain id parameter
//A separate GET endpoint maybe written to get the id based on name or other values
//passing back a URL to this POST endpoint as part of its returned JSON
Route::post('/listings/{id}', 'ListingsController@toggleListingActiveFlag');