<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Entry;

/**
 * Class EntryRepository
 */
class EntryRepository implements EntryRepositoryInterface
{
    /** @var Entry */
    protected $eloquent;

    /**
     * @param Entry $eloquent
     */
    public function __construct(Entry $eloquent)
    {
        $this->eloquent = $eloquent;
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
}
