<?php

namespace App\Listeners;

use App\Events\PaymentReceived;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ActivateAccount
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
     * @param  \App\Events\PaymentReceived  $event
     * @return void
     */
    public function handle(PaymentReceived $event)
    {
        // Set payment status to confirmed in Payment table
        $PaymentReceived = $event->PaymentReceived;
        $confirmedPayment = Payment::find($PaymentReceived->id);
        $confirmedPayment->payment_status = 'confirmed';
        $confirmedPayment->save();

        // Activate email service if not already active
        //
        //

        // Select account to be activated in User table
        $activateAccount = User::find($PaymentReceived->user_id);

        // If there is an existing subscription, add 1 year to its end date
        if ($activateAccount->activated_until) {
            // User table
            $activateAccount->activated_until = Carbon::createFromDate($activateAccount->activated_until)->addYear();
            $activateAccount->save();
            // Payment table
            $confirmedPayment->activated_until = $activateAccount->activated_until;
            $confirmedPayment->save();
        }
        // If there is no existing subscription, add 1 year from current date
        else {
            // User table
            $activateAccount->activated_until = now()->addYear();
            $activateAccount->save();
            // Payment table
            $confirmedPayment->activated_until = $activateAccount->activated_until;
            $confirmedPayment->save();            
        }

        // Set account status to active
        $activateAccount->account_status = 'active';
        $activateAccount->save();        
    }
}
