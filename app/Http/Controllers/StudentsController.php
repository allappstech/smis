<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Student;
use App\Program;
use App\State;
use App\Academic;
use  DB;
use App\Departmental;
use App\Idnumber;
use App\College;
use Excel;
use Session;
use File;

class StudentsController extends Controller
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
        $states=State::all();
        //$programs=Program::all();
        $department_id=auth()->user()->department_id;
        $account=auth()->user()->Account;
		if($account=="Admin"){
        $programs=DB::select("select * from programs ");
        
				 $students=DB::select("select * from students 
				 INNER JOIN lgas ON(students.lga_id=lgas.lga_id)
				INNER JOIN states ON(states.state_id=lgas.state_id)
				INNER JOIN programs ON(programs.program_id=students.program_id)
				order by student_id asc");	 

		}else
		{
			 $programs=DB::select("select * from programs where department_id='$department_id'");
        
				 $students=DB::select("select * from students 
				INNER JOIN lgas ON(students.lga_id=lgas.lga_id)
				INNER JOIN states ON(states.state_id=lgas.state_id)
				INNER JOIN programs ON(programs.program_id=students.program_id)
				where department_id='$department_id' order by student_id asc");	 

		}	
        return view('departments.student')->with(compact(['programs',$programs],['states',$states],['students',$students]));
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
            'program' => 'required',
            'cats' => 'required',
            'name' => 'required',
             'Phonenumber' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'state' => 'required',
            'lga' => 'required',

        ]);
        //return 123;

           $academic=Academic::select('AcademicSessions','academic_id')
       ->where('Current', 'Current')
        ->take(100)
        ->get();
           foreach($academic as $row){
            $A_Session=$row->AcademicSessions;
           }
		   $program= $request->input('program');
		   $cat=$request->input('cats');
		   
		    $number=DB::select("select * from idnumbers where program_id='$program' and 
			Category='$cat'
			");
			//$Admno=0;
		 
           foreach($number as $rows){
            $Admno=$rows->Admno;
            $ids=$rows->Number_Code;			 
           }
		   $Admno+=1;
		   
		 if($Admno < 10){
			 $numbers= '00'.$Admno;
		 }else  if($Admno < 100){
			 $numbers= '0'.$Admno;
		 }else  {
			 $numbers= $Admno;
		 }

         $progr =substr($A_Session, 2,2);
		 $adn=$progr.$ids.$numbers;
         $numbers=$adn;
		//  dd($numbers);
			 
			 
      
        $student = new Student;
        $pass=$numbers;       
        $student->student_id=$numbers;
		$student->fullname=$request->input('name');
        $student->gender=$request->input('gender');
        $student->email=$request->input('email');
        $student->phoneNo=$request->input('Phonenumber');        
        $student->program_id=$request->input('program');
        $student->Category=$request->input('cats');
        $student->password=bcrypt($pass);
        $student->lga_id=$request->input('lga');
        $student->Session=$A_Session; 
        $student->current_status='Reguller Student';  
       
         $student->save();

$number=DB::update("update  idnumbers set Admno='$Admno' where program_id='$program' and 
            Category='$cat'
            ");
/*
          $students=Student::select('student_id')
       ->where('student_id', $request->input('student_id'))
        ->first();
        $student= $students->student_id;
        $program_id=$request->input('program');
       // ;\  */

        $mycourses= DB::select("select * from core_courses 
            inner join courses ON(core_courses.course_id=courses.course_id) 
            where program_id='$program' and Level='I'
             ");
       // dd($mycourses);
        foreach ($mycourses as $key => $mycourse) {
             $course_ids=$mycourse->course_id;
             $Semester=$mycourse->Semester;
           // $insert= DB::insert("insert into departmentals(student_id,course_id,Semester,Session)
            //    values('$student','$course_ids','$Semester','$A_Session') 
            // ");
            DB::table('departmentals')->insert([
             [
                'student_id' =>  $numbers,
                'course_id' => $course_ids,
                'Semester' => $Semester,
                'Sessions' => $A_Session
            ]
        ]);
         
        }
        return redirect('/Department/Students');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $states=State::all();
        //$programs=Program::all();
        $department_id=auth()->user()->department_id;
        $account=auth()->user()->Account;
       
           $programs=DB::select("select * from programs where department_id='$department_id'");
        
                 $students=DB::select("select * from students 
                INNER JOIN lgas ON(students.lga_id=lgas.lga_id)
                INNER JOIN states ON(states.state_id=lgas.state_id)
                INNER JOIN programs ON(programs.program_id=students.program_id)
                INNER JOIN departments ON(programs.department_id=departments.department_id)
                where students.student_id='$id'");  
          
        return view('departments.studentRecord')->with(compact(['programs',$programs],['states',$states],['students',$students]));
       // return view('departments.studentRecord');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $college=Student::find($id);
		   $states=State::all();
        //$programs=Program::all();
        $department_id=auth()->user()->department_id;
        $programs=DB::select("select * from programs where department_id='$department_id'");
			
				 $student=DB::select("select * from students 
				INNER JOIN lgas ON(students.lga_id=lgas.lga_id)
				INNER JOIN states ON(states.state_id=lgas.state_id)
				INNER JOIN programs ON(programs.program_id=students.program_id)
				where student_id='$id'");
				
          //return view('departments.editStudent')->with('student', $student);
		          return view('departments.editStudent')->with(compact(['programs',$programs],['states',$states],['student',$student]));

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
            'program' => 'required',
            'cats' => 'required',
            'name' => 'required',
            'AdmissionNo' => 'required',
            'Phonenumber' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'state' => 'required',
            'lga' => 'required',

        ]); 
        $student = Student::find($id);
        $pass=$request->input('AdmissionNo');
        $student->fullname=$request->input('name');
        $student->student_id=$request->input('AdmissionNo');
        $student->gender=$request->input('gender');
        $student->email=$request->input('email');
        $student->phoneNo=$request->input('Phonenumber');        
        $student->program_id=$request->input('program');
        $student->Category=$request->input('cats');
        $student->password=bcrypt($pass);
        $student->lga_id=$request->input('lga');    
       
         $student->save();
		  return redirect('/Department/Students');
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
	
	public function studentupload()
	{
		$colleges=College::all();
		return view('admins.studentsupload')->with('colleges',$colleges);
	}
	  public function uploadstudents(Request $request)
    {
        $this->validate($request, array(
            'fileupload'      => 'required',
           // 'cats'      => 'required',
            //'program'      => 'required'
        ));
            $cats=$request->input('cats');
            $program=$request->input('program');
       
          if($request->hasFile('fileupload')){
			 
            $extension = File::extension($request->fileupload->getClientOriginalName());
			 
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") { 
                $path = $request->fileupload->getRealPath(); 
                $data = Excel::load($path, function($reader) {
                })->get();
				
                if(!empty($data) && $data->count()){
                      $insert = [];      

       // foreach ($data->toArray() as $rows) { // <-- $rows pertains to array of rows
               $rows=$data->toArray() ;
            foreach($rows as $row) { // <-- $row pertains to the row itself
              if(!empty($row['fullname'])){ 

                $numbers=$row['admissionno'];
                
                

                $get_ses=substr($numbers, 0,2);
                 $sess1="20".$get_ses;
                 $ne=$get_ses+1;
                $sess2= "20".$ne;
                $sess3=$sess1."/".$sess2;
                
                $get_coll=substr($numbers, 2,1);
               
                $get_dept=substr($numbers, 3,1);
                $get_prog=substr($numbers, 4,1);

                $get_cour=substr($numbers, 5,1);
                $program=$get_coll.$get_dept.$get_cour;

                if($get_prog==0){
                $cats="Evening";
            }else{
                $cats="Morning";
                
            }

                    
                $insert[] = [                    
                    'fullname' => $row['fullname'],
					'student_id' => $row['admissionno'],
					'gender' => $row['gender'],
					'email' => $row['email'],
					'phoneNo' => $row['phoneno'],
					'program_id' => $program,
					'Category' => $cats,
					'password' => bcrypt($row['admissionno']),
					'lga_id' => '',
					'Session' => $sess3,
					'current_status' => 'Reguller Student',                   
                                        
                    ];


        $mycourses= DB::select("select * from core_courses 
            inner join courses ON(core_courses.course_id=courses.course_id) 
            where program_id='$program' and Level='I'
             ");
       // dd($mycourses);
        foreach ($mycourses as $key => $mycourse) {
             $course_ids=$mycourse->course_id;
             $Semester=$mycourse->Semester;
           // $insert= DB::insert("insert into departmentals(student_id,course_id,Semester,Session)
            //    values('$student','$course_ids','$Semester','$A_Session') 
            // ");
            DB::table('departmentals')->insert([
             [
                'student_id' =>  $numbers,
                'course_id' => $course_ids,
                'Semester' => $Semester,
                'Sessions' =>  $sess3
            ]
        ]);
         
        }
 
            }
        }
    
                //dd($insert);
                     if(!empty($insert)){
 
                        $insertData = DB::table('students')->insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        }else {                        
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                     
                }
 
                return back();
 
            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
         
    }
}
