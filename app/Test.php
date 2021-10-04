<?php

namespace App;

use Illuminate\Support\Facades\Http;
class Test
{
    public static function services()
    {
        $url = 'https://profstandart.rosmintrud.ru/obshchiy-informatsionnyy-blok/spravochniki-i-klassifikatory-i-bazy-dannykh/okpdtr/';
        $http = Http::get($url);
        return dump($http->headers());
    }
}
