<?php

namespace App\Services\FeedParser;

use Exception;
use XMLReader;
use Illuminate\Support\Collection;

class XMLStreamParser
{
	/**
	 * XMLReader
	 * @var object
	 */
	protected $reader;

	/**
	 * Source of resource
	 * @var string
	 */
	protected $source;

	/**
	 * Skip the first element
	 * @var boolean
	 */
	protected $skipFirstElement = true;

	/**
	 * Inner collection
	 * @var null|object
	 */
	protected $innerCollection = null;

	/**
	 * Inner name for collection
	 * @var string
	 */
	protected $innerName;

	/**
	 * Root item name
	 * @var string
	 */
	protected $rootItem = 'offer';

	/**
	 * Set the source of resource
	 * @param  string $source Url string
	 * @return $this
	 */
	public function from(string $source)
	{
		$this->source = $source;
		return $this;
	}

	/**
	 * Enable parsing the first element
	 * @return $this
	 */
	public function withFirst()
	{
		$this->skipFirstElement = false;
		return $this;
	}

	/**
	 * Create the inner collection
	 * @param string $name Inner name
	 * @return $this
	 */
	public function withInner(string $name)
	{
		$this->innerCollection = new Collection;
		$this->innerName = $name;
		return $this;
	}

	/**
	 * Execute a callback over each item
	 * @param  callable $callback
	 * @return $this
	 */
	public function each(callable $callback)
	{
		$this->start();

		while ($this->reader->read()) {
			$this->searchElement($callback);
		}

		$this->stop();
	}

	/**
	 * Serach the item
	 * @param  callable $callback
	 * @return void
	 */
	protected function searchElement(callable $callback)
	{
		if ($this->isElement() && ! $this->shouldBeSkipped()) {
			$callback($this->extractElement(
				$this->reader->name,
				$this->reader->depth
			));
		}
	}

	/**
	 * Extract the element
	 * @param  string      $elementName
	 * @param  int         $parentDepth
	 * @param  boolean     $elementList
	 * @return mixed
	 */
	protected function extractElement(string $elementName, int $parentDepth, $elementList = false)
	{
		$elementCollection = (new Collection)->merge($this->getElementAttributes());

		if ($this->isEmptyElement($elementName)) {
			return $elementCollection;
		}

		while ($this->reader->read()) {
			if ($this->isEndElement($elementName) && $this->reader->depth == $parentDepth) {
				if ($elementName == $this->rootItem) {
					if ($collection = $this->innerCollection) {
						$elementCollection->put("{$this->innerName}s", $collection);
						$this->innerCollection = new Collection;
					}
				}
				break;
			}
			if ($this->isValue()) {
				if ($elementCollection->isEmpty()) {
                    return trim($this->reader->value);
				} else {
					return $elementCollection->put($elementName, trim($this->reader->value));
				}
			}
			if ($this->isElement()) {
				if ($elementList === true) {
					$elementCollection->put($this->reader->name,
						$this->extractElement($this->reader->name, $this->reader->depth, true)
					);
				} else {
					if ($this->innerCollection && $this->reader->name == $this->innerName) {
						$elementVal = $this->extractElement($this->reader->name, $this->reader->depth, true);
						$pushData = ($dataArr = json_decode($elementVal, true)) ? $dataArr : $elementVal;
						$this->innerCollection->push($pushData);
					} else {
						$elementCollection->put($this->reader->name,
							$this->extractElement($this->reader->name, $this->reader->depth, true)
						);
					}
				}
			}
		}
		return $elementCollection;
	}

	/**
	 * Get element attributes
	 * @return Illuminate\Support\Collection;
	 */
	protected function getElementAttributes()
	{
		$attributes = new Collection;

		if ($this->reader->hasAttributes) {
			while ($this->reader->moveToNextAttribute()) {
				$attributes->put($this->reader->name, $this->reader->value);
			}
		}

		return $attributes;
	}

	/**
	 * Start read resourse
	 * @return $this
	 */
	protected function start()
	{
		$this->reader = new XMLReader;
		$this->reader->open($this->source, 'utf-8', LIBXML_COMPACT);
		return $this;
	}

	/**
	 * Stopping read resourse
	 * @return mixed
	 */
	protected function stop()
	{
		if (! $this->reader->close()) {
			throw new Exception('Parsing Error On Closing!');
		}
	}

	/**
	 * Check if skip the first element
	 * @return boolean
	 */
	protected function shouldBeSkipped()
	{
		if ($this->skipFirstElement) {
			$this->skipFirstElement = false;
			return true;
		}

		return false;
	}

	/**
	 * Check if node type is start of element
	 * @param  string|null $elementName
	 * @return boolean
	 */
	protected function isElement(string $elementName = null)
	{
		if ($elementName) {
			return $this->reader->nodeType == XMLReader::ELEMENT
				&& $this->reader->name == $elementName;
		}

		return $this->reader->nodeType == XMLReader::ELEMENT;
	}

	/**
	 * Check if node type is end of element
	 * @param  string|null $elementName
	 * @return boolean
	 */
	protected function isEndElement(string $elementName = null)
	{
		if ($elementName) {
			return $this->reader->nodeType == XMLReader::END_ELEMENT
				&& $this->reader->name == $elementName;
		}

		return $this->reader->nodeType == XMLReader::END_ELEMENT;
	}

	/**
	 * Check if node type is value
	 * @return boolean
	 */
	protected function isValue()
	{
		return $this->reader->nodeType == XMLReader::TEXT
			|| $this->reader->nodeType == XMLReader::CDATA;
	}

	/**
	 * Check if element is empty
	 * @param  string|null $elementName
	 * @return boolean
	 */
    protected function isEmptyElement(string $elementName = null)
    {
	    if ($elementName) {
		    return $this->reader->isEmptyElement
		    	&& $this->reader->name == $elementName;
	    }

		return false;
    }

}
