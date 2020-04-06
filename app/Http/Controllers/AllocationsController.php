<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Allocation;
use DB;
class AllocationsController extends Controller
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
		if($account=="HOD"){
			// $allocations=Allocation::where('department_id', $department_id)->get();
			 $allocations=DB::select("select * from allocations
			 inner join courses on(allocations.course_id=courses.course_id)
			 inner join users on(allocations.user_id=users.id)
			 ");
			 
			  $uploads=DB::select("select DISTINCT uploads.allocation_id from uploads
			 inner join allocations on(allocations.allocation_id=uploads.allocation_id)
		 			 ");
	 //dd($allocations);
			  return view('departments.allocation',compact(['allocations'],['uploads']));
		}
		return redirect('home');
  
         
       
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
            'semesters' => 'required',
            'staff' => 'required',
            'course' => 'required',
            'year' => 'required',
            'programs' => 'required',
            'Category' => 'required',
            'department' => 'required',

        ]);
        $cur_session=DB::select("select * from academics where Current='Current'");
		foreach($cur_session as $row){
			$this_ses=$row->AcademicSessions;
		}
		$department_id=auth()->user()->department_id;
		
        $allocation = new Allocation;
        $allocation->Course_id=$request->input('course');
        $allocation->program_id= $request->input('programs');
        $allocation->Category=$request->input('Category');
        $allocation->Level=$request->input('year');
        $allocation->Semester=$request->input('semesters');
        $allocation->Sessions =$this_ses;
        $allocation->user_id=$request->input('staff');
      
        $allocation->save();
        return redirect('/Department/Allocation/newallocation');
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
