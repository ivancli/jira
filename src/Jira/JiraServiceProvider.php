<?php
namespace Invigor\Jira;

use Illuminate\Support\ServiceProvider;

/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 10/5/2016
 * Time: 4:18 PM
 */
class JiraServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/jira.php' => config_path('jira.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/../config/jira.php', 'jira'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerJira();
    }

    private function registerJira()
    {
        $this->app->bind('jira', function ($app) {
            return new Jira($app);
        });
        $this->app->alias('jira', 'Invigor\Jira\Jira');
    }
}