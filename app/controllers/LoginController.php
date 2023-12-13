<?php

namespace app\controllers;

use app\core\RenderView;
use app\library\Request;
use app\library\Session;
use app\library\Response;
use app\services\AuthService;

class LoginController
{

    private AuthService $authService;
    private Request $request;
    private Response $response;

    public function __construct()
    {
        $this->authService = new AuthService;
        $this->request = new Request;
        $this->response = new Response;
    }

    public function index()
    {
        $this->response->setHeaders([
            'Content-Type' => 'text/html',
        ]);

        try {
            if ($this->authService->isAuth()) {
                return $this->response->redirect('/user');
            }
            return RenderView::render('auth/login');
        } catch (\Exception $err) {
            return  $this->response->json([
                'error' => $err->getMessage(),
            ], 400);
        }
    }

    public function login()
    {
        $this->response->setHeaders([
            'Content-Type' => 'text/html',
        ]);

        try {

            $authenticate = $this->authService->login( $this->request->body());

            if ($authenticate) {
                return  $this->response->redirect('/user');
            } else {
                Session::flashMessage('error', 'User or passwords not match');
                return  $this->response->redirect('/login');
            }
        } catch (\Exception $err) {
            return  $this->response->json([
                'error' => $err->getMessage(),
            ], 400);
        }
    }

    public function destroy()
    {
        $this->authService->logout();
        
        return Response::redirect('login');
    }
}
