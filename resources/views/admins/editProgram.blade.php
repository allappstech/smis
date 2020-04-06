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
                            Update Colleges  
                         </div>
                        <div class="panel-body">
                        	<div class="row">
                        	<div class="col-md-3"></div>

                                   
                        	<div class="col-md-6">
                    
                             {!! Form::open(['action' => ['ProgramsController@update',$program->program_id], 'method'=>'POST']) !!}
                                       
									   <div class="control-group">
                                            <label>College </label>
                                          <select id="college" class="form-control" name="college">
                                          	<option value="{{$college->college_id}}">{{$college->College}}</option>
                                              @foreach($colleges as $college)
                                              <option value="{{$college->college_id}}">{{$college->College}}</option>
                                              @endforeach
                                          </select>
                                      </div>

                                          <div class="control-group">
                                            <label>College </label>
                                          <select id="department" class="form-control" name="department">
                                          	<option value="{{$department->department_id}}">{{$department->Department}}</option>
                                              
                                          </select>
                                      </div>
									  

                                        <div class="control-group">
                                            <label>Program</label>
                                            {{Form::text('program',$program->Program,['class' => 'form-control' ,'placeholder' => 'Enter Program'])}}
                                                                                    
                                      </div>

                                        <div class="control-group">
                                            <label>Program Code</label>
                                            {{Form::text('program_code',$program->Program_Code,['class' => 'form-control' ,'placeholder' => 'Enter Program Code'])}}
                                                       {{Form::hidden('_method', 'PUT')}}                             
                                      </div>
                                          <div class = "modal-footer">
									     {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                                    	</div>						           
									                                      	</div>						           
                                       {!! Form::close() !!}
                                   </div>
                               </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">



                </script>
 
   

 
                </div> 
                  
@endsection
