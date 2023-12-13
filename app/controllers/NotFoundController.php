<?php

namespace app\controllers;

use app\library\Response;

class NotFoundController extends Response
{

    public function index()
    {
        return $this->json([
            'error'   => true,
            'success' => false,
            'message' => 'Route not found.'
        ], 404);
    }
}
