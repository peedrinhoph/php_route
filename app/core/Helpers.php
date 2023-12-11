<?php


function public_path(){
    return $_SERVER['DOCUMENT_ROOT'];
}

function base_path(){
    return dirname(__FILE__, 3);
}
