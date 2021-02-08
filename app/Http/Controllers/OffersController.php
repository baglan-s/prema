<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Builder;
use App\Services\FeedParser\Repository\OffersTable;
use App\Models\Property;
use App\Models\Offer;
use App\Models\Team;

class OffersController extends Controller
{
    /**
     * Per page
     * @var integer
     */
    protected $perPage = 200;

    /**
     * Offers Index Page
     * @param  int  $teamId
     * @return \Illuminate\View\View
     */
    public function index(int $teamId)
    {
        $this->checkAccess($teamId);

        // Clear last search request
        $key = "offers_search_request_{$teamId}";
        if (Session::exists($key)) {
            Session::forget($key);
        }

        // Clear flash message for last search results
        if (Session::exists('status') &&
            $message = Session::get('message')) {
            if (Str::startsWith($message, 'View') ||
                Str::startsWith($message, 'There')) {
                Session::forget('status');
            }
        }

        // Current team data for view variables
        $team = Team::find($teamId);
        $team->has_choise = false;

        // Get the offers
        $queryOffer = Offer::where('team_id', $teamId)
            ->orderBy('last_update_date')
            ->with('propertys');

        // Total number offers for view variables
        $total = $queryOffer->count();

        // Pagination options
        if ($total > $this->perPage) {
            $paginate = true;
            $offers = $queryOffer
                ->simplePaginate($this->perPage);
        } else {
            $paginate = false;
            $offers = $queryOffer->get();
        }

        // Offers data transform
        if ($offers) {
            $key = "selected_offers_{$teamId}";
            $offers->each(function ($item) use ($key, $team) {
                if ($ids = Session::get($key)) {
                    $team->has_choise = true;
                    if (in_array($item->id, $ids)) {
                        $item->selected = true;
                    }
                }
                $jsonFields = OffersTable::jsonFields();
                $fields = str_replace('-', '_', $jsonFields);
                foreach ($fields as $field) {
                    $item->{$field} = json_decode(
                        $item->{$field},
                        true
                    );
                }
            });
        }

//        return view('offers-index', compact(
//            'team', 'total', 'offers', 'paginate'
//        ));
        return view('custom.offers.index', compact(
            'team', 'total', 'offers', 'paginate'
        ));
    }

    /**
     * Show the filtered offers
     * @param  int     $teamId
     * @param  string  $key
     * @return mixed
     */
    public function filtered(int $teamId, string $key)
    {
        $this->checkAccess($teamId);

        if (Cache::has($key) && $value = Cache::get($key)) {
            $keys = $value->toArray();
        }

        if (! ($keys['offers'] ?? null)) {
            return redirect()->route('offers.index', $teamId)
                ->with('message', 'Failed to filtering offers! Please try again...')
                ->with('status', 'warning');
        }

        // Current team data for view variables
        $team = Team::find($teamId);
        $team->has_choise = false;

        // All ofers by current team
        $teamOffers = Offer::where('team_id', $teamId);

        $total = $teamOffers->count();

        // Filtered offers
        $queryOffer = $teamOffers->whereIn('id', $keys['offers'])
            ->orderBy('last_update_date');

        if ($keys['propertys']) {
            $queryOffer->with('propertys', function ($query) use ($keys) {
                $query->whereIn('propertys.id', $keys['propertys']);
            });
        }

        $countResults = count($keys['offers']);

        if ($countResults > $this->perPage) {
            $paginate = true;
            $offers = $queryOffer
                ->simplePaginate($this->perPage);
        } else {
            $paginate = false;
            $offers = $queryOffer->get();
        }

        // Offers data transform
        if ($offers) {
            $key = "selected_offers_{$teamId}";
            $offers->each(function ($item) use ($key, $team) {
                if ($ids = Session::get($key)) {
                    $team->has_choise = true;
                    if (in_array($item->id, $ids)) {
                        $item->selected = true;
                    }
                }
                $fields = OffersTable::jsonFields();
                foreach ($fields as $field) {
                    $item->{$field} = json_decode(
                        $item->{$field},
                        true
                    );
                }
            });
            Session::flash('message', "View {$countResults} of your search results.");
            Session::flash('status', 'success');
        }

        return view('offers-index', compact(
            'team', 'total', 'offers', 'paginate'
        ));
    }

    /**
     * Find offers by search parameters
     * Method: POST
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function filter(Request $request)
    {
        $teamId = $request->team_id;

        $this->checkAccess($teamId);

        $params = $request->except(['_token']);

        $key = "offers_search_request_{$teamId}";
        Session::put($key, $params);

        $dataStr = json_encode($params);
        $hashKey = sha1($dataStr);

        $urlStr = route(
            'offers.filtered',
            [$teamId, $hashKey]
        );

        if (Cache::has($hashKey)) {
            $results = Cache::get($hashKey);
            return response()->json([
                'success' => true,
                'results' => count($results['offers']),
                'url'     => $urlStr,
            ]);
        }

        $queryOffer = Offer::where('team_id', $teamId);

        if ($value = $request->offer__status) {
            $queryOffer->where('status', $value);
        }

        if ($value = $request->offer__name) {
            $queryOffer->where('name', $value);
        }

        if ($value = $request->offer__city) {
            $queryOffer->where('location->city', $value);
        }

        if ($value = $request->offer__address) {
            $queryOffer->where('location->address', $value);
        }

        if ($value = $request->offer__metro) {
            $queryOffer->whereRaw('json_contains(location, \'"'.$value.'"\', "$.metro")');
        }

        if ($value = $request->offer__area_min) {
            $queryOffer->where('area', '>=', $value);
        }

        if ($value = $request->offer__area_max) {
            $queryOffer->where('area', '<=', $value);
        }

        if ($value = $request->offer__area_free_min) {
            $queryOffer->where('area_free', '>=', $value);
        }

        if ($value = $request->offer__area_free_max) {
            $queryOffer->where('area_free', '<=', $value);
        }

        if ($value = $request->offer__rent_price_min) {
            $queryOffer->whereRaw("(select (offers.price_rent/offers.area)) >= ?", [$value]);
        }

        if ($value = $request->offer__rent_price_max) {
            $queryOffer->whereRaw("(select (offers.price_rent/offers.area)) <= ?", [$value]);
        }

        if ($value = $request->offer__rent_price_full_min) {
            $queryOffer->where('price_rent', '>=', $value);
        }

        if ($value = $request->offer__rent_price_full_max) {
            $queryOffer->where('price_rent', '<=', $value);
        }

        if ($value = $request->offer__rent_area_min) {
            $queryOffer->where('area_free', '>=', $value);
        }

        if ($value = $request->offer__rent_area_max) {
            $queryOffer->where('area_free', '<=', $value);
        }

        if ($value = $request->offer__rent_entire) {
            $queryOffer->where('rent_entire', 1);
        }

        // If request include propertys filter data
        if ($withPropertys = $request->offer__with_propertys) {

            // Get the ids by already filtered offers
            $offers = $queryOffer->pluck('id');

            // Get the propertys only by filtered offers
            $queryProperty = Property::whereIn('offer_id', $offers);

             // Propertys filters ---
            $queryOffer->whereHas('propertys',
                function (Builder $query) use ($queryProperty, $request, $value) {
                if ($value = $request->property__status) {
                    $query->where('status', $value);
                    $queryProperty->where('status', $value);
                }
                if ($value = $request->property__for_sale) {
                    $query->where('for_sale', 1);
                    $queryProperty->where('for_sale', 1);
                }
                if ($value = $request->property__current_tenant) {
                    $query->where('current_tenant', $value);
                    $queryProperty->where('current_tenant', $value);
                }
                if ($value = $request->property__area_min) {
                    $query->where('area', '>=', $value);
                    $queryProperty->where('area', '>=', $value);
                }
                if ($value = $request->property__area_max) {
                    $query->where('area', '<=', $value);
                    $queryProperty->where('area', '<=', $value);
                }
                if ($value = $request->property__rent_price_min) {
                    $query->where('price_rent', '>=', $value);
                    $queryProperty->where('price_rent', '>=', $value);
                }
                if ($value = $request->property__rent_price_max) {
                    $query->where('price_rent', '<=', $value);
                    $queryProperty->where('price_rent', '<=', $value);
                }
            });
        }

        $offersIds = $queryOffer->pluck('id');

        if ($results = $offersIds->count()) {
            if (($withPropertys ?? null)) {
                $propertys = $queryProperty->pluck('id');
            }
            $data = collect([
                'offers'    => $offersIds,
                'propertys' => $propertys ?? null,
            ]);
            Cache::put($hashKey, $data, 60);
            $url = $urlStr;
        }

        return response()->json([
            'success' => true,
            'results' => $results,
            'url'     => $url ?? null,
        ]);
    }

    /**
     * Action to select the offer
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function selectOffer(Request $request)
    {
        $id = $request->offer_id;

        $offer = DB::table('offers')
            ->select('team_id')
            ->where('id', $id)
            ->first();

        $teamId = $offer->team_id;

        $this->checkAccess($teamId);

        $sessionKey = "selected_offers_{$teamId}";

        if (Session::has($sessionKey)) {
            $items = Session::get($sessionKey);
            if (! in_array($id, $items)) {
                $items[] = $id;
                Session::put($sessionKey, $items);
                return response()->json([
                    'success' => true,
                    'checked' => true,
                ]);
            } else {
                $items = array_filter($items,
                    function ($element) use ($id) {
                        return ($element !== $id);
                    }
                );
                Session::put($sessionKey, $items);
                return response()->json([
                    'success' => true,
                    'checked' => false,
                ]);
            }
        } else {
            Session::put($sessionKey, [$id]);
            return response()->json([
                'success' => true,
                'checked' => true,
            ]);
        }

        return response()->json(['success' => false]);
    }

    /**
     * Action to select the property
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function selectProperty(Request $request)
    {
        if (is_array($request->data)) {
            $removing = true;
        }

        $id = (($removing ?? null) === true)
            ? $request->data[0]
            : $request->data;

        // Retrieve the team id for use in session key
        $property = DB::table('propertys')
            ->where('propertys.id', $id)
            ->leftJoin('offers', 'propertys.offer_id', '=', 'offers.id')
            ->select('offers.team_id')
            ->first();

        $teamId = $property->team_id;

        $this->checkAccess($teamId);

        $sessionKey = "selected_propertys_{$teamId}";

        // Batch action to uncheck the propertys
        if (Session::has($sessionKey)
            && ($removing ?? null) === true) {
            $items = Session::get($sessionKey);
            foreach ($request->data as $id) {
                $items = array_filter($items,
                    function ($element) use ($id) {
                        return ($element !== $id);
                    }
                );
            }
            Session::put($sessionKey, $items);
            return response()->json([
                'success' => true,
                'checked' => false,
            ]);
        }

        // Action to single check/uncheck property
        if (Session::has($sessionKey)) {
            $items = Session::get($sessionKey);
            if (! in_array($id, $items)) {
                $items[] = $id;
                Session::put($sessionKey, $items);
                return response()->json([
                    'success' => true,
                    'checked' => true,
                ]);
            } else {
                $items = array_filter($items,
                    function ($element) use ($id) {
                        return ($element !== $id);
                    }
                );
                Session::put($sessionKey, $items);
                return response()->json([
                    'success' => true,
                    'checked' => false,
                ]);
            }
        } else {
            Session::put($sessionKey, [$id]);
            return response()->json([
                'success' => true,
                'checked' => true,
            ]);
        }

        return response()->json(['success' => false]);
    }

    /**
     * For access security purpose
     * @param  int    $teamId
     * @return mixed
     */
    protected function checkAccess(int $teamId)
    {
        if (! $user = Auth::user()
            or ! in_array($teamId, $user->teamIds())) {
            abort(403, "Forbidden!");
        }
        return true;
    }

}
