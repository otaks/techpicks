<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Services\FacebookService;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $facebookService;

    /**
     * Create a new controller instance.
     *
     * LoginController constructor.
     * @param FacebookService $facebookService
     * @return void
     */
    public function __construct(FacebookService $facebookService)
    {
        $this->middleware('guest')->except('logout');
        $this->facebookService = $facebookService;
    }

    /**
     * Facebook認証ページヘユーザーをリダイレクト
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectToFacebookProvider()
    {
        if (Auth::check()) return redirect($this->redirectTo);

        return $this->facebookService->redirect();
    }

    /**
     * Facebookからユーザー情報を取得
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleFacebookProviderCallback()
    {
        $user = $this->facebookService->get();
        if (!Auth::check()) Auth::loginUsingId($user->id);

        return redirect($this->redirectTo);
    }
}
