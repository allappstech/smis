<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use DB;

class CoursesController extends Controller
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
		 $user=auth()->user()->Account;
		 $department=auth()->user()->department_id;
		 if($user=="Admin"){
         //$courses= Course::all();
		 $courses=DB::select("select * from courses
				inner join departments on(departments.department_id=courses.department_id)
	 
		");
		 }else{
		//$courses = Course::where('department_id', $department)->get();
		 $courses=DB::select("select * from courses
				inner join departments on(departments.department_id=courses.department_id)
		where departments.department_id='$department'");
		 }
        return view('admins.courses')->with('courses', $courses);
  
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
             'department' => 'required',
            'course_title' => 'required',
            'course_code' => 'required',
            'course_unit' => 'required',
            'level' => 'required',
            'class_cat' => 'required',
            'semester' => 'required',
        ]);
        //return 123;
        $courses = new Course;
        $courses->course_id=$request->input('course_code');
		$courses->Course_title=$request->input('course_title');        
        $courses->Units=$request->input('course_unit');
        $courses->Department_id=$request->input('department');
        $courses->class_cat=$request->input('class_cat');
        $courses->Level=$request->input('level');
        $courses->Semester=$request->input('semester');
        $courses->save();
        return redirect('/Department/Courses');
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
          $courses=Course::find($id);
          return view('admins.editCoures')->with('courses', $courses);
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
		 
        $this->validate($request, [
            'Course_title' => 'required',
            'Course_Code' => 'required',
        ]);
        //return 123;
		
        $course=Course::find($id);
        $course->Course_title=$request->input('Course_title');
        $course->Course_Code=$request->input('Course_Code');
        $course->save();
        return redirect('/Department/Courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $course=Course::find($id);
       $course->delete();
	   return redirect('/Department/Courses');
    }
}
