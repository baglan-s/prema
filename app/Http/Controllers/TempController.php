<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Services\DataGeocoding\DataGeocodingService;
use Geocoder\Laravel\Facades\Geocoder;

class TempController extends Controller
{
    public function index()
    {
//        $offers = Offer::all()->pluck('id');
//        DataGeocodingService::make($offers->toArray());

//        $offers = Offer::all()->pluck('id')->toArray();
//        DataGeocodingService::make($offers);

        $response = app('geocoder')
            ->geocode('Los Angeles, CA')
            ->get();

        $lat = $response[0]->getCoordinates()->getLatitude();
        $lon = $response[0]->getCoordinates()->getLongitude();
//
//        echo '<pre>';
//        print_r($response[0]->getCoordinates()->getLatitude());
//        foreach ($response as $item) {
//
//            print_r($item);
//        }
        $key = env("GOOGLE_MAPS_API_KEY");
        echo "https://maps.googleapis.com/maps/api/staticmap?center=$lat,$lon&zoom=6&size=400x400&markers=color:blue&key=$key";
        echo '<p style="width:70%;">
                <img src="https://maps.googleapis.com/maps/api/staticmap?center=' . $lat . ',' . $lon . '&zoom=6&size=400x400
&markers=color:blue%7Clabel:S%7C' . $lat . ',' . $lon . '&markers=color:red%7Clabel:S%7C' . ($lat - 1) . ',' . ($lon + 1) . '&key=' . env('GOOGLE_MAPS_API_KEY') . '" style="display:inline-block;width:100%;margin-right:50px;float:left;margin-top:2px">
            </p>';
    }

    public function test()
    {
        $offer = Offer::find(1);
        echo $offer->propertys()->min('price_rent');
//        return view('exports.templates.5', ['logo' => 'test', 'params' => []]);
    }
}
