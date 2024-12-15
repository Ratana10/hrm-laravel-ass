<div class="modal fade" id="add_exchange_rate" tabindex="-1" aria-labelledby="add_exchange_rate" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('exchange_rate.add') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="add_exchange_rate">{{ __('Add Exchange Rate') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="usd" class="col-form-label">USD:</label>
                        <input type="number" class="form-control" value="1" id="usd" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="khr" class="col-form-label">KHR: <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="khr" name="khr" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
