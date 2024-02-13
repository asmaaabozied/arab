<?php

namespace Modules\Employer\Providers;

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
    protected $moduleNamespace = 'Modules\Employer\Http\Controllers';
    protected $moduleTaskNamespace = 'Modules\Employer\Http\Controllers\Task';
    protected $moduleTransactionNamespace = 'Modules\Employer\Http\Controllers\Transaction';
    protected $modulePrivilegeNamespace = 'Modules\Employer\Http\Controllers\Privilege';
    protected $moduleSettingNamespace = 'Modules\Employer\Http\Controllers\Setting';

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
            ->group(module_path('Employer', '/Routes/web.php'));
    }
    protected function mapTaskRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleTaskNamespace)
            ->prefix(LaravelLocalization::setLocale())
            ->group(module_path('Employer', '/Routes/task.php'));
    }
    protected function mapTransactionRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleTransactionNamespace)
            ->prefix('panel')
            ->group(module_path('Employer', '/Routes/transaction.php'));
    }
    protected function mapPrivilegeRoutes()
    {
        Route::middleware('web')
            ->namespace($this->modulePrivilegeNamespace)
            ->prefix(LaravelLocalization::setLocale())
//            ->prefix('panel')
            ->group(module_path('Employer', '/Routes/privilege.php'));
    }
    protected function mapSettingRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleSettingNamespace)
            ->prefix('panel')
            ->group(module_path('Employer', '/Routes/setting.php'));
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
            ->group(module_path('Employer', '/Routes/api.php'));
    }
}
