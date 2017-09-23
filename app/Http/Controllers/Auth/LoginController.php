<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ログインコントローラ
    |--------------------------------------------------------------------------
    |
    | このコントローラはアプリケーションの認証ユーザを処理し、
    | トップページへリダイレクトする。コントローラはアプリケーションに
    | 機能を便利に提供するためにトレイトを使用している
    |
    */

    use AuthenticatesUsers;

    /**
     * ログイン後のユーザリダイレクト先
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * 新しいコントローラインスタンスの生成
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        // 何度もログインに失敗したらアカウントロック
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // ログインに失敗した回数を記録
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
