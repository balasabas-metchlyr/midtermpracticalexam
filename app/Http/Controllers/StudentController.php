<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request; 
use App\Models\User; 


class StudentController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
// VIEW ALL

    public function get()
    {
    
        $users = User::all();

        return response()->json($users, 200); // <-- before
        // return $this->successResponse($users);
    }

// SEARCH BY ID
public function show($id)
{ 
   return User::where('studid', '=', $id)->get();
}


    

// INSERT
public function add(Request $request)
{
    
    $rules = [
        $this->validate($request, [
            'lastname' => 'required|alpha:max:50',
            'firstname' => 'required|alpha:max:50',
            'middlename' => 'required|alpha:max:50',
            'bday' => 'date_format:Y/m/d',
            'age' => 'required|int:lt:50:years'
        ])  
    ];
    $this->validate($request, $rules);
    $user = User::create($request->all());
    
    return $this->successResponse($user, Response::HTTP_CREATED);
}

// UPDATE
public function update(Request $request, $id)
{
    $rules = [
        $this->validate($request, [
            'lastname' => 'required|alpha:max:50',
            'firstname' => 'required|alpha:max:50',
            'middlename' => 'required|alpha:max:50',
            'bday' => 'date_format:Y/m/d',
            'age' => 'required|int:lt:50:years'
        ])  
    ];
    $this->validate($request, $rules);
    $user = User::findOrFail($id);
    $user->fill($request->all());

    $user->save();

    return $user;
}

// DELETE

public function delete($id)
{
    $user = User::findOrFail($id);
    $user->delete();
}


}