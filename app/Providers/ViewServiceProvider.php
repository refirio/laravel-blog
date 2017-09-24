<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ViewServiceProvider
 */
class ViewServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        \Blade::setEchoFormat('nl2br(e(%s))');

        /** elements.admin.information 描画時に App\Composers\UserComposer の compose メソッドが実行されます */
        $this->app['view']->composer('elements.admin.information', \App\Composers\UserComposer::class);
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        // any
    }
}
