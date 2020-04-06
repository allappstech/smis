<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idnumber;
use App\College;
use App\Academic;
use DB;

class IdnumbersController extends Controller
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
		 $account=auth()->user()->Account;
		 $department_id=auth()->user()->department_id;
		if($account=="HOD"){
		/*	$ADNumbers=Idnumber::select('idnumbers.id,Program_Code,Category,Number_Code,Admno,Sessions')
			 ->join('programs', 'programs.id', '=', 'idnumbers.program_id')
			 ->join('departments', 'departments.id', '=', 'programs.department_id')
			 ->where('department_id',$department_id)
			 ->get();
			*/
			 $ADNumbers=DB::select("select * from idnumbers
		inner join programs on(programs.program_id=idnumbers.program_id)
		inner join departments on(departments.department_id=programs.department_id)
		where departments.department_id='$department_id'
		");		 
        
	   
		}else{
			//$ADNumbers=Idnumber::all();
			/*	$ADNumbers=Idnumber::select('*')
			 ->join('programs', 'programs.id', '=', 'idnumbers.program_id')
			 ->join('departments', 'departments.id', '=', 'programs.department_id')
			 ->get();
			 */
		$ADNumbers=DB::select("select  * from idnumbers
		inner join programs on(programs.program_id=idnumbers.program_id)
		inner join departments on(departments.department_id=programs.department_id)
		
		");
		}
		
		$colleges = College::all();
        return view('departments.getNumber')->with(compact(['ADNumbers', $ADNumbers],['colleges', $colleges]));
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
            'cats' => 'required',
             
        ]);
           $academic=Academic::select('AcademicSessions','academic_id')
       ->where('Current', 'Current')
        ->take(100)
        ->get();
           foreach($academic as $row){
            $A_Session=$row->AcademicSessions;
           }
		   
		  /*/ dd($A_Session);
		        $numbers=Idnumber::select('Number_Code','id')
       ->where(['program_id', $request->input('program')],['Category', $request->input('cats')])
        ->take(100)
        ->get();
		$pid=0;
           foreach($numbers as $rows){
            $pids=$rows->id;			 
           }
		   if($pids > 0){
			   $number =Idnumber::find($pids);
		   }else{			   
              $number = new Idnumber;program
		    }
			*/
			
			if($request->input('cats')=="Morning"){
				$category=9;
			}else{
				$category=0;
			}
			$progr =substr($request->input('program'), -1);
			$no=$request->input('department').$category.$progr;
            $oldn=Idnumber::where('Number_Code',$no)->first();
            if(!$oldn){
        $number = new Idnumber;
           //  $number=Idnumber::firstOrCreate(['Number_Code'=>$no,'Sessions'=>$A_Session]);
        $number->program_id =$request->input('program');
        $number->Number_Code=$no;
        $number->Category =$request->input('cats'); 
        $number->Sessions =$A_Session; 
        $number->save();

            }
			
		  
        return redirect('/Department/Program/Numbers');
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
            // $college=Student::find($id);
           //$states=State::all();
        //$programs=Program::all();
        $department_id=auth()->user()->department_id;
        $programs=DB::select("select * from programs where department_id='$department_id'");
            
                     $numbers=DB::select("select * from idnumbers
        inner join programs on(programs.program_id=idnumbers.program_id)
        inner join departments on(departments.department_id=programs.department_id)
        where idnumber_id='$id'
        "); 
                
          //return view('departments.editStudent')->with('student', $student);
                  return view('departments.editnumber')->with(compact(
                    ['programs',$programs],['numbers',$numbers]));
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
            'Admno' => 'required',
          

        ]); 
        $student = Idnumber::find($id); 
        $student->Admno=$request->input('Admno');    
       
         $student->save();
          return redirect('/Department/Program/Numbers');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $Idnumber=Idnumber::find($id);
       $Idnumber->delete();
        return redirect('/Department/Program/Numbers');
    }
}
