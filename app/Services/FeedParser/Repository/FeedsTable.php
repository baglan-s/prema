<?php

namespace App\Services\FeedParser\Repository;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FeedsTable
{
    /**
     * Interval between updates in seconds
     * @var integer
     */
    protected static $interval = 30;

    /**
     * Get the feed URL
     * @param  int    $teamId Tean Id
     * @param  string $field  short|long
     * @return mixed
     */
    public static function get(int $teamId, string $field)
    {
        $feed = DB::table('feeds')
            ->where('team_id', $teamId)
            ->first();

        if (! $feed || empty($feed->{$field})) {
            return ["feed.get.field.not-found", $field];
        }

        // Common data
        $now = Carbon::now();

        // Short feed data
        $shortStart = Carbon::parse($feed->short_start);
        $shortEnd   = Carbon::parse($feed->short_end);
        $shortDif   = $now->diffInSeconds($shortEnd);

        // Long feed data
        $longStart = Carbon::parse($feed->long_start);
        $longEnd   = Carbon::parse($feed->long_end);

        if ($field == 'long') {
            // For start the long feed we need to make sure that
            // users process for short feed is not started.
            if ($shortStart > $shortEnd) {
                return ['feed.get.long.short-started', null];
            }

            return $feed->long;
        }

        // For start the short feed we need to make sure that
        // system process for long feed not started.
        if ($longStart > $longEnd) {
            return ['feed.get.short.long-started', null];
        }
        // Then we have to check the time interval
        // since ended the last short process.
        if ($shortDif === 0 || $shortDif >= static::$interval) {
            return $feed->short;
        }

        $timeLeft = static::$interval - $shortDif;

        return ['feed.get.short.self-interval', $timeLeft];


    }

    /**
     * Create the new feed
     * @param  int    $teamId Team Id
     * @param  array  $data   Feed data
     * @return mixed
     */
    public static function create(int $teamId, array $data)
    {
        $timestamp = Carbon::now();

        return DB::table('feeds')->insert([
            'team_id'    => $teamId,
            'long'       => $data['long']  ?? '',
            'long_end'   => null,
            'short'      => $data['short'] ?? '',
            'short_end'  => null,
            'created_at' => $timestamp,
            'updated_at' => $timestamp,
        ]);
    }

    /**
     * Update the feed URLs
     * @param  int    $teamId Team Id
     * @param  array  $data   Feed data
     * @return mixed
     */
    public static function update(int $teamId, array $data)
    {
        $long  = $data['long']  ?? '';
        $short = $data['short'] ?? '';

        $current = static::getBoth($teamId);

        $feedData = [
            'updated_at' => Carbon::now()
        ];

        $feedData['long']  = $long;
        $feedData['short'] = $short;

        // Using for debug mode only!!!
        if (($refreshBoth ?? null)) {
            if ($long != $current->long) {
                $feedData['long_start'] = null;
                $feedData['long_end']   = null;
            }

            if ($short != $current->short) {
                $feedData['short_start'] = null;
                $feedData['short_end']   = null;
            }
        }

        return DB::table('feeds')
            ->where('team_id', $teamId)
            ->update($feedData);
    }

    /**
     * Set the datetime for start parsing
     * @param  int    $teamId
     * @param string $field
     * @return mixed
     */
    public static function updateStartAt(int $teamId, string $field)
    {
        return DB::table('feeds')
            ->where('team_id', $teamId)
            ->update([
                "{$field}_start" => Carbon::now()
            ]);
    }

    /**
     * Update the date feed
     * @param  int    $teamId Team Id
     * @param  string $field  short|long
     * @return mixed
     */
    public static function updateEndAt(int $teamId, string $field)
    {
        return DB::table('feeds')
            ->where('team_id', $teamId)
            ->update([
                "{$field}_end" => Carbon::now()
            ]);
    }

    /**
     * Delete the feed
     * @param  int    $teamId Team Id
     * @return mixed
     */
    public static function gelete(int $teamId)
    {
         return DB::table('feeds')
            ->where('team_id', $teamId)
            ->delete();
    }

    /**
     * Get all url of feeds by Team ID
     * @param  int    $teamId
     * @return mixed
     */
    public static function getBoth(int $teamId)
    {
        return DB::table('feeds')
            ->where('team_id', $teamId)
            ->first();
    }

}
