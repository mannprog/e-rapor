<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\DetailGtk;
use App\Models\Mapel;
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
        Gate::define('admin', function(User $user) {
            $detailGtk = DetailGtk::where('jabatan', 'admin')->first();

            return $user->id === $detailGtk->user_id;
        });

        Gate::define('kepalasekolah', function(User $user) {
            $detailGtk = DetailGtk::where('jabatan', 'kepalasekolah')->first();

            return $user->id === $detailGtk->user_id;
        });

        Gate::define('walikelas', function(User $user) {
            $detailGtk = DetailGtk::where('jabatan', 'walikelas')->first();

            return $user->id === $detailGtk->user_id;
        });

        Gate::define('guru', function(User $user) {
            $detailGtk = DetailGtk::where('jabatan', 'guru')->first();

            return $user->id === $detailGtk->user_id;
        });
    }
}
