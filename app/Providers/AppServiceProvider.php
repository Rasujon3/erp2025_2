<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use App\Modules\Common\Repositories\CurrencyRepository;

class AppServiceProvider extends ServiceProvider
{

    // public function register(): void {}

    // public function boot()
    // {
    //     // Registering routes manually
    //     Route::middleware('web')
    //         ->group(base_path('routes/web.php')); // Default web routes



    //     $modules = [
    //         'common' => File::exists(base_path('app/Modules/Common')),
    //         'dashboard' => File::exists(base_path('app/Modules/Dashboard')),
    //         'crm' => File::exists(base_path('app/Modules/Crm')),
    //         'sales' => File::exists(base_path('app/Modules/Sales')),
    //         'projects' => File::exists(base_path('app/Modules/Projects')),
    //         'tasks' => File::exists(base_path('app/Modules/Tasks')),
    //         'hrm' => File::exists(base_path('app/Modules/Hrm')),
    //         'financial' => File::exists(base_path('app/Modules/Financial')),
    //         'asset' => File::exists(base_path('app/Modules/Asset')),
    //         'dms' => File::exists(base_path('app/Modules/Dms')),
    //         'admin' => File::exists(base_path('app/Modules/Admin')),
    //     ];

    //     // Share module availability with all views
    //     view()->share('modules', $modules);

    //     // Load routes and views dynamically
    //     foreach ($modules as $module => $exists) {
    //         if ($exists) {



    //             Route::middleware('web')
    //                 ->group(base_path("app/Modules/" . ucfirst($module) . "/Routes/web.php")); // Web routes
    //             Route::middleware('api')
    //                 ->prefix('api')
    //                 ->group(base_path("app/Modules/" . ucfirst($module) . "/Routes/api.php")); // API routes
    //             View::addNamespace($module, base_path("app/Modules/" . ucfirst($module) . "/Resources/views"));


    //             // Load migrations
    //             $modulePath = base_path("app/Modules/" . ucfirst($module));
    //             $migrationsPath = "{$modulePath}/Database/Migrations";
    //             if (File::exists($migrationsPath)) {
    //                 $this->loadMigrationsFrom($migrationsPath);
    //             }
    //         }
    //     }
    // }


    public function boot()
    {
        // Define the modules directory
        $modulesPath = base_path('app/Modules'); // Define the modules directory

        // Check for module directories
        $modules = collect(File::directories($modulesPath))->mapWithKeys(function ($path) { // Check for module directories
            $moduleName = ucfirst(basename($path)); // Get the module name
            return [$moduleName => $path]; // Return the module name
        });

        $availableModules = collect(File::directories($modulesPath))
            ->map(function ($path) {
                return strtolower(basename($path));
            })
            ->toArray();

        View::share(
            'modules',
            $availableModules
        );
        // Register modules
        foreach ($modules as $module => $modulePath) { // Loop through the modules
            $this->registerModule($module, $modulePath); // Register the module
        }
    }

    /**
     * Register routes, views, and migrations for a module.
     *
     * @param string $module
     * @param string $modulePath
     */
    private function registerModule(string $module, string $modulePath): void
    {
        $routesPath = "{$modulePath}/Routes"; // Define the routes directory
        $viewsPath = "{$modulePath}/Resources/views"; // Define the views directory
        $migrationsPath = "{$modulePath}/Database/Migrations"; // Define the migrations directory

        // Load Web Routes
        if (File::exists("{$routesPath}/web.php")) { // Check for web routes
            Route::middleware('web')->group("{$routesPath}/web.php"); // Load web routes
        }

        // Load API Routes
        if (File::exists("{$routesPath}/api.php")) { // Check for API routes
            Route::middleware('api')->prefix('api')->group("{$routesPath}/api.php"); // Load API routes
        }

        // Add View Namespace
        if (File::exists($viewsPath)) { // Check for views
            View::addNamespace(strtolower($module), $viewsPath); // Add view namespace
        }

        // Load Migrations
        if (File::exists($migrationsPath)) { // Check for migrations
            $this->loadMigrationsFrom($migrationsPath); // Load migrations
        }
    }
}
