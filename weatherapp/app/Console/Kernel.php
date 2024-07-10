<?php

use App\Console\Commands\FetchWeather;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('weather:fetch')->everyFiveMinutes();
    }
    protected function commands()
    {
        // Load the command files in the `Commands` directory
        $this->load(__DIR__.'/Console/Commands');

        // Optionally, you can register additional commands
        require base_path('routes/console.php');
    }
}