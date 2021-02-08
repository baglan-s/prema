<div class="header">
    <div class="header-top">
        <div class="header-title">
            <p>{{ $offer->name }}</p>
        </div>
        <div class="header-logo">
{{--            <div class="img" style="background-image: url({{ $logo }})"></div>--}}
            <div class="img"></div>
        </div>
    </div>
    <div class="header-bottom width-100">
        <div class="header-address width-45 dinline-block">
            @if (isset($params['main']['address']) && !empty($params['main']['address']))
                {{ $offer->location['city'] }}, {{ $offer->location['address'] }}
            @endif
        </div>
        <div class="header-slogan width-35 dinline-block">Аренда. Офисные помещения</div>
    </div>
</div>