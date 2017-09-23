<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EntryService;

class HomeController extends Controller
{
    /**
     * 新しいコントローラインスタンスの生成
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param EntryService $entry
     * @return \Illuminate\Http\Response
     */
    public function index(EntryService $entry)
    {
        $entries = $entry->getRecent(3);

        return view('home', ['entries' => $entries]);
    }
}
