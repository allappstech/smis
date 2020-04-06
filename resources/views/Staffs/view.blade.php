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
                  
                         
                        <hr />
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Result Uploaded
							 

							 <span class="full-right">
                                @if((Auth::user()->Account )=='Admin')
                                 @foreach($views as $view)
                                 @endforeach
                            <a class="btn btn-warning right-full" href="/exportExcel/{{$view->allocation_id}}">Download</a>
                           
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
           
                  
            </tr>
                                    </thead>
                                    <tbody>
                                       
                                            <?php $sn=0;?>
                                            @foreach($views as $view)
                                            <form action="" method="get">
                                               <tr class="odd gradeX">
                                            <td><?php $sn+=1; echo $sn;?></td>
                                            <td>{{$view->AdmissionNo}}</td>
                                            <td>{{$view->Student_Name}}</td>
                                            <td>
                                                <div class="tdca" id="tdca{{$view->upload_id}}">{{$view->CA}}</div>
                                             </td>
                                            <td> 
                                    {{$view->Exams}} 
                                             </td>
                                            <td> {{$view->Total}}</td>
                                            <td>{{$view->Grade}}</td>
                                            <td>{{$view->Remark}}</td>
                                       
                                           
                                        </tr>
                                    </form>

                                              @endforeach
                                        


                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
 
    <script>
     
    </script>

 
                </div> 
                 
@endsection
