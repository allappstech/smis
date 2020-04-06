<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Program;
use DB;

class CategoriesController extends Controller
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
        $categories= Category::all();
        $programs= Program::all();		
		$categories=DB::select("select  * from categories
		inner join programs on(categories.program_id=programs.program_id)");		 
        return view('departments.categories')->with(compact(['categories',$categories],['programs', $programs]));
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
            'programcat' => 'required',
           'year' => 'required',
          'cat' => 'required',
        ]);
       // return 123;
        $program=Program::find($request->input('programcat'));
        $categorys=$program->Program_Code.' '.$request->input('year').'('.$request->input('cat').')';
       
       $category = new Category;
       $category->category_id=$categorys;
       $category->program_id=$request->input('programcat');
       $category->save();
        return redirect('/Department/Program/Category');
        // dd($category);
   // }
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
        //
    }
}
