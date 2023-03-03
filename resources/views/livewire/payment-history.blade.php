<div wire:poll>
    @if ($paymentHistory->count())

        @if ($paymentHistory->first()->payment_status == 'confirmed')
            @livewire('add-payment')
            <BR><BR>
        @endif

        Payment History ({{ $paymentHistory->count() }}):
        <BR><BR>

            <table width="100%">
                <tr>
                    <td>Date</td>
                    <td>Status</td>
                    <td>Amount</td>
                    <td>Transaction ID</td>
                    <td>Subscription</td>
                    <td align=center>Clear</td>
                </tr>

                @foreach ($paymentHistory as $payment)
                <tr>
                    <td>{{ $payment->updated_at }}</td>
                    <td>{{ Str::title($payment->payment_status) }}</td>
                    <td>{{ $payment->payment_amount }} OXEN</td>
                    <td>
                        @if ($payment->payment_status == 'confirmed')
                            {{ $payment->oxen_txid }}
                        @endif
                    </td>
                    <td>
                        @if ($payment->activated_until)
                            Until {{ \Carbon\Carbon::parse($payment->activated_until)->format('Y/m/d') }}
                        @endif
                    </td>
                    <td align=center>
                        <div>
                            <livewire:delete-payment :payment="$payment" :wire:key="$payment->id">
                        </div>
                    </td>
                </tr> 
                @endforeach
            </table>

    @else
        @livewire('add-payment')
    @endif
</div>