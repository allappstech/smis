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
                            Update Department 
     <a class="btn btn-success right-full" href="/add_department">Add Department</a>
                        </div>
                        <div class="panel-body">
                        	<div class="row">
                        	<div class="col-md-3"></div>

                        	<div class="col-md-6">
                             {!! Form::open(['action' => ['DepartmentsController@update',$department->department_id], 'method'=>'POST']) !!}
                                         <div class="control-group">
                                         	{{Form::label('Department','Department')}}
									        {{Form::text('department',$department->Department,['placeholder'=>'Enter Department','class'=>'form-control'])}}
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
