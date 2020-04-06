@extends('layouts.app')
@section('content')
    <div class="row">
                    <div class="col-md-12">
                    
                        <hr />
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Course Allocated
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
                                            <th>Class</th> 
                                            <th>Level</th> 
                                            <th>Semester</th>
                                             <th>Sesion</th>
                                               <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <?php $sn=0;?>
                                            @foreach($mycourses as $mycourse)
                                             

                                            <td><?php $sn+=1; echo $sn;?></td>
                                            <td>{{$mycourse->course_id}}</td>
                                            <td>{{$mycourse->course_id}}</td>
                                            <td>{{$mycourse->Units}}</td>
                                            <td>{{$mycourse->Units}}</td>
                                            <td>Year {{$mycourse->Level}}</td>
                                            <td>{{$mycourse->Semester}}</td>
                                            <td>{{$mycourse->Sessions}}</td> 
                                              <td class="center">
                                                 @if($uploads)
											    @foreach($uploads as $upload)

                                                @if($upload->allocation_id==$mycourse->allocation_id)
                                        <?php echo '<a href="/Staff/view/'.$mycourse->allocation_id.'">View</a>'?>
                                                @else
                                               <?php echo '<a href="/UploadMyresults/'.$mycourse->allocation_id.'">Upload</a>'?> 
                                               @endif

                                                @endforeach

                                               
                                                
                                               
                                                    @endif

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
