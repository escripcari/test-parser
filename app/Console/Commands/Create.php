<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

class Create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:csv';

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
        $crawler = $crawler->filter('td');
        $content = '';
        foreach ($crawler as $domElementsNum)
        {
            $content .= $domElementsNum->textContent;
        }
        Storage::disk('local')->put('parserTest.csv', $content);
        return 0;
    }
}
