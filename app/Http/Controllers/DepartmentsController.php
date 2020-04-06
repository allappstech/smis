<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
 use DB;
 use App\Upload;

class DepartmentsController extends Controller
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
        
          $departments=Department::all(); 
		  $departments= DB::select("select * from departments
          inner join colleges on(departments.college_id=colleges.college_id)");

         return view('admins.department', compact('departments')); 
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
            'departmentid' => 'required',
        ]);
        //return 123;
		$did=$request->input('college').$request->input('departmentid');
         $department = new Department;
         $department->department_id=$did;
         $department->Department=$request->input('department');
         $department->college_id=$request->input('college');
         $department->save();
         return redirect('/Departments');
        //return ($request->input('department'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $department=Department::find($id);
      
          return view('admins.editDepartment')->with('department', $department);
              //  print_r($department);
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
            'department' => 'required',
        ]);
       
        $department=Department::find($id);
        $department->Department=$request->input('department');
        $department->save();
       return redirect('/Departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $department=Department::find($id);
       $department->delete();
      return redirect('/Departments');
    }

        public function getview($id){
         $views=Upload::where('allocation_id','=',1);
         $views= DB::select("select * from uploads where allocation_id='$id' order by AdmissionNo ASC");
          // $views=Upload::all();
          return view('departments.view-upload')->with('views', $views);
         //  echo $views->CA;
        //echo $id;
    }
}
