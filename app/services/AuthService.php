<?php

namespace app\services;

use app\database\models\User;

class AuthService
{

    public function login(array $data)
    {
        try {

            $email = strip_tags($data['email']);
            $password = strip_tags($data['password']);

            $user = new User();
            $userQuery = $user->where('email', $email, 'name, password, email');

            if (password_verify($password, $userQuery[0]['password']) && $email === $userQuery[0]['email']) {
                $this->hasLogin($userQuery);
                return true;
            } else return false;
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }

    private function hasLogin(array $user)
    {
        if (!isset($_SESSION['auth'])) {
            $_SESSION['auth'] = $user[0]['email'];
        }
    }

    public static function isAuth()
    {
        return isset($_SESSION['auth']);
    }

    public static function auth()
    {
        return $_SESSION['auth'] ?? null;
    }

    public function logout()
    {
        if (isset($_SESSION['auth'])) {
            unset($_SESSION['auth']);
        }
    }
}