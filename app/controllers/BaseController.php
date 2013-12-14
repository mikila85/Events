<?php

class BaseController extends Controller {
    public function index()
    {
        //
        return View::make("events.addEvent");
    }
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}