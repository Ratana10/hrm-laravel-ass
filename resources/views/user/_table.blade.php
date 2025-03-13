<div class="my-3 table-responsive">
    <table class="table table-hover" style="vertical-align: middle">
        <thead>
            <td>{{ __('No') }}</td>
            <td>{{ __('Name') }}</td>
            <td>{{ __('Phone') }}</td>
            <td>{{ __('Email') }}</td>
            <td>{{ __('Role') }}</td>
            <td>{{ __('Photo') }}</td>
            <td>{{ __('Action') }}</td>
        </thead>
        <tbody>
            @foreach ($users as $x => $user)
                <tr>
                    <td>{{ $x + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name ?? 'N/A' }}</td>
                    <td>
                        <img src="{{ $user->photo ? asset($user->photo) : asset('default/no_photo.avif') }}"
                            width="50" height="50">
                    </td>
                    @if ($user->name !== 'Admin')
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success"><i class="fa fa-pen"></i> {{ __('Edit') }}</a>

                            <!-- Delete Button to Trigger Modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">
                                <i class="fa fa-trash"></i> {{ __('Delete') }}
                            </button>
                        </div>

                        <!-- Delete Modal for Each User -->
                        <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">{{ __('Are you sure?') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ __('Do you want to delete this user record? This action cannot be undone.') }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>

                                        <a href="{{ route('user.delete', $user->id) }}">
                                           
                                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links('pagination::bootstrap-5') }}

</div>
