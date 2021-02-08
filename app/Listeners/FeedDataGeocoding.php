<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\DataGeocoding\DataGeocodingService;
use App\Events\FeedUpdated;

class FeedDataGeocoding
{
    /**
     * Create the event listener
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event
     * @param  FeedUpdated  $event
     * @return void
     */
    public function handle(FeedUpdated $event)
    {
        $items = $event->items;

        if (count($items) === 0) {
            return false;
        }

        $result = DataGeocodingService::make($items);
    }

}
