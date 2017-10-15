<?php

namespace App\Services;

use App\Repositories\EntryRepositoryInterface;
use Illuminate\Contracts\Auth\Access\Gate;

/**
 * Class EntryService
 */
class EntryService
{
    /** @var EntryRepositoryInterface */
    protected $entry;

    /** @var Gate */
    protected $gate;

    /**
     * @param EntryRepositoryInterface $entry
     * @param Gate                     $gate
     */
    public function __construct(EntryRepositoryInterface $entry, Gate $gate)
    {
        $this->entry = $entry;
        $this->gate  = $gate;
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function postEntry(array $attributes)
    {
        if ($this->getEntryAbility($attributes['id'])) {
            return $this->entry->save($attributes);
        }
    }

    /**
     * @param int $limit
     *
     * @return mixed|\StdClass
     */
    public function getEntriesByPage($limit = 10)
    {
        return $this->entry->byPage($limit);
    }

    /**
     * @param int $limit
     *
     * @return mixed|\StdClass
     */
    public function getRecentEntries($limit = 10)
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

    /**
     * 操作権限を取得する
     *
     * @param $id
     *
     * @return bool
     */
    public function getEntryAbility($id)
    {
        return $this->gate->allows('update', $this->getEntry($id));
    }
}
