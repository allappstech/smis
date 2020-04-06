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
                           Add Core Courses 
                         </div>
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">       
                 {!! Form::open(['action' => 'CoreCoursesController@store', 'method'=>'POST']) !!}                        
                            	    <div class="form-group">
                                            <label>Program </label>
                                          <select id="programs" class="form-control" name="programs">
                                            <option value="">...Program.....</option>  
                                              @foreach($programs as $program)
                                              <option value="{{$program->program_id}}"> {{$program->Program_Code}}</option>
                                              @endforeach                                          
                                          </select>
                                      </div>

                                          <div class="form-group">
                                            <label>Department </label>
                                          <select id="department" class="form-control" name="department">
                                            <option value="">...departments.....</option>  
                                              @foreach($departments as $department)
                                              <option value="{{$department->department_id}}">{{$department->Department}}</option>
                                              @endforeach                                          
                                          </select>
                                      </div>

                                       <div class="form-group">
                                            <label>Year </label>
                                          <select id="year" class="form-control" name="year">
                                            <option value="">...Year.....</option>                                            
                                            <option value="I">Year I</option>                                            
                                            <option value="II">Year II</option>                                            
                                          </select>
                                      </div>
                                   
                                        

                                          <div class="form-group">
                                            <label>Semester </label>
                                          <select id="semesters" class="form-control" name="semesters">
                                            <option value="">...Semester.....</option>                                            
                                            <option value="First Semester">First Semester</option>                                            
                                            <option value="Second Semester">Second Semester</option>                                            
                                          </select>
                                      </div> 
                                         <div class="form-group">
                                            <label>Course </label>
                                          <select id="course" class="form-control" name="course">
                                            <option>...Course.....</option>                                           
                                          </select>
                                      </div>
                                   
                        
                                   <br>
                                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <div class="col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>                                 
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
