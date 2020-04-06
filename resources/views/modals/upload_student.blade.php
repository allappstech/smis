<div class="modal fade" id="studentupload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-warning">
                                          
                                            <div class=""><strong>Register Student</strong></div>
                                        </div>										 
                                        <div class="modal-body">
                                        {!! Form::open(['action' => 'StudentsController@store', 'method'=>'POST']) !!}
                                         <div class="control-group">
                                         	<label>Program</label>
                                         <select class="form-control" name="program" id="program">
                                         	<option value="">----Program----</option>
                                         	@foreach($programs as $program)
                                         	<option value="{{$program->program_id}}">{{$program->Program}}</option>
                                         	@endforeach
                                         </select>
									    </div>
									     <div class="control-group">
									     		<label>Category</label>
                                         <select class="form-control" name="cats" id="cats">
                                         	<option value="">----Category----</option>
                                         	<option value="Morning">Morning</option>
                                         	<option value="Evening">Evening</option>
                                         </select>
									    </div>

									      <div class="control-group">
                                         	{{Form::label('Name','Name')}}
									        {{Form::text('name','',['placeholder'=>'Enter Name ','class'=>'form-control'])}}
									    </div>

									    

									    <div class="control-group">
                                         	{{Form::label('Phonenumber','Phone Number')}}
									        {{Form::text('Phonenumber','',['placeholder'=>'Enter Phone Number ','class'=>'form-control'])}}
									    </div>

									    <div class="control-group">
                                         	{{Form::label('email','E-mail')}}
									        {{Form::text('email','',['placeholder'=>'Enter E-mail','class'=>'form-control'])}}
									    </div>

									     <div class="control-group">
									     		<label>Gender</label>
                                         <select class="form-control" name="gender" id="gender">
                                         	<option value="">----Gender----</option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                         </select>
									    </div>


									 <div class="control-group">
									     		<label>State</label>
                                         <select class="form-control" name="state" id="state">
                                         	<option value="">----State----</option>
                                         		@foreach($states as $state)
                                         	<option value="{{$state->id}}">{{$state->state}}</option>
                                         	@endforeach
                                         </select>
									    </div>
									     <div class="control-group">
									     		<label>LGA</label>
                                         <select class="form-control" name="lga" id="lga">
                                         	<option value="">----LGA ----</option>
                                         </select>
									    </div>
                                            <div class = "modal-footer">

									    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
									    {{Form::button('Close', ['class'=>'btn btn-default','data-dismiss'=> 'modal'])}} 
									</div>
									


                                      									           
                                       {!! Form::close() !!}

                                </div>
                            </div>



 