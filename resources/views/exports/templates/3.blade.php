<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link media="screen" rel="stylesheet" href="{{ url('exports/templates/css/definitions.css?v=').time() }}">
    <link media="screen" rel="stylesheet" href="{{ url('exports/templates/css/3.css?v=').time() }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .page-break { page-break-after: always; }
    </style>
</head>
<body>


<div class="content">
    @component('exports.components.3.header', ['logo' => $logo, 'params' => $params]) @endcomponent
    <div class="inner-content width-80">
        <table class="info-table width-100">
            <thead>
                <tr>
                    <td></td>
                    <td>
                        <div class="image-block"></div>
                    </td>
                    <td>
                        <div class="image-block"></div>
                    </td>
                    <td>
                        <div class="image-block"></div>
                    </td>
                    <td>
                        <div class="image-block"></div>
                    </td>
                </tr>
                <tr class="title-row">
                    <th>Номер объекта</th>
                    <th>#1</th>
                    <th>#2</th>
                    <th>#3</th>
                    <th>#4</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="cs-bg-white">Здание</th>
                    <td class="cs-bg-1">Алкон (стр. 4)</td>
                    <td class="cs-bg-white">Особняк на Смоленской</td>
                    <td class="cs-bg-1">Б.Татарская 35с4</td>
                    <td class="cs-bg-white">60 Город Столиц (Северная Башня)</td>
                </tr>
                <tr>
                    <th class="cs-bg-white">Адрес</th>
                    <td class="cs-bg-1">Ленинградский пр., д. 72, стр. 4</td>
                    <td class="cs-bg-white">Большой Левшинский Пер., 1/11</td>
                    <td class="cs-bg-1">Б.Татарская 35с4</td>
                    <td class="cs-bg-white">Пресненская наб., 8с1</td>
                </tr>
                <tr>
                    <th class="cs-bg-white">Расположение</th>
                    <td class="cs-bg-1">САО</td>
                    <td class="cs-bg-white">ЦАО</td>
                    <td class="cs-bg-1">ЦАО</td>
                    <td class="cs-bg-white">ЦАО</td>
                </tr>
                <tr>
                    <th class="cs-bg-white">Станция метро</th>
                    <td class="cs-bg-1">Сокол</td>
                    <td class="cs-bg-white">Кропоткинская</td>
                    <td class="cs-bg-1">Новокузнецкая, Третьяковская</td>
                    <td class="cs-bg-white">Международная</td>
                </tr>
                <tr>
                    <th class="cs-bg-2">Класс здания</th>
                    <td class="cs-bg-3">А</td>
                    <td class="cs-bg-2">В</td>
                    <td class="cs-bg-3">В+</td>
                    <td class="cs-bg-2">А</td>
                </tr>
                <tr>
                    <th class="cs-bg-2">Описание здания</th>
                    <td class="cs-bg-3">
                        Бизнес-комплекс, состоящий из 4 зданий с общей инфраструктурой: рестораны, столовая, кафе, банк.
                    </td>
                    <td class="cs-bg-2">
                        3-этажный реконструированный клубный особняк с мансардой и подвалом общей площадью около 1 497,9 кв. м.
                        Три входа. Центральное расположение. Удобный доступ на Бульварное и Садовое кольцо.
                    </td>
                    <td class="cs-bg-3">
                        Административное здание расположено в Замоскворечье. Высокие потолки и большие окна.
                        Качественная отделка, помещения готовы к въезду
                    </td>
                    <td class="cs-bg-2">
                        Многофункциональный комплекс класса А, часть комплекса Москва-Сити.
                        Развитая инфраструктура: рестораны, кафе, торговая зона и фитнес-центр.
                        Якорные арендаторы: Capital Group, Renaissance Credit, Goltsblat BLP, Amgen.
                    </td>
                </tr>
                <tr>
                    <th class="cs-bg-2">Дата ввода в эксплуатацию</th>
                    <td class="cs-bg-3">2012-10-01</td>
                    <td class="cs-bg-2"></td>
                    <td class="cs-bg-3"></td>
                    <td class="cs-bg-2">2009-08-01</td>
                </tr>
                <tr>
                    <th class="cs-bg-2">Арендодатель / Девелопер</th>
                    <td class="cs-bg-3">2012-10-01</td>
                    <td class="cs-bg-2">KR Properties</td>
                    <td class="cs-bg-3">HALS Development</td>
                    <td class="cs-bg-2">Capital Group</td>
                </tr>
                <tr>
                    <th class="cs-bg-2">Пешая доступность от метро</th>
                    <td class="cs-bg-3">5</td>
                    <td class="cs-bg-2">7</td>
                    <td class="cs-bg-3">7</td>
                    <td class="cs-bg-2">5</td>
                </tr>
                <tr>
                    <th class="cs-bg-2">Общая арендуемая площадь здания, м &sup2;</th>
                    <td class="cs-bg-3">19 893</td>
                    <td class="cs-bg-2"></td>
                    <td class="cs-bg-3">6 259</td>
                    <td class="cs-bg-2">47 814</td>
                </tr>
                <tr>
                    <th class="cs-bg-2">Свободная площадь, м &sup2;</th>
                    <td class="cs-bg-3">1 689</td>
                    <td class="cs-bg-2">1 498</td>
                    <td class="cs-bg-3">6 259</td>
                    <td class="cs-bg-2">1 232</td>
                </tr>
                <tr>
                    <th class="cs-bg-2">Парковка</th>
                    <td class="cs-bg-3">подземная - 1016 мест, 17 500 руб коэффициент - 1:60</td>
                    <td class="cs-bg-2">наземная - 22 000 руб</td>
                    <td class="cs-bg-3">наземная - 25 мест, 15 000 руб коэффициент - 1/20</td>
                    <td class="cs-bg-2">коэффициент - 1/60</td>
                </tr>
                <tr>
                    <th class="cs-bg-2">Управляющая компания</th>
                    <td class="cs-bg-3"></td>
                    <td class="cs-bg-2"></td>
                    <td class="cs-bg-3"></td>
                    <td class="cs-bg-2"></td>
                </tr>
                <tr>
                    <th class="cs-bg-white">Арендная ставка/м &sup2;/ год</th>
                    <td class="cs-bg-1">от 25000 руб. до 30000 руб</td>
                    <td class="cs-bg-white">28333 руб</td>
                    <td class="cs-bg-1">20000 руб.</td>
                    <td class="cs-bg-white">от 40000 руб. до 46000 руб.</td>
                </tr>
                <tr>
                    <th class="cs-bg-white">Операционные расходы/м &sup2;/ год</th>
                    <td class="cs-bg-1">Exclude 8000</td>
                    <td class="cs-bg-white">Exclude 5000 RUB/м2 в год</td>
                    <td class="cs-bg-1">Exclude 4000</td>
                    <td class="cs-bg-white">Exclude 7500</td>
                </tr>
                <tr>
                    <th class="cs-bg-white">Кольцевая зона</th>
                    <td class="cs-bg-1">TTR</td>
                    <td class="cs-bg-white">SK</td>
                    <td class="cs-bg-1">SK</td>
                    <td class="cs-bg-white">TTR</td>
                </tr>
            </tbody>
        </table>
    </div>
    @component('exports.components.3.footer') @endcomponent
    <p class="page-break"></p>

    @component('exports.components.3.header') @endcomponent

    <div class="inner-content width-80">
        <div class="width-28 dinline-block p-r-20">
            <div class="objects-list">
                <div class="list-title">
                    <p>Объект</p>
                </div>
                <ul>
                    <li>Алкон (стр. 4)</li>
                    <li>Особняк на Смоленской</li>
                    <li>Б.Татарская 35с4</li>
                    <li>60 Город Столиц (Северная Башня)</li>
                </ul>
            </div>
        </div>
        <div class="width-68 dinline-block">
            <div class="objects-map"></div>
        </div>
    </div>

    @component('exports.components.3.footer') @endcomponent
    <p class="page-break"></p>

</div>
<p class="page-break"></p>

{{--@foreach($data[0] as $offer)--}}



{{--@endforeach--}}
</body>
</html>
