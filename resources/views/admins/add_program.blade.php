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
                            Add Program   <a class="btn btn-success right-full"  data-target="#collegs_modal" data-toggle="modal" href="">Add College</a>
                        </div>
                        <div class="panel-body">
                        	<div class="row">
                        	<div class="col-md-3"></div>


                        	<div class="col-md-6">
                             {!! Form::open(['action' => 'ProgramsController@store', 'method'=>'POST']) !!}
                                         <div class="control-group">
                                            <label>College </label>
                                          <select required id="college" class="form-control" name="college">
                                          	<option value="">...Collect.....</option>
                                              @foreach($colleges as $college)
                                              <option value="{{$college->college_id}}">{{$college->College}}</option>
                                              @endforeach
                                          </select>
                                      </div>

                                          <div class="control-group">
                                            <label>Department </label>
                                          <select required id="department" class="form-control" name="department">
                                          	<option value="">...Department.....</option>
                                              
                                          </select>
                                      </div>

                                        <div class="control-group">
                                            <label>Program</label>
                                            {{Form::text('program','',['class' => 'form-control' ,'placeholder' => 'Enter Program', 'required'=>'required'])}}
                                                                                    
                                      </div>

                                        <div class="control-group">
                                            <label>Program Code</label>
                                            {{Form::text('program_code','',['class' => 'form-control' ,'placeholder' => 'Enter Program Code', 'required'=>'required'])}}
                                                                                    
                                      </div>
									  <div class="control-group">
                                            <label>Program ID</label>
                                            {{Form::text('program_no','',['class' => 'form-control' ,'placeholder' => 'Enter Program Number', 'required'=>'required'])}}
                                                                                    
                                      </div>
									             <div class="control-group">
										       <label>Class </label>
                                          <select id="level" class="form-control" name="class_cat">
                                          	<option value="">...Class.....</option>
                                          	<option value="OND">OND</option>
                                          	<option value="HND">HND</option> 
                                          	<option value="CT">CT</option>
                                              
                                          </select>
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
