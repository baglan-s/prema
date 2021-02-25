<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link media="screen" rel="stylesheet" href="{{ url('exports/templates/css/definitions.css?v=').time() }}">
    <link media="screen" rel="stylesheet" href="{{ url('exports/templates/css/8.css?v=').time() }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        .page-break { page-break-after: always; }
    </style>
</head>
<body class="landscape">

@foreach($data[0] as $offer)
<div class="content">

    <div class="header">
        <div class="header-title-info width-56 dinline-block">
            <h1>{{ $offer->name }}</h1>
            <div class="header-info-details">
                @if (isset($params['main']['address']) && !empty($params['main']['address']))
                    <img src="{{ asset('exports/images/location-white.png') }}" class="location-icon" alt="">
                    <b>{{ $offer->location['city'] }}, {{ $offer->location['address'] }}</b>
                @endif
                @if (isset($params['main']['metro']) && $metro = $offer->location['metro'])
                    <b>
                        Станция метро —
                        @foreach($metro as $name)
                            {!! $loop->last ? $name.'' : $name.', ' !!}
                            @if($loop->iteration == 2) @break @endif
                        @endforeach
                    </b><br>
                @endif
                <b>Расстояние до метро — 5 минут</b>
            </div>
        </div>
        <div class="header-logo-info width-35 dinline-block">
            <div class="header-logo">logo</div>
        </div>
    </div>
    <div class="header-bottom">
        <span>Связаться с нами</span>
        <b>T: +7 123 456 7899</b>
        <b>www.ourrealestate.com</b>
    </div>
    <div class="main">
        <div class="data-table-block width-62 dinline-block">
            <div class="main-images">
                <div class="image-block width-47 dinline-block" style="background-image: url({{ asset('exports/images/offers/cover.jpg') }})"></div>
                <div class="image-block width-47 dinline-block" style="background-image: url({{ asset('exports/images/offers/' . $offer->images[0]) }})"></div>
            </div>
            <table class="pr-table width-97">
                <thead>
                <tr>
                    <th>Этаж</th>
                    <th>Площадь</th>
                    <th>Ставка</th>
                    <th>Состояние помещений</th>
                    <th>Свободно с даты</th>
                </tr>
                </thead>
                <tbody>
                @if ($offer->propertys->count())
                    @foreach($offer->propertys as $property)
                        <tr>
                            <td>{{ json_decode($property->features, true)['floor'] ?? 1 }}</td>
                            <td>{{ $property->area }}</td>
                            <td>{{ $property->price_rent }}</td>
                            <td>{{ $property->status == 'rent' ? 'аренда' : 'продажа' }}</td>
                            <td>{{ $property->created_at }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="data-list-block width-30 dinline-block">
            <div class="list-block">
                <b class="list-block-title">Общие характеристики:</b>
                <ul>
                    @if(isset($params['general']['building_type'])) <li>Класс - {{ $offer->building['type'] }}-</li> @endif
                    @if(isset($params['general']['free_area'])) <li>Общая площадь - {{ $offer->area_free }} м²</li> @endif
                    @if(isset($params['general']['total_area'])) <li>Арендуемая площадь - {{ $offer->area }} м²</li> @endif
                    @if(isset($params['general']['storeys'])) <li>Этажи - {{ $offer->building['storeys'] }}</li> @endif
                    <li>Площадь типового этажа - ??? м²</li>
                </ul>
                <img src="{{ asset('exports/images/cellphone.png') }}" alt="">
            </div>
            <div class="list-block">
                <b class="list-block-title">Коммерческие условия:</b>
                <ul>
                    @if (isset($params['commercial']['main_rent'])) <li>Арендная ставка {{ $offer->propertys()->min('price_rent') }} руб. - {{ $offer->propertys()->max('price_rent') }}</li> @endif
                    <li>Эксплуатационные расходы включены</li>
                    <li>НДС включен</li>
                </ul>
                <img src="{{ asset('exports/images/money.png') }}" alt="">
            </div>
            <div class="list-block">
                <b class="list-block-title">Технические характеристики:</b>
                <ul>
                    <li>Мощность - 100 кВт</li>
                    <li>Высота потолка - 3.3</li>
                    <li>Нагрузка на пол - 400</li>
                    <li>Лифты - 13, kone</li>
                    <li>Шаг колон - 7.5</li>
                    <li>Система кондиционирования — multisplit</li>
                </ul>
                <img src="{{ asset('exports/images/paper.png') }}" alt="">
            </div>
            <div class="list-block">
                <b class="list-block-title">Парковка:</b>
                <ul>
                    <li>Парковочный коэффициент - 1/160</li>
                    <li>Паркинг (подземный) 197 мест, 6150 руб./м.м./мес., НДС</li>
                </ul>
                <img src="{{ asset('exports/images/car_red.png') }}" alt="">
            </div>
        </div>
    </div>


</div>
@if (!$loop->last)
    <p class="page-break"></p>
@endif
@endforeach
</body>
</html>
