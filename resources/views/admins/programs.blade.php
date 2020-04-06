@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                    <a   href="/Departments">Departments</a> / 
                    <a class="set_active" href="/Department/Programs">Programs</a> /
                    
                    <a href="/Department/Program/Numbers">Numbers</a> 
					   
                    <a href=""></a> 
                        <hr />
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Programme Table   <a class="btn btn-success right-full" href="/add_program">Add Program</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                            	   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Program</th>
                                            <th>Program Code</th>
                                            <th>Department</th>  
                                             <th>Action</th>                                         
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($programs as $program)
                                        <tr class="odd gradeX">
                                            <td>{{$program->program_id}}</td>
                                            <td>{{$program->Program}}</td>
                                            <td>{{$program->Program_Code}}</td>
                                            <td>{{$program->Department}}</td>
                                             <td width="130">
                                                
                                                <a href="/Department/Programs/{{$program->program_id}}/edit" class="btn btn-primary">Edit</a>
                                                 <a href="" data-toggle="modal" data-target="#collegs_delete{{$program->program_id}}" class="btn btn-danger">Delete</a>
                                                <!--start delete modal -->
                        
                         <div class="modal fade" id="collegs_delete{{$program->program_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-success">
                                          
                                            <div class=""><strong>Delete Program</strong></div>
                                        </div>
                                         
                                        <div class="modal-body">
                                            <div class="alert alert-danger"><strong>Are You Sure You Want To Delete The program: <br>{{$program->Program}} </strong></div>
                                                 <div class = "modal-footer">
                                                    {!!Form::open(['action' => ['ProgramsController@destroy',$program->program_id],'method' => 'POST'])!!}
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
