<?php

namespace app\controllers;

use app\library\Request;
use app\library\Response;
use app\core\RenderView;
use app\database\models\User;

class UserController
{
    public function index(Request $request, Response $response)
    {
        // return $response::json(['name'=>'Pedro']);
        $response::setHeaders([
            'Content-Type' => 'text/html',
        ]);

        try {
            $user = new User();
            $userQuery = $user->all();


            return RenderView::render('user/index', ['users' => $userQuery]);
        } catch (\Exception $err) {
            return $response::json([
                'error' => $err->getMessage(),
            ], 400);
        }
    }

    public function show(Request $request, Response $response, array $params)
    {
        $response::setHeaders([
            'Content-Type' => 'text/html',
        ]);

        // $User = array('id' => '999', 'name' => 'Pedro');
        $user = new User();
        $userQuery = $user->find($params[0]);
        // var_dump($userQuery);
        try {
            return RenderView::render('user', [
                'title' => 'List user',
                'users' => $userQuery
            ]);

            // return $response::json([
            //     'data' => $userQuery,
            // ]);
        } catch (\Exception $err) {
            return $response::json([
                'error' => $err->getMessage(),
            ], 400);
        }
    }

    public function register(Request $request, Response $response)
    {
        // return $response::json(['name'=>'Pedro']);
        $response::setHeaders([
            'Content-Type' => 'text/html',
        ]);

        try {
            return RenderView::render('auth/register');
        } catch (\Exception $err) {
            return $response::json([
                'error' => $err->getMessage(),
            ], 400);
        }
    }

    public function create(Request $request, Response $response)
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

    public function login(Request $request, Response $response)
    {
        $response::setHeaders([
            'Content-Type' => 'text/html',
        ]);

        try {
            return RenderView::render('auth/login');
        } catch (\Exception $err) {
            return $response::json([
                'error' => $err->getMessage(),
            ], 400);
        }
    }

    public function auth(Request $request, Response $response)
    {
        $response::setHeaders([
            'Content-Type' => 'text/html',
        ]);
        try {

            $data =  $request::body();

            $user = new User();
            $userQuery = $user->where('email', $data['email'], 'password, email');


            if (password_verify($data['password'], $userQuery[0]['password'])) {
                return $response::redirect('/user');
            } else {
                return $response::redirect('/login');
            }
        } catch (\Exception $err) {
            return $response::json([
                'error' => $err->getMessage(),
            ], 400);
        }
    }

    public function update(Request $request, Response $response)
    {
        var_dump('hello update');
    }

    public function delete(Request $request, Response $response)
    {
        var_dump('hello delete');
    }
}
