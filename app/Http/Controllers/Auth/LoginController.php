<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function socialLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        // ソーシャルサービス（情報）を取得
        $userSocial = $data = Socialite::driver('facebook')->user();

        //e mailで登録を調べる
        $user = User::where(['email' => $userSocial->getEmail()])->first();


        // 登録（email）の有無で分岐
        if ($user) {
            //す でに登録済みの場合は、そのままログイン
            Auth::login($user);
            return redirect('/');
        } else {
            // 初めての方は登録を
            $newUser = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);

            //そのままログイン
            Auth::login($newUser);
            return redirect('/');
        }
    }
}
