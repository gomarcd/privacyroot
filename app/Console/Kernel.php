<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\SchedulerServices\CheckWalletPayments;
use App\SchedulerServices\AccountChecker;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Check for expiring accounts
        // $schedule->call(New CheckExpiredAccounts)->daily();

        // Check for incoming payments
        $schedule->call(New CheckWalletPayments)->everyMinute();

        // Using command instead calling invokable object can enable output log
        // $schedule->command('accountcheck:endsub')
        //     ->daily()
        //     ->appendOutputTo('storage/logs/accountchecker.log');
        
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
