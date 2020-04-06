@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">                  
                        <a href="/Department/Students/2"> NDCS</a>/ <a href="/Department/Students/1">HNDC</a>
                     <hr />
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                     Student Table
					 <a class="btn btn-success right-full"  href="/Students/Upload">Upload Student</a>
					 <a class="btn btn-success right-full" data-target="#student" data-toggle="modal" href="">New Student</a>
                        </div>
                        <div class="panel-body">

                           <div class="table-responsive">
                            <div class="alert alert-success">
                                Personal Details
                            </div>
                                 <table class="table table-striped table-bordered table-hover">
                                     @foreach($students as $student)
                                     @endforeach
                                        
                                     <tr class="ctr">
                                         <td>Admission No</td>
                                         <td>{{$student->student_id}}</td>
                                     </tr>
                                      <tr>
                                         <td>Full Name </td>
                                         <td>{{$student->fullname}}</td>
                                     </tr>
                                      <tr>
                                         <td>Department</td>
                                         <td>{{$student->Department}}</td>
                                     </tr>

                                      <tr>
                                         <td>Programme</td>
                                         <td>{{$student->Program_Code}}</td>
                                     </tr>
                                      <tr>
                                         <td>Gender</td>
                                         <td>{{$student->gender}}</td>
                                     </tr>
                                      <tr>
                                         <td>Email</td>
                                         <td>{{$student->email}}</td>
                                     </tr>
                                      <tr>
                                         <td>Phone Number</td>
                                         <td>{{$student->phoneNo}}</td>
                                     </tr>
                                      <tr>
                                         <td>state</td>
                                         <td>{{$student->state}}</td>
                                     </tr>
                                      <tr>
                                         <td>LGA</td>
                                         <td>{{$student->lga}}</td>
                                     </tr>
                                      <tr>
                                         <td>Session</td>
                                         <td>{{$student->Session}}</td>
                                     </tr>
                                      <tr>
                                         <td>Status</td>
                                         <td>{{$student->current_status}}</td>
                                     </tr>
                                 </table>

                                      <div class="alert alert-success">
                                Courses Registered
                            </div>




                            </div>
                            <div class="table-responsive">

                            	   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                         <th>AdmNo</th>
                                            <th>Name</th>
											<th>Program</th> 
                                               
                                            <th>Gender</th> 
                                            <th>E-mail</th> 
                                            <th>Phone</th>   
                                            <th>State</th>   
                                            <th>LGA</th>   
                                            <th>Session</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $sn=0;?>
                                        @foreach($students as $student)
                                        <tr>
										<?php $sn+=1;?>
                                            <td><?php echo $sn;?></td>
                                           <td>{{$student->student_id}}</td> 
										   <td>{{$student->fullname}}</td>
                                            <td>{{$student->Program_Code}}</td> 
                                            
                                            <td>{{$student->gender}}</td> 
                                            <td>{{$student->email}}</td> 
                                            <td>{{$student->phoneNo}} </td>   
                                            <td>{{$student->state}}</td>   
                                            <td>{{$student->lga}}</td>   
                                            <td>{{$student->Session}}</td>
                                            <td>{{$student->current_status}}</td>
                                               <td width="150">
                                                
                                              
                                                    
                                             
                                                <a href="/Department/Students/{{$student->student_id}}/edit" title="Edit" class="btn-cut1">
												<span class="glyphicon glyphicon-pencil"></span>
												</a>
                                              

                                                   <a class="btn-cut" title="View Record" 
                                                   href="/Department/Students/{{$student->student_id}}">
                                                 <span class="glyphicon glyphicon-list-alt"></span>
                                                 </a>

                                                    <a class="btn-cut2" title="Delete" href="" data-toggle="modal" data-target="#collegs_delete{{$student->student_id}}">
                                                 <span class="glyphicon glyphicon-trash"></span>
                                                 </a>
                                                <!--start delete modal -->
                        
                         <div class="modal fade" id="collegs_delete{{$student->student_id}}" tabindex="-1id" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-success">
                                          
                                            <div class=""><strong>Delete Collage</strong></div>
                                        </div>
                                         
                                        <div class="modal-body">
                                            <div class="alert alert-danger"><strong>Are You Sure You Want To Delete This Record: <br>{{$student->student_id}} </strong></div>
                                                 <div class = "modal-footer">
                                                    {!!Form::open(['action' => ['CollegesController@destroy',$student->student_id],'method' => 'POST'])!!}
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
 
    @include('modals.student_modal')


 
                </div> 
                      @include('modals.upload_student')
@endsection
