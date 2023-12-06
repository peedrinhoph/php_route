<?php

namespace app\controllers;

use app\library\Request;
use app\library\Response;

class NotFoundController
{

    public function index(Request $request, Response $response)
    {
        return $response::json([
            'error'   => true,
            'success' => false,
            'message' => 'Not correspond.'
        ], 404);
    }
}
