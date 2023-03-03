<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PaymentHistory extends Component
{
    public function render()
    {
        return view('livewire.payment-history', [
            'paymentHistory' => auth()->user()->payments->sortByDesc('created_at'),
        ]);
    }
}