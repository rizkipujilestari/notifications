<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Http\ResponseFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Illuminate\Contracts\Routing\ResponseFactory', function ($app) {
            return new ResponseFactory(
                $app['Illuminate\Contracts\View\Factory'],
                $app['Illuminate\Routing\Redirector']
            );
        });

        // $this->app->singleton(
        //     Illuminate\Mail\MailServiceProvider::class,
        // );
        // // Aliases
        // $this->app->alias('mailer', \Illuminate\Contracts\Mail\Mailer::class);
        // // Make Queue
        // $this->app->make('queue');

        // $this->app->singleton(
        //     'mailer',
        //     function ($app) {
        //         return $app->loadComponent('mail', 'Illuminate\Mail\MailServiceProvider', 'mailer');
        //     }
        // );
        // // Aliases
        // $this->app->alias('mailer', \Illuminate\Contracts\Mail\Mailer::class);
        // // Make Queue
        // $this->app->make('queue');
    }
}
