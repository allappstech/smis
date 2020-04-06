@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                     <h2>Department</h2>   
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
                             {!! Form::open(['action' => 'DepartmentsController@store', 'method'=>'POST']) !!}
                                         <div class="control-group">
                                            <label>College </label>
                                          <select id="college" class="form-control" name="college">                                         
                                              <option>...Collect.....</option>
                                              @foreach($colleges as $college)
                                              <option value="{{$college->college_id}}">{{$college->College}}</option>
                                              @endforeach
                                          </select>
                                      </div>

                                        <div class="control-group">
                                            <label>Department</label>
                                            {{Form::text('department','',['class' => 'form-control' ,'placeholder' => 'Enter Department'])}}
                                                                                    
                                      </div>
									     <div class="control-group">
                                            <label>Department ID</label>
                                            {{Form::text('departmentid','',['class' => 'form-control' ,'placeholder' => 'Enter Department ID'])}}
                                                                                    
                                      </div>

                                          
									   
                                          <div class = "modal-footer">
									     {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                                    	</div>						           
                                       {!! Form::close() !!}
                                   </div>
                               </div>
                        </div>
                    </div>
                </div>
 
   

 
                </div> 
                  
@endsection
