<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoreCourse;
use DB;

class CoreCoursesController extends Controller
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
			 $cores=CoreCourse::all();
			 $cores=DB::select("select * from courses 
			 inner join core_courses on(courses.course_id=core_courses.course_id)
			 inner join programs on(programs.program_id=core_courses.program_id)
			 ");
		}else{
			// $cores= CoreCourse::where('department_id',$department_id)->get
			 
			 $cores= CoreCourse::select('*')
			  ->join('programs', 'programs.program_id', '=', 'core_courses.program_id')
              ->join('courses', 'courses.course_id', '=', 'core_courses.course_id')
			  ->join('departments', 'departments.department_id', '=', 'programs.department_id')
			  
			  ->where('departments.department_id',$department_id)
			  ->get();
		 
		}
        
         return view('departments.core_course')->with('cores',$cores);
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
            'programs' => 'required', 
            'year' => 'required',
            'semesters' => 'required',
            'course' => 'required',
        ]);
        //return 123;
        $corecoerse = new CoreCourse;
        $corecoerse->Course_id=$request->input('course');
        $corecoerse->Program_id=$request->input('programs');
        $corecoerse->save();
        return redirect('/Department/Core-Courses');
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
           $core=CoreCourse::find($id);
       $core->delete();
       return redirect('/Department/Core-Courses');
    }
}
