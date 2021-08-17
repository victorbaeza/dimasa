<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \Response::macro('attachment', function ($content) {
            $headers = [
                'Content-type'        => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="etiqueta_envio.pdf"',
            ];

            return \Response::make($content, 200, $headers);
        });
    }
}
