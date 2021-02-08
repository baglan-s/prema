<?php

namespace App\Services\ExportsData;

use Illuminate\Support\Facades\Session;
use App\Services\FeedParser\Repository\OffersTable;
use App\Models\Offer;
use PDF;

class ExportsDataService
{
    /**
     * Logo file string
     * @var string
     */
//    protected static $logo = 'exports/images/offers/logo.png';
    protected static $logo = 'exports/images/logo.png';

    /**
     * Data export processing
     * @param  int  $teamId
     * @param  string  $template
     * @param  array  $params
     * @param  bool  $landscape
     * @return false|string
     */
    public static function make(int $teamId, $template = 'exports.templates.1', $params = [], $landscape = false)
    {
        $data = static::getOffersData($teamId);

        if (empty($data)) {
            return false;
        }

        $fileName = md5(json_encode($data));
        $filePath = storage_path("app/exports/{$fileName}.pdf");
        $logo = static::$logo;
        PDF::setOptions(['dpi' => 150]);
        if ($landscape) {
            $file = PDF::loadView($template, compact('data','logo', 'params'))->setPaper('a4', 'landscape');
        }
        else {
            $file = PDF::loadView($template, compact('data','logo', 'params'));
        }
        $file->save($filePath);

        return static::createDownloadLink($fileName);
    }

    /**
     * Get offers data by team id
     * @param  int  $teamId
     * @return array
     */
    protected static function getOffersData($teamId)
    {
        $key = "selected_offers_{$teamId}";
        $ids = Session::get($key);

        $data = Offer::whereIn('id', $ids)
            ->withCount('propertys')
            ->get();

        if ($data->count() == 0) {
            return [];
        }

        $data->each(function ($item) {
            $fields = OffersTable::jsonFields();
            foreach ($fields as $field) {
                $item->{$field} = json_decode(
                    $item->{$field},
                    true
                );
            }
        });

        $dataChunks = $data->chunk(5);
        return $dataChunks->all();
    }

    /**
     * Create the download link
     * @param  string $data
     * @return string
     */
    protected static function createDownloadLink($fileName)
    {
        $url  = route('exports.download', $fileName);
        $text = 'Download PDF File...';
        return sprintf('<a class="nav-link p-4 text-white" href="%s">%s</a>', $url, $text);
    }

}
