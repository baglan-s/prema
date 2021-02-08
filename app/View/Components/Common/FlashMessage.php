<?php

namespace App\View\Components\Common;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Session;

class FlashMessage extends Component
{
    /**
     * Message status
     * @var string
     */
    public $status = '';

    /**
     * Message text
     * @var string
     */
    public $message = '';

    /**
     * Create a new component instance.
     * @return void
     */
    public function __construct(string $status)
    {
        $this->status  = $status;
        $this->message = $this->getMessage();
    }

    /**
     * Get the view|contents
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.common.flash-message');
    }

    protected function getMessage()
    {
        $message = '';

        if (Session::has('message')) {
            $message = Session::get('message');
        }

        return $message;
    }

}
