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
        // Удалите или закомментируйте $this->registerPolicies();

        Gate::define('viewFilament', function (User $user): bool {
            Log::info('Gate viewFilament проверка для пользователя ID ' . $user->id . ', is_admin=' . $user->is_admin);
            return (bool) $user->is_admin;
        });
    }
}
