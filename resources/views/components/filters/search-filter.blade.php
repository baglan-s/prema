{{--<p class="mb-0">Use the filters below to refine your search...--}}
{{--    @if(request()->route()->getName() == 'offers.filtered' and (strlen(implode($requestData)) > 0))--}}
{{--        @php($btnCaption = 'Showing all results...')--}}
{{--        <span class="ml-3"><a href="{{ route('offers.index', $teamId) }}">Reset All Filters</a></span>--}}
{{--    @endif--}}
{{--</p>--}}
<form method="POST" action="{{ route('offers.filter') }}" id="searchFilter">
    <div class="card mt-2 mb-4">
        <div class="card-body pb-1">
            @csrf
            <input type="hidden" name="team_id" value="{{ $teamId }}">
            <div class="row">
                <div class="col-xl-4 mb-3">
                    <input
                        class="btn btn-primary font-weight-bold w-100 js-button"
                        type="button"
                        value="{{ $btnCaption ?? 'Showing all offers...' }}"
                    disabled>
                </div>
                <div class="col-xl-4 mb-3">
                    <div class="custom-control custom-switch mt-1 ml-md-2">
                        <input
                            class="custom-control-input js-checkbox"
                            name="offer__with_propertys"
                            type="checkbox"
                            id="withPropertys"
                            {{ $requestData['offer__with_propertys'] == 'on' ? 'checked' : '' }}
                        >
                        <label class="custom-control-label" for="withPropertys">With units</label>
                    </div>
                </div>
                <div class="col-xl-4 mb-3">
                    <div class="custom-control custom-switch mt-1 ml-md-2">
                        <input
                            class="custom-control-input js-checkbox"
                            name="offer__rent_entire"
                            type="checkbox"
                            id="rentEntire"
                            {{ $requestData['offer__rent_entire'] == 'on' ? 'checked' : '' }}
                        >
                        <label class="custom-control-label" for="rentEntire">Rent the entire unit</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 mb-3">
                    <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input
                                type="radio"
                                name="offer__status"
                                value="rent"
                                class="js-radio"
                                {{ $requestData['offer__status'] == 'rent' ? 'checked' : '' }}
                            > Rent
                        </label>
                        <label class="btn btn-primary">
                            <input
                                type="radio"
                                name="offer__status"
                                value="sale"
                                class="js-radio"
                                {{ $requestData['offer__status'] == 'sale' ? 'checked' : '' }}
                            > Sale
                        </label>
                    </div>
                </div>
                <div class="col-xl-4 mb-3">
                    @if($items = ($inputsData['offer__name'] ?? null))
                        <select name="offer__name" class="form-control selectpicker js-select" data-live-search="true">
                            @foreach($items as $item)
                                <option
                                    value="{{ $loop->first ? '' : $item }}"
                                    {{ $requestData['offer__name'] == $item ? 'selected' : '' }}
                                >{{ $item }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div class="col-xl-4 mb-3">
                    @if($items = ($inputsData['offer__city'] ?? null))
                        <select name="offer__city" class="form-control selectpicker js-select" data-live-search="true">
                            @foreach($items as $item)
                                <option
                                    value="{{ $loop->first ? '' : $item }}"
                                    {{ $requestData['offer__city'] == $item ? 'selected' : '' }}
                                >{{ $item }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 mb-3">
                    @if($items = ($inputsData['offer__address'] ?? null))
                        <select name="offer__address" class="form-control selectpicker js-select" data-live-search="true">
                            @foreach($items as $item)
                                <option
                                    value="{{ $loop->first ? '' : $item }}"
                                    {{ $requestData['offer__address'] == $item ? 'selected' : '' }}
                                >{{ $item }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div class="col-xl-4 mb-3">
                    @if($items = ($inputsData['offer__metro'] ?? null))
                        <select name="offer__metro" class="form-control selectpicker js-select" data-live-search="true">
                            @foreach($items as $item)
                                <option
                                    value="{{ $loop->first ? '' : $item }}"
                                    {{ $requestData['offer__metro'] == $item ? 'selected' : '' }}
                                >{{ $item }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div class="col-xl-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text pr-4">
                                <span class="pr-2">Full area,&nbsp;&#13217;&nbsp;</span>
                            </span>
                        </div>
                        <input
                            type="text"
                            name="offer__area_min"
                            class="form-control js-textinput"
                            value="{{ $requestData['offer__area_min'] ?? '' }}"
                            placeholder="MIN"
                        >
                        <input
                            type="text"
                            name="offer__area_max"
                            class="form-control js-textinput"
                            value="{{ $requestData['offer__area_max'] ?? '' }}"
                            placeholder="MAX"
                        >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text pr-4">
                                <span class="pr-2">Free area,&nbsp;&#13217;</span>
                            </span>
                        </div>
                        <input
                            type="text"
                            name="offer__area_free_min"
                            class="form-control js-textinput"
                            value="{{ $requestData['offer__area_free_min'] ?? '' }}"
                            placeholder="MIN"
                        >
                        <input
                            type="text"
                            name="offer__area_free_max"
                            class="form-control js-textinput"
                            value="{{ $requestData['offer__area_free_max'] ?? '' }}"
                            placeholder="MAX"
                        >
                    </div>
                </div>
                <div class="col-xl-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text pr-2">Price rent per&nbsp;&#13217;</span>
                        </div>
                        <input
                            type="text"
                            name="offer__rent_price_min"
                            class="form-control js-textinput"
                            value="{{ $requestData['offer__rent_price_min'] ?? '' }}"
                            placeholder="MIN"
                        >
                        <input
                            type="text"
                            name="offer__rent_price_max"
                            class="form-control js-textinput"
                            value="{{ $requestData['offer__rent_price_max'] ?? '' }}"
                            placeholder="MAX"
                        >
                    </div>
                </div>
                <div class="col-xl-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text pr-2">Price rent entire</span>
                        </div>
                        <input
                            type="text"
                            name="offer__rent_price_full_min"
                            class="form-control js-textinput"
                            value="{{ $requestData['offer__rent_price_full_min'] ?? '' }}"
                            placeholder="MIN"
                        >
                        <input
                            type="text"
                            name="offer__rent_price_full_max"
                            class="form-control js-textinput"
                            value="{{ $requestData['offer__rent_price_full_max'] ?? '' }}"
                            placeholder="MAX"
                        >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text pr-2">Rental area, &nbsp;&#13217;&nbsp;</span>
                        </div>
                        <input
                            type="text"
                            name="offer__rent_area_min"
                            class="form-control js-textinput"
                            value="{{ $requestData['offer__rent_area_min'] ?? '' }}"
                            placeholder="MIN"
                        >
                        <input
                            type="text"
                            name="offer__rent_area_max"
                            class="form-control js-textinput"
                            value="{{ $requestData['offer__rent_area_max'] ?? '' }}"
                            placeholder="MAX"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-2 mb-4 {{ $requestData['offer__with_propertys'] == 'on' ? 'd-block' : 'd-none' }}" id="propertyFilters">
        <div class="card-body pb-1">
            <div class="row">
                <div class="col-xl-4 mb-3">
                    <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input
                                type="radio"
                                name="property__status"
                                value="rent"
                                class="js-radio"
                                {{ $requestData['property__status'] == 'rent' ? 'checked' : '' }}
                            > Rent
                        </label>
                        <label class="btn btn-primary">
                            <input
                                type="radio"
                                name="property__status"
                                value="sale"
                                class="js-radio"
                                {{ $requestData['property__status'] == 'sale' ? 'checked' : '' }}
                            > Sale
                        </label>
                    </div>
                </div>
                <div class="col-xl-4 mb-3">
                    <div class="custom-control custom-switch mt-1 ml-md-2">
                        <input
                            class="custom-control-input js-checkbox"
                            name="property__for_sale"
                            type="checkbox"
                            id="forSale"
                            {{ $requestData['property__for_sale'] == 'on' ? 'checked' : '' }}
                        >
                        <label class="custom-control-label" for="forSale">Property for sale</label>
                    </div>
                </div>
                <div class="col-xl-4 mb-3">
                    @if($items = ($inputsData['property__current_tenant'] ?? null))
                        <select name="property__current_tenant" class="form-control selectpicker js-select" data-live-search="true">
                            @foreach($items as $item)
                                <option
                                    value="{{ $loop->first ? '' : $item }}"
                                    {{ $requestData['property__current_tenant'] == $item ? 'selected' : '' }}
                                >{{ $item }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text pr-5">Area, &nbsp;&#13217;&nbsp;</span>
                        </div>
                        <input
                            type="text"
                            name="property__area_min"
                            class="form-control js-textinput"
                            value="{{ $requestData['property__area_min'] ?? '' }}"
                            placeholder="MIN"
                        >
                        <input
                            type="text"
                            name="property__area_max"
                            class="form-control js-textinput"
                            value="{{ $requestData['property__area_max'] ?? '' }}"
                            placeholder="MAX"
                        >
                    </div>
                </div>
                <div class="col-xl-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text pr-4">
                                <span class="pr-3">Price rent&nbsp;</span>
                            </span>
                        </div>
                        <input
                            type="text"
                            name="property__rent_price_min"
                            class="form-control js-textinput"
                            value="{{ $requestData['property__rent_price_min'] ?? '' }}"
                            placeholder="MIN"
                        >
                        <input
                            type="text"
                            name="property__rent_price_max"
                            class="form-control js-textinput"
                            value="{{ $requestData['property__rent_price_max'] ?? '' }}"
                            placeholder="MAX"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>