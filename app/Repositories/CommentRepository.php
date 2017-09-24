<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Comment;
use App\DataAccess\Cache\DataCacheInterface;

/**
 * Class CommentRepository
 */
class CommentRepository implements CommentRepositoryInterface
{
    /** @var DataCacheInterface */
    protected $cache;

    /** @var Comment */
    protected $eloquent;

    /**
     * @param Comment            $eloquent
     * @param DataCacheInterface $cache
     */
    public function __construct(Comment $eloquent, DataCacheInterface $cache)
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
        return $this->eloquent->fill($params)->save();
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function allByEntryId($id)
    {
        return $this->eloquent->allByEntryId($id);
    }
}
