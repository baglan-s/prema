@if(count($propertys))
    <table class="table bg-grey js-propertys-table" data-offer-id="{{ $offerId }}" data-action="{{ route('offers.select-property') }}">
        <thead>
            <tr>
                <th scope="col">&#10004;</th>
                <th scope="col">№</th>
                <th scope="col">Internal</th>
                <th scope="col">Name</th>
                <th scope="col">Floor</th>
                <th scope="col">Status</th>
                <th scope="col">Area</th>
                <th scope="col">Price</th>
                <th scope="col">Current Tenant</th>
                <th scope="col">For Sale</th>
            </tr>
        </thead>
        <tbody>
            @foreach($propertys as $item)
            <tr>
                <td data-label="&#10004;">
                    <input
                        type="checkbox"
                        class="js-property-selector"
                        data-id="{{ $item->id }}"
                        {{ $item->selected ? 'checked' : '' }}
                    >
                </td>
                <td data-label="№">{{ $loop->iteration }}</td>
                <td data-label="Internal">{{ $item->internal_id }}</td>
                <td data-label="Name">{{ $item->name }}</td>
                <td data-label="Floor">{{ $item->features['floor'] ?? '' }}</td>
                <td data-label="Status">{{ $item->status }}</td>
                <td data-label="Area">
                    {{ $item->area }}&nbsp;&#13217;
                </td>
                <td data-label="Price">
                    @php
                        $price = "price_{$item->status}";
                        $fmt = ($item->price_unit == 'USD') ? 'en_US' : 'ru_RU';
                        $fprice = new NumberFormatter($fmt, NumberFormatter::CURRENCY);
                    @endphp
                    {{ $fprice->formatCurrency($item->{$price}, $item->price_unit) }}
                    {!! ($item->status == 'rent') ? "<br>per/{$item->price_period}" : '' !!}
                </td>
                <td data-label="Current Tenant">{{ $item->current_tenant }}</td>
                <td data-label="For Sale">{{ $item->for_sale ? 'yes' : 'no' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <span class="text-danger">No propertys found...</span>
@endif