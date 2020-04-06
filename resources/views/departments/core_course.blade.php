@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                    <a href="/Departments">Departments</a> / 
                    <a  href="/Department/Courses">Courses</a> /
                    <a class="set_active" href="/Department/Core-Courses">Core Courses</a> /
										 <a href="/Department/Program/Numbers">Numbers</a> 

                    <a href=""></a> 
                        <hr />
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Colleges Table  <a class="btn btn-success right-full" href="/Department/add/core">add</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                            	   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Course Title</th>
                                            <th>Course Code</th>
                                            <th>Unit</th>
                                            <th>Program</th> 
                                            <th>Year</th> 
                                            <th>Semester</th> 
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($cores)>0)
											<?php $sn=0;?>

                                        @foreach($cores as $core)
										<?php $sn+=1;?>
                                       <tr class="odd gradeX">
                                            <td><?php echo $sn;?></td>
                                            <td>{{$core->Course_title}}</td>
                                            <td>{{$core->course_id}}</td>
                                            <td>{{$core->Units}}</td>
                                            <td>{{$core->Program_Code}}</td>
                                            <td>Year {{$core->Level}}</td>
                                            <td>{{$core->Semester}}</td>
                                            <td width="130">
                                                
                                                  <a href="" data-toggle="modal" data-target="#collegs_delete{{$core->core_course_id}}" class="btn btn-danger">Delete</a>
                                                <!--start delete modal -->
                        
                         <div class="modal fade" id="collegs_delete{{$core->core_course_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-success">
                                          
                                            <div class=""><strong>Delete Collage</strong></div>
                                        </div>
                                         
                                        <div class="modal-body">
                                            <div class="alert alert-danger"><strong>Are You Sure You Want To Drop This Course: <br>{{$core->course_id}} </strong></div>
                                                 <div class = "modal-footer">
                                                    {!!Form::open(['action' => ['CoreCoursesController@destroy',$core->core_course_id],'method' => 'POST'])!!}
                                                    {{Form::hidden('_method','DELETE')}}
                                                    {{Form::Submit('Yes',['class' => 'btn btn-danger'])}}
                                       {{Form::Submit('No',['class' => 'btn btn-warning','data-dismiss' => 'modal'])}}

                                                    {!!Form::close()!!}
                                                  
                                              
                                                   </div>
 

                                </div>
                            </div>
                        </div>
                    </div>
 <!--end delete modal -->


                                            </td>
                                      
                                        </tr>

                                        @endforeach
                                       
                                        @endif
                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
 
   

 
                </div> 
                  
@endsection
