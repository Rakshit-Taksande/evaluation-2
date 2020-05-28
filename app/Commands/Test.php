<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Test extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'Test:name {String}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'for testing purpose';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //take input from user
        $fetch_url=$this->argument('web_Address');
        $to_crawl='http://'.$fetch_url;
        
        //function to get the data from given website
        function get_data($url){

            //getting the content of website
            $ch=curl_init();
            $input = curl_exec($url);
        
            //copying the content into a file [i.e to use it on different file]
            $fp = fopen('/Users/rakshittaksande/Project/WebCrawler/WebCrawler/Web_content.txt', 'w'); 
            fwrite($fp, $input); 
            fclose($fp);  
        }

        //calling the function
        get_data($to_crawl);
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
