<div class="footer">
    <div class="footer-top width-100">
        <div class="owner-info dinline-block width-45 m-r-20">
            <span>COLLIERS INTERNATIONAL РОССИЯ, 123112 МОСКВА, ПРЕСНЕНСКАЯ НАБ., Д. 10</span>
            <br>
            <span>БЦ «БАШНЯ НА НАБЕРЕЖНОЙ», БЛОК С, 52 ЭТАЖ. ТЕЛ. +7 495 258 51 51 | WWW.COLLIERS.COM</span>
        </div>
        <div class="company-info dinline-block width-25">
            @if (isset($params['main']['address']) && !empty($params['main']['address']))
                <span>{{ $offer->location['city'] }}</span>
                <br>
                <span>{{ $offer->location['address'] }}</span>
            @endif
        </div>
    </div>
    <div class="footer-bottom"></div>
</div>