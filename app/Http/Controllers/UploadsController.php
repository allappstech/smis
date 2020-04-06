<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Session;
use Session;
use Excel;
use File;
use App\Category;
use App\Allocation;
use App\Upload;
use Charts;
use DB;
session_start();

class UploadsController extends Controller
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
	 
	  public function index($id)
    {
		
	}
    public function uploadsr($id)
    {
        // $chart =  Charts::create('bar','highcharts')
        // ->title("Result Dispaly")
      // ->labels(['A','B','C','D'])
      //   ->values([20,17,34,45]);
       //->setElementLabel("Total Studen");

       // $chart =Charts::create('bar', 'highcharts')
  //  ->title('My nice chart')
   // ->labels(['First', 'Second', 'Third'])
   // ->values([5,10,20])
    //->dimensions(1000,500)
    //->responsive(false);

                  //->title("Result")
               //   ->elementLabel("Total Users")
                 // ->dimensions(1000, 500)
                 // ->responsive(false);
                 // ->groupByMonth(date('Y'), true);

        // $course_allocate=Allocation::find($id);
		 $course_allocate=DB::select("select * from allocations
		 inner join programs on(programs.program_id=allocations.program_id)
		 ");
     return view('Staffs.results-uploads')->with('course_allocate',$course_allocate);
         // return view('Staffs.results-uploads')->with(compact(['chart',$chart],['course', $course]));
        // return view('chart',compact('chart'));

  //  echo $id;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd($request->session()->get('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'file'      => 'required',
            'code'      => 'required',
            'catid'      => 'required'
        ));
            $user=$request->input('code');
            $catid=$request->input('catid');
        
          if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
  
                $path = $request->file->getRealPath(); 
                $data = Excel::load($path, function($reader) {
                })->get();
                if(!empty($data) && $data->count()){
                      $insert = [];
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
     
$grade_A=0;
$grade_AB=0;
$grade_B=0;
$grade_BC=0;
$grade_C=0;
$grade_CD=0;
$grade_D=0;
$grade_E=0;
$grade_F=0;
$grade_ABS=0;
$Total_Student=0;

$sn=0;
        foreach ($data->toArray() as $rows) { // <-- $rows pertains to array of rows
            foreach($rows as $row) { // <-- $row pertains to the row itself
                $exam=$row['exam'];
                $Total_Student+=1;
                if(($exam=="")||($exam=="ABS")){
                      $exam="ABS";
                      $grade="ABS";
                      $remark= "Absent";
                      $total= "ABS";
                        $grade_ABS+=1;
                }else{
                $total=$row['ca'] + $exam;
                if($total>=75){
                    $grade="A";
                      $grade_A+=1;
                }else if($total>=70){
                    $grade="AB";
                      $grade_AB+=1;
                }else if($total>=65){
                    $grade="B";
                      $grade_B+=1;
                }else if($total>=60){
                    $grade="BC";
                      $grade_BC+=1;
                }else if($total>=55){
                    $grade="C";
                      $grade_C+=1;
                }else if($total>=50){
                    $grade="CD";
                      $grade_CD+=1;
                }else if($total>=45){
                    $grade="D";
                      $grade_D+=1;
                }else if($total>=40){
                    $grade="E";
                      $grade_E+=1;
                }else{
                    $grade="F";
                    $grade_F+=1;
                }
                if($total>=40){
                    $remark= "Pass";
                }else{
                    $remark= "Fail";
                }

            }
                $insert[] = [
                     
                    'AdmissionNo' => $row['admissionno'],
                     'Student_Name' => $row['name'],
                     'CA' => $row['ca'],
                     'Exams' => $exam,
                     'Total' => $total,
                     'Grade' => $grade,
                     'Remark' => $remark,
                     'allocation_id' => $catid,
                     'user_id' => $user
                    ];
					$sn+=1;


       
             $table.='<tr>
            <td>'.$sn.' </td>
            <td>'.$row['admissionno'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['ca'].'</td>
            <td>'.$exam.'</td>
            <td>'.$total.'</td>
            <td>'.$grade.'</td>
            <td>'.$remark.'</td>
        
         
            </tr>';
         
         
 
            }
        }
        $table.='<tr>
            <td colspan="8">RESULT SUMMARY</td>
                  
            </tr>';
            $p_pass=(($Total_Student-$grade_F-$grade_ABS)/$Total_Student)*100;
            $p_fail=(($grade_F)/$Total_Student)*100;
            $p_abs=(($grade_ABS)/$Total_Student)*100;
            $table.='<tr>
            <td colspan="8">
            Total Students='.$Total_Student.';  A= '.$grade_A.'; AB= '.$grade_AB.';  B= '.$grade_B.';  BC= '.$grade_BC.';  C= '.$grade_C.';  CD= '.$grade_CD.';  D= '.$grade_D.';  E= '.$grade_E.';  F= '.$grade_F.';  ABS= '.$grade_ABS.'<br> Students Pass '.$p_pass .'%; Students Fails '.$p_fail .'% studets Absent '.$p_abs .'%

            </td>
                  
            </tr>';

              
$table.='</table>
 '
;

        //return view('upload',['upload'=>$data]);
        //dd($insert[1][1]);
       // dd($cart);
// $chart =  Charts::create('bar','highcharts')
 //        ->title("Result Dispaly")
 //      ->labels(['A','B','C','D'])
   //      ->values([20,17,34,45]);
  //   return view('Staffs.results-uploads')->with(compact(['chart',$chart],['course', $course]));
   //Session(['data'=>$insert]);
 //dd($table);
 
   session(["data"=>$insert]);
   session()->save(); 
    
         echo $table;
 
         exit;
     
          return back();
                 /*
                     if(!empty($insert)){
 
                        $insertData = DB::table('results')->insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        }else {                        
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                    */
                }
 
                return back();
 
            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
         
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

     public function update_uploads()
    {
        /*
        $this->validate($request, array(
            'nca'      => 'required',
            'nexam'      => 'required',
            'total'      => 'required'
        ));

        */
          $nca= $_GET['nca'];
          $id=$_GET['ids'];
          $nexam= $_GET['nexam'];
          $total= $_GET['total'];
          $grade= "";
          $remark= "";
     if($total>=75){
                    $grade="A";
                 }else if($total>=70){
                    $grade="AB";
                }else if($total>=65){
                    $grade="B";
                }else if($total>=60){
                    $grade="BC";
                     }else if($total>=55){
                    $grade="C";
                     }else if($total>=50){
                    $grade="CD";
                     }else if($total>=45){
                    $grade="D";
                }else if($total>=40){
                    $grade="E";
                }else{
                    $grade="F";
                }
                if($total>=40){
                    $remark= "Pass";
                }else{
                    $remark= "Fail";
                }
/*
          \DB::table('uploads')->update([
        [
            'CA'    => $nca,
            'Exams' => $nexam,
            'Total' => $total,
            'Grade' => $grade,
            'Remark'=> $remark
        ]
])->where('id', $id);
          */
          DB::table('uploads')
          ->where ('upload_id',$id)
          ->update([
            'CA'=>$nca,
            'Exams'=>$nexam,
            'Total'=>$total,
            'Grade'=>$grade,
            'Remark'=>$remark
          ]);
       echo "Save Successfully";
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

    public function test()
    {
        $insert=session("data");
 //   dd($insert);
//exit;
         if(!empty($insert)){
 
                        $insertData = DB::table('uploads')->insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        }else {                        
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                   return redirect('Staff.courses');
      
    }
}
 