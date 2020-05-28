<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Match extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'Match:name {String}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Use to match the String from a website';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        $match=array();
        //getting the Strings from user to match it with a website data
        $test=$this->argument('String');

        //making an array of strings
        $arr=explode(",",$test);


        //getting the data of the website for matching strings
        $handle = fopen("/Users/rakshittaksande/Project/WebCrawler/WebCrawler/Web_content.txt" ,"r");

        foreach($arr as $value){

          rewind($handle);
          
          if($handle){

            while(!feof($handle)){

              $buffer=fgets($handle);
              if(stripos($buffer,$value)!==false){
                
                if(empty($match)){
                  $match[0]=$value;

                }else{
                  $itr=count($match);
                  $match[$itr]=$value;

                }

              }else{


              }

            }


          }else{

            echo "file not found";
          }

        }
        //print_r($match);
        $new=(array_count_values($match));
        $My_Json=json_encode($new);
        echo $My_Json;
        fclose($handle);

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
