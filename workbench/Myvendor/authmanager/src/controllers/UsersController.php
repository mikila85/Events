<?php

class UsersController extends \BaseController {

//    public function __construct()
//    {
//        $this->beforeFilter('isEmailExist', array('only' => 'store'));
//    }
        //protected $layout = 'layouts.main';
    /**
     * Index
     */
    public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        $layout =  View::make('layouts.main');
        $layout->nest('content', 'authmanager::users.addUser');
        return $layout;
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $data = Input::all();
        $rules = array(
            'email' => 'required|email|isEmailExist',
            'firstname' => 'required|alpha_num|min:2|max:32',
            'lastname' => 'required|alpha_num|min:2|max:32',
            'password' => 'required|Confirmed|min:3'
        );

        $validator = Validator::make($data, $rules);

        if ($validator->fails())
        {
            $errors = $validator->messages()->getMessages();
            return json_encode($errors);
            // The given data did not pass validation
        }

        unset($data['password_confirmation']);
        $data['password'] = Hash::make($data['password']);
        if(Users::addUser($data)){
            echo json_encode(array("OK"));
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

        return $id;

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

    public function login()
    {
        return View::make("authmanager::Users.login");
    }
    public function loginAuth()
    {
        $data = Input::all();
        //var_dump($data);
        //die;
        Auth::logout();
        if (Auth::attempt(array('email' => $data['email'], 'password' => $data['password'])))
        {
            return "Aproved ". Auth::check();
        }
        return "Declined ". Auth::check();
    }
    public function logout()
    {
        Auth::logout();
        return "Logged Out!";
    }
    public function logcheck()
    {
        return "User is: ". Auth::user()->id;
    }

}