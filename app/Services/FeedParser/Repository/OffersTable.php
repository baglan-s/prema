<?php

namespace App\Services\FeedParser\Repository;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class OffersTable
{
    /**
     * Json fields
     * @var array
     */
    protected static $offerFields = [
        'internal-id'      => 'varchar',
        'last-update-date' => 'varchar',
        'creation-date'    => 'varchar',
        'name'             => 'varchar',
        'status'           => 'varchar',
        'area'             => 'float',
        'area-free'        => 'float',
        'sale-entire'      => 'bool',
        'rent-entire'      => 'bool',
        'price-sale'       => 'int',
        'price-rent'       => 'int',
        'price-unit'       => 'varchar',
        'price-period'     => 'varchar',
        'location'         => 'json',
        'description'      => 'text',
        'images'           => 'json',
        'plan-images'      => 'json',
        'building'         => 'json',
        'features'         => 'json',
        'sales-agent'      => 'json',
    ];

    /**
     * Get the json fields list
     * @return array
     */
    public static function jsonFields()
    {
        foreach (static::$offerFields as $key => $value) {
            if ($value == 'json') {
                $keys[] = $key;
            }
        }
        return ($keys ?? []);
    }

    /**
     * Create if not exists or update the offer
     * @param  Collection $data   Offer data
     * @param  integer   $teamId Team id
     * @return array
     */
    public static function createOrUpdate(Collection $data, int $teamId)
    {
        $dataArr = $data->toArray();

        $internalId = $dataArr['internal-id'];
        $version = $dataArr['last-update-date'];

        $status = static::status($teamId, $internalId, $version);

        // If exist entry and the version values is equal
        if ($status === false) {
            return [$internalId, null];
        }

        if ($propertys = ($dataArr['propertys'] ?? null)) {
            $dataArr = Arr::except($dataArr, ['propertys']);
        }

        $entryData = static::prepareData($dataArr);
        $entryData['team_id'] = $teamId;

        if (($id = $status) && is_integer($id)) {
            $entryData['updated_at'] = Carbon::now();
            DB::table('offers')
                ->where('id', $id)
                ->update($entryData);
            if ($propertys) {
                PropertysTable::update($id, $propertys);
            }
        } elseif ($status === true) {
            $entryData['created_at'] =
            $entryData['updated_at'] = Carbon::now();
            $id = DB::table('offers')->insertGetId($entryData);
            if ($propertys) {
                PropertysTable::create($id, $propertys);
            }
        }

        return [$internalId, $id];
    }

    /**
     * Clear offers that are not in the feed
     * For Long feeds only!
     *
     * @param  array  $internals  Internal ids from feed
     * @param  int    $teamId    Team id
     * @return void
     */
    public static function clear(array $internals, int $teamId)
    {
        DB::table('offers')
            ->whereNotIn('internal_id', $internals)
            ->where('team_id', $teamId)
            ->delete();
    }

    /**
     * Get entry status
     * @param  integer $teamId
     * @param  sting   $internalId
     * @param  string  $version
     * @return boolean|integer
     */
    protected static function status($teamId, $internalId, $version)
    {
        $entry = DB::table('offers')
            ->where('team_id', $teamId)
            ->where('internal_id', $internalId)
            ->first();

        if ($entry) {
            if ($entry->last_update_date != $version) {
                return $entry->id;
            }
            return false;
        }
        return true;
    }

    /**
     * Prepare the entry data
     * @param  array  $data
     * @return array
     */
    protected static function prepareData(array $data)
    {
        $jsonFields = static::jsonFields();

        foreach ($data as $key => $value) {
            if (! array_key_exists($key, static::$offerFields)) {
                continue;
            }
            if (in_array($key, $jsonFields)) {
                if ($key == 'location') {
                    $str = str_replace(["\n", '  '], '', $value['metro']);
                    $arr = explode(',', $str);
                    $value['metro'] = array_map('trim', $arr);
                }
                if ($key == 'images' || $key == 'plan-images') {
                    $str = str_replace(["\n", '  '], '', $value);
                    $arr = explode(',', $str);
                    $value = array_map('trim', $arr);
                }
                $value = json_encode($value, JSON_UNESCAPED_UNICODE);
            } elseif ($key == 'price-unit') {
                $value = str_replace('RUB', 'RUR', $value);
            } elseif ($key == 'description') {
                $value = str_replace("\n", '<br>', $value);
            } elseif ($value == 'yes') {
                $value = 1;
            } elseif ($value == 'no') {
                $value = 0;
            } elseif (empty($value)) {
                $value = null;
            }

            $key = str_replace('-', '_', $key);

            $result[$key] = $value;
        }

        return ($result ?? []);
    }

}
