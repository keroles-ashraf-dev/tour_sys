<div class="col-md-5 ms-5">
    <form class="col" action="{{ route('bookings.store') }}" method="POST">
        @CSRF
        <div class="mb-2">
            <input type="hidden" class="form-control" id="slug" name="slug" value="{{ $slug }}" required>
        </div>
        <div class="mb-2">
            <label for="name" class="col-form-label">{{ __('messages.name') }}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="mb-2">
            <label for="email" class="col-form-label">{{ __('messages.email') }}</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="mb-2">
            <label for="phone" class="col-form-label">{{ __('messages.phone') }}</label>
            <input type="phone" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
        </div>
        <div class="mb-2">
            <label for="date" class="col-form-label">{{ __('messages.date') }}</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-2">
            <label for="adults-count" class="col-form-label">{{ __('messages.adult_count') }}</label>
            <div class="row form-control">
                <button wire:click.prevent="incrementAdult" type="button" class="btn btn-outline-secondary col-md-1 me-1">+</button>
                <input wire:model="adultsCount" type="text" class="col-md-2" id="adults-count" name="adults-count" inputmode="numeric">
                <button wire:click.prevent="decrementAdult" type="button" class="btn btn-outline-secondary col-md-1 ms-1">-</button>
            </div>
        </div>
        <div class="mb-2">
            <label for="children-count" class="col-form-label">{{ __('messages.child_count') }}</label>
            <div class="row form-control">
                <button wire:click.prevent="incrementChild" type="button" class="btn btn-outline-secondary col-md-1 me-1">+</button>
                <input wire:model="childrenCount" type="text" class="col-md-2" id="children-count" name="children-count" inputmode="numeric">
                <button wire:click.prevent="decrementChild" type="button" class="btn btn-outline-secondary col-md-1 ms-1">-</button>
            </div>
        </div>
        <div class="mb-2">
            <div>Adults: {{$adultsCount}} x {{$adultPrice}}$</div>
            <div>Children: {{$childrenCount}} x {{$childPrice}}$</div>
            <div>Total: {{$total}}$</div>
        </div>
        <div class="d-flex mt-4">
            <button type="submit" class="btn btn-success">{{ __('messages.book') }}</button>
            <a class="btn btn-danger ms-2 me-2" href="{{ route('tours.index') }}">{{ __('messages.cancel') }}</a>
        </div>
    </form>
</div>
