<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Entry;
use App\DataAccess\Cache\DataCacheInterface;

/**
 * Class EntryRepository
 */
class EntryRepository implements EntryRepositoryInterface
{
    /** @var DataCacheInterface */
    protected $cache;

    /** @var Entry */
    protected $eloquent;

    /**
     * @param Entry              $eloquent
     * @param DataCacheInterface $cache
     */
    public function __construct(Entry $eloquent, DataCacheInterface $cache)
    {
        $this->eloquent = $eloquent;
        $this->cache    = $cache;
    }

    /**
     * @param array $params
     *
     * @return mixed
     */
    public function save(array $params)
    {
        $attributes = [];
        $attributes['id'] = (isset($params['id'])) ? $params['id'] : null;

        return $this->eloquent->updateOrCreate($attributes, $params);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->eloquent->find($id);
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->eloquent->count();
    }

    /**
     * @param int $page
     * @param int $limit
     *
     * @return mixed
     */
    public function byPage($limit = 10)
    {
        return $this->eloquent->byPage($limit);
    }

    /**
     * @param int $limit
     *
     * @return mixed
     */
    public function recent($limit = 10)
    {
        $cacheKey = "entry:recent:{$limit}";
        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }
        $result = $this->eloquent->recent($limit);
        if ($result) {
            $this->cache->put($cacheKey, $result);
        }

        return $result;
    }
}
