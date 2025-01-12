<div class="my-3 table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('Payment ID') }}</th>
                <th>{{ __('Payment Method') }}</th>
                <th>{{ __('Amount') }}</th>
                <th>{{ __('Date') }}</th>
                <th class=" d-print-none">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $index => $payment)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->paymentMethod->name }}</td>
                    <td>$ {{ number_format($payment->amount, 2) }}</td>
                    <td>{{ $payment->date }}</td>
                    <td class=" d-print-none">
                        <div class="btn-group">
                            <a href="{{ route('payment.edit', $payment->id) }}" class="btn btn-success">
                                <i class="fa fa-pen"></i> {{ __('Edit') }}
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deletePaymentModal{{ $payment->id }}">
                                <i class="fa fa-trash"></i> {{ __('Delete') }}
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
