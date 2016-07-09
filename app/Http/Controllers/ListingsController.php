<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
}

class ListingsController extends Controller
{
    //caters to GET requests to /listings
	//The $listPriceSort and $listingDateSort parameters take values ascending or descending
	//$photosOnly will determine if only photos are to be returned - takes on boolean value
	//If $photosOnly is true, do we still bother about the sort parameters? - I will assume yes
	//Filtering will likely make use of the Eloquent framework - need client to send list of fields and filter values
	//I have not coded filtering here
	//but it will be something like this -
	/*
	$listings = $listings->filter(function($listing)
	{
		return $listing->isActive(); - to 
	});*/ //TODO - find out how the isActive method works and where it comes from - most likely its part of the model object created in Eloquent
	
	//Using eloquent might however change completely how we write the queries - need to study this more
	
	//Might be wise to put these parameters into an object - what if we want to add more sort columns in future?
    public function getListings($listPriceSort, $listingDateSort, $photosOnly)
    {
        //If photosOnly is false, we need to join listing, address and listing_photo tables
		//queries using DB
		//$listings = DB::table('listing')->get();
		//Depending on sorting parameters, modify the listings query like below -
		//$listings = DB::table('listing')->join('photo', 'photo.listingId', '=', 'listing.id' )->orderBy('ListPrice', 'desc')->orderBy('ListingDate', 'desc')->get();
    
		//If $photosOnly is true, query will involve a join something like -
		//$listings = DB::table('listing')
            //->join('listing_photo', 'listing_photo.listingId', '=', 'listing.id')
            //->select('photo.MediaModificationTimestamp', 'photo.MediaURL', 'photo.id', 'listing.ListPrice', 'listing.ListingDate')
			//->orderBy('listing.ListPrice', $listPriceSort)
			//->orderBy('listing.ListPrice', $listingDateSort)
            //->get();
			
		//return as JSON
		//return response()->json($listings);
		
	}
	
	//caters to POST requests to /listings/{id}
	//Takes in a single string with value either active or inactive - may consider changing to boolean here
	public function toggleListingActiveFlag($isActive)
    {
        //update using DB
		//Something like -
		/* DB::table('listing')
            ->where('id', {id})
            ->update(['status' => $isActive]); */
    }
}