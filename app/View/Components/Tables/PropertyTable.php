<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use App\Services\FeedParser\Repository\PropertysTable;

class PropertyTable extends Component
{
    /**
     * Collection
     * @var array
     */
    public $collection;

    /**
     * Current offer id
     * @var integer
     */
    public $offerId;

    /**
     * Current offer team id
     * @var integer
     */
    public $teamId;

    /**
     * Propertys
     * @var array
     */
    public $propertys;

    /**
     * Create a new component instance.
     * @param Collection $collection
     * @param integer $teamId
     * @param integer $offerId
     * @return void
     */
    public function __construct(Collection $collection, int $offerId, int $teamId)
    {
        $this->collection = $collection;
        $this->offerId    = $offerId;
        $this->teamId     = $teamId;
        $this->propertys  = $this->preparePropertys();
    }

    /**
     * Get the view|contents
     * @return View|string
     */
    public function render()
    {
        return view('components.tables.property-table');
    }

    /**
     * Prepare the property collection
     * @return array
     */
    protected function preparePropertys()
    {
        // Propertys data transform
        if ($items = $this->collection) {
            $key = "selected_propertys_{$this->teamId}";
            $items->each(function ($item) use ($key) {
                if ($ids = Session::get($key)) {
                    if (in_array($item->id, $ids)) {
                        $item->selected = true;
                    }
                }
                $jsonFields = PropertysTable::jsonFields();
                $fields = str_replace('-', '_', $jsonFields);
                foreach ($fields as $field) {
                    $item->{$field} = json_decode(
                        $item->{$field},
                        true
                    );
                }
            });
        }
        return ($items ?? []);
    }

}
