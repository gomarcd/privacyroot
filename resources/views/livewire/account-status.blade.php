<div wire:poll>
    Status: 

    @if ($user->account_status == 'created' OR $user->account_status == 'waiting') 
        <b>pending</b>

    @elseif ($user->account_status == 'active') 
        <b>active</b><BR>
    Subscription: ending {{ \Carbon\Carbon::parse($user->activated_until)->format('Y/m/d') }}
    @endif
    </b>
</div>