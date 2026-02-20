<?php

namespace App\Providers;

use App\Models\RekamMedis;
use App\Policies\RekamMedisPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         // Admin access
        Gate::define('admin-only', fn ($user) => $user->role === 'admin');

        // Dokter access
        Gate::define('dokter-only', fn ($user) => $user->role === 'dokter');
    }

    protected $policies = [
        RekamMedis::class => RekamMedisPolicy::class,
    ];
}
