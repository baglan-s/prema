<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link media="screen" rel="stylesheet" href="{{ url('exports/templates/css/second.css?v=').time() }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
{{--    <link href="https://fonts.googleapis.com/css2?family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .page-break { page-break-after: always; }
    </style>
</head>
<body>


@foreach($data[0] as $offer)

    <div class="content">
        @component('exports.components.2.header', ['offer' => $offer, 'logo' => $logo, 'params' => $params]) @endcomponent
        <div class="main-content">
            <div class="main-images width-100">
                <div class="image-block width-40 dinline-block m-r-25" style="background-image: url({{ asset('exports/images/offers/cover.jpg') }})"></div>
                <div class="image-block width-35 dinline-block" style="background-image: url({{ asset('exports/images/offers/' . $offer->images[0]) }})"></div>
            </div>
            <div class="main-conditions-title">
                <div class="commercial dinline-block section-title width-40 m-r-25">
                    @if (isset($params['commercial']) && !empty($params['commercial']))
                        Коммерческие условия
                    @endif
                </div>
                <div class="desc dinline-block section-title width-35">
                    @if (isset($params['main']['description']) && !empty($params['main']['description']))
                        Описание
                    @endif
                </div>
            </div>
            <div class="main-conditions">
                <div class="conditions dinline-block width-40 m-r-25">
                    @if (isset($params['commercial']) && !empty($params['commercial']))
                        <table class="width-100">
                            @if (isset($params['commercial']['main_rent']))
                                <tr>
                                    <td>Арендная ставка</td>
                                    <td>
                                        Арендуемая площадь
                                        @php
                                            $price = "price_{$offer->status}";
                                            $fmt = ($offer->price_unit == 'USD') ? 'en_US' : 'ru_RU';
                                            $fprice = new NumberFormatter($fmt, NumberFormatter::CURRENCY);
                                        @endphp
                                        {{ $fprice->formatCurrency($offer->{$price}, $offer->price_unit) }}
                                        {!! ($offer->status == 'rent') ? " мес." : '' !!}
                                    </td>
                                </tr>
                            @endif
                            @if (isset($params['commercial']['opp_expenses']))
                                <tr>
                                    <td>Эксплуатационные расходы</td>
                                    <td>Нет</td>
                                </tr>
                            @endif
                            @if (isset($params['commercial']['vat']))
                                <tr>
                                    <td>НДС</td>
                                    <td>Не включен</td>
                                </tr>
                            @endif
                            @if (isset($params['commercial']['building_type']))
                                <tr>
                                    <td>Тип здания</td>
                                    <td>{{ $offer->building['type'] }}</td>
                                </tr>
                            @endif
                        </table>
                    @endif
                </div>
                <div class="description dinline-block width-35">
                    @if (isset($params['main']['description']) && !empty($params['main']['description']))
                        <div class="width-100 dinline-block">
                            {{ $offer->description }}
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it
                        </div>
                    @endif
                </div>
            </div>
            <div class="general-info width-100">
                <div class="info-table dinline-block width-50 m-r-25">
                    @if (isset($params['general']) && !empty($params['general']))
                        <div class="section-title">Общие характеристики</div>
                        <table class="width-100">
                            <thead>
                                <tr>
                                    @if(isset($params['general']['total_area'])) <th>Общая площадь</th> @endif
                                    @if(isset($params['general']['free_area'])) <th>Свободная площадь</th> @endif
                                    @if(isset($params['general']['storeys'])) <th>Этажность</th> @endif
                                    @if(isset($params['general']['building_type'])) <th>Тип здания</th> @endif
                                    @if(isset($params['general']['infrastructure'])) <th>Инфраструктура</th> @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if(isset($params['general']['total_area'])) <td>{{ $offer->area }} м²</td> @endif
                                    @if(isset($params['general']['free_area'])) <td>{{ $offer->area_free }} м²</td> @endif
                                    @if(isset($params['general']['storeys'])) <td>{{ $offer->building['storeys'] }}</td> @endif
                                    @if(isset($params['general']['building_type'])) <td>{{ $offer->building['type'] }}</td> @endif
                                    @if(isset($params['general']['infrastructure'])) <td>{{ $offer->features['car-place'] == 'parking' ? 'АВТОПАРКОВКА' : '' }}</td> @endif
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
                <div class="info-notice dinline-block width-25">
                    @if (isset($params['main']['metro']))
                        <div class="info-location width-100">
                            <p class="box-title">Расположение</p>
                            <div class="metro location-detail">
                                <img src="{{ asset('exports/images/metro_icon.png') }}" alt="">
                                <span class="detail-title">

                                @if ($metro = $offer->location['metro'])
                                        @foreach($metro as $name)
                                            {!! $loop->last ? $name.'' : $name.', ' !!}
                                            @if($loop->iteration == 2) @break @endif
                                        @endforeach
                                    @endif

                            </span>
                            </div>
                            <div class="car dinline-block location-detail width-50">
                                <img src="{{ asset('exports/images/car_icon.png') }}" alt="">
                                <span class="detail-title">5 мин</span>
                            </div>
                            <div class="walk dinline-block location-detail width-50">
                                <img src="{{ asset('exports/images/human_icon.png') }}" alt="">
                                <span class="detail-title">15 мин</span>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="info-table width-50">
                    @if (isset($params['technical']) && !empty($params['technical']))
                        <div class="section-title">Технические характеристики здания</div>
                        <table class="width-100">
                            <thead>
                                <tr>
                                    @if($params['technical']['lift']) <th>Наличие лифта</th> @endif
                                    @if($params['technical']['units_count']) <th>Количество юнитов</th> @endif
                                    @if($params['technical']['lift']) <th>Лифты</th> @endif
                                    @if($params['technical']['columns_step']) <th>Шаг колонн</th> @endif
                                    @if($params['technical']['conditioning']) <th>Кондиционирование</th> @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if($params['technical']['lift']) <td>{{ ($offer->building['lift'] == 'yes') ? 'ДА' : 'НЕТ' }}</td> @endif
                                    @if($params['technical']['units_count']) <td>{{ $offer->propertys_count }}</td> @endif
                                    @if($params['technical']['lift']) <td>3</td> @endif
                                    @if($params['technical']['columns_step']) <td>6.0</td> @endif
                                    @if($params['technical']['conditioning']) <td>Центральная четырёхтрубная система</td> @endif
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
        @component('exports.components.2.footer', ['offer' => $offer]) @endcomponent
        <p class="page-break"></p>

        @component('exports.components.2.header', ['offer' => $offer, 'logo' => $logo]) @endcomponent

        <div class="properties-block width-100">
            <div class="properties-table dinline-block width-53 m-r-25">
                <table class="width-100">
                    <thead>
                    <tr>
                        <th>Этаж</th>
                        <th>Площадь, м2</th>
                        <th>Ставка, руб/м2/г</th>
                        <th>Статус</th>
                        <th>Свободно</th>
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
            <div class="properties-images dinline-block width-23">
                @if (!empty($offer->propertys[0]->images))
                    @php($images = json_decode($offer->propertys[0]->images, 'true'))
                    @foreach($images as $image)
                        <div class="image width-100" style="background-image: url({{ $image }})"></div>
                        @if ($loop->iteration == 3)
                            @break
                        @endif
                    @endforeach
                @endif
            </div>
        </div>

        @component('exports.components.2.footer', ['offer' => $offer, 'params' => $params]) @endcomponent

        <p class="page-break"></p>

        @component('exports.components.2.header', ['offer' => $offer, 'logo' => $logo]) @endcomponent

        <div class="plan-block width-100">
            <div class="dinline-block width-53 m-r-25">
                <div class="section-title">План помещений</div>
                @if($images = json_decode($offer->plan_images, true))
                    @if (isset($images[0]))
                        <div class="main-plan-image width-100">
                            <div class="image" style="background-image: url({{ asset($images[0]) }})"></div>
                        </div>
                    @endif
                    @if (isset($images[1]))
                        <div class="properties-images dinline-block width-47 m-r-25">
                            <div class="image" style="background-image: url({{ asset($images[1]) }})"></div>
                        </div>
                    @endif
                    @if (isset($images[2]))
                        <div class="properties-images dinline-block width-47">
                            <div class="image" style="background-image: url({{ asset($images[2]) }})"></div>
                        </div>
                    @endif
                @endif
            </div>
            <div class="properties-images dinline-block width-23">
                @if (isset($offer->sales_agent) && !empty($offer->sales_agent))
                    <div class="section-title">Контакты</div>
                    @if (isset(json_decode($offer->sales_agent, true)['photo']))
                        <div class="image width-100" style="background-image: url({{ json_decode($offer->sales_agent, true)['photo'] }})"></div>
                    @endif
                    @if (isset(json_decode($offer->sales_agent, true)['organization']))
                        <div class="sales-agent-detail width-100">
                            <div class="title">{{ json_decode($offer->sales_agent, true)['organization'] }}</div>
                            <div class="subtitle">{{ json_decode($offer->sales_agent, true)['category'] ?? '' }}</div>
                        </div>
                    @endif
                    @if (isset(json_decode($offer->sales_agent, true)['phone']))
                        <div class="sales-agent-contacts width-100">
                            <span>{{ json_decode($offer->sales_agent, true)['phone'] }}</span>
                            <br>
                            <span >{{ json_decode($offer->sales_agent, true)['email'] ?? '' }}</span>
                        </div>
                    @endif
                @endif
            </div>
        </div>

        @component('exports.components.2.footer', ['offer' => $offer, 'params' => $params]) @endcomponent
    </div>
    <p class="page-break"></p>

@endforeach
</body>
</html>
