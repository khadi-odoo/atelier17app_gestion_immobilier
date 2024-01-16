<?php

namespace App\Providers;

use App\Models\Commentaires;
use App\Models\User;
use App\Policies\PropertyPolicy;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Property::class => PropertyPolicy::class,
        Commentaires::class => PropertyPolicy::class,
        Picture::class => PropertyPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('delete-user', function (User $user) {
            return $user->role->admin;
        });
    }
}
