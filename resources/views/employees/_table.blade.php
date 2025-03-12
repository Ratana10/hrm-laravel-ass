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
                            <button type="button" class="btn btn-danger bg-danger popover border-danger"
                                data-bs-container="body" role="button" data-html="true" data-bs-toggle="popover"
                                data-bs-placement="left" data-bs-title="{{ __('Are you sure?') }}"
                                data-bs-template='
                                    <div class="p-3 bg-white popover" role="tooltip">
                                        <div class="popover-arrow"></div>
                                        <div class="popover-inner"><h4>{{ __('Are you sure?') }}</h4></div>
                                        <div class="text-center popover-footer">
                                            <a href="#" class="btn btn-secondary" data-bs-dismiss="popover"><i class="fa fa-times"></i> {{ __('No') }}</a>
                                            <a href="{{ route('employees.delete', $employee->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('Yes') }}</a>
                                        </div>
                                    </div>'>
                                <i class="fa fa-trash"></i> {{ __('Delete') }}
                            </button>
                            <button type="button" class="btn btn-danger bg-danger popover border-danger"
                                data-bs-container="body" role="button" data-html="true" data-bs-toggle="popover"
                                data-bs-placement="left" data-bs-title="{{ __('Are you sure ?') }}"
                                data-bs-template='
                              
                              <div class="p-3 bg-white popover" role="tooltip">
                                <div class="popover-arrow"></div>
                              <div class="popover-inner"><h4>{{ __('Are you sure ?') }}</h4></div>
                              <div class="text-center popover-footer">
                                <a href="#" class="btn btn-secondary" data-bs-dismiss="popover"><i class="fa fa-times"></i> {{ __('No') }}</a>
                                <a href="{{ route('employees.delete', $employee->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('Yes') }}</a>
                              </div>
                              
                              '>
                                <i class="fa fa-trash"></i> {{ __('Delete') }}
                            </button>
                        </div>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $employees->links('pagination::bootstrap-5') }}
</div>