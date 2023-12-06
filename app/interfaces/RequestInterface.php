<?php

namespace app\interfaces;

interface RequestInterface
{
    public static function getMethod(): string;
    public static function body(): array;
}
