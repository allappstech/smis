<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\College;

class CollegesController extends Controller
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
       $colleges=College::all();
       return view('admins.college')->with('colleges', $colleges);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            'college_title' => 'required',
            'college_code' => 'required',
        ]);
        //return 123;
        $college = new College;
        $college->College=$request->input('college_title');
        $college->College_Code=$request->input('college_code');
        $college->save();
        return redirect('/College');
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
          //$colleges=College::all();
         $college=College::find($id);
          return view('admins.editCollege')->with('college', $college);
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
            'college_title' => 'required',
            'college_code' => 'required',
        ]);
        //return 123;
        $college=College::find($id);
        $college->College=$request->input('college_title');
        $college->College_Code=$request->input('college_code');
        $college->save();
        return redirect('/College');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $college=College::find($id);
       $college->delete();
       return redirect('/College');
    }
}
