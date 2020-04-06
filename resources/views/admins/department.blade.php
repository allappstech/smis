@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                    <a  class="set_active" href="/Departments">Departments</a> / 
                    <a href="/Department/Programs">Programs</a> / 
					 <a href="/Department/Program/Numbers">Numbers</a> 
                    <a href=""></a> 
                    <hr/>
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Department Table
     <a class="btn btn-success right-full" href="/add_department">Add Department</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                            	   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Department</th>
                                            <th>College</th> 
                                            <th>Action</th>
                                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($departments)>0)
                                        @foreach($departments as $department)
                                        <tr class="odd gradeX">
                                            <td>{{$department->department_id}}</td>
                                            <td>{{$department->Department}}</td>
                                            <td>{{$department->College}}</td>
                                             <td width="130">
                                                
                                                <a href="/Departments/{{$department->department_id}}/edit" class="btn btn-primary">Edit</a>
                                                 <a href="" data-toggle="modal" data-target="#collegs_delete{{$department->department_id}}" class="btn btn-danger">Delete</a>
                                                <!--start delete modal -->
                        
                         <div class="modal fade" id="collegs_delete{{$department->department_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-success">
                                          
                                            <div class=""><strong>Delete Collage</strong></div>
                                        </div>
                                         
                                        <div class="modal-body">
                                            <div class="alert alert-danger"><strong>Are You Sure You Want To Delete This Department: <br>{{$department->Department}} </strong></div>
                                                 <div class = "modal-footer">
                                                    {!!Form::open(['action' => ['DepartmentsController@destroy',$department->department_id],'method' => 'POST'])!!}
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
                  @include('modals.department_modal')
@endsection
