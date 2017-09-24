<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentStoreRequest;
use App\Services\CommentService;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /** @var CommentService */
    protected $comment;

    /**
     * コンストラクタ
     *
     * @param CommentService $comment
     * @return void
     */
    public function __construct(CommentService $comment)
    {
        $this->comment = $comment;
    }

    /**
     * 投稿
     *
     * @param CommentStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentStoreRequest $request)
    {
        $input = $request->only(['entry_id', 'name', 'comment']);
        $this->comment->addComment($input);

        return redirect()->route('entry.index');
    }
}
