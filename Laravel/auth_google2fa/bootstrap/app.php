<?php

use App\Console\Commands\SnmpCommand;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;

return Application::configure(basePath: dirname(__DIR__))

    ->withRouting(

        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',

    )

    ->withSchedule(function (Schedule $schedule){

        $schedule->command('app:snmp-command')->everySecond();
        $schedule->command('app:snmp-destroy-command')->dailyAt('08:51');

    })

    ->withMiddleware(function (Middleware $middleware){
        
        $middleware->alias([

            '2fa' => \App\Http\Middleware\LoginSecurityMiddleware::class

        ]);

    })

    ->withExceptions(function (Exceptions $exceptions){
        
        
    })->create();