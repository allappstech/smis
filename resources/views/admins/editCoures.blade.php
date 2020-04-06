@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                      
                        <hr />
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Course 
     <a class="btn btn-success right-full" href="/add_department">Add Course</a>
                        </div>
                        <div class="panel-body">
                        	<div class="row">
                        	<div class="col-md-3"></div>

                        	<div class="col-md-6">
                             {!! Form::open(['action' => ['CoursesController@update',$courses->id], 'method'=>'POST']) !!}
                                         <div class="control-group">
                                         	{{Form::label('Course_title','Course Title')}}
									        {{Form::text('Course_title',$courses->Course_title ,['placeholder'=>'Enter Course Title ','class'=>'form-control'])}}
									    </div>
										
										<div class="control-group">
                                         	{{Form::label('Course_Code','Course Code')}}
									        {{Form::text('Course_Code',$courses->Course_Code ,['placeholder'=>'Enter Course Code ','class'=>'form-control'])}}
									    </div>
									  


                                            <div class = "modal-footer">
                                            	{{Form::hidden('_method', 'PUT')}}

									    {{Form::submit('Update', ['class'=>'btn btn-warning'])}}
 									</div>
                                      									           
                                       {!! Form::close() !!}
                                   </div>
                               </div>
                        </div>
                    </div>
                </div>
 
   

 
                </div> 
                  
@endsection
