<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\College;
use App\Department;
use App\Idnumber;
use DB;
use App\Academic;

class ProgramsController extends Controller
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
        // $ =College::all();
          //$programs=Program::all();
		   $programs= DB::select("select * from programs
          inner join departments on(departments.department_id=programs.department_id)
		  ORDER BY departments.department_id ASC;
		  ");

      // return view('admins.Programs', compact('programs'));
	   return view('admins.programs')->with('programs',$programs);
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
            'college' => 'required',
            'department' => 'required',
            'program' => 'required',
            'program_code' => 'required',
            'class_cat' => 'required',
              'program_no' => 'required'
        ]);
        //return 123;
		
		  $academic=Academic::select('AcademicSessions','academic_id')
       ->where('Current', 'Current')
        ->take(100)
        ->get();
           foreach($academic as $row){
            $A_Session=$row->AcademicSessions;
           }
		   
		   
		$department_id=$request->input('department');
		$program_id=$department_id.$request->input('program_no');
		
        $Program = new Program;
        $Program->program_id=$program_id;
         $Program->Program=$request->input('program');
        $Program->Program_Code=$request->input('program_code');
        $Program->department_id=$request->input('department'); 
        $Program->class_cat=$request->input('class_cat'); 
        $Program->save();
		
		 $no=$department_id.'9'.$request->input('program_no');		 
		$number = new Idnumber;
        $number->program_id =$program_id;
        $number->Number_Code=$no;
        $number->Category ="Morning"; 
        $number->Sessions =$A_Session; 
        $number->save();
		
		 $no=$department_id.'0'.$request->input('program_no');		 
		$number = new Idnumber;
        $number->program_id =$program_id;
        $number->Number_Code=$no;
        $number->Category ="Evening"; 
        $number->Sessions =$A_Session; 
        $number->save();
		
        return redirect('/add_program');
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
		  $colleges =College::all();     
		  $programs=Program::all();
		  
		  $program=Program::find($id);
		 $did=$program->department_id;
		 
		$department =Department::find($did);		
		 $cid= $department->college_id;
		 
		 $college=College::find($cid);
	 
		 

      return view('admins.editProgram')->with(compact(['programs',$programs],['colleges',$colleges],
	  ['program',$program],['college',$college],['department',$department]));
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
            'college' => 'required',
            'department' => 'required',
            'program' => 'required',
            'program_code' => 'required',
        ]);
        //return 123;
		 
        $Program = Program::find($id);
        $Program->Program=$request->input('program');
        $Program->Program_Code=$request->input('program_code');
        $Program->department_id=$request->input('department'); 
        $Program->save();
        return redirect('/Department/Programs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $Program=Program::find($id);
       $Program->delete();
       return redirect('/Department/Programs');
     }
}
