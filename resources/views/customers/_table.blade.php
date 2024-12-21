<div class="my-3 table-responsive">
    <table class="table text-center table-hover" style="vertical-align: middle">
        <thead>
            <td>{{ __('No') }}</td>
            <td>{{ __('Photo') }}</td>
            <td>{{ __('ID Card') }}</td>
            <td>{{ __('Full Name') }}</td>
            <td>{{ __('Nick Name') }}</td>
            <td>{{ __('Age') }}</td>
            <td>{{ __('Phone') }}</td>
            <td>{{ __('Comment') }}</td>
            <td>{{ __('Note') }}</td>
            <td>{{ __('Action') }}</td>
        </thead>
        <tbody>
            @foreach ($customers as $x => $customer)
                <tr>
                    <td>{{ $x + 1 }}</td>
                    <td><img src="{{ $customer->photo ? asset($customer->photo) : asset('default/no_photo.avif') }}"
                            alt="" width="50" height="50"></td>
                    <td>{{ $customer->id_card }}</td>
                    <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                    <td>{{ $customer->nick_name }}</td>
                    <td>{{ $customer->age }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <a href="{{ route('customer_comment.index', $customer->id) }}">
                            <i class="fa fa-user"></i>
                        </a>
                    </td>
                    <td>{{ $customer->note }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-success"><i
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
                                <a href="{{ route('customer.delete', $customer->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('Yes') }}</a>
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
            {{ $customers->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
