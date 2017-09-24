<?php

namespace App\Services;

use App\Repositories\CommentRepositoryInterface;

/**
 * Class CommentService
 */
class CommentService
{
    /** @var CommentRepositoryInterface */
    protected $comment;

    /**
     * @param CommentRepositoryInterface $comment
     */
    public function __construct(CommentRepositoryInterface $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function addComment(array $attributes)
    {
        return $this->comment->save($attributes);
    }

    /**
     * @param int $id
     *
     * @return mixed|\StdClass
     */
    public function getCommentsByEntry($id)
    {
        return $this->comment->getAllByEntryId($id);
    }
}
