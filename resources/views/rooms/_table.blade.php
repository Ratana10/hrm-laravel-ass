<div class="my-3 table-responsive">
    <table class="table table-hover" style="vertical-align: middle">
        <thead>
            <td>{{ __('No') }}</td>
            <td>{{ __('Type') }}</td>
            <td>{{ __('Code') }}</td>
            <td>{{ __('Size') }}</td>
            <td>{{ __('Price') }}</td>
            <td>{{ __('Note') }}</td>
            <td>{{ __('Action') }}</td>
        </thead>
        <tbody>
            @foreach ($rooms as $x => $room)
                <tr>
                    <td>{{ $x + 1 }}</td>
                    <td>{{ $room->roomType->name }}</td>
                    <td>{{ $room->code }}</td>
                    <td>{{ $room->size }}</td>
                    <td>{{ $room->price }}</td>
                    <td>{{ $room->note }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('room.edit', $room->id) }}" class="btn btn-success"><i
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
                                <a href="{{ route('room.delete', $room->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('Yes') }}</a>
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
