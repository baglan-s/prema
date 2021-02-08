@extends('layouts.app')

@section('title', __('Offers Lists'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    <a href="{{ route('home') }}">Dashboard</a> <big>&nbsp;&rsaquo;&nbsp;</big> Offers Lists
                </div>
                <div class="card-body">
                    <div class="mt-2 mb-4 table-container">
                        <h6 class="mb-4 font-weight-bold font-italic text-muted">
                            Offers by "{{ $team->name }}"
                            <span class="ml-2 py-1 px-2 badge badge-warning badge-pill">total: &nbsp;{{ $total }}</span>
                        </h6>
                        @if($count = count($offers))
                            @if($status = session('status'))
                                <x-common.flash-message :status="$status"/>
                            @endif
                            <x-filters.search-filter :team-id="$team->id"/>
                            <div class="p-0 mb-4 bg-primary exports-panel js-exports-panel {{ $team->has_choise ? 'd-block' : 'd-none' }}">
                                <p class="py-2 mb-0">...</p>
                                <div class="container bg-secondary d-none templates-gallery js-templates-gallery" data-action="{{ route('exports.templates', $team->id) }}">...
                                </div>
                            </div>
                            <div class="overflow-auto">
                                <table class=" offers-table js-offers-table delivery" data-action="{{ route('offers.select-offer') }}">
                                    <thead>
                                        <tr>
                                            <th scope="col">&#10004;</th>
                                            <th scope="col">Units</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Area</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Entire</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($offers as $item)
                                        <tr class="js-offer-row" id="offer{{ $item->id }}">
                                            <td data-label="&#10004;">
                                                <input
                                                    type="checkbox"
                                                    class="js-offer-selector"
                                                    data-id="{{ $item->id }}"
                                                    {{ $item->selected ? 'checked' : '' }}
                                                >
                                            </td>
                                            <td class="property-count js-property-switcher" data-label="Units">
                                                <span><span>{{ $item->propertys->count() }}</span></span>
                                            </td>
                                            <td class="font-weight-bolder text-muted" data-label="Name">
                                                {{ $item->name }}<br>
                                                <span class="undername">{{ $item->internal_id }}</span>
                                            </td>
                                            <td data-label="Address">
                                                {{ $item->location['country'] }},
                                                {{ $item->location['city'] }},
                                                {{ $item->location['address'] }}
                                                @if($metro = $item->location['metro']), <br><i>Metro:</i>
                                                    @foreach($metro as $name)
                                                        {{ $loop->last ? $name.'' : $name.', ' }}
                                                    @endforeach
                                                @endif
                                            </td>
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
                                            <td data-label="Entire">{{ $item->rent_entire ? 'yes' : 'no' }}</td>
                                        </tr>
                                        <tr id="propertysBlock{{ $item->id }}" class="d-none">
                                            <td colspan="7">
                                                <x-tables.property-table :collection="$item->propertys" :offer-id="$item->id" :team-id="$team->id"/>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($paginate)
                                    {{ $offers->links() }}
                                @endif
                            </div>
                        @else
                            <div class="card">
                                <div class="card-body">
                                    No offers found! You may not have registered a long feed...<br>
                                    To add a new feed follow this link:<br>
                                    <a class="nav-link" href="{{ route('feeds.index', $team->id) }}">Feeds management for team "{{$team->name}}"</a><br>
                                    Or use your short feed for fast parsing the offers:<br>
                                    <a class="nav-link" href="{{ route('parser.index', $team->id) }}">Parsing offers for team "{{$team->name}}"</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush

@push('block-styles')
    <style type="text/css">
        .btn.active.focus,
        .btn.active:focus,
        .btn.focus,
        .btn:active.focus,
        .btn:active:focus,
        .btn:focus {
            outline: none !important;
            box-shadow: none !important;
        }
        .btn.btn-primary {
            color: #545b62;
            background-color: #fff;
        }
        .btn.btn-primary.active {
            color: #fff;
            background-color: #545b62;
        }



        table.offers-table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            /*table-layout: fixed;*/
        }

        table.offers-table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .35em;
        }

        table.offers-table tr td span.undername {
            font-size: 0.65em !important;
        }

        table.offers-table tr td.property-count:hover span:after {
            font-weight: bold;
            content: '\02630';
        }
        table.offers-table tr td.property-count span span{
            position: relative;
        }
        table.offers-table tr td.property-count:hover span span{
            display: none;
        }
        table.offers-table tr td.property-count:hover {
            background-color: #f9f9f9;
        }

        table.offers-table tr td.property-count {
            /*font-size: 1.1em;*/
            text-align: center;
            cursor: pointer;
        }

        table.offers-table th,
        table.offers-table td {
            padding: .625em;
            text-align: center;
        }

        table.offers-table th {
            padding: 20px 10px;
        }
        table.offers-table td {
            background-color: #fff;
            border-right: 1px solid #ebebeb;
        }

        table.offers-table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        @media screen and (max-width: 600px) {
            table.offers-table {
                border: 0;
            }

            table.offers-table tr td.property-count {
                text-align: right;
            }

            table.offers-table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            table.offers-table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }

            table.offers-table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }

            table.offers-table td::before {
                /*
                * aria-label has no advantage, it won't be read inside a table
                content: attr(aria-label);
                */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table.offers-table td:last-child {
                border-bottom: 0;
            }
        }




        /*table.offers-table {*/
        /*    border-bottom: 1px solid #DEE2E6;*/
        /*}*/
        /*table.offers-table,*/
        /*table tr td.property-count {*/
        /*    border-left: 1px solid #DEE2E6;*/
        /*    border-right: 1px solid #DEE2E6;*/
        /*}*/
        /*table tr td {*/
        /*    vertical-align: middle !important;*/
        /*}*/
        /*table tr td.property-count {*/
        /*    font-size: 1.1em;*/
        /*    text-align: center;*/
        /*    cursor: pointer;*/
        /*}*/
        /*table tr td.property-count span span{*/
        /*    position: relative;*/
        /*}*/
        /*table tr td.property-count:hover span span{*/
        /*    display: none;*/
        /*}*/
        /*table tr td.property-count:hover span:after {*/
        /*    font-weight: bold;*/
        /*    content: '\02630';*/
        /*}*/
        /*table tr td.property-count:hover {*/
        /*    background-color: #f9f9f9;*/
        /*}*/
        /*table tr td span.undername {*/
        /*    font-size: 0.65em !important;*/
        /*}*/
        /*table.bg-grey {*/
        /*    background-color: #f8f8f8;*/
        /*}*/
        /*table {*/
        /*    min-width: 768px;*/
        /*}*/
        .input-group-prepend {
            cursor: pointer;
        }
        .exports-panel {
            text-align: center;
            font-weight: bold;
            color: #fff;
            cursor: pointer;
        }
        .templates-gallery {
            border-top: 4px solid #fff;
        }
        .gallery-row {
            padding: 15px 0 15px 0;
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
        }
        .gallery-item {
            flex: 0 0 auto;
            width: 341px;
            height: 384px;
            margin-left: 15px;
            background-size: cover;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ url('js/offers-index.js?v=') . time() }}"></script>
@endpush
