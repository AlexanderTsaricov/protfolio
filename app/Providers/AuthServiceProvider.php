<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

        Gate::define('viewFilament', function (User $user): bool {
            return (bool) $user->is_admin;
        });
    }
}
