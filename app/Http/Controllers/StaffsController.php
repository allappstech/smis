<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Allocation;
use App\Upload;
use DB;
class StaffsController extends Controller
{

       public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mycourses=Allocation::all();
       $user_id=auth()->user()->id;
         

        // $mycourses=Allocation::find($user_id);
         $mycourses= DB::select("select * from allocations 
             inner join courses ON(allocations.course_id=courses.course_id)  
             ");
			 $allocation_id=0;
			 foreach($mycourses as $row){
				   $allocation_id= $row->allocation_id;

			 }
	 
				

                 $uploads= DB::select("select  DISTINCT allocation_id from uploads where allocation_id='$allocation_id'");
 
			 // echo $allocation_id;
			// exit;
			 //$mycourses = Allocation::where('user_id', $user_id);
         //$mycourses = Allocation::where('user_id', $user_id);
		        return view('Staffs.mycources')->with(compact(['mycourses', $mycourses],['uploads', $uploads]));

        //return view('Staffs.mycources', compact(['mycourses'],['$upload']));
       ///return view('Staffs.mycources')->with('mycourses', $mycourses);
        //dd($mycourses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Staffs.results-uploads');
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
         $views=Upload::find($id);
         return view('Staffs.view')->with('views', $views);
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

    public function getview($id){
         // $views=Upload::where('allocation_id','=',1);
         $views= DB::select("select * from uploads where allocation_id='$id'");
          // $views=Upload::all();
          return view('Staffs.view')->with('views', $views);
         //  echo $views->CA;
        //echo $id;
    }

    public function exportExcel($id){
        //$departments = Department::select("departments.*", "colleges.*")
        //         ->join("colleges", "colleges.Colleges_id", "=", "departments.Colleges_id")
          //       ->get();

    //  $view= DB::select("select * from uploads where allocation_id='$id'");
      $view= DB::select("select * from uploads 
        inner join allocations ON(allocations.allocation_id=uploads.allocation_id) 
        inner join courses ON(allocations.course_id=courses.course_id)   
        where allocations.allocation_id='$id' order by AdmissionNo ASC");


     // ->inner join('allocations','allocation.id','=','uploads.allocation_id')
     // ->where ('allocation_id',$id);
   foreach($view as $row){

   }
$file="results-";
$file.=$row->Sessions.".xls";
$test='<table border="1">
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

            $sn=0; 
           foreach($view as $row){
            $sn+=1;
           $test.='<tr class="odd gradeX">
        <td>'. $sn.'</td>
          <td>'.$row->AdmissionNo.'</td>
        <td>'.$row->Student_Name.'</td>
         <td>'.$row->CA.'</td>
     <td>'.$row->Exams.'</td>
        <td>'.$row->Total.'</td>
      <td>'.$row->Grade.'</td>
     <td>'.$row->Remark.'</td>
                                             
  </tr>';
    }
 
$test.='</table>';
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
echo $test;
 
    }
}
