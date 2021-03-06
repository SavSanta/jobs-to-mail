<?php namespace JobApis\JobsToMail\Providers;

use Illuminate\Support\ServiceProvider;
use JobApis\Jobs\Client\JobsMulti;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // User Repository
        $this->app->bind(
            \JobApis\JobsToMail\Repositories\Contracts\UserRepositoryInterface::class,
            \JobApis\JobsToMail\Repositories\UserRepository::class
        );
        // Job board API client
        $this->app->bind(JobsMulti::class, function () {
            return new JobsMulti(config('jobboards'));
        });
    }
}
