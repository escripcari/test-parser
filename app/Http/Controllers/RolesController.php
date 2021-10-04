<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
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
        $crawlerC = $crawler->filter('td');
        foreach ($crawlerC as $domElementsNum) {
            echo $code[] = $domElementsNum->textContent;
        }
    }

    public function show(Role $role)
    {
//        $role = Role::find($roleId);
        return response()->json(['role' => $role]);
    }
}
