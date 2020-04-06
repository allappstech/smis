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
@foreach($student as $student)
@endforeach
                        	<div class="col-md-6">
                             {!! Form::open(['action' => ['StudentsController@update',$student->student_id], 'method'=>'POST']) !!}
                                         <div class="control-group">
                                         	{{Form::label('fullname','fullname')}}
									        {{Form::text('name',$student->fullname,['placeholder'=>'Enter Name','class'=>'form-control'])}}
									    </div>
										  <div class="control-group">
                                         	<label>Program</label>
                                         <select class="form-control" name="program" id="program"> 
											
											<option value="{{$student->program_id}}">{{$student->Program_Code}}</option>
                                         	@foreach($programs as $program)
                                         	<option value="{{$program->program_id}}">{{$program->Program_Code}}</option>
                                         	@endforeach
                                         </select>
									    </div>
									     <div class="control-group">
									     		<label>Category</label>
                                         <select class="form-control" name="cats" id="cats">
                                         	<option value="{{$student->Category}}">{{$student->Category}}</option>
                                         	<option value="Morning">Morning</option>
                                         	<option value="Evening">Evening</option>
                                         </select>
									    </div>
										
										

									       <div class="control-group">
                                         	{{Form::label('AdmissionNo','AdmissionNo')}}
									        {{Form::text('AdmissionNo',$student->student_id,['placeholder'=>'Enter AdmissionNo ','class'=>'form-control'])}}
									    </div>

									    <div class="control-group">
                                         	{{Form::label('Phonenumber','Phone Number')}}
									        {{Form::text('Phonenumber',$student->phoneNo,['placeholder'=>'Enter Phone Number ','class'=>'form-control'])}}
									    </div>

									    <div class="control-group">
                                         	{{Form::label('email','E-mail')}}
									        {{Form::text('email',$student->email,['placeholder'=>'Enter E-mail','class'=>'form-control'])}}
									    </div>
									 
									 
									 <div class="control-group">
									     		<label>Gender</label>
                                         <select class="form-control" name="gender" id="gender">
                                       <option value="{{$student->gender}}">{{$student->gender}}</option>

                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                         </select>
									    </div>


									 <div class="control-group">
									     		<label>State</label>
                                         <select class="form-control" name="state" id="state">
                                   <option value="{{$student->state}}">{{$student->state}}</option>

                                         		@foreach($states as $state)
                                         	<option value="{{$state->state_id}}">{{$state->state}}</option>
                                         	@endforeach
                                         </select>
									    </div>
									     <div class="control-group">
									     		<label>LGA</label>
                                         <select class="form-control" name="lga" id="lga">
                            <option value="{{$student->lga_id}}">{{$student->lga}}</option>

                                         </select>
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
