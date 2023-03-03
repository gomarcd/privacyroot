<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AccountStatus extends Component
{
    public function render()
    {
        return view('livewire.account-status', [
            'user' => Auth::user(),
        ]);
    }
}
