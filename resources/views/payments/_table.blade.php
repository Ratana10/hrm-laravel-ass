<div class="my-3 table-responsive">
    <table class="table text-center table-hover" style="vertical-align: middle">
        <thead>
            <td>{{ __('No') }}</td>
            <td>{{ __('Invoice') }}</td>
            <td>{{ __('Payment Method') }}</td>
            <td>{{ __('Amount') }}</td>
            <td>{{ __('Action') }}</td>
        </thead>
        <tbody>
            @foreach ($payments as $x => $payment)
                <tr>
                    <td>{{ $x + 1 }}</td>
                    <td>{{ $payment->invoice->openRoom->id }} ({{ $payment->invoice->openRoom->customer->first_name }}
                        {{ $payment->invoice->openRoom->customer->last_name }})</td>
                    <td>{{ $payment->paymentMethod->name }} ({{ $payment->paymentMethod->currency }})</td>
                    <td>${{ number_format($payment->amount, 2) }}</td>
                    <td>
                        <a href="{{ route('payment.edit', $payment->id) }}" class="btn btn-primary"><i
                                class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('payment.delete', $payment->id) }}" class="btn btn-danger"><i
                                class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
            @endforeach
            @for ($i = 0; $i < 5; $i++)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>INV0191928</td>
                    <td>Cash (USD)</td>
                    <td>${{ number_format(($i + 1) * $i + 1, 2) }}</td>
                    <td>
                        <a href="#" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                        <a href="#" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
    {{ $payments->links('pagination::bootstrap-5') }}
</div>
