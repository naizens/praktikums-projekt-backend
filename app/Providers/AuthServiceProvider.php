<?php

namespace App\Providers;

use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('web', function ($request) {
            if($request->session()->exists("userSession")){
                $session = $request->session()->get("userSession");
                $person = Person::where("session", $session)->get();
                if($person->count() > 0){
                    return $person->first();
                }
            }
            return null;
        });
    }
}
