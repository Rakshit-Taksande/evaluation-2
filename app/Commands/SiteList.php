<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class SiteList extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'SiteList:name {String}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'use to provide a list of websites to crawl';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        $get=$this->argument('String');
        $handle=fopen("$get","r");
        rewind($handle);

        function get_data($url){

            //getting the content of website
            $input = @file_get_contents($url);
            echo $input;
            
            $limiter='????';
            $fp=fopen("/Users/rakshittaksande/Project/WebCrawler/WebCrawler/Web_content1.txt","a");
            fwrite($fp,$input);
            fwrite($fp,$limiter);
            fclose($fp);
        
            
        }


        if($handle){
            
        while(!feof($handle)){
            $buffer=fgets($handle);
            $to_crawl='http://'.$buffer;
            get_data($to_crawl);
            
        }
        
    }


    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
