<?php

namespace Modules\Worker\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\Worker\Http\Controllers';
    protected $moduleTaskNamespace = 'Modules\Worker\Http\Controllers\Task';
    protected $moduleTransactionNamespace = 'Modules\Worker\Http\Controllers\Transaction';
    protected $modulePrivilegeNamespace = 'Modules\Worker\Http\Controllers\Privilege';
    protected $moduleSettingNamespace = 'Modules\Worker\Http\Controllers\Setting';
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

        $this->mapTaskRoutes();

        $this->mapTransactionRoutes();
        $this->mapPrivilegeRoutes();
        $this->mapSettingRoutes();
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
            ->prefix(LaravelLocalization::setLocale())
            ->group(module_path('Worker', '/Routes/web.php'));
    }
    protected function mapTaskRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleTaskNamespace)
            ->prefix(LaravelLocalization::setLocale())

            ->group(module_path('Worker', '/Routes/task.php'));
    }
    protected function mapTransactionRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleTransactionNamespace)
            ->prefix(LaravelLocalization::setLocale())

            ->group(module_path('Worker', '/Routes/transaction.php'));
    }

    protected function mapPrivilegeRoutes()
    {
        Route::middleware('web')
            ->namespace($this->modulePrivilegeNamespace)
            ->prefix(LaravelLocalization::setLocale())

            ->group(module_path('Worker', '/Routes/privilege.php'));
    }
    protected function mapSettingRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleSettingNamespace)
            ->group(module_path('Worker', '/Routes/setting.php'));
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
            ->group(module_path('Worker', '/Routes/api.php'));
    }
}
