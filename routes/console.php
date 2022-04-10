<?php

use Faker\Core\Number;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
Artisan::command('oddoreven',function ()
{
   $number =(int) $this->ask("What is the number?");
    if ($number%2==0) {
        $this->comment("{$number} is Even");
    }else{
        $this->comment("{$number} is Odd");
    }
})->purpose('Finds the Odd or Even of the Given Number');
