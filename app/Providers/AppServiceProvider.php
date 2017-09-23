<?php

namespace App\Providers;

use App\DataAccess\Cache\DataCache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * アプリケーションサービスの初期化処理
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * アプリケーションサービスの登録
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\UserRepositoryInterface::class,
            \App\Repositories\UserRepository::class
        );
        $this->app->bind(
            \App\Repositories\EntryRepositoryInterface::class,
            function ($app) {
                return new \App\Repositories\EntryRepository(
                    new \App\DataAccess\Eloquent\Entry,
                    new DataCache($app['cache'], 'entry', 60)
                );
            }
        );
    }
}
