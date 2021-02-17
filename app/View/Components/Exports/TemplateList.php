<?php

namespace App\View\Components\Exports;

use App\Models\Team;
use Illuminate\View\Component;
use App\Models\Template;

class TemplateList extends Component
{
    /**
     * Templates collection
     * @var array
     */
    public $templates;

    /**
     * Current team id
     * @var integer
     */
    public $teamId;

    /**
     * Simple data...
     * @var array
     */
    protected $data = [
        'A' => 'template-name-01.png',
        'B' => 'template-name-02.png',
        'C' => 'template-name-03.png',
        'D' => 'template-name-01.png',
        'E' => 'template-name-02.png',
        'F' => 'template-name-03.png',
    ];

    /**
     * Constructor.
     * @param integer $teamId
     * @return void
     */
    public function __construct(int $teamId)
    {
        $this->teamId = $teamId;
        $this->templates = $this->getCollection($teamId);
    }

    /**
     * Get the view|contents
     * @return View|string
     */
    public function render()
    {
        return view('components.exports.template-list');
    }

    /**
     * Get the rendered content
     * @return string
     */
    public function toString()
    {
        return view('components.exports.template-list', [
            'team_id'   => $this->teamId,
            'templates' => $this->templates,
        ])->render();
    }

    /**
     * Get the data collection
     * @return array
     */
    protected function getCollection($teamId = false)
    {
        if ($teamId) {
            $team = Team::find($teamId);
            return $team->templates;
        }
        return Template::all();
    }

}
