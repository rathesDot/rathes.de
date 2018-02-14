<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Aheenam\EstimatedReadingTime\EstimatedReadingTime;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('readingTime', function ($content) {
            return "<?php echo (new \Aheenam\EstimatedReadingTime\EstimatedReadingTime)
                ->setText($content)
                ->calculateTime();
            ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
