<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Student;
use DB;
use App\College;
use App\Result;
use App\MisSemester;
use Session;
use Excel;
use File;
session_start();

class ExResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		      $colleges=College::all();
       return view('academics.resultsload', compact('colleges'));
       
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
        // store start
		   $this->validate($request, array(
            'file'      => 'required',
            'code'      => 'required',
           // 'college'      => 'required',
           // 'department'      => 'required',
           // 'program'      => 'required',
             'level'      => 'required',
            'semesters'      => 'required',
            'sessions'      => 'required'
        ));
            $user=$request->input('code');
          //  $college=$request->input('college');
          //  $department=$request->input('department');
           // $program=$request->input('program');
           // $cats=$request->input('cats');
            $Level=$request->input('level');
            $sessions=$request->input('sessions');
     
            $semesters=$request->input('semesters');
			
			
			
        
          if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
 
                $path = $request->file->getRealPath(); 
                $data = Excel::load($path, function($reader) {
                })->get();
                if(!empty($data) && $data->count()){
                      $insert = [];            
     

			$numbers="";
			$name="";
			$email="";
			$program="";
			$admissionNo="";
			$cats="";
			$Asessions="";
        //foreach ($data->toArray() as $rows) { // <-- $rows pertains to array of rows
         $rows=$data->toArray() ;    // <-- $rows pertains to array of rows
            foreach($rows as $row) { // <-- $row pertains to the row itself
			
			////////////FFFFF
			if(!empty($row['code'])){
               $admissionNo=$row['admno'];
			   if($admissionNo>0){
				$numbers=$admissionNo;
				$name=$row['name'];
				$codes=substr($row['code'],-3);
				$get_ses=substr($numbers, 0,2);
				$get_coll=substr($numbers, 2,1);
				$get_dept=substr($numbers, 3,1);
				$get_prog=substr($numbers, 4,1);
				$get_cour=substr($numbers, 5,1);
				$sems =substr($codes,1,1);
				$college=$get_coll;
            $department=$get_coll.$get_dept;
            $program=$get_coll.$get_dept.$get_cour;
				if($get_prog==0){
				$cats="Evening";
			}else{
				$cats="Morning";
				
			}
             $up=$get_ses+1;
			 $lo=$get_ses;
			 
            $Asessions='20'.$lo.'/20'.$up;
			
			//////////////////////
			$Prev_Units=$row['uls'];
			$Curr_Sem_Units=$row['uts'];			
			$Cumm_Units=$row['cu'];
			$GP_This_Sem=$row['gpts'];
			$GP_Last_Sem=$row['gpls'];
			$CGP=$row['cgp'];
			$GPA_This_Sem=bcdiv($row['gpa'],1,2);
			$CGPA=bcdiv($row['cgpa'],1,2);
			$GeneralRemark=$row['grk'];
     
				}else{
					$numbers=$oldnumbers;
				}
				$email=$numbers.'@mis.com';	
			
					$queries2=DB::select("select  * from students where student_id='".$numbers."'");
		         		$count=count($queries2);
		               //dd($count);
		if($count==0){
		$student = new Student;
        //$numbers=$row['admno'];
        $email=$email;	
        $student->student_id=$numbers;
		$student->fullname=$name; 
        $student->gender='...';         
        $student->email=$email;         
        $student->phoneNo ='...';         
        $student->program_id=$program;
        $student->Category=$cats;
        $student->password=bcrypt($numbers); 
        $student->lga_id=783; 
        $student->Session=$Asessions;    
        $student->current_status='...';    
       
         $student->save();
		 
		}
		 if(($row['grade']=="emc")||($row['grade']=="Deferming")){
			 $ccode=$row['grade'];
			 
			 $queries2c=DB::select("select  * from mis_semesters where semesters='$semesters' and 
		 Sessions='$sessions' and  student_id='$numbers'");
		 $count3=count($queries2c);
		 if($count3>0){
			 $queries2c=DB::update("update   mis_semesters
			 set semesters ='$semesters',Sessions='$sessions',Reason='".$row['srk']."',Status='".$row['grk']."'
			 where semesters='$semesters' and  Sessions='$sessions' and  student_id='$numbers'");
		 }else{
			 $mis = new MisSemester;
        $mis->student_id= $numbers;
        $mis->semesters =$semesters;
        $mis->Sessions=$sessions;
        $mis->Reason=$row['srk']; 
        $mis->Status=$row['grk'];       
         $mis->save();
		 }
		 }else{
			$ccode=$row['code'];
		}	
		$queries2c=DB::select("select  * from results where Semester='$semesters' and 
		 Sessions='$sessions' and  student_id='$numbers'and  course_id='".$ccode."'");
		 $count2=count($queries2c);
		 		
		if($count2>0){
			 $update=DB::update("update results set
			 course_id='".$ccode."',Units='".$row['unit']."',
			 Grade='".$row['grade']."',Point='".$row['point']."',
			 Grade_Point ='".$row['gp']."',Remark='".$row['srk']."',
			 program_id='".$program."', Level='".$Level."'
			 where Semester='$semesters' and Sessions='$sessions' 
			 and  student_id='$numbers'and  course_id='".$ccode."'
			 ");
		}else{
        $result = new Result;
        $result->student_id= $numbers;
        $result->course_id=$ccode;
        $result->Units=$row['unit'];
        $result->Grade=$row['grade']; 
        $result->Point=$row['point']; 
        $result->Grade_Point =$row['gp']; 
         $result->Semester=$semesters; 
        $result->Sessions=$sessions; 
        $result->Remark=$row['srk'];      
        $result->program_id=$program;     
        $result->Level=$Level;     
         $result->save();
		 
		}
		
		
		//$semester=$request->input('semester');
		 $queries2c=DB::select("select  * from grades where Semester='$semesters' and 
		 Sessions='$sessions' and  student_id='$numbers'");
		$count3=count($queries2c);
		
		if($count3>0){
			
				 
			 $insert=DB::update("update grades set 
                     Prev_Units='".$Prev_Units."',Curr_Sem_Units='".$Curr_Sem_Units."',
					 Cumm_Units='".$Cumm_Units."',GP_This_Sem='".$GP_This_Sem."',
					 GP_Last_Sem='".$GP_Last_Sem."',CGP='".$CGP."',
					 GPA_This_Sem='".$GPA_This_Sem."',CGPA='".$CGPA."',
					 GeneralRemark='".$GeneralRemark."' where Semester='$semesters' and 
		             Sessions='$sessions' and  student_id='$numbers'");
			
				}else{
		          
		      $insert=DB::insert("insert into grades 
                    (student_id,Prev_Units,Curr_Sem_Units,Cumm_Units,
                    GP_This_Sem,GP_Last_Sem,CGP,GPA_This_Sem,
					CGPA,GeneralRemark,Semester, Sessions,Status)
                    values
                    ('$numbers','".$Prev_Units."','".$Curr_Sem_Units."','".$Cumm_Units."', 
                    '".$GP_This_Sem."','".$GP_Last_Sem."','".$CGP."',
					'".$GPA_This_Sem ."','".$CGPA."',
                    '".$GeneralRemark."','$semesters', '$sessions','Ready')");
					}
					
					
                   $name=$name;
				   $oldnumbers=$numbers;
        
				//$student_id=$row['admno'];
				//echo $student_id;
				/*/exit;
				
				    $n=0;
$table='<table border="1" class="table table-striped table-bordered table-hover">
             <tr>
            <th>SN</th>
            <th>AdmissionNo</th>
            <th>Full name</th>
            <th>CA</th>
            <th>Exam</th>
            <th>Total</th>
            <th>Grade</th>
            <th>Remark</th>                   
            </tr>';
			$n+=1;
			$table.='<tr>
            <td> '.$n.'</td>
            <td>'.$numbers.'</td>
            <td>'.$name.'</td>
            <td>'.$email.'</td>
            <td>....</td>
            <td>'.$program.'</td>
            <td>'.$Asessions.'</td>
            <td>Ready</td>
        
         
            </tr>'
			; 
			$insert[] = [
                     'student_id' => $numbers,
                     'fullname' => $name,
                     'gender' => '...',
                     'email' => $email,
                     'phoneNo' => '...',
                     'program_id' => $program,
                     'Category' => $cats,
                     'password' => bcrypt($numbers),
                     'lga_id' => 783,
                     'Session' => $Asessions,
                     'current_status' => 'Ready'
                    ];
					

              
				
					if(($row['admno']>0)){
						$numbers=$row['admno'];
				$codes=substr($row['code'],-3);
				$get_ses=substr($numbers, 0,2);
				$get_coll=substr($numbers, 2,1);
				$get_dept=substr($numbers, 3,1);
				$get_prog=substr($numbers, 4,1);
				$get_cour=substr($numbers, 5,1);
				$sems =substr($codes,1,1);
				
			$college=$get_coll;
            $department=$get_coll.$get_dept;
            $program=$get_coll.$get_dept.$get_cour;
			
			if($get_prog==0){
				$cats="Evening";
			}else{
				$cats="Morning";
			}
             $up=$get_ses+1;
			 $lo=$get_ses;
			 
            $Asessions='20'.$lo.'/20'.$up;
     if($sems==1){
		 $semesters="First Semester";
	 }else{
		 $semesters="Second Semester";
	 }
	 $semesters2=$semesters;
	 $admnopre=$row['admno'];
					}
					if(($row['admno']>0)){
					 $admnopre=$row['admno'];  
						$admno=$row['admno'];
						 ///insert student
						 	$numbers=$row['admno'];
							$addname=1;
					}else{
						$admno=$admnopre;
						 ///insert student
						 	$numbers=$admnopre;
							$addname=0;
					}
	 $admnoc="";
		$queries2=DB::select("select  * from students where student_id='".$numbers."'");
		foreach ($queries2 as $row2) {
           $admnoc=$row2->student_id;
		}
		//echo $admnoc;
		//exit;
		if($admnoc !==$row['admno']){
		$student = new Student;
        //$numbers=$row['admno'];
        $email=$numbers.'@mis.com';	
        $student->student_id=$numbers;
		$student->fullname=$row['name']; 
        $student->gender='...';         
        $student->email=$email;         
        $student->phoneNo ='...';         
        $student->program_id=$program;
        $student->Category=$cats;
        $student->password=bcrypt($numbers); 
        $student->lga_id=783; 
        $student->Session=$Asessions;    
        $student->current_status='...';    
       
         $student->save();
		 
		}
		
		 $semester=$request->input('semester');
		 $queries2c=DB::select("select  * from grades where Semester='$semester' and 
		 Sessions='$sessions' and  student_id='$numbers'");
		 
		foreach ($queries2c as $row2c) {
           $admnoc=$row2c->student_id;
		}
		if($admnoc==$row['admno']){
			 $insert=DB::update("update grades set 
                     Prev_Units='".$row['uls']."',Curr_Sem_Units='".$row['uts']."',
					 Cumm_Units='".$row['cu']."',GP_This_Sem='".$row['gpts']."',
					 GP_Last_Sem='".$row['gpls']."',CGP='".$row['cgp']."',
					 GPA_This_Sem='".$row['gpa']."',CGPA='".$row['cgpa']."',
					 GeneralRemark='".$row['grk']."' where Semester='$semesters' and 
		             Sessions='$sessions' and  student_id='$numbers'");
			
		}else{
		
		      $insert=DB::insert("insert into grades 
                    (student_id,Prev_Units,Curr_Sem_Units,Cumm_Units,
                    GP_This_Sem,GP_Last_Sem,CGP,GPA_This_Sem,
					CGPA,GeneralRemark,Semester, Sessions,Status)
                    values
                    ('$numbers','".$row['uls']."','".$row['uts']."','".$row['cu']."', 
                    '".$row['gpts']."','".$row['gpls']."','".$row['cgp']."',
					'".$row['gpa']."','".$row['cgpa']."',
                    '".$row['grk']."','$semesters', '$sessions','Ready')");
					}
					
				 
					//}
					
				 if(($row['grade']=="emc")||($row['grade']=="Deferming")){
			$ccode="emc";
		
		 
		$mis = new MisSemesters;
        $mis->student_id= $admno;
        $mis->semesters =$semesters;
        $mis->Sessions=$sessions;
        $mis->Reason=$row['srk']; 
        $mis->Status=$row['grk'];       
         $mis->save();
		  
		}else{
			$ccode=$row['code'];
		}
		
		 $queries2c=DB::select("select  * from results where Semester='$semesters' and 
		 Sessions='$sessions' and  student_id='$numbers'and  course_id='".$row['code']."'");
		foreach ($queries2c as $row2c) {
           $admnoc=$row2c->student_id;
		}
		
		if($admnoc==$row['admno']){
			 $update=DB::update("update results set
			 course_id='".$ccode."',Units='".$row['unit']."',
			 Grade='".$row['grade']."',Point='".$row['point']."',
			 Grade_Point ='".$row['gp']."',Remark='".$row['srk']."',
			 category_id='".$program."' 
			 where Semester='$semesters' and Sessions='$sessions' 
			 and  student_id='$numbers'and  course_id='".$row['code']."'
			 ");
		}else{
        $result = new Result;
        $result->student_id= $numbers;
        $result->course_id=$ccode;
        $result->Units=$row['unit'];
        $result->Grade=$row['grade']; 
        $result->Point=$row['point']; 
        $result->Grade_Point =$row['gp']; 
         $result->Semester=$semesters; 
        $result->Sessions=$sessions; 
        $result->Remark=$row['srk'];      
        $result->category_id=$program;     
         $result->save();
		 
		}
		*/
 
            /////}
				}
        }
		//$table.='</table>';
 // echo $table;
// dd($insert);
//          exit;
       // session(["data"=>$insert]);
  // session()->save(); 
    
        // echo $table;
 
         //exit;
     Session::flash('error', 'Result Upolad..!!');

          return back();
               
                }
 
                return back();
 
            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
		
		Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
		
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
