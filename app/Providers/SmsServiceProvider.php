<?php

namespace Ayimdomnic;

use Illuminate\Support\ServiceProvider;
use App\Libs\AfricasTalkingGateway;
class SmsServiceProvider extends ServiceProvider
{
	/**
	 *Register the application service
	 *
	 *@return void
	 */ 
	public function boot()
	{
		$this->app->singleton('Ayimdomnic\AfricasTalkingGateway', function(){
			$username = config('sms.username');
			$apikey = config('sms.apikey');
			return new AfricasTalkingGateway($username, $apikey);
		});

		//bind 
		$this->app->bind('Ayimdomnic\Interfaces\SmsInterface','Ayimdomnic\Repositories\SmsRepository');
		$this->app->bind('sms','Ayimdomnic\AfricasTalkingGateway',);
	}
}