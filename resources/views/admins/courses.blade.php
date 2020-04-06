@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                       <a href="/Departments">Departments</a> / 
                    <a class="set_active" href="/Department/Courses">Courses</a> /
                    <a href="/Department/Core-Courses">Core Courses</a> /
                   
                    <a  href="/Department/Allocation">Allocation</a> /
                  
                    <a href=""></a> 
                        <hr />
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Courses Table 
     <a class="btn btn-success right-full" href="/Department/Courses/add_courses">Add Course</a>

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                            	   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Course Title</th>
                                            <th>Course Code</th>
                                            <th>Units</th>                                           
                                            <th>Department</th> 
                                            <th>Semester</th>
                                             <th>Level</th> 
                                             <th>Action</th>
                                               
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $sn=0?>
                                        @foreach($courses as $course)
										<?php $sn+=1?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $sn;?></td> 
											
                                            <td>{{$course->Course_title}}</td>
                                         <td>{{$course->course_id}}</td>
                                            <td >{{$course->Units}}</td>
                                            <td >{{$course->Department}}</td>
                                            <td >{{$course->Semester}}</td>
                                            <td > Year {{$course->Level}}</td>
                                             <td width="130">
                                                
                                                <a href="/Department/Courses/{{$course->course_id}}/edit" class="btn btn-primary">Edit</a>
                                                 <a href="" data-toggle="modal" data-target="#course_delete{{$course->course_id}}" class="btn btn-danger">Delete</a>
                                                <!--start delete modal -->
                        
                         <div class="modal fade" id="course_delete{{$course->course_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-success">
                                          
                                            <div class=""><strong>Delete Collage</strong></div>
                                        </div>
                                         
                                        <div class="modal-body">
                                            <div class="alert alert-danger"><strong>Are You Sure You Want To Delete This Course: <br>{{$course->course_id}} </strong></div>
                                                 <div class = "modal-footer">
                                                    {!!Form::open(['action' => ['CoursesController@destroy',$course->course_id],'method' => 'POST'])!!}
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
 
   

 
                </div> 
                 
@endsection
