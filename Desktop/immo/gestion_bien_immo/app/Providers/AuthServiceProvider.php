<?php

namespace App\Providers;

<<<<<<< HEAD
=======
use App\Models\Commentaires;
use App\Models\User;
use App\Policies\PropertyPolicy;
use Illuminate\Support\Facades\Gate;
>>>>>>> develop
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
<<<<<<< HEAD
        //
=======
        Property::class => PropertyPolicy::class,
        Commentaires::class => PropertyPolicy::class,

>>>>>>> develop
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
<<<<<<< HEAD
        //
=======
        Gate::define('delete-user', function (User $user) {
            return $user->admin;
        });
>>>>>>> develop
    }
}
