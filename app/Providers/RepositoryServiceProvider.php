<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\University\CollegeInterface;
use App\Repositories\University\CollegeRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        // ............................Admin.......................................
        $this->app->bind(CollegeInterface::class, CollegeRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
