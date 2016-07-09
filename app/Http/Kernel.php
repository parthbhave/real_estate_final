<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'can' => \Illuminate\Foundation\Http\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];
	
	protected function schedule(Schedule $schedule)
    {
        //Hardcoded the listings file path here but need to parameterize it instead - some other process must be dumping it somewhere
		//TODO - find out where
		$schedule->call(function () {
            $xml=simplexml_load_file("listings.xml") or die("Error: Error reading XML");
			foreach($xml->children() as $listing)
			{
				$photos = $listing->photos;
				$listingId= $listing->id;
				//insert the photos
				foreach($photos->children as $photo)
				{
					array_push($photo, $listingId);
					DB::table('photo')->insert($photo);
				}
				
				//TODO - find logic to remove photos child node - will the DOM->removeNode() function work here?
				//Remove photos, then split out the address fields and insert all fields into listing table
			}
        })->daily('02:00')->->timezone('America/New_York');
    }
	
}
