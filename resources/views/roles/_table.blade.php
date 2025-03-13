<div class="my-3 table-responsive">
    <table class="table text-center table-hover" style="vertical-align: middle">
        <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Role Name') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $x => $role)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $role->name }}
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success"><i class="fa fa-pen"></i> {{ __('Edit') }}</a>

                            <!-- Delete Button to Trigger Modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $role->id }}">
                                <i class="fa fa-trash"></i> {{ __('Delete') }}
                            </button>
                        </div>

                        <!-- Delete Modal for Each Role -->
                        <div class="modal fade" id="deleteModal{{ $role->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">{{ __('Are you sure?') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ __('Do you want to delete this role record? This action cannot be undone.') }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                        <a href="{{ route('roles.delete', $role->id) }}">
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

{{ $roles->links('pagination::bootstrap-5') }}
