@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                     <a href="/Departments">Departments</a> / 
                    <a  href="/Department/Courses">Courses</a> /
                    
                    <a class="set_active" href="/Department/Allocation">Allocation</a> /
                  
                    <a href=""></a> 
                        <hr />
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Colleges Table  <a class="btn btn-success right-full" href="/Department/Allocation/newallocation">New Allocation</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                            	   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Course</th>
                                            <th>Class</th> 
                                            <th>Level</th> 
                                            <th>Semester</th> 
                                            <th>Session</th>   
                                            <th>Lecturer</th>   
                                           
                                            <th>Action</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($allocations)>0)

                                        @foreach($allocations as $allocation)
                                       <tr class="odd gradeX">
                                            <td>{{$allocation->allocation_id}}</td>
                                            <td>{{$allocation->course_id}}</td>
                                            <td>{{$allocation->Category}}</td>
                                            <td>Year {{$allocation->Level}}</td>
                                            <td>{{$allocation->Semester}}</td>
                                            <td>{{$allocation->Sessions}}</td>
                                            <td>{{$allocation->name}}</td>
                                         
                                             
                                           
                                            <td width="130">
                                                @if(count($uploads)>0)
                                             @foreach($uploads as $row)
											     @if($row->allocation_id==$allocation->allocation_id)
													 <a href="/Department/Allocation/view/{{$allocation->allocation_id}}">View</a>
												 @endif
                                                  @endforeach
                                                 @else
                                             
                                                <a href="/College/{{$allocation->allocation_id}}/edit" class="btn btn-primary">Edit</a>
                                                 <a href="" data-toggle="modal" data-target="#collegs_delete{{$allocation->allocation_id}}" class="btn btn-danger">Delete</a>
                                                <!--start delete modal -->
                        
                         <div class="modal fade" id="collegs_delete{{$allocation->allocation_id}}" tabindex="-1id" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-success">
                                          
                                            <div class=""><strong>Delete Collage</strong></div>
                                        </div>
                                         
                                        <div class="modal-body">
                                            <div class="alert alert-danger"><strong>Are You Sure You Want To Delete The College: <br>{{$allocation->allocation_id}} </strong></div>
                                                 <div class = "modal-footer">
                                                    {!!Form::open(['action' => ['CollegesController@destroy',$allocation->allocation_id],'method' => 'POST'])!!}
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
											
											 @endif 
												
											
                                  <!-- enf -->
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
