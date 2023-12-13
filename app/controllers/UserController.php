<?php

namespace app\controllers;

use app\library\Request;
use app\library\Response;
use app\core\RenderView;
use app\database\models\User;

class UserController
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
        $this->response->setHeaders([
            'Content-Type' => 'text/html',
        ]);

        try {
            $user = new User();
            $userQuery = $user->all();

            return $this->response->json([
                [
                    'results' => [
                        'users' => $userQuery
                    ]
                ]
            ]);
            // return RenderView::render('user/index', ['users' => $userQuery]);
        } catch (\Exception $err) {
            return $this->response->json([
                'error' => $err->getMessage(),
            ], 400);
        }
    }

    public function show(array $params)
    {
        $this->response->setHeaders([
            'Content-Type' => 'text/html',
        ]);

        $user = new User();
        $userQuery = $user->find($params[0]);
        try {
            // return RenderView::render('user', [
            //     'title' => 'List user',
            //     'users' => $userQuery
            // ]);

            return $this->response->json([
                'results' => ['users' => $userQuery]
            ]);
        } catch (\Exception $err) {
            return $this->response->json([
                'error' => $err->getMessage(),
            ], 400);
        }
    }

    public function update()
    {
        var_dump('hello update');
    }

    public function delete()
    {
        var_dump('hello delete');
    }
}
