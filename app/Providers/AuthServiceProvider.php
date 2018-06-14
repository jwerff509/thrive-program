<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-progress-reports', function ($user) {
          if($user->isAdmin == 1) {
            return true;
          }
          return false;
        });

        Gate::define('change-password', function ($user) {
          if($user->isAdmin == 1) {
            return true;
          }
          return false;
        });

        Gate::define('change-admin-settings', function ($user) {
          if($user->isAdmin == 1) {
            return true;
          }
          return false;
        });

        //
    }
}
