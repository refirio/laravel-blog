<?php

namespace App\Repositories;

/**
 * Interface CommentRepositoryInterface
 */
interface CommentRepositoryInterface
{
    /**
     * @param array $params
     *
     * @return mixed
     */
    public function save(array $params);

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function allByEntryId($id);
}
