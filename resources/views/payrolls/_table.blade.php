<div class="my-3 table-responsive">
    <table class="table text-center table-hover" style="vertical-align: middle">
        <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Employee Name') }}</th>
                <th>{{ __('Month') }}</th>
                <th>{{ __('Base Salary') }}</th>
                <th>{{ __('Deductions') }}</th>
                <th>{{ __('Bonus') }}</th>
                <th>{{ __('Tax') }}</th>
                <th>{{ __('Net Salary') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Payment Date') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payrolls as $x => $payroll)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $payroll->employee->name }}</td>
                    <td>{{ $payroll->month }}</td>
                    <td>{{ $payroll->base_salary }}</td>
                    <td>{{ $payroll->deductions }}</td>
                    <td>{{ $payroll->bonus }}</td>
                    <td>{{ $payroll->tax }}</td>
                    <td>{{ $payroll->net_salary }}</td>
                    <td>{{ $payroll->status }}</td>
                    <td>{{ $payroll->payment_date }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('payrolls.edit', $payroll->id) }}" class="btn btn-success"><i class="fa fa-pen"></i> {{ __('Edit') }}</a>

                            <!-- Delete Button to Trigger Modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $payroll->id }}">
                                <i class="fa fa-trash"></i> {{ __('Delete') }}
                            </button>
                        </div>

                        <!-- Delete Modal for Each Payroll -->
                        <div class="modal fade" id="deleteModal{{ $payroll->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">{{ __('Are you sure?') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ __('Do you want to delete this payroll record? This action cannot be undone.') }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                        <a href="{{ route('payrolls.delete', $payroll->id) }}">
                                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $payrolls->links('pagination::bootstrap-5') }}
