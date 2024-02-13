<?php

namespace Modules\Support\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\Support\Http\Controllers';
    protected $moduleAdminNamespace = 'Modules\Support\Http\Controllers\Admin';
    protected $moduleEmployerNamespace = 'Modules\Support\Http\Controllers\Employer';
    protected $moduleWorkerNamespace = 'Modules\Support\Http\Controllers\Worker';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();
        $this->mapEmployerRoutes();
        $this->mapWorkerRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleNamespace)
            ->group(module_path('Support', '/Routes/web.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleAdminNamespace)
            ->group(module_path('Support', '/Routes/admin.php'));
    }

    protected function mapEmployerRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleEmployerNamespace)
            ->group(module_path('Support', '/Routes/employer.php'));
    }

    protected function mapWorkerRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleWorkerNamespace)
            ->group(module_path('Support', '/Routes/worker.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->moduleNamespace)
            ->group(module_path('Support', '/Routes/api.php'));
    }
}
