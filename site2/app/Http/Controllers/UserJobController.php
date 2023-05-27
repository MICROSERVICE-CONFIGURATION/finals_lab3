<?php

namespace App\Http\Controllers;

//use App\User;
use App\Models\User; // <-- your model is located inside Models Folder
use App\Models\UserJob;

use Illuminate\Http\Response; // Response Components
use App\Traits\ApiResponser; // <-- use to standardized our code for api response
use Illuminate\Http\Request; // <-- handling http request in lumen
use DB; // <-- if your not using lumen eloquent you can use DB component in lumen

Class UserJobController extends Controller {
// use to add your Traits ApiResponser
    use ApiResponser;

    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    /**
    * Return the list of usersjob
    * @return Illuminate\Http\Response
    */
    public function index()
    {
        $usersjob = UserJob::all();
        return $this->successResponse($usersjob);

    }

    /**
    * Obtains and show one userjob
    * @return Illuminate\Http\Response
    */
    public function show($id)
    {

        $userjob = UserJob::findOrFail($id);
        return $this->successResponse($userjob);

    }







    public function add(Request $request ){
        $rules = [
            'username' => 'required|max:20',
            'password' => 'required|max:20',
            'gender' => 'required|in:Male,Female',
            'jobid' => 'required|numeric|min:1|not_in:0',
        ];

        $this->validate($request,$rules);
        
        // validate if Jobid is found in the table tbluserjob
        $userjob = UserJob::findOrFail($request->jobid);
        $user = User::create($request->all());
        
        return $this->successResponse($user, Response::HTTP_CREATED);
    }
}