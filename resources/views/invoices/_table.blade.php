<div class="my-3 table-responsive">
    <table class="table text-center table-hover" style="vertical-align: middle">
        <thead>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Date') }}</th>
            <th>{{ __('Contract ID') }}</th>
            <th>{{ __('Tenant') }}</th>
            <th>{{ __('Room Price') }}</th>
            <th>{{ __('Electricity') }}</th>
            <th>{{ __('Water') }}</th>
            <th>{{ __('Total') }}</th>
            <th>{{ __('Action') }}</th>
        </thead>
        <tbody>
            @foreach ($invoices as $x => $invoice)
                @if ($customer_id && $customer_id != 'all')
                    @if ($invoice->openRoom->customer_id != $customer_id)
                        @continue
                    @endif
                @endif

                <tr>
                    <td>{{ $x + 1 }}</td>
                    <td>{{ $invoice->date }}</td>
                    <td>{{ sprintf('%06d', $invoice->openRoom->id) }}</td>
                    <td>{{ $invoice->openRoom->customer->first_name }} {{ $invoice->openRoom->customer->last_name }}
                    </td>
                    <td>${{ number_format($invoice->room_price, 2) }}</td>
                    <td>{{ number_format($invoice->e_amount, 2) }}</td>
                    <td>{{ number_format($invoice->w_amount, 2) }}</td>
                    <td>{{ number_format($invoice->total_amount, 2) }}</td>
                    <td>
                        <a href="" class="btn btn-primary"><i
                                class="fab fa-telegram"></i>
                            Send to tenant via telegram</a>
                        <a href="{{ route('payment.add', $invoice->id) }}" class="btn btn-warning"><i
                                class="bi bi-receipt"></i>
                            Payment</a>
                        <div class="btn-group">

                            <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-success"><i
                                    class="fa fa-pen"></i>
                                {{ __('Edit') }}
                            </a>

                            <button type="button" class="btn btn-danger bg-danger popover border-danger"
                                data-bs-container="body" role="button" data-html="true" data-bs-toggle="popover"
                                data-bs-placement="left" data-bs-title="{{ __('Are you sure ?') }}"
                                data-bs-template='
                            
                            <div class="p-3 bg-white popover" role="tooltip">
                              <div class="popover-arrow"></div>
                            <div class="popover-inner"><h4>{{ __('Are you sure ?') }}</h4></div>
                            <div class="text-center popover-footer">
                              <a href="#" class="btn btn-secondary" data-bs-dismiss="popover"><i class="fa fa-times"></i> {{ __('No') }}</a>
                              <a href="{{ route('invoice.delete', $invoice->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('Yes') }}</a>
                            </div>
                            
                            '>
                                <i class="fa fa-trash"></i> {{ __('Delete') }}
                            </button>
                        </div>
                    </td>
                    {{-- <td>
                        <div class="btn-group">

                            <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-success"><i
                                    class="fa fa-pen"></i>
                                {{ __('Edit') }}
                            </a>

                            <button type="button" class="btn btn-danger bg-danger popover border-danger"
                                data-bs-container="body" role="button" data-html="true" data-bs-toggle="popover"
                                data-bs-placement="left" data-bs-title="{{ __('Are you sure ?') }}"
                                data-bs-template='
                            
                            <div class="p-3 bg-white popover" role="tooltip">
                              <div class="popover-arrow"></div>
                            <div class="popover-inner"><h4>{{ __('Are you sure ?') }}</h4></div>
                            <div class="text-center popover-footer">
                              <a href="#" class="btn btn-secondary" data-bs-dismiss="popover"><i class="fa fa-times"></i> {{ __('No') }}</a>
                              <a href="{{ route('invoice.delete', $invoice->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('Yes') }}</a>
                            </div>
                            
                            '>
                                <i class="fa fa-trash"></i> {{ __('Delete') }}
                            </button>
                        </div>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $invoices->links('pagination::bootstrap-5') }}
</div>
