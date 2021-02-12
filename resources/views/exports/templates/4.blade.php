<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link media="screen" rel="stylesheet" href="{{ url('exports/templates/css/definitions.css?v=').time() }}">
    <link media="screen" rel="stylesheet" href="{{ url('exports/templates/css/4.css?v=').time() }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        .page-break { page-break-after: always; }
    </style>
</head>
<body class="landscape">


<div class="content">
    @component('exports.components.4.header', ['logo' => $logo, 'params' => $params]) @endcomponent
    <div class="inner-content width-100">
        <table class="info-table width-100">
            <thead>
                <tr class="images-row">
                    <td></td>
                    @foreach($data[0] as $offer)
                        <td>
                            <div class="image-block" style="background-image: url({{ asset('exports/images/offers/' . $offer->images[0]) }})"></div>
                        </td>
                    @endforeach
                </tr>
                <tr class="title-row">
                    <td></td>
                    @foreach($data[0] as $offer)
                        <th>
                            <span>{{ $offer->name }}</span>
                        </th>
                    @endforeach
                </tr>
                @if (isset($params['main']['address']) && !empty($params['main']['address']))
                    <tr class="address-row">
                        <td></td>
                        @foreach($data[0] as $offer)
                            <th>
                                {{ $offer->location['city'] }}, {{ $offer->location['address'] }} <br>
                                САО <br>
                                @if (isset($params['main']['metro']) && $metro = $offer->location['metro'])
                                    @foreach($metro as $name)
                                        {!! $loop->last ? $name.'' : $name.', ' !!}
                                        @if($loop->iteration == 2) @break @endif
                                    @endforeach
                                @endif
                                 <br>
                            </th>
                        @endforeach
                    </tr>
                @endif
            </thead>
            <tbody>
            @if(isset($params['general']['building_type']))
                <tr>
                    <th>Класс здания</th>
                    @foreach($data[0] as $offer)
                        <td>{{ $offer->building['type'] }}</td>
                    @endforeach
                </tr>
            @endif
            @if (isset($params['main']['description']) && !empty($params['main']['description']))
                <tr>
                    <th>Описание здания</th>
                    @foreach($data[0] as $offer)
                        <td>{{ $offer->description }}</td>
                    @endforeach
                </tr>
            @endif
                <tr>
                    <th>Дата ввода в эксплуатацию</th>
                    @foreach($data[0] as $offer)
                        <td >{{ date('d-m-Y', strtotime($offer->created_at)) }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Арендодатель / Девелопер</th>
                    @foreach($data[0] as $offer)
                        <td>{{ $offer->team->name ?? '' }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Пешая доступность от метро</th>
                    @foreach($data[0] as $offer)
                        <td></td>
                    @endforeach
                </tr>
            @if(isset($params['general']['total_area']))
                <tr>
                    <th>Общая арендуемая площадь здания, м &sup2;</th>
                    @foreach($data[0] as $offer)
                        <td>{{ $offer->area }} м²</td>
                    @endforeach
                </tr>
            @endif
            @if(isset($params['general']['free_area']))
                <tr>
                    <th>Свободная площадь, м &sup2;</th>
                    @foreach($data[0] as $offer)
                        <td>{{ $offer->area_free }} м²</td>
                    @endforeach
                </tr>
            @endif
            @if(isset($params['general']['infrastructure']))
                <tr>
                    <th>Парковка</th>
                    @foreach($data[0] as $offer)
                        <td>{{ $offer->features['car-place'] == 'parking' ? 'Есть' : '' }}</td>
                    @endforeach
                </tr>
            @endif
                <tr>
                    <th>Управляющая компания</th>
                    @foreach($data[0] as $offer)
                        <td></td>
                    @endforeach
                </tr>
            @if (isset($params['commercial']['main_rent']))
                <tr class="cs-bg-last">
                    <th >Арендная ставка</th>
                    @foreach($data[0] as $offer)
                        <td>от {{ $offer->propertys()->min('price_rent') }} руб. до {{ $offer->propertys()->max('price_rent') }} руб.</td>
                    @endforeach
                </tr>
            @endif

                <tr class="cs-bg-last">
                    <th>Операционные расходы/м &sup2;/ год</th>
                    @foreach($data[0] as $offer)
                        <td></td>
                    @endforeach
                </tr>
                <tr class="cs-bg-last">
                    <th></th>
                    @foreach($data[0] as $offer)
                        <td></td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
{{--    @component('exports.components.3.footer') @endcomponent--}}
    <p class="page-break"></p>

{{--    @component('exports.components.4.header', ['logo' => $logo, 'params' => $params, 'class' => 'second_header']) @endcomponent--}}
<div class="test width-100">
    <div class="width-80 dinline-block">
        <div class="header-title-block {{ $class ?? '' }}">
            <div class="header-text">
                <div class="header-title">
                    <p>Сравнительный конкурентный анализ</p>
                </div>
                <div class="header-add-info">
                    <span class="address">123456, Moscow, Pravdy st, bld 15</span>
                    <span class="website">www.ourrealestate.com</span>
                </div>
            </div>
        </div>
    </div>
    <div class="width-19 dinline-block p-20">
        <div class="main-logo image-block">
            logo
        </div>
    </div>
</div>

        @php
            $map_src = 'https://maps.googleapis.com/maps/api/staticmap?center=';
            $map_tools = [
                ['name' => 'B', 'color' => 'blue'],
                ['name' => 'S', 'color' => 'red'],
                ['name' => 'G', 'color' => 'green'],
                ['name' => 'C', 'color' => 'pink'],
            ];
        @endphp
        @foreach($data[0] as $offer)
            @if ($loop->iteration == 1)
                @php($map_src .= $offer->location['lat'] . ',' . $offer->location['lon'] . '&zoom=9&size=800x600&markers=color:' . $map_tools[$loop->index]['color'] . '%7Clabel:' . $map_tools[$loop->index]['name'] . '%7C' . $offer->location['lat'] . ',' . $offer->location['lon'])
            @else
                @php($map_src .= '&markers=color:' . $map_tools[$loop->index]['color'] . '%7Clabel:' . $map_tools[$loop->index]['name'] . '%7C' .  $offer->location['lat'] . ',' . $offer->location['lon'] . '&markers=color:blue%7Clabel:' . $map_tools[$loop->index]['name'] . '%7C')
            @endif
        @endforeach
        @php($map_src .= '&key=' . env('GOOGLE_MAPS_API_KEY'))

        <div class="inner-content">
        <div class="location">
            <div class="width-20 dinline-block p-r-20">
                <div class="objects-list">
                    <ul>
                        @foreach($data[0] as $offer)
                            <li>{{ $offer->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="width-75 dinline-block">
                <div class="objects-map" style="background-image: url({{ $map_src }});">
{{--                    <img src="{{ $map_src }}" alt="">--}}
                </div>
            </div>
        </div>
        </div>

{{--    @component('exports.components.3.footer') @endcomponent--}}

</div>

{{--<p class="page-break"></p>--}}

{{--@foreach($data[0] as $offer)--}}



{{--@endforeach--}}
</body>
</html>
