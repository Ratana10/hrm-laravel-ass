<div class="my-3 table-responsive">
    <table class="table table-hover" style="vertical-align: middle">
        <thead>
            <td>{{ __('No') }}</td>
            <td>{{ __('Name') }}</td>
            <td>{{ __('Phone') }}</td>
            <td>{{ __('Email') }}</td>
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
                    <td>
                        <img src="{{ $user->photo ? asset($user->photo) : asset('default/no_photo.avif') }}"
                            width="50" height="50">
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success"><i
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
                                  <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('Yes') }}</a>
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
    {{ $room_types->links('pagination::bootstrap-5') }}

</div>
