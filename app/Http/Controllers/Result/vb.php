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
                     <h2>Staff Cources</h2>   
                        <h5>Welcome  {{ Auth::user()->name }}. </h5>
                        <hr />
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Course Allocated <span class="full-right">
                                @if((Auth::user()->Account )=='Admin')
                                 @foreach($views as $view)
                                 @endforeach
                            <a class="btn btn-warning right-full" href="/exportExcel/{{$view->allocation_id}}">Download</a>
                            <a class="btn btn-warning right-full" data-toggle="modal" data-target="#collegs_delete{{$view->allocation_id}}" href="">Approve</a>

                                  <div class="modal fade" id="collegs_delete{{$view->allocation_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-success">
                                          
                                            <div class=""><strong>Pulish Result</strong></div>
                                        </div>
                                         
                                        <div class="modal-body">
                                            <div class="alert alert-danger"><strong>Are You Sure You Want To Pulish This Result </strong></div>
                                                 <div class = "modal-footer">
   
                                                    <a href="/Department/publishup/{{$view->allocation_id}}" class="btn btn-success">Yes</a>
                                                    <a href="" class="btn btn-warning" data-dismiss="modal">No</a>
                                                  
                                              
                                                   </div>
 

                                </div>
                            </div>
                        </div>
                    </div>

                                @endif
 
                             </span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

             <table class="table table-striped table-bordered table-hover"  id="dataTables-example">
                                    <thead>
                                           <tr>
            <th>SN</th>
            <th>AdmissionNo</th>
            <th>Full name</th>
            <th>CA</th>
            <th>Exam</th>
            <th>Total</th>
            <th>Grade</th>
            <th>Remark</th>
            <th width="150">Allocation</th>
                  
            </tr>
                                    </thead>
                                    <tbody>
                                       
                                

                                    </tbody>
                                </table>
                                <a href="/exportExcel/{{$view->id}}">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
 
    <script>
     
    </script>

 
                </div> 
                 
@endsection
