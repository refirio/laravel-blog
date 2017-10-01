<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

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

        // elements.admin.information 描画時に App\Composers\InformationAdminElementsComposer の compose メソッドが実行される
        View::composer('elements.admin.information', \App\Composers\InformationAdminElementsComposer::class);
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        // any
    }
}
