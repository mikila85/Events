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
            'bottomButtons' => View::make('events.create.bottomButtons'),
            'scripts' => View::make('events.create.scripts')
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

        $alldata = json_decode($_POST["data"], true);

        $eventData = $alldata['events'];
        $ticketsData = $alldata['tickets'];


        $dateFormat = "d/m/Y";


        $startDate = DateTime::createFromFormat($dateFormat, $eventData['startDate']);
        $eventData['startDate'] = $startDate->format('Y-m-d');

        $startDate = DateTime::createFromFormat($dateFormat, $eventData['endDate']);
        $eventData['endDate'] = $startDate->format('Y-m-d');

        $startDate = DateTime::createFromFormat($dateFormat, $eventData['lastCampainDate']);
        $eventData['lastCampainDate'] = $startDate->format('Y-m-d');


        $minimumDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d',strtotime("-1 days")));
        $minimumDate = $minimumDate->format('Y-m-d');

        $rules = array(
            'name' => 'required|min:2|max: 150',
            'description' => 'min:5',
            'minCrowd' => 'required|numeric|between:1,999999999',
            'maxCrowd' => 'required|numeric|between:1,999999999',
            'minMoney' => 'required|numeric|between:1,999999999',

            'startDate' => 'required|after:'. $minimumDate,
            'entryTime' => array('required', 'regex:/([01]?[0-9]|2[0-3]):[0-5][0-9]/'),

            'endDate' => 'required|after:'. $eventData['startDate'],
            'endTime' => array('required','regex:/([01]?[0-9]|2[0-3]):[0-5][0-9]/'),
            'lastCampainDate' => 'required|after:'. $minimumDate,
        );

        $ticketRules = array(
            'name' => 'required|min:1|max: 150',
            'price' => 'numeric|between:0,999999999',
            'how_many_for_sale' => 'required|numeric|between:1,999999999',
            'deadline' => 'required|after:'. $minimumDate,
        );

        $validator = Validator::make($eventData, $rules);


        if ($validator->fails())
        {

            $errors = $validator->messages()->getMessages();
            return json_encode($errors);

        } else {

            //validate tickets

            foreach($ticketsData as $key=>$ticket){

                $startDate = DateTime::createFromFormat($dateFormat, $ticket['deadline']);
                $ticket['deadline'] = $startDate->format('Y-m-d');

                $validator = Validator::make($ticket, $ticketRules);

                if ($validator->fails())
                {
                    $errors = $validator->messages()->getMessages();
                    return json_encode($errors);
                }
            }



            $event = new Eventu;
            $event->start_date = $eventData['startDate'];
            $event->end_date = $eventData['endDate'];
            $event->name = $eventData['name'];
            $event->description = $eventData['description'];
            $event->user_ID = Auth::user()->id;
            $event->save();


            foreach($ticketsData as $key=>$ticket){
                $eticket = new Ticket;
                $eticket->event_ID = $event->ID;
                $eticket->name = $ticket['name'];
                $eticket->price = $ticket['price'];
                $eticket->how_many_for_sale = $ticket['how_many_for_sale'];
                $eticket->expiry_date = $ticket['deadline'];
                $eticket->save();
            }

            return json_encode(array("OK"));
        }


        /*
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
*/
        /*
        $placeID = Places::getEventIDByAddress($data['address']);

        $data['place_ID'] = $placeID;
        
        if($eventID = Events::create($data)){
            return json_encode(array("OK"));
        }
        */
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