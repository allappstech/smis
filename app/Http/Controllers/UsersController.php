<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	   public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
		$department_id=auth()->user()->department_id;
		 $account=auth()->user()->Account;
 	 	
		 
		 
		if($account=="Admin"){
			// $users= Users::all();
				$users=DB::select("select * from users
				inner join departments on(departments.department_id=users.department_id)
		");
		}else{
			// $users= Users::where('department_id',$department_id)->get();
				$users=DB::select("select * from users
				inner join departments on(departments.department_id=users.department_id)
		where departments.department_id='$department_id'
		");
		}
         
        return view('admins.users')->with('users', $users);
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request, [ 
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',            
            'department' => 'required',
			'account' => 'required',

        ]);
		  $staff = new Users;
      
        $staff->name=$request->input('name'); 
        $staff->email=$request->input('email'); 
        $staff->password=bcrypt($request->input('password'));
        $staff->department_id=$request->input('department');
        $staff->Account=$request->input('account'); 
        $staff->Status='Active';  
       
         $staff->save();
		 return redirect('/Manage/Users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
