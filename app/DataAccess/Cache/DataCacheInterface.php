<?php

namespace App\DataAccess\Cache;

/**
 * Interface DataCacheInterface
 */
interface DataCacheInterface
{
    /**
     * @param $key
     *
     * @return mixed
     */
    public function get($key);

    /**
     * @param      $key
     * @param      $value
     * @param null $minutes
     *
     * @return mixed
     */
    public function put($key, $value, $minutes = null);

    /**
     * @param $key
     *
     * @return mixed
     */
    public function has($key);

    /**
     * @param $key
     *
     * @return mixed
     */
    public function forget($key);

    /**
     * @return void
     */
    public function flush();
}
