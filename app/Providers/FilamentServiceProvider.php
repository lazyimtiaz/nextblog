<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Custom auth checks
        Filament::serving(function () {
            Filament::auth()->user()?->can('access filament');
        });
    }
}
