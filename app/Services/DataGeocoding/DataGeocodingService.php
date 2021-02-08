<?php

namespace App\Services\DataGeocoding;

use App\Models\Offer;

class DataGeocodingService
{
    /**
     * Start geocoding process
     * @param  array  $items
     * @return void
     */
    protected function make(array $items)
    {
        $collection = collect($items);

        $collection->each(function ($item) {
            $offer = Offer::find($item);
            $location = json_decode($offer->location, true);
            $skip = ($location['lat'] && $location['lon']);
            if ($skip === false) {
                $address = "
                    {$location['country']},
                    {$location['city']},
                    {$location['address']}
                ";
                $coords = $this->getCoordinates($address);
                if (! empty($coords)) {
                    $location['lat'] = $coords['lat'];
                    $location['lon'] = $coords['lon'];
                    $offer->update([
                        'location' => json_encode(
                            $location, JSON_UNESCAPED_UNICODE
                        ),
                    ]);
                }
            }
        });
    }

    /**
     * Get coordinates by address string
     * @param  string $address
     * @return array
     */
    protected function getCoordinates(string $address)
    {
        $result = [];

        $response = app('geocoder')
            ->geocode($address)
            ->get();

        if ($response->count() == 0) {
            return $result;
        }

        $first = $response->first();
        $data = $first->getCoordinates();

        $result['lat'] = $data->getLatitude();
        $result['lon'] = $data->getLongitude();

        return $result;
    }

    /**
     * Call the method static
     * @param  string $name       Method name
     * @param  mixed $arguments  Arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return (new static())->{$name}(...$arguments);
    }

}
