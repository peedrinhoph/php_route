<?php

namespace app\library;

class Token
{
    static public function genIntSeq()
    {

        $utimestamp = microtime(true);

        $timestamp = floor($utimestamp);
        $milliseconds = round(($utimestamp - $timestamp) * 1000000);

        $time = date(preg_replace('`(?<!\\\\)u`', $milliseconds, 'Hisu'), $timestamp);

        return '10' . // Número do servidor
            str_pad(date('y'), 2, '0', STR_PAD_LEFT) . // ano com 2 digitos
            str_pad(date('z'), 3, '0', STR_PAD_LEFT) . // dia do anos com 3 digitos
            substr($time, 0, 6) .
            str_pad(substr($time, 6), 5, '0', STR_PAD_LEFT);
    }
}
