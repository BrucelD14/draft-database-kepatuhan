<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('reviewer', function (User $user) {
            return $user->jabatan === 'Senior Manajer MRH';
        });

        Gate::define('editor', function (User $user) {
            if ($user->jabatan === 'Manajer KTKP' || $user->jabatan === 'Staff KTKP') {
                return $user;
            }
        });

        Gate::define('not_reader', function (User $user) {
            if ($user->jabatan === 'Senior Manajer MRH' || $user->jabatan === 'Manajer KTKP' || $user->jabatan === 'Staff KTKP') {
                return $user;
            };
        });
    }
}
