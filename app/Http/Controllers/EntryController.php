<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EntryService;
use App\Http\Controllers\Controller;

class EntryController extends Controller
{
    /** @var EntryService */
    protected $entry;

    /**
     * コンストラクタ
     *
     * @param EntryService $entry
     * @return void
     */
    public function __construct(EntryService $entry)
    {
        $this->entry = $entry;
    }

    /**
     * 記事一覧
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $entries = $this->entry->getByPage(10);

        return view('entry.index', ['entries' => $entries]);
    }

    /**
     * 記事詳細
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $attributes = [
            'entry' => $this->entry->getEntry($id),
            'id' => $id
        ];

        return view('entry.view', $attributes);
    }
}
