<div class="my-3 table-responsive">
    <table class="table text-center table-hover" style="vertical-align: middle">
        <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Employee Name') }}</th>
                <th>{{ __('Start Date') }}</th>
                <th>{{ __('End Date') }}</th>
                <th>{{ __('Reason') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaves as $x => $leave)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $leave->employee->name }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                    <td>{{ $leave->reason }}</td>
                    <td>
                        @if ($leave->status == 'pending')
                            <span class="badge bg-warning text-dark">{{ __('Pending') }}</span>
                        @elseif ($leave->status == 'approved')
                            <span class="badge bg-success">{{ __('Approved') }}</span>
                        @else
                            <span class="badge bg-danger">{{ __('Rejected') }}</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            @if(Auth::check() && (strtolower(Auth::user()->role->name) === 'admin' || strtolower(Auth::user()->role->name) === 'hr'))

                                <a href="{{ route('leaves.updateStatus', ['id' => $leave->id, 'status' => 'rejected']) }}" class="btn btn-danger">{{ __('Reject') }}</a>

                                <a href="{{ route('leaves.updateStatus', ['id' => $leave->id, 'status' => 'approved']) }}" class="btn btn-success">{{ __('Approve') }}</a>
                            @endif

                            @if($leave->status === 'pending')

                                <a href="{{ route('leaves.edit', $leave->id) }}" class="btn btn-success"><i class="fa fa-pen"></i> {{ __('Edit') }}</a>
 
                            <!-- Delete Button to Trigger Modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $leave->id }}">
                                <i class="fa fa-trash"></i> {{ __('Delete') }}
                            </button>

                            @endif
                        </div>

                        <!-- Delete Modal for Each Leave -->
                        <div class="modal fade" id="deleteModal{{ $leave->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">{{ __('Are you sure?') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ __('Do you want to delete this leave record? This action cannot be undone.') }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>

                                        <a href="{{ route('leaves.delete', $leave->id) }}">
                                           
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
