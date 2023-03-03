<div wire:poll>
    @if ($payment && $payment->payment_status == 'waiting')
        Add 12 months subscription with <B>{{ $payment->payment_amount }} OXEN</B>:<BR><BR>
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)->merge('/oxen.png',0.25)->errorCorrection('H')->generate($payment->oxen_payment_uri)) !!} ">
        <BR>
        {{ $payment->oxen_payment_id }}  <BR><BR>      
    @endif
</div>
