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
                           Course Allocation  
                         </div>
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">                               
                           {!! Form::open(['action' => 'AllocationsController@store', 'method'=>'POST']) !!}
                           	   
                                  <div class="form-group">
                                            <label>College </label>
                                          <select id="college" class="form-control" name="college">
                                            <option value="">...College.....</option>  
                                              @foreach($colleges as $college)
                                              <option value="{{$college->college_id}}">{{$college->College}}</option>
                                              @endforeach                                          
                                          </select>
                                      </div>


                                              <div class="form-group">
                                            <label>Department </label>
                                          <select id="department" class="form-control" name="department" id="department">
                                            <option value="">...departments.....</option>  
                                                                                      
                                          </select>
                                      </div>

                                       <div class="form-group">
                                            <label>Program </label>
                                          <select id="program" class="form-control" name="programs">
                                            <option value="">...Program.....</option>  
                                                                                    
                                          </select>
                                      </div>
									    <div class="form-group">
                                            <label>Category </label>
                                          <select id="Category" class="form-control" name="Category">
                                            <option value="">...Category.....</option>                                            
                                            <option value="Morning">Morning</option>                                            
                                            <option value="Evening">Evening</option>                                            
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
                                        

                                       
                                         <div class="form-group">
                                            <label>Staff </label>
                                          <select id="staff" class="form-control" name="staff">
                                            <option>...Staff.....</option>     
                                               @foreach($users as $user)
                                              <option value="{{$user->id}}">{{$user->name}}</option>
                                              @endforeach                                
                                          </select>
                                      </div>
                        
                                   <br>
                                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <div class="col-md-offset-4">
                              {{Form::submit('Submit', ['class' => 'btn btn-primary'])}} 
                            </div>
                        </div>                                 
                                                                            </div>                                 
                                      
                                   </div>
                               </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">



                </script>
 
   

 
                </div> 
                  
@endsection
