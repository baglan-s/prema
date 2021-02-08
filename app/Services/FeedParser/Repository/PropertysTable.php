<?php

namespace App\Services\FeedParser\Repository;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PropertysTable
{
    /**
     * Property fields
     * @var array
     */
    protected static $propertyFields = [
        'internal-id'      => 'varchar',
        'last-update-date' => 'varchar',
        'name'             => 'varchar',
        'area'             => 'float',
        'status'           => 'varchar',
        'price-sale'       => 'int',
        'price-rent'       => 'int',
        'price-unit'       => 'varchar',
        'price-period'     => 'varchar',
        'current-tenant'   => 'varchar',
        'for-sale'         => 'bool',
        'description'      => 'text',
        'images'           => 'json',
        'features'         => 'json',
    ];

    /**
     * Get the json fields list
     * @return array
     */
    public static function jsonFields()
    {
        foreach (static::$propertyFields as $key => $value) {
            if ($value == 'json') {
                $keys[] = $key;
            }
        }
        return ($keys ?? []);
    }

    /**
     * Insert the new propertys batch
     * @param  int    $offerId
     * @param  array  $data
     * @return void
     */
    public static function create(int $offerId, array $data)
    {
        foreach ($data as $item) {
            $entryData = static::prepareData($item);
            $entryData['offer_id'] = $offerId;
            $entryData['created_at'] =
            $entryData['updated_at'] = Carbon::now();
            $internals[] = $entryData['internal_id'];
            $batchData[] = $entryData;
        }

        if (($batchData ?? null)) {
            DB::table('propertys')->insert($batchData);
        }
    }

    /**
     * Update the offer propertys
     * @param  int    $offerId
     * @param  array  $data
     * @return void
     */
    public static function update(int $offerId, array $data)
    {
        foreach ($data as $item) {
            $internalId  = $item['internal-id'];
            $version     = $item['last-update-date'];
            $internals[] = $internalId;

            $status = static::status($offerId, $internalId, $version);

            // If exist entry and the version values is equal
            if ($status === false) {
                continue;
            }

            $entryData = static::prepareData($item);
            $entryData['offer_id'] = $offerId;

            if (($id = $status) && is_integer($id)) {
                $entryData['updated_at'] = Carbon::now();
                DB::table('propertys')
                    ->where('id', $id)
                    ->update($entryData);
            } elseif ($status === true) {
                $entryData['created_at'] =
                $entryData['updated_at'] = Carbon::now();
                DB::table('propertys')->insert($entryData);
            }
        }

        if (($internals ?? null)) {
            DB::table('propertys')->where('offer_id', $offerId)
                ->whereNotIn('internal_id', $internals)
                ->delete();
        }
    }

    /**
     * Get entry status
     * @param  integer $offerId
     * @param  sting   $internalId
     * @param  string  $version
     * @return boolean|integer
     */
    protected static function status($offerId, $internalId, $version)
    {
        $entry = DB::table('propertys')
            ->where('offer_id', $offerId)
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
            if (! array_key_exists($key, static::$propertyFields)) {
                continue;
            }
            if (in_array($key, $jsonFields)) {
                if ($key == 'images') {
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
