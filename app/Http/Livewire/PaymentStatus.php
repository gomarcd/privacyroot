<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PaymentStatus extends Component
{
    public function render()
    {
        $payment = auth()->user()->payments->sortByDesc('created_at')->first();

        return view('livewire.payment-status', [
            'payment' => $payment,
        ]);
    }
}