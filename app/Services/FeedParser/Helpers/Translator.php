<?php

namespace App\Services\FeedParser\Helpers;

use Illuminate\Support\Arr;

class Translator
{
    /**
     * data feed
     * @var array
     */
    protected static $messagesData = [
        'feed' => [
            'get' => [
                'field' => [
                    'not-found' => 'Not Found the URL for %s feed!',
                ],
                'long' => [
                    'short-started' => 'Users processing of short feed is launched now! Try again in a few minutes.',
                ],
                'short' => [
                    'long-started'  => 'Systemic processing of long feed is launched now! Try again in a few minutes.',
                    'self-interval' => 'Recently refreshed! Try again in: %d seconds.',
                ],
            ],
        ],
    ];

    /**
     * Data offer
     * @var array
     */
    protected static $offerFields = [
        'type' => [
            'rent'    => 'rent',
            'аренда'  => 'rent',
            'sale'    => 'sale',
            'продажа' => 'sale',
        ],
    ];

    /**
     * Get the message text
     * @param  string $key
     * @return string
     */
    public static function getMessage(string $key)
    {
        return Arr::get(static::$messagesData, $key, '');
    }

    /**
     * Translate offer fields values
     * @param  string $key
     * @param  string $value
     * @return string
     */
    public static function offerField(string $key)
    {
        return Arr::get(static::$offerFields, $key, '');
    }

}
