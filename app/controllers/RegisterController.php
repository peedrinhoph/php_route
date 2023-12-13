<?php

namespace app\controllers;

use app\core\RenderView;
use app\library\Request;
use app\library\Response;
use app\database\models\User;

class RegisterController
{
    private Request $request;
    private Response $response;

    public function __construct()
    {
        $this->request = new Request;
        $this->response = new Response;
    }

    public function index()
    {
        return RenderView::render('auth/register');
    }

    public function store()
    {
        $this->response->setHeaders([
            'Content-Type' => 'text/html',
        ]);

        try {
            $data = $this->request->body();
            $password = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]);
            $user = new User();
            $user->create([
                'name'      =>  $data['name'],
                'email'     =>  $data['email'],
                'password'  =>  $password
            ]);

            return $this->response->redirect('/user');
        } catch (\Exception $err) {
            return $this->response->json([
                'error' => $err->getMessage(),
            ], 400);
        }
    }
}
