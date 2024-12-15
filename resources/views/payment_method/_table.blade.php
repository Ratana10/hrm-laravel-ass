<div class="my-3 table-responsive">
    <table class="table text-center table-hover" style="vertical-align: middle">
        <thead>
            <td>{{ __('No') }}</td>
            <td>{{ __('Name') }}</td>
            <td>{{ __('Currency') }}</td>
            <td>{{ __('Type') }}</td>
            <td>{{ __('Photo') }}</td>
            <td>{{ __('Action') }}</td>
        </thead>
        <tbody>
            @foreach ($payment_methods as $x => $data)
                <tr>
                    <td>{{ $x + 1 }}</td>
                    <td>{{ $data->name }}</td>
                    <td> <span
                            class="badge {{ $data->currency == 'USD' ? 'bg-success' : 'bg-warning' }}">{{ $data->currency }}</span>
                    </td>
                    <td>
                        <span
                            class="badge {{ $data->is_cash == 0 ? 'bg-success' : 'bg-warning' }}">{{ $data->is_cash == 0 ? 'ONLINE' : 'CASH' }}</span>
                    </td>
                    <td>
                        <img src="{{ $data->photo ? asset($data->photo) : asset('default/no_photo.avif') }}"
                            width="50" height="50">
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('payment_method.edit', $data->id) }}" class="btn btn-success"><i
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
                                <a href="{{ route('payment_method.delete', $data->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('Yes') }}</a>
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
    <div class="row">
        <div class="col-12">
            {{ $payment_methods->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
