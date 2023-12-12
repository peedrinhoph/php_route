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

    public function __construct()
    {
        $this->authService = new AuthService;
    }

    public function index(Request $request, Response $response)
    {
        $response::setHeaders([
            'Content-Type' => 'text/html',
        ]);

        try {
            if ($this->authService->isAuth()) {
                return $response::redirect('/user');
            }
            return RenderView::render('auth/login');
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

            $authenticate = $this->authService->login($request::body());

            if ($authenticate) {
                return $response::redirect('/user');
            } else {
                Session::flashMessage('error', 'User or passwords not match');
                return $response::redirect('/login');
            }
        } catch (\Exception $err) {
            return $response::json([
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
