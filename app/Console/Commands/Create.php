<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Excel;
use Symfony\Component\DomCrawler\Crawler;

class Create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parsing:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'parsing to сsv file';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $html = file_get_contents('https://profstandart.rosmintrud.ru/obshchiy-informatsionnyy-blok/spravochniki-i-klassifikatory-i-bazy-dannykh/okpdtr/');

        $crawler = new Crawler($html);
        $codes = $crawler->filter('td:nth-child(1)');
        $names = $crawler->filter('td:nth-child(2)');
        foreach ($codes as $item)
        {
            $code[] = $item->textContent;
        }
        foreach ($names as $item)
        {
            $name[] = trim($item->textContent);
        }

        for ($i = 0; $i < count($code); $i++)
        {
            $content[] = $code[$i].';"'.$name[$i].'"';
        }

        Storage::put('parserTest.csv', $content);

        return 0;
    }
}
