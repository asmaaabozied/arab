<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Modules\Admin\Http\Controllers\Worker\AdminWorkersController;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleAdminNamespace = 'Modules\Admin\Http\Controllers\Admin';
    protected $moduleWorkerNamespace = 'Modules\Admin\Http\Controllers\Worker';
    protected $moduleEmployerNamespace = 'Modules\Admin\Http\Controllers\Employer';
    protected $moduleTaskNamespace = 'Modules\Admin\Http\Controllers\Task';
    protected $moduleRegionNamespace = 'Modules\Admin\Http\Controllers\Region';
    protected $moduleCategoryNamespace = 'Modules\Admin\Http\Controllers\Category';
    protected $moduleAddonNamespace = 'Modules\Admin\Http\Controllers\AdditionalFeatures';
    protected $moduleDiscountCodesNamespace = 'Modules\Admin\Http\Controllers\DiscountCodes';
    protected $moduleSettingNamespace = 'Modules\Admin\Http\Controllers\Setting';
    protected $modulePrivilegeNamespace = 'Modules\Admin\Http\Controllers\Privilege';
    protected $moduleCurrencyNamespace = 'Modules\Admin\Http\Controllers\Currency';

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

        $this->mapWorkerRoutes();

        $this->mapEmployerRoutes();

        $this->mapTaskRoutes();

        $this->mapRegionRoutes();

        $this->mapCategoryRoutes();

        $this->mapAddonRoutes();

        $this->mapDiscountCodeRoutes();

        $this->mapSettingRoutes();
        $this->mapPrivilegeRoutes();
        $this->mapCurrencyRoutes();
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
            ->namespace($this->moduleAdminNamespace)
            ->prefix('panel/admin')
            ->group(module_path('Admin', '/Routes/web.php'));
    }

    protected function mapWorkerRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleWorkerNamespace)
            ->prefix('panel/admin')
            ->group(module_path('Admin', '/Routes/worker.php'));
    }

    protected function mapEmployerRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleEmployerNamespace)
            ->prefix('panel/admin')
            ->group(module_path('Admin', '/Routes/employer.php'));
    }

    protected function mapTaskRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleTaskNamespace)
            ->prefix('panel/admin')
            ->group(module_path('Admin', '/Routes/task.php'));
    }

    protected function mapRegionRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleRegionNamespace)
            ->prefix('panel/admin')
            ->group(module_path('Admin', '/Routes/region.php'));
    }

    protected function mapCategoryRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleCategoryNamespace)
            ->prefix('panel/admin')
            ->group(module_path('Admin', '/Routes/category.php'));
    }

    protected function mapAddonRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleAddonNamespace)
            ->prefix('panel/admin')
            ->group(module_path('Admin', '/Routes/addon.php'));
    }

    protected function mapDiscountCodeRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleDiscountCodesNamespace)
            ->prefix('panel/admin')
            ->group(module_path('Admin', '/Routes/discountCodes.php'));
    }

    protected function mapSettingRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleSettingNamespace)
            ->prefix('panel/admin')
            ->group(module_path('Admin', '/Routes/setting.php'));
    }

    protected function mapPrivilegeRoutes()
    {
        Route::middleware('web')
            ->namespace($this->modulePrivilegeNamespace)
            ->prefix('panel/admin')
            ->group(module_path('Admin', '/Routes/privilege.php'));
    }

    protected function mapCurrencyRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleCurrencyNamespace)
            ->prefix('panel/admin')
            ->group(module_path('Admin', '/Routes/currency.php'));
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
            ->namespace($this->moduleAdminNamespace)
            ->group(module_path('Admin', '/Routes/api.php'));
    }
}
