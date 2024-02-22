<?php

namespace app\controllers;

use app\library\Request;
use app\library\Response;
use app\core\RenderView;
use app\database\models\User;

class HomeController
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
        // return $response::json(['name'=>'Pedro']);
        $this->response->setHeaders([
            'Content-Type' => 'text/html',
        ]);

        try {
            // return $this->response->json([
                
            // ], 400);
            return RenderView::render('home/home', []);
        } catch (\Exception $err) {
            return $this->response->json([
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
                'data' => $userQuery
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

    public function create(Request $request, Response $response)
    {

        $user = new User();
        $userInsert = $user->create([
            'nome'  => 'Pedro Henrique Pereira'
        ]);

        var_dump($userInsert);
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
