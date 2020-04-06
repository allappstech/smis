@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                     <a class="set_active" href="/College">College</a> /
                     <a href="/Departments">Departments</a> / 
                    <a href="/Department/Programs">Programs</a>  
                  
                        <hr />
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Colleges Table  <a class="btn btn-success right-full"  data-target="#collegs_modal" data-toggle="modal" href="">Add College</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                            	   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Colleges</th>
                                            <th>Course Code</th> 
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($colleges)>0)

                                        @foreach($colleges as $college)
                                       <tr class="odd gradeX">
                                            <td>{{$college->college_id}}</td>
                                            <td>{{$college->College}}</td>
                                            <td>{{$college->College_Code}}</td>
                                            <td width="130">
                                                
                                                <a href="/College/{{$college->college_id}}/edit" class="btn btn-primary">Edit</a>
                                                 <a href="" data-toggle="modal" data-target="#collegs_delete{{$college->college_id}}" class="btn btn-danger">Delete</a>
                                                <!--start delete modal -->
                        
                         <div class="modal fade" id="collegs_delete{{$college->college_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-success">
                                          
                                            <div class=""><strong>Delete Collage</strong></div>
                                        </div>
                                         
                                        <div class="modal-body">
                                            <div class="alert alert-danger"><strong>Are You Sure You Want To Delete The College: <br>{{$college->College}} </strong></div>
                                                 <div class = "modal-footer">
                                                    {!!Form::open(['action' => ['CollegesController@destroy',$college->College_id],'method' => 'POST'])!!}
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
