<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\College;
use App\Department;
use App\Program;
use App\Users;
use App\Course;
use App\Category;
use App\Lga;
use DB;

class DropsController extends Controller

{
	  public function __construct()
    {
        $this->middleware('auth');
    }
     public function setcollege()
    {
      $colleges=College::all();
       return view('admins.Add_department')->with('colleges', $colleges);
    }

    public function setdepart()
    {
         $colleges=College::all();
       return view('admins.add_program')->with('colleges', $colleges);
    }

 public function setcourse()
    {
         $colleges=College::all();
         $did=auth()->user()->department_id;
         $colleges=DB::select("select * from departments where department_id='$did'");
       return view('admins.add_course')->with('colleges', $colleges);

       
       /*/ dd($did);
         $programs=Program::all();
         $colleges=College::all();
         //$users=Users::where('department_id','=',$did);
          $users=DB::select("select * from departments where department_id='$did'");

          */
    }

      public function setdepartment(Request $request)
    {
     
	   $department=Department::select('Department','department_id')
        ->where('college_id', $request->College_id)
        ->take(100)
        ->get();
		
		 
		//$college_id=$request->College_id;
		//$department=DB::select("select * from department where college_id='$college_id'");
 
        $option='<option value="">-------Department--------</option>';
       foreach($department as $row){
           $option.='<option value="'.$row->department_id.'">'.$row->Department.'</option>'; 
       }
        echo $option;
    }

      public function selectDepartment(Request $request)
    {
        $programs=Program::select('Program_Code','program_id')
        ->where('department_id', $request->Department_id)
        ->take(100)
        ->get();
        $option='<option value="">-------Cource--------</option>';
       foreach($programs as $row){
           $option.='<option value="'.$row->program_id.'">'.$row->Program_Code.'</option>'; 
       }
        echo $option;
    }

      public function setusers()
    {
         $colleges=College::all();
       return view('auth.register')->with('colleges', $colleges);
    }

        public function allocation()
    {
        $did=auth()->user()->department_id;
       // dd($did);
         $programs=Program::all();
         $colleges=College::all();
         //$users=Users::where('department_id','=',$did);
          $users=DB::select("select * from users where department_id='$did'");
         $departments=Department::all();
       return view('departments.allocate')->with(compact(['colleges', $colleges],['users', $users],['departments', $departments]));
      // return view('departments.allocate',compact(['programs','users']);
    }

      // allocation select programs
      public function selectcources(Request $request)
    {
		
       $cources=Cource::select('Program_Code','course_id')
        ->where('department_id', $request->Department_id)
        ->take(100)
        ->get();
        $option='<option value="">-------Course--------</option>';
       foreach($cources as $row){
           $option.='<option value="'.$row->course_id.'">'.$row->Course_Code.'</option>'; 
       }
        echo $option;

         

       // echo 444; 
    }


          public function core()
    {
		    $did=auth()->user()->department_id;
         //$programs=Program::all();
         $departments=Department::all();
         $programs=DB::select("select * from programs where department_id='$did'");
      // return view('departments.add-core')->with('programs', $programs);
      return view('departments.add-core')->with(compact(['programs', $programs],['departments', $departments]));
    }

    public function returncore(Request $request)
    {
		
		$semester=$request->input('semesters');
		$department=$request->input('Department_id');
		$programs=$request->input('programs');
		$year=$request->input('year');
		
		 /*
       $cources=Course::select('course_id')
       ->where('department_id', $request->Department_id)
        ->take(100)
        ->get();
		*/
		
			 // echo $programs;
		//exit;
		$program=DB::select("select class_cat from programs where program_id='$programs'");
          foreach($program as $rows){}
		
         $class_cat=$rows->class_cat;	
      	
		$cources=DB::select("select * from courses 
		where department_id='$department' and Semester='$semester'
		and Level='$year'and class_cat='$class_cat' ");
        $option='<option value="">-------Cource--------</option>';
		     foreach($cources as $row){
           $option.='<option value="'.$row->course_id.'">'.$row->course_id.'</option>'; 
               }
	     // echo $row->course_id;
		//exit;
      echo $option;

         
     
      
    }
   public function test()
    {
        // $colleges=College::all();
       //return view('admins.Add_program')->with('colleges', $colleges);
      dd(66);
    }

  public function getlga(Request $request)
    {  
        $lgas=Lga::select('lga','lga_id')
        ->where('state_id', $request->state_id)
        ->take(100)
        ->get();
  // return view('admins.Add_program')->with('colleges', $colleges);
        //return reponse()->json($data);
        $option='<option value="">-------LGA--------</option>';
       foreach($lgas as $row){
           $option.='<option value="'.$row->lga_id.'">'.$row->lga.'</option>'; 
       }
        
        echo $option;
    }


}
