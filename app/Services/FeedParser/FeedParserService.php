<?php

namespace App\Services\FeedParser;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Services\FeedParser\Helpers\Translator;
use App\Services\FeedParser\Repository\FeedsTable;
use App\Services\FeedParser\Repository\OffersTable;
use App\Events\FeedUpdated;

class FeedParserService
{
	/**
	 * Data set offer identifiers
	 * @var array
	 */
	protected $internals = [];

	/**
	 * Ids of affected by the changes offers
	 * @var array
	 */
	protected $offers = [];

	/**
	 * Start the parsing process
	 * @param  integer  $teamId  Team id
	 * @param  string  $field  short|long
	 * @return mixed
	 */
	protected function make(int $teamId, string $field)
	{
		$response = FeedsTable::get($teamId, $field);

		if (! is_string($response)) {
			$text = Translator::getMessage($response[0]);
			$data = $response[1];

			return (is_string($data))
				? [
					'status'  => 'danger',
					'message' => sprintf($text, $data)
				]
				: [
					'status'  => 'warning',
					'message' => sprintf($text, $data)
				];
		}

		// TODO: URL Feed Validation
		$source = $response;

		// Set the feed parsing start time
		FeedsTable::updateStartAt($teamId, $field);

		(new XMLStreamParser())->from($source)->withInner('property')
			->each(function ($data) use ($teamId) {
                if ($data instanceof Collection) {
                    $result = OffersTable::createOrUpdate($data, $teamId);

                    if ($result[0] == $data->get('internal-id')) {
	                	$this->internals[] = $result[0];
	                	if ($offerId = ($result[1] ?? null)) {
							$this->offers[] = $offerId;
	                	}
	                } else { // We have some error
	                	Log::alert($result, [
	                		'teamID'     => $teamId,
	                		'internalID' => $data->get('internal-id')
	                	]);
	                }
	            }
	        });


	    if ($count = count($this->internals)) {
	    	if ($field == 'long') {
	    		OffersTable::clear($this->internals, $teamId);
	    	}
	    	FeedsTable::updateEndAt($teamId, $field);

	    	if (count($this->offers) > 0) {
		    	// Start geocoding service
		    	FeedUpdated::dispatch($this->offers);
	    	}

        	Log::info('Offers successfully updated', [
        		'teamID' => $teamId,
        		'Count'  => $count
        	]);

        	return [
        		'status'  => 'success',
        		'message' => $count .' offers have been successfully updated. <a class="ml-2" href="'. route('offers.index', $teamId) .'">View all offers list</a>',
        	];
	    }

    	Log::info('No offer has been updated...', [
    		'teamID' => $teamId,
    	]);

     	return [
    		'status'  => 'danger',
    		'message' => 'No offer has been updated...'
    	];
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
