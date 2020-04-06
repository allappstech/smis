 @extends('layouts.app')

@section('content')
    <div class="row">
        <style type="text/css">
            .inp{
                width: 80px !important;
            }
            .btn-custom{
                padding: 7px 14px 7px 14px;
                border-radius: 5px;
                color:#090;
                background-color: transparent;
                border:1px solid #f90;
            }
            .btn-custom:hover{
                 color:#f90;
                 background-color: #fff;
                 border:1px solid #090;
            }
        </style>
                    <div class="col-md-12">
                      
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Result <span class="full-right">
                                
           {!! Form::open(['action' => 'Result\ResultsController@getresultquery', 'method'=>'POST','id'=>'fgetreport']) !!}
           <input type="hidden" name="_token" value="{{csrf_token()}}">

                             	<div class="row">
                            		<div class="col-md-1 right-full">
                            			<button  type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> </button>
                            		</div>
                            		
									<div class="col-md-2 right-full">
                            			<select class="form-control" name="session" id="session">
                            				<option value="">----Session------</option>
                   <option value="2019/2020">2019/2020</option>
                   <option value="2018/2019">2018/2019</option>
                            				<option value="2017/2018">2017/2018</option>
                            				<option value="2016/2017">2016/2017</option>
                            				<option value="2015/2016">2015/2016</option>
                            				<option value="2014/2015">2014/2015</option>
                            			</select>
                            		</div>
                            		<div class="col-md-2 right-full">
                            			<select class="form-control" name="Semester" id="Semester">
                            				<option value="">----Semester------</option>
                            				<option value="First Semester">First Semester</option>
                            				<option value="Second Semester">Second Semester</option>
                            			</select>
                            		</div>
									<div class="col-md-2 right-full">
                            			<select class="form-control" name="category" id="category">
                            				<option value="">----Category------</option>
                            				<option value="Morning">Morning</option>
                            				<option value="Evening">Evening </option>
                            			</select>
                            		</div>
									<div class="col-md-2 right-full">
									 <select class="form-control" name="level" id="level">
											 <option value="">Level</option>
											 <option value="I">Year I</option>
											 <option value="II">Year II</option>
											 <option value="SO">Spit Over</option>  
											 </select>
									</div>
                            		<div class="col-md-2 right-full">
                            			<select class="form-control" name="program" id="program">
                            				<option value="">----Program------</option>
                            				@foreach($progams as $program)
											@if((Auth::user()->Account )=='HOD')
												@if((Auth::user()->department_id )==$program->department_id)
                            				<option value="{{$program->program_id}}">{{$program->Program_Code}}</option>
												@endif
												@else
											<option value="{{$program->program_id}}">{{$program->Program_Code}}</option>
	 
												@endif
                            				@endforeach
                            			</select>
										
                            		</div>
									 
									
                            	</div>
                         {!! Form::close() !!}

                                  <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-success">
                                          
                                            <div class=""><strong>Pulish Result</strong></div>
                                        </div>
                                         
                                        <div class="modal-body">
                                            <div class="alert alert-danger"><strong>Are You Sure You Want To Pulish This Result </strong></div>
                                                 <div class = "modal-footer">
   
                                                    <a href="" class="btn btn-success">Yes</a>
                                                    <a href="" class="btn btn-warning" data-dismiss="modal">No</a>
                                                  
                                              
                                                   </div>
 

                                </div>
                            </div>
                        </div>
                    </div>

                              
 
                             </span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive" id="reports">

             
                                
                            </div>
                        </div>
                    </div>
                </div>
 
    <script>
     
    </script>

 
                </div> 
                 
@endsection
