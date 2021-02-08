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

        $response = app('geocoder')
            ->geocode('Los Angeles, CA')
            ->get();

        var_dump($response);

//        echo '<p style="width:70%;">
//                <img src="https://maps.googleapis.com/maps/api/staticmap?scale=2&amp;size=1280x1280&amp;markers=color:blue%7Clabel%3A1%7C55.805791%2C37.520339&amp;markers=color:blue%7Clabel%3A2%7C55.761818%2C37.617563&amp;markers=color:blue%7Clabel%3A3%7C55.780998%2C37.572154&amp;markers=color:blue%7Clabel%3A4%7C55.779808%2C37.570402&amp;markers=color:blue%7Clabel%3A5%7C55.747115%2C37.539078&amp;markers=color:blue%7Clabel%3A6%7C55.880101%2C37.433343&amp;markers=color:blue%7Clabel%3A7%7C55.7208152%2C37.6007115&amp;key=AIzaSyDMYrZZhMGlK5PKOMQRQMVffXnUJwgyatY" style="display:inline-block;width:100%;margin-right:50px;float:left;margin-top:2px">
//            </p>';
    }

    public function test()
    {
        return view('exports.templates.4', ['logo' => 'test', 'params' => []]);
    }
}
