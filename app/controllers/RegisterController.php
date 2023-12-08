<?php

namespace app\controllers;

use app\core\RenderView;
use app\library\Request;
use app\library\Response;
use app\database\models\User;

class RegisterController
{
    public function index(Request $request, Response $response)
    {
        return RenderView::render('auth/register');
    }

    public function store(Request $request, Response $response)
    {
        $response::setHeaders([
            'Content-Type' => 'text/html',
        ]);

        try {
            $data =  $request::body();
            $password = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]);
            $user = new User();
            $user->create([
                'name'      =>  $data['name'],
                'email'     =>  $data['email'],
                'password'  =>  $password
            ]);

            return $response::redirect('/user');
        } catch (\Exception $err) {
            return $response::json([
                'error' => $err->getMessage(),
            ], 400);
        }
    }
}
