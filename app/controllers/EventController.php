<?php

class EventController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		/*
        $layout =  View::make('layouts.main');
        $layout->nest('content', 'events.addEvent');
        return $layout;*/


        $layout =  View::make('layouts.main');

        $layout->nest('content', 'events.create.index', array(
            'path' => View::make('layouts.path'),
            'tabs' => View::make('events.create.tabs'),
            'tickets' => View::make('events.create.tickets'),
            'eventInfo' => View::make('events.create.eventInfo'),
            'eventDistribution' => View::make('events.create.eventDistribution'),
            'ga' => View::make('events.create.ga'),
            'bottomButtons' => View::make('events.create.bottomButtons')
        ));



        return $layout;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        if(!Auth::user()->id){
            return json_encode(array('error'=>'not conencted'));
        }

        $data = Input::all();

        $rules = array(
            'name' => 'required|min:2|max:100',
            'address' => 'required|max:100',

        );

        $validator = Validator::make($data, $rules);

        if ($validator->fails())
        {
            $errors = $validator->messages()->getMessages();
            return json_encode($errors);
            // The given data did not pass validation
        }

        $placeID = Places::getEventIDByAddress($data['address']);

        $data['place_ID'] = $placeID;
        
        if($eventID = Events::create($data)){
            return json_encode(array("OK"));
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}