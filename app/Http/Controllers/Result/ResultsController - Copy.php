<?php

namespace App\Http\Controllers\Result;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Upload;
use DB;
use App\Result;
use App\Student;
use App\Departmental;
use App\Category;


class ResultsController extends Controller
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
       // $categories=Category::all();
		$categories= DB::select("select * from categories");
               
        return view('Results.resultsreport')->with('categories',$categories);
    }

       public function publishup($id)
    {
         
       
        // dd($views);
         $course= DB::select("select * from courses 
              inner join allocations ON (courses.id=allocations.course_id)
               where allocations.id='$id'");  
         foreach ($course as $key => $unit){
            $c_units= $unit->Units;
            $course_id= $unit->course_id;
            $semester= $unit->Semester;
            $sessions= $unit->Sessions;
            $category_id= $unit->category_id;
             }
         $views= DB::select("select * from uploads where allocation_id='$id'");
         foreach ($views as  $view) {
           $admno=$view->AdmissionNo;
 
         $students=Student::select('id')->where('AdmissionNo', $admno)->first();
        $student_id= $students->id;
         
  
        $regs= DB::select("select * from departmentals where student_id='$student_id' and Sessions='$sessions' ");
        $sidno=0;
         foreach ($regs as $reg) {  
            $sidno=$reg->student_id;
               }
  
$grade=$view->Grade;
           $point=0;
            if($grade=='A'){
                $gp=$c_units*4;
                $point=4;
            }else if($grade=='AB'){
                $gp=$c_units*3.75;
                $point=3.75;
            }else if($grade=='B'){
                $gp=$c_units*3.5;
                $point=3.5;

            }else if($grade=='BC'){
                $gp=$c_units*3.25;
                $point=3.25;

            }else if($grade=='C'){
                $gp=$c_units*3;
                $point=3;

            }else if($grade=='CD'){
                $gp=$c_units*2.75;
                $point=2.75;

            }else if($grade=='D'){
                $gp=$c_units*2.5;
                $point=2.5;

            }else if($grade=='E'){
                $gp=$c_units*2;
                $point=2;

            }else{
                $gp=$c_units*0;
                $point=0;
                $grade="F";
  
         } 
         if($grade=="F"){
            $remark="Fail";
         }else if($grade=="ABS"){
            $remark="Absent";
         }else{
             $remark="Pass";
         }

           $results= DB::select("select * from results
            where student_id='$student_id' and Sessions='$sessions' and course_id='$course_id'");
           $count=count($results);
           if($count>0){
               $results= DB::update("update results set Units='$c_units',Grade='$grade',Point='$point',
                Grade_Point='$gp',Remark='$remark'
                where student_id='$student_id' and Sessions='$sessions' and course_id='$course_id'
                ");

           }else{


         $result = new Result;
        $result->student_id= $student_id;
        $result->course_id=$course_id;
        $result->Units=$c_units;
        $result->Grade=$grade; 
        $result->Point=$point; 
        $result->Grade_Point =$gp; 
         $result->Semester=$semester; 
        $result->Sessions=$sessions; 
        $result->Remark=$remark; 
//$affectedRows = User::where('votes', '>', 100)->update(['status' => 2]);
        
      if( $student_id==$sidno){
         $result->save();
      }
          }
          //
       // echo $point;
          $Curr_Sem_Units=0;
             $sel_course=DB::select("select * from departmentals 
                    inner join courses on (departmentals.course_id=courses.id)
                    where student_id='".$student_id."' and departmentals.Semester='$semester' and Sessions='$sessions'");
              foreach ($sel_course as $row) {
                 $Curr_Sem_Units+=$row->Units;
                 } 

                 $Cumm_Units=0;
             $sel_courses=DB::select("select Units from courses  
                    inner join departmentals on (departmentals.course_id=courses.id)
                    where student_id='".$student_id."'");
              foreach ($sel_courses as $row2) {
                 $Cumm_Units+=$row2->Units;
                 } 


                 if($semester=="First Semester"){
                     $sel_courses=DB::select("select Units from courses  
                    inner join departmentals on (departmentals.course_id=courses.id)
                    where student_id='".$student_id."' and departmentals.Semester='Second Semeste' and Sessions='$sessions'");
                     $next_Units=0;
              foreach ($sel_courses as $row4) {
                 $next_Units+=$row4->Units;
                 } 
                 $Prev_Units=$Cumm_Units-$Curr_Sem_Units-$next_Units;
                 $Cumm_Units=$Cumm_Units-$next_Units;

             }else{
                $Prev_Units=$Cumm_Units-$Curr_Sem_Units;

             }

                


               // echo  $Prev_Units;
               // exit;


                     $GP_This_Sem=0;
             $gps=DB::select("select * from results  
                    where student_id='".$student_id."' and Semester='$semester' and Sessions='$sessions'");
              foreach ($gps as $row3) {
                 $GP_This_Sem+=$row3->Grade_Point;
                 } 

                 $CGP=0;
             $cpgs=DB::select("select * from results  where student_id='".$student_id."'");
              foreach ($cpgs as $row4) {
                 $CGP+=$row4->Grade_Point;
                 } 
                 $GP_Last_Sem=$CGP-$GP_This_Sem;

                 $GPA_This_Sem1=$GP_This_Sem/$Curr_Sem_Units;
                  $GPA_This_Sem=bcdiv($GPA_This_Sem1, 1, 2);
                 $CGPA1=$CGP/$Cumm_Units;
                 $CGPA=bcdiv($CGPA1, 1, 2);

                   $Remarks=DB::select("select * from results 
                   inner join courses on(results.course_id=courses.id) where student_id='".$student_id."' and Grade='F' and Remark='Fail'");
              $count=count($Remarks);
              if($count>0){
                $Remark="To Repeat ";
                foreach ($Remarks as $row5) { 
                    if($Remark !=="To Repit "){
                        $Remark.', ';
                    }
                 $Remark.=$row5->Course_Code;
                 } 
             }else{
                $Remark='Pass';
             }
              





            $sel_grades=DB::select("select * from grades 
                    where student_id='".$student_id."' and Semester='$semester' and Sessions='$sessions'");
            $count=count($sel_grades);
            if($count>0){
                $updates=DB::update("update grades set 
                    
                    Prev_Units ='$Prev_Units  ',
                    Curr_Sem_Units='$Curr_Sem_Units ',
                    Cumm_Units='$Cumm_Units ',
                    GP_This_Sem='$GP_This_Sem ',
                    GP_Last_Sem='$GP_Last_Sem ', 
                    CGP='$CGP ',
                    GPA_This_Sem='$GPA_This_Sem ',
                    CGPA='$CGPA ',
                    Remark='$Remark '
                    where student_id='".$student_id."' 
                    and Semester='$semester'
                     and Sessions='$sessions' 

                    ");
            }else{
                $insert=DB::insert("insert into grades 
                    (student_id,Prev_Units,Curr_Sem_Units,Cumm_Units,
                    GP_This_Sem,GP_Last_Sem,CGP,GPA_This_Sem,CGPA,Remark,Semester, Sessions,Status)
                    values
                    ('$student_id','$Prev_Units','$Curr_Sem_Units','$Cumm_Units', 
                    '$GP_This_Sem','$GP_Last_Sem','$CGP','$GPA_This_Sem','$CGPA',
                    '$Remark','$semester', '$sessions','Not Ready')");

            }
   
     

    }
    return redirect()->back();
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
        //
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
         
    }

      public function getresultquery2(Request $request)
    {
         echo "dd";
    }
    public function getresultquery(Request $request)
    {
       
          $this->validate($request, [
            'session' => 'required',
            'Semester' => 'required',
            'category' => 'required'

        ]);
		  $categoryid="NDBS I(M)";
		 // $categoryid=$request->input('category');
	 
      
      $semester="First Semester";
      //$semester=$request->input('Semester');
     // $sessions=$request->input('session');
      $sessions="2016/2017";

      $queries=DB::select("select program_id from categories where id='$categoryid'");

      foreach ($queries as $row) {
           $pid=$row->program_id;
       } 
     // echo $pid;
 /*
        $queries2=DB::select("select * from departmentals
        inner join students on(departmentals.student_id=students.id)
         where program_id='$pid' ");
        $admnoT=0;
		*/
		
        $table='<table class="table table-striped table-bordered table-hover">
             <tr>
             <th>SN</th>
             <th>NAME</th>
             <th>AdmissionNo</th>
             <th>Courses</th>
             <th>Unit</th>
             <th>Grade</th>
             <th>Point</th>
             <th>GP</th>
             <th>P.U</th>
             <th>CSU </th>
             <th>C.U </th>
             <th>GPTS</th>
             <th>GPLS</th>
             <th>CGP </th>
             <th>GPA.TS</th>
             <th>CGPA </th>
             <th width="300">Remark </th>

             </tr>';
   $sn=0;
         foreach ($queries2 as $row2) {
            $sids=$row2->id;
            $admno=$row2->AdmissionNo;
            if($admno !==$admnoT){ 
                $sn+=1;
                $sel_course=DB::select("select * from departmentals 
                    inner join courses on (departmentals.course_id=courses.id)
                    where student_id='$sids' and departmentals.Semester='$semester' and Sessions='$sessions'");


                 $table.='<tr style="text-align:center; vertical-align:middle">
                         <td>'.$sn.'</td>
                         <td>'.$row2->fullname.'</td>
                         <td>'.$row2->AdmissionNo.'</td>
                         <td colspan="5" style="padding:0px;">
                         <div class="mtable">
                         <table class="  table-bordered table-hover">';
                         $Curr_Sem_Units=0;

                         foreach ($sel_course as $row3) {
                             $sel_results=DB::select("select * from results 
                    where student_id='".$row2->id."' and Semester='$semester' and Sessions='$sessions' and course_id='".$row3->course_id."'
                    ");
                            
                            $count=count($sel_results);
                            if($count>0){
                                foreach ($sel_results as $row4) {}
                                    $grade=$row4->Grade;
                                    $Point=$row4->Point;
                                    $Grade_Point=$row4->Grade_Point;

                            } else{
                                   $grade='';
                                    $Point='';
                                    $Grade_Point='';
                                
                            }

                           
                             $table.='<tr width="100%">
                             <td class="tdcc">'.$row3->Course_Code.'</td>
                             <td class="tdut">'.$row3->Units.'</td>
                             <td class="tdgt">'.$grade.'</td>
                             <td class="tdpt">'.$Point.'</td>
                             <td>'.$Grade_Point.'</td>

                                </tr>

                               
                                ';
                                $Curr_Sem_Units+=$row3->Units;

                         }

                             $sel_grades=DB::select("select * from grades 
                    where student_id='".$row2->id."' and Semester='$semester' and Sessions='$sessions'");
                             $count=count($sel_grades);
                             if($count>0){
                                 
                                    //$Curr_Sem_Units =0;
                                 foreach ($sel_grades as  $row6) {
                                    $Curr_Sem_Units=$row6->Curr_Sem_Units;
                                    $Cumm_Units=$row6->Cumm_Units;
                                     $GP_This_Sem=$row6->GP_This_Sem;
                                     $GP_Last_Sem =$row6->GP_Last_Sem;
                                     $CGP =$row6->CGP;
                                     $GPA_This_Sem=$row6->GPA_This_Sem;
                                     $CGPA=$row6->CGPA;
                                     $Prev_Units=$row6->Prev_Units;
                                     $Remark=$row6->Remark;
                                 }
                                    

                             }else{
                                 $Prev_Units=0;
                                  //  $Curr_Sem_Units =0;
                                     $Cumm_Units=0;
                                     $GP_This_Sem=0;
                                     $GP_Last_Sem =0;
                                     $CGP =0;
                                     $GPA_This_Sem=0;
                                     $CGPA=0;
                                     $Remark='';

                             }
           
                        $table.='</table ></div>
                        </td> 
                                <td>'.$Prev_Units.'</td>
                                <td>'.$Curr_Sem_Units.'</td>
                                <td>'.$Cumm_Units.'</td>
                                <td>'.$GP_This_Sem.'</td>
                                <td>'.$GP_Last_Sem.'</td>
                                <td>'.$CGP.'</td>
                                <td>'.$GPA_This_Sem.'</td>
                                <td>'.$CGPA.'</td>
                                <td>'.$Remark.'</td>
                                
                          
                      </tr>';

 
                $admnoT=$admno;

            }
          
       } 
 $table.='</table';

 echo $table;

    }
}
