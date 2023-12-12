<?php

use app\library\Session;


function public_path()
{
    return $_SERVER['DOCUMENT_ROOT'];
}

function base_path()
{
    return dirname(__FILE__, 3);
}


function flashMessage(string $index)
{
    return Session::getSession('__flash')[$index] ?? null;
}
