<?php

use Illuminate\Foundation\Inspiring;
use App\User;
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
})->describe('Display an inspiring quote');

Artisan::command('task1:pay {name=Invitado} {--back}', function($name) {
    if($this->option('back')) {
            $this->info("Welcome to back, $name!");
    }
    else{
        $this->info("Welcome to Task1 Muserpol, $name!");
    }

})->describe('welcome a user to our project');

Artisan::command('styde1:register', function() {
    $name = $this->ask('Por favor coloca tu nombre');
    $email = $this->ask('Por favor coloca tu email');
    $password = $this->ask('Por favor coloca tu password');
    User::create(compact('name','email','password'));
    //Message to show
    $this->info("El usuario $name <$email> fue registrado con exito !!");

});
