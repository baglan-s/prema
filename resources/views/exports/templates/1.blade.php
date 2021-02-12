<html>
<head>
    <meta charset="utf-8">
    <link media="screen" rel="stylesheet" href="{{ url('exports/templates/css/main-01.css?v=').time() }}">
    <style>
        .page-break { page-break-after: always; }
    </style>
</head>
<body>
@foreach($data as $items)
    <table>
        <tr>
           <td class="table-header" colspan="6">
                <div class="title-block">
                    <h2 class="title">Сравнительный конкурентный анализ</h2>
                </div>
{{--                <div class="logo-block" style="background-image: url({{ url($logo) }})"></div>--}}
            </td>
        </tr>
        <tr>
            <td class="column">
                <div class="image-block">
                    <img src="{{ url('exports/images/offers/cover.jpg') }}" class="picture">
                </div>
            </td>
            @foreach($items as $item)
                <td class="columns">
                    <div class="image-block">
                        <img src="{{ url('exports/images/offers/'.$item->images[0]) }}" class="picture">
                    </div>
                </td>
            @endforeach
        </tr>
        <tr>
            <td class="column">
                <div class="head-item">
                    <h2 style="padding: 5px; text-align: center;">Номер объекта</h2>
                </div>
            </td>
            @foreach($items as $item)
                <td class="columns">
                    <div class="head-item">
                        <h2 style="padding: 5px;">{{ $item->internal_id }}</h2>
                    </div>
                </td>
            @endforeach
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">Название</h2>
                </div>
            </td>
            @foreach($items as $item)
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text">{{ $item->name }}</h2>
                    </div>
                </td>
            @endforeach
        </tr>
        @if (isset($params['main']['address']))
            <tr>
                <td class="row-cell column">
                    <div class="row-title">
                        <h2 class="cell-text">Город</h2>
                    </div>
                </td>
                @foreach($items as $item)
                    <td class="row-cell columns">
                        <div class="row-data">
                            <h2 class="cell-text">{{ $item->location['city'] }}</h2>
                        </div>
                    </td>
                @endforeach
            </tr>
            <tr>
                <td class="row-cell column">
                    <div class="row-title">
                        <h2 class="cell-text">Адрес</h2>
                    </div>
                </td>
                @foreach($items as $item)
                    <td class="row-cell columns">
                        <div class="row-data">
                            <h2 class="cell-text">{{ $item->location['address'] }}</h2>
                        </div>
                    </td>
                @endforeach
            </tr>
        @endif
        @if (isset($params['main']['metro']))
            <tr>
                <td class="row-cell column">
                    <div class="row-title">
                        <h2 class="cell-text">Станция метро</h2>
                    </div>
                </td>
                @foreach($items as $item)
                    <td class="row-cell columns">
                        <div class="row-data">
                            <h2 class="cell-text">
                                @if($metro = $item->location['metro'])
                                    @foreach($metro as $name)
                                        {!! $loop->last ? $name.'' : $name.'<br>' !!}
                                    @endforeach
                                @endif
                            </h2>
                        </div>
                    </td>
                @endforeach
            </tr>
        @endif
        @if (isset($params['general']['total_area']))
            <tr>
                <td class="row-cell column">
                    <div class="row-title">
                        <h2 class="cell-text">ОБЩАЯ ПЛОЩАДЬ, М<sup><small>2</small></sup></h2>
                    </div>
                </td>
                @foreach($items as $item)
                    <td class="row-cell columns">
                        <div class="row-data">
                            <h2 class="cell-text">{{ $item->area }}</h2>
                        </div>
                    </td>
                @endforeach
            </tr>
        @endif
        @if (isset($params['general']['free_area']))
            <tr>
                <td class="row-cell column">
                    <div class="row-title">
                        <h2 class="cell-text">СВОБОДНАЯ ПЛОЩАДЬ, М<sup><small>2</small></sup></h2>
                    </div>
                </td>
                @foreach($items as $item)
                    <td class="row-cell columns">
                        <div class="row-data">
                            <h2 class="cell-text">{{ $item->area_free }}</h2>
                        </div>
                    </td>
                @endforeach
            </tr>
        @endif
        @if (isset($params['commercial']['main_rent']))
            <tr>
                <td class="row-cell column">
                    <div class="row-title">
                        <h2 class="cell-text">СТОИМОСТЬ АРЕНДЫ</h2>
                    </div>
                </td>
                @foreach($items as $item)
                    <td class="row-cell columns">
                        <div class="row-data">
                            <h2 class="cell-text">
                                @php
                                    $price = "price_{$item->status}";
                                    $fmt = ($item->price_unit == 'USD') ? 'en_US' : 'ru_RU';
                                    $fprice = new NumberFormatter($fmt, NumberFormatter::CURRENCY);
                                @endphp
                                {{ $fprice->formatCurrency($item->{$price}, $item->price_unit) }}
                                {!! ($item->status == 'rent') ? " мес." : '' !!}
                            </h2>
                        </div>
                    </td>
                @endforeach
            </tr>
        @endif
        @if (isset($params['main']['description']))
            <tr>
                <td class="row-cell column">
                    <div class="row-title">
                        <h2 class="cell-text">Описание</h2>
                    </div>
                </td>
                @foreach($items as $item)
                    <td class="row-cell columns">
                        <div class="row-data">
                            <h2 class="cell-text">{{ $item->description }}</h2>
                        </div>
                    </td>
                @endforeach
            </tr>
        @endif
        @if (isset($params['general']['building_type']))
            <tr>
                <td class="row-cell column">
                    <div class="row-title">
                        <h2 class="cell-text">ТИП ЗДАНИЯ</h2>
                    </div>
                </td>
                @foreach($items as $item)
                    <td class="row-cell columns">
                        <div class="row-data">
                            <h2 class="cell-text">{{ $item->building['type'] }}</h2>
                        </div>
                    </td>
                @endforeach
            </tr>
        @endif
        @if (isset($params['general']['storeys']))
            <tr>
                <td class="row-cell column">
                    <div class="row-title">
                        <h2 class="cell-text">ЭТАЖНОСТЬ ЗДАНИЯ</h2>
                    </div>
                </td>
                @foreach($items as $item)
                    <td class="row-cell columns">
                        <div class="row-data">
                            <h2 class="cell-text">{{ $item->building['storeys'] }}</h2>
                        </div>
                    </td>
                @endforeach
            </tr>
        @endif
        @if (isset($params['technical']['lift']))
            <tr>
                <td class="row-cell column">
                    <div class="row-title">
                        <h2 class="cell-text">НАЛИЧИЕ ЛИФТА</h2>
                    </div>
                </td>
                @foreach($items as $item)
                    <td class="row-cell columns">
                        <div class="row-data">
                            <h2 class="cell-text">{{ ($item->building['lift'] == 'yes') ? 'ДА' : 'НЕТ' }}</h2>
                        </div>
                    </td>
                @endforeach
            </tr>
        @endif
        @if (isset($params['general']['infrastructure']))
            <tr>
                <td class="row-cell column">
                    <div class="row-title">
                        <h2 class="cell-text">ДОПОЛНИТЕЛНЫЕ ОСОБЕННОСТИ</h2>
                    </div>
                </td>
                @foreach($items as $item)
                    <td class="row-cell columns">
                        <div class="row-data">
                            <h2 class="cell-text">{{ $item->features['car-place'] == 'parking' ? 'АВТОПАРКОВКА' : '' }}</h2>
                        </div>
                    </td>
                @endforeach
            </tr>
        @endif
        @if (isset($params['technical']['units_count']))
            <tr>
                <td class="row-cell column">
                    <div class="row-title">
                        <h2 class="cell-text">КОЛИЧЕСТВО ЮНИТОВ</h2>
                    </div>
                </td>
                @foreach($items as $item)
                    <td class="row-cell columns">
                        <div class="row-data">
                            <h2 class="cell-text">{{ $item->propertys_count }}</h2>
                        </div>
                    </td>
                @endforeach
                @if($rest = (5 - $items->count()))
                    @for($i = 0; $i < $rest; $i++)
                        <td class="columns"></td>
                    @endfor
                @endif
            </tr>
        @endif
    </table>
{{--    <p class="page-break"></p>--}}
@endforeach
</body>
</html>
