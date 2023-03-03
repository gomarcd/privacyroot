<?php

namespace App\Listeners;

use App\Events\AccountExpiring;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class NotifyExpiringAccounts
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AccountExpiring  $event
     * @return void
     */
    public function handle(AccountExpiring $event)
    {
        $AccountExpiring = $event->AccountExpiring;
        $disableAccount = User::find($AccountExpiring->id);
        $disableAccount->account_status = 'disabled';
        $disableAccount->save();
    }
}
