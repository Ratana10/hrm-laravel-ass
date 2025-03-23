<div class="my-3 table-responsive">
    <table class="table text-center table-hover" style="vertical-align: middle">
        <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Department') }}</th>
                <th>{{ __('Position') }}</th>
                <th>{{ __('Salary') }}</th>
                <th>{{ __('Work Date') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $x => $employee)
                <tr>
                    <td>{{ $x + 1 }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>${{ number_format($employee->salary, 2) }}</td>
                    <td>{{ $employee->work_date }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-success"><i class="fa fa-pen"></i> {{ __('Edit') }}</a>

                        <!-- Delete Button to Trigger Modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $employee->id }}">
                            <i class="fa fa-trash"></i> {{ __('Delete') }}
                        </button>

                        </div>

                        <!-- Delete Modal for Each Leave -->
                        <div class="modal fade" id="deleteModal{{ $employee->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">{{ __('Are you sure?') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ __('Do you want to delete this employee record? This action cannot be undone.') }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                        <a href="{{ route('employees.delete', $employee->id) }}">
                                           
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
    {{ $employees->links('pagination::bootstrap-5') }}
</div>