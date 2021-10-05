<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Services\DateCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

class RolesController extends Controller
{
    public function create(Request $request)
    {


        return response()->json([$request->all()]);
    }

    public function index()
    {
        $html = file_get_contents('https://profstandart.rosmintrud.ru/obshchiy-informatsionnyy-blok/spravochniki-i-klassifikatory-i-bazy-dannykh/okpdtr/');

        $crawler = new Crawler($html);
        $codes = $crawler->filter('td:nth-child(odd)');
        $names = $crawler->filter('td:nth-child(even)');
        foreach ($codes as $item)
        {
            $code[] = $item->textContent;
        }
        foreach ($names as $item)
        {
            $name[] = $item->textContent;
        }
        for ($i = 0; $i < count($code); $i++)
        {
            $test[] = $code[$i].$name[$i];
        }
        var_dump($test);

    }

    public function show(Role $role)
    {
//        $role = Role::find($roleId);
        return response()->json(['role' => $role]);
    }
}
