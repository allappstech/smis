@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                     <h2>Colleges</h2>   
                        <h5>Welcome {{ Auth::user()->name }}. </h5>
                        <hr />
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Colleges   <a class="btn btn-success right-full"  data-target="#collegs_modal" data-toggle="modal" href="">Add College</a>
                        </div>
                        <div class="panel-body">
                        	<div class="row">
                        	<div class="col-md-3"></div>

                        	<div class="col-md-6">
                             {!! Form::open(['action' => ['CollegesController@update',$college->college_id], 'method'=>'POST']) !!}
                                         <div class="control-group">
                                         	{{Form::label('College Title','College Title')}}
									        {{Form::text('college_title',$college->College,['placeholder'=>'Enter Collage Title','class'=>'form-control'])}}
									    </div>
									       <div class="control-group">
                                         	{{Form::label('College Title','College Title')}}
									        {{Form::text('college_code', $college->College_Code,['placeholder'=>'Enter Collage Code','class'=>'form-control'])}}
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
