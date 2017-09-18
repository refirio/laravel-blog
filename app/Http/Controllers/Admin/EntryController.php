<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\EntryStoreRequest;
use App\Http\Requests\EntryUpdateRequest;
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
        $this->middleware('auth');

        $this->entry = $entry;
    }

    /**
     * 記事一覧
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $result = $this->entry->getByPage($request->get('page', 1), 20);

        return view('admin.entry.index', ['page' => $result]);
    }

    /**
     * 投稿画面
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.entry.create');
    }

    /**
     * 投稿
     *
     * @param EntryStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EntryStoreRequest $request)
    {
        $user = \Auth::user();

        $input = $request->only(['title', 'body']);
        $input['user_id'] = $user->id;
        $this->entry->addEntry($input);

        return redirect()->route('admin.entry.index');
    }

    /**
     * 編集画面
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $attributes = [
            'entry' => $this->entry->getEntry($id),
            'id' => $id
        ];

        return view('admin.entry.edit', $attributes);
    }

    /**
     * 編集
     *
     * @param                    $id
     * @param EntryUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, EntryUpdateRequest $request)
    {
        $user = \Auth::user();

        $input = $request->only(['title', 'body']);
        $input['user_id'] = $user->id;
        $input['id'] = $id;
        $this->entry->addEntry($input);

        return redirect()->route('admin.entry.index');
    }
}
