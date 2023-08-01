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
        $this->registerPolicies();
        
        Gate::define('admin', function(User $user) {
            if ($user->detailGtk && $user->detailGtk->jabatan === 'admin') {
                return true;
            }
        
            return false;
        });

        Gate::define('kepalasekolah', function(User $user) {
            if ($user->detailGtk && $user->detailGtk->jabatan === 'kepalasekolah') {
                return true;
            }
        
            return false;
        });

        Gate::define('walikelas', function(User $user) {
            if ($user->detailGtk && $user->detailGtk->jabatan === 'walikelas') {
                return true;
            }
        
            return false;
        });

        Gate::define('guru', function(User $user) {
            // $detailGtk = DetailGtk::where('jabatan', 'guru')->first();

            // return $user->id === $detailGtk->user_id;
            if ($user->detailGtk && $user->detailGtk->jabatan === 'guru') {
                return true;
            }
        
            return false;
        });
    }
}
