<?php

namespace App\Services;

use App\Repositories\EntryRepositoryInterface;

/**
 * Class EntryService
 */
class EntryService
{
    /** @var EntryRepositoryInterface */
    protected $entry;

    /**
     * @param EntryRepositoryInterface $entry
     */
    public function __construct(EntryRepositoryInterface $entry)
    {
        $this->entry = $entry;
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function addEntry(array $attributes)
    {
        return $this->entry->save($attributes);
    }

    /**
     * @param int $limit
     *
     * @return mixed|\StdClass
     */
    public function getByPage($limit = 10)
    {
        return $this->entry->byPage($limit);
    }

    /**
     * @param int $limit
     *
     * @return mixed|\StdClass
     */
    public function getRecent($limit = 10)
    {
        return $this->entry->recent($limit);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getEntry($id)
    {
        return $this->entry->find($id);
    }
}
