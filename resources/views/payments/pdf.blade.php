<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Payment Report</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Invoice</th>
                <th>Tenant</th>
                <th>Payment Method</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $index => $payment)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $payment->date }}</td>
                    <td>{{ sprintf('%06d', $payment->invoice_id) }}</td>
                    <td>{{ $payment->invoice->openRoom->customer->first_name }} {{ $payment->invoice->openRoom->customer->last_name }}</td>
                    <td>{{ $payment->paymentMethod->name }}</td>
                    <td>${{ number_format($payment->amount, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
