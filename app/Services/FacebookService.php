<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Services\UserService;
use Socialite;

class FacebookService
{
    protected $fields = ['name', 'email', 'gender', 'birthday', 'verified', 'link', 'first_name', 'last_name'];

    protected $extractingFields = ['id', 'birthday', 'email', 'gender', 'first_name', 'last_name'];

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Facebook認証ページヘユーザーをリダイレクト
     *
     * @return mixed
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Facebookからユーザー情報を取得
     *
     * @return mixed
     */
    public function get()
    {
        Socialite::driver('facebook')->fields($this->fields);
        $facebookUser = Socialite::driver('facebook')->user();

        $user = $this->userService->findByEmail($facebookUser->getEmail());
        if (!isset($user)) $user = $this->userService->firstOrCreate($this->format($facebookUser));

        return $user;
    }

    /**
     * Facebookから取得した情報を整形
     *
     * @param $facebookUser
     * @return array
     */
    protected function format($facebookUser)
    {
        $result = array();
        foreach ($facebookUser->user as $_key => $_value) {
            if (!in_array($_key, $this->extractingFields)) continue;

            switch ($_key) {
                case 'birthday' :
                    $explodedBirthDay = explode('/', $_value);
                    $_value = "{$explodedBirthDay[2]}/{$explodedBirthDay[0]}/{$explodedBirthDay[1]}";
                    break;
                case 'id' :
                    $_key = 'facebook_id';
                    break;
                default : break;
            }

            $result[$_key] = $_value;
        }
        return $result;
    }
}
