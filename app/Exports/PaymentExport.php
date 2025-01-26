<?php

namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Payment::all()
        ->map(function ($payment, $index) {
            return [
                'No' => $index + 1,
                'Payment ID' => $payment->id,
                'Date' => $payment->date,
                'Invoice ID' => sprintf('%06d', $payment->invoice_id),
                'Tenant' => $payment->invoice->openRoom->customer->first_name . ' ' . $payment->invoice->openRoom->customer->last_name,
                'Payment Method' => $payment->paymentMethod->name,
                'Amount' => $payment->amount,
            ];
        });
    }

        /**
     * Return the headings for the Excel sheet.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Payment ID',
            'Date',
            'Invoice ID',
            'Tenant',
            'Payment Method',
            'Amount',
        ];
    }

}
