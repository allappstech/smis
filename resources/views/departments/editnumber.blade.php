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
                            Update Students Details 
                         </div>
                        <div class="panel-body">
                        	<div class="row">
                        	<div class="col-md-3"></div>
@foreach($numbers as $number)
@endforeach
                        	<div class="col-md-6">
                             {!! Form::open(['action' => ['IdnumbersController@update',$number->idnumber_id], 'method'=>'POST']) !!}
                                         <div class="control-group">
                                         	{{Form::label('Admno  ','Number  ')}}
									        {{Form::text('Admno',$number->Admno ,['placeholder'=>'Enter Name','class'=>'form-control'])}}
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
