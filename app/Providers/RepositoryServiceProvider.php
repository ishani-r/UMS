<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\University\CollegeInterface;
use App\Repositories\University\CollegeRepository;

use App\Interfaces\University\CommonSettingInterface;
use App\Repositories\University\CommonSettingRepository;

use App\Interfaces\University\CourseInterface;
use App\Repositories\University\CourseRepository;

use App\Interfaces\AdmissionInterface;
use App\Repositories\AdmissionRepository;

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
        $this->app->bind(CommonSettingInterface::class, CommonSettingRepository::class);
        $this->app->bind(CourseInterface::class, CourseRepository::class);
        $this->app->bind(AdmissionInterface::class, AdmissionRepository::class);
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
