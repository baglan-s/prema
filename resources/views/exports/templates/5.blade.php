<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link media="screen" rel="stylesheet" href="{{ url('exports/templates/css/definitions.css?v=').time() }}">
    <link media="screen" rel="stylesheet" href="{{ url('exports/templates/css/5.css?v=').time() }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .page-break { page-break-after: always; }
    </style>
</head>
<body class="new-body">


<div class="content">
    @component('exports.components.5.header', ['logo' => $logo, 'params' => $params]) @endcomponent
    <div class="inner-content">
        <table class="info-table">
            <thead>
                <tr>
                    <td></td>
                    @foreach($data[0] as $offer)
                        <td>
                            <div class="image-block" style="background-image: url({{ asset('exports/images/offers/' . $offer->images[0]) }})"></div>
                        </td>
                    @endforeach
                </tr>
                <tr class="title-row">
                    <th>Номер объекта</th>
                    @foreach($data[0] as $offer)
                        <th>#{{ $loop->iteration }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="cs-bg-white">Здание</th>
                    @foreach($data[0] as $offer)
                        <th class="@if($loop->iteration%2==0) cs-bg-white @else cs-bg-1 @endif">{{ $offer->name }}</th>
                    @endforeach
                </tr>
                @if (isset($params['main']['address']) && !empty($params['main']['address']))
                    <tr>
                        <th class="cs-bg-white">Адрес</th>
                        @foreach($data[0] as $offer)
                            <th class="@if($loop->iteration%2==0) cs-bg-white @else cs-bg-1 @endif"> {{ $offer->location['city'] }}, {{ $offer->location['address'] }}</th>
                        @endforeach
                    </tr>
                @endif
                <tr>
                    <th class="cs-bg-white">Расположение</th>
                    @foreach($data[0] as $offer)
                        <td class="@if($loop->iteration%2==0) cs-bg-white @else cs-bg-1 @endif"></td>
                    @endforeach
                </tr>
                @if (isset($params['main']['metro']))
                    <tr>
                        <th class="cs-bg-white">Станция метро</th>
                        @foreach($data[0] as $offer)
                            <td class="@if($loop->iteration%2==0) cs-bg-white @else cs-bg-1 @endif">
                                @if ($metro = $offer->location['metro'])
                                    @foreach($metro as $name)
                                        {!! $loop->last ? $name.'' : $name.', ' !!}
                                        @if($loop->iteration == 2) @break @endif
                                    @endforeach
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endif
                @if(isset($params['general']['building_type']))
                    <tr>
                        <th class="cs-bg-2">Класс здания</th>
                        @foreach($data[0] as $offer)
                            <td class="@if($loop->iteration%2==0) cs-bg-white @else cs-bg-1 @endif">{{ $offer->building['type'] }}</td>
                        @endforeach
                    </tr>
                @endif
                @if (isset($params['main']['description']) && !empty($params['main']['description']))
                    <tr>
                        <th class="cs-bg-2">Описание здания</th>
                        @foreach($data[0] as $offer)
                            <td class="@if($loop->iteration%2==0) cs-bg-white @else cs-bg-1 @endif">{{ $offer->description }}</td>
                        @endforeach
                    </tr>
                @endif
                <tr>
                    <th class="cs-bg-2">Дата ввода в эксплуатацию</th>
                    @foreach($data[0] as $offer)
                        <td class="@if($loop->iteration%2==0) cs-bg-3 @else cs-bg-2 @endif">{{ date('d-m-Y', strtotime($offer->created_at)) }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th class="cs-bg-2">Арендодатель / Девелопер</th>
                    @foreach($data[0] as $offer)
                        <td class="@if($loop->iteration%2==0) cs-bg-3 @else cs-bg-2 @endif">{{ $offer->team->name ?? '' }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th class="cs-bg-2">Пешая доступность от метро</th>
                    @foreach($data[0] as $offer)
                        <td class="@if($loop->iteration%2==0) cs-bg-3 @else cs-bg-2 @endif"></td>
                    @endforeach
                </tr>
                @if(isset($params['general']['total_area']))
                    <tr>
                        <th class="cs-bg-2">Общая арендуемая площадь здания, м &sup2;</th>
                        @foreach($data[0] as $offer)
                            <td class="@if($loop->iteration%2==0) cs-bg-3 @else cs-bg-2 @endif">{{ $offer->area }} м²</td>
                        @endforeach
                    </tr>
                @endif
                @if(isset($params['general']['free_area']))
                    <tr>
                        <th class="cs-bg-2">Свободная площадь, м &sup2;</th>
                        @foreach($data[0] as $offer)
                            <td class="@if($loop->iteration%2==0) cs-bg-3 @else cs-bg-2 @endif">{{ $offer->area_free }} м²</td>
                        @endforeach
                    </tr>
                @endif
                @if(isset($params['general']['infrastructure']))
                    <tr>
                        <th class="cs-bg-2">Парковка</th>
                        @foreach($data[0] as $offer)
                            <td class="@if($loop->iteration%2==0) cs-bg-3 @else cs-bg-2 @endif">{{ $offer->features['car-place'] == 'parking' ? 'Есть' : '' }}</td>
                        @endforeach
                    </tr>
                @endif
                <tr>
                    <th class="cs-bg-2">Управляющая компания</th>
                    @foreach($data[0] as $offer)
                        <td class="@if($loop->iteration%2==0) cs-bg-3 @else cs-bg-2 @endif"></td>
                    @endforeach
                </tr>
                @if (isset($params['commercial']['main_rent']))
                    <tr>
                        <th class="cs-bg-white">Арендная ставка</th>
                        @foreach($data[0] as $offer)
                            <td class="@if($loop->iteration%2==0) cs-bg-1 @else cs-bg-white @endif">от {{ $offer->propertys()->min('price_rent') }} руб. до {{ $offer->propertys()->max('price_rent') }} руб.</td>
                        @endforeach
                    </tr>
                @endif
                <tr>
                    <th class="cs-bg-white">Операционные расходы/м &sup2;/ год</th>
                    @foreach($data[0] as $offer)
                        <td class="@if($loop->iteration%2==0) cs-bg-1 @else cs-bg-white @endif"></td>
                    @endforeach
                </tr>
                <tr>
                    <th class="cs-bg-white">Кольцевая зона</th>
                    @foreach($data[0] as $offer)
                        <td class="@if($loop->iteration%2==0) cs-bg-1 @else cs-bg-white @endif"></td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>

    @component('exports.components.5.footer') @endcomponent
    <p class="page-break"></p>

    @component('exports.components.5.header') @endcomponent

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

        <div class="inner-content width-100">
        <div class="width-65 dinline-block p-r-20">
            <div class="objects-map">
                <img src="{{ $map_src }}" alt="">
            </div>
        </div>
        <div class="width-35 dinline-block">
            <div class="objects-list">
                <div class="list-title">
                    <p>Объект</p>
                </div>
                <ul>
                    @foreach($data[0] as $offer)
                        <li>{{ $offer->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @component('exports.components.5.footer') @endcomponent
{{--    <p class="page-break"></p>--}}

</div>
{{--<p class="page-break"></p>--}}

{{--@foreach($data[0] as $offer)--}}



{{--@endforeach--}}
</body>
</html>
