<?php

namespace App\Providers;

use App\Models\User;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {


        // Super Admin Bypass
        Gate::before(function (User $user, string $ability) {
            return $user->hasRole('super_admin')
                ? true
                : null;
        });
    }
}
