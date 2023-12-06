<?php

namespace app\interfaces;

interface ResponseInterface
{
    public static function json(array $data = [], int $status = 200, array $headers = []): void;
}
