@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                    <a   href="/Departments">Departments</a> / 
                    <a  href="/Department/Programs">Programs</a> / 
                    <a class="set_active" href="/Department/Program/Numbers">Numbers</a> 
					   
                    <a href=""></a> 
                        <hr />
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Admission Number Generation  
							 <a class="btn btn-success right-full" href="" data-toggle="modal" data-target="#numbers_modal" >Add Program</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                            	   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Program</th>
                                            <th>Category</th>  
										    <th> Number_Code</th>
										    <th> Admission</th>
										    <th> Session</th>
                                       
                                             <th>Action</th>                                         
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $sn=0;?>
                                        @foreach($ADNumbers as $row)
										<?php $sn+=1;?>
                                        <tr class="odd gradeX">
                                            <td><?php echo  $sn;?></td>
                                            <td>{{$row->Program_Code}}</td>
                                            <td>{{$row->Category}}</td>
                                            <td>{{$row->Number_Code}}</td>
                                            <td>{{$row->Admno}}</td>
                                            <td>{{$row->Sessions}}</td>
                                             <td width="130">
                                                
                                                <a href="/Department/Program/Numbers/{{$row->idnumber_id}}/edit" class="btn btn-primary">Edit</a>
                                                 <a href="" data-toggle="modal" data-target="#collegs_delete{{$row->idnumber_id}}" class="btn btn-danger">Delete</a>
                                                <!--start delete modal -->
                        
                         <div class="modal fade" id="collegs_delete{{$row->idnumber_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-success">
                                          
                                            <div class=""><strong>Delete Number</strong></div>
                                        </div>
                                         
                                        <div class="modal-body">
                                            <div class="alert alert-danger"><strong>Are You Sure You Want To Delete The Number For {{$row->Program_Code}}: <br>{{$row->Category}} </strong></div>
                                                 <div class = "modal-footer">
                                                    {!!Form::open(['action' => ['IdnumbersController@destroy',$row->idnumber_id],'method' => 'POST'])!!}
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
										@include('modals.numbers')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
 
   

 
                </div> 
                 
@endsection
