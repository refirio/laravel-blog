<?php

namespace App\Repositories;

/**
 * Interface EntryRepositoryInterface
 */
interface EntryRepositoryInterface
{
    /**
     * @param array $params
     *
     * @return mixed
     */
    public function save(array $params);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id);

    /**
     * @return mixed
     */
    public function count();

    /**
     * @param int $limit
     *
     * @return mixed
     */
    public function byPage($limit = 10);

    /**
     * @param int $limit
     *
     * @return mixed
     */
    public function recent($limit = 10);
}
