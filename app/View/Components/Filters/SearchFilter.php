<?php

namespace App\View\Components\Filters;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;

class SearchFilter extends Component
{
    /**
     * Current team id
     * @var integer
     */
    public $teamId;

    /**
     * Form inputs data
     * @var array
     */
    public $inputsData = [];

    /**
     * Search request data
     * @var array
     */
    public $requestData = [];

    /**
     * Create a new component instance.
     * @param integer $teamId
     * @return void
     */
    public function __construct(int $teamId)
    {
        $this->teamId = $teamId;
        $this->inputsData  = $this->inputsData();
        $this->requestData = $this->requestData();
    }

    /**
     * Get the view|contents
     * @return View|string
     */
    public function render()
    {
        return view('components.filters.search-filter');
    }

    /**
     * Create the inputs data for form elements
     * @return array
     */
    protected function inputsData()
    {
        $inputsData = [];

        // Names data ---

        $offerName = DB::table('offers')->distinct()
            ->where('team_id', $this->teamId)
            ->pluck('name');

        if ($items = $offerName->sort()->toArray()) {
            $inputsData['offer__name'] = ['' => 'Any name...'] + $items;
        }

        // Locations data ---

        $offerLocation = DB::table('offers')
            ->where('team_id', $this->teamId)
            ->pluck('location');

        $citys     = [];
        $addresses = [];
        $metros    = [];

        foreach ($offerLocation as $item) {
            $data = json_decode($item, true);

            if (($city = ($data['city'] ?? null)) && ! in_array($city, $citys)) {
                $citys[] = $city;
            }

            if (($address = ($data['address'] ?? null)) && ! in_array($address, $addresses)) {
                $addresses[] = $address;
            }

            if (($dataMetro = ($data['metro'] ?? null)) && is_array($dataMetro)) {
                foreach ($dataMetro as $metro) {
                    if (! in_array($metro, $metros)) {
                        $metros[] = $metro;
                    }
                }
            }
        }

        if ($citys = Arr::sort($citys)) {
            $inputsData['offer__city'] = ['' => 'Any city...'] + $citys;
        }

        if ($addresses = Arr::sort($addresses)) {
            $inputsData['offer__address'] = ['' => 'Any address...'] + $addresses;
        }

        if ($metros = Arr::sort($metros)) {
            $inputsData['offer__metro'] = ['' => 'Any metro name...'] + $metros;
        }

        // Property inputs data ---

        // Get the offer ids by team id
        $offers = DB::table('offers')
            ->where('team_id', $this->teamId)
            ->pluck('id');

        $queryRent = DB::table('propertys')
            ->whereIn('offer_id', $offers)
            ->where('status', 'rent');

        $currentTenants = $queryRent->distinct()->pluck('current_tenant');

        if ($items = $currentTenants->sort()->toArray()) {
            $inputsData['property__current_tenant'] = ['' => 'Eny current tenant...'] + $items;
        }

        return $inputsData;
    }

    /**
     * Get last search request data from session
     * @return array
     */
    protected function requestData()
    {
        $requestData = [
            'offer__status'        => 'rent',
            'offer__name'          => '',
            'offer__city'          => '',
            'offer__address'       => '',
            'offer__metro'         => '',
            'offer__area_min'      => '',
            'offer__area_max'      => '',
            'offer__area_free_min' => '',
            'offer__area_free_max' => '',
            // Specific for rent
            'offer__rent_price_min'      => '',
            'offer__rent_price_max'      => '',
            'offer__rent_price_full_min' => '',
            'offer__rent_price_full_max' => '',
            'offer__rent_area_min'       => '',
            'offer__rent_area_max'       => '',
            'offer__rent_entire'         => '',
            // With property
            'offer__with_propertys'      => '',
            // Property
            'property__status'           => 'rent',
            'property__area_min'         => '',
            'property__area_max'         => '',
            'property__rent_price_min'   => '',
            'property__rent_price_max'   => '',
            'property__current_tenant'   => '',
            'property__for_sale'         => '',
        ];

        $key = "offers_search_request_{$this->teamId}";

        if (Session::has($key)) {
            $data = Session::get($key);
        }

        if (! ($data ?? null)) {
            return $requestData;
        }

        foreach ($requestData as $key => $value) {
            if (isset($data[$key])) {
                $requestData[$key] = $data[$key];
            }
        }

        return $requestData;
    }

}
