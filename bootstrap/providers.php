<?php

use App\Providers\AuthServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    AuthServiceProvider::class
];
