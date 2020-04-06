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
                            Add Courses   <a class="btn btn-success right-full"  data-target="#collegs_modal" data-toggle="modal" href="">Add College</a>
                        </div>
                        <div class="panel-body">
                        	<div class="row">
                        	<div class="col-md-3"></div>


                        	<div class="col-md-6">
                             {!! Form::open(['action' => 'CoursesController@store', 'method'=>'POST']) !!}
                                         <div class="control-group">
                                            <label>Department </label>
                                          <select id="department" class="form-control" name="department">
                                           
                                              @foreach($colleges as $college)
                                              <option value="{{$college->department_id}}">{{$college->Department}}</option>
                                              @endforeach


                                          </select>

                                      </div>

                                        

                                     
 

                                        <div class="control-group">
                                            <label>Course Title</label>
                                            {{Form::text('course_title','',['class' => 'form-control' ,'placeholder' => 'Enter Course Title'])}}
                                                                                    
                                      </div>
                                        <div class="control-group">
                                            <label>Course Code</label>
                                            {{Form::text('course_code','',['class' => 'form-control' ,'placeholder' => 'Enter Course Code'])}}
                                                                                    
                                      </div>

                                        <div class="control-group">
                                            <label>Course Unit</label>
                                            {{Form::text('course_unit','',['class' => 'form-control' ,'placeholder' => 'Enter Course Unit'])}}
                                                                                    
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
									  <div class="control-group">
                                            <label>Level </label>
                                          <select id="level" class="form-control" name="level">
                                          	<option value="">...Level.....</option>
                                          	<option value="I">Year I</option>
                                          	<option value="II">Year II</option>
                                              
                                          </select>
                                      </div>

                                          <div class="control-group">
                                            <label>College </label>
                                          <select id="semester" class="form-control" name="semester">
                                          	<option value="">...semester.....</option>
                                          	<option value="First Semester">First Semester</option>
                                          	<option value="Second Semeste">Second Semeste</option>
                                              
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
