@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                     <h2>Staff Cources</h2>   
                        <h5>Welcome dr Umar bello. </h5>
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
                                            <td>{{$mycourse->course->Course_title}}</td>
                                            <td>{{$mycourse->course->Course_Code}}</td>
                                            <td>{{$mycourse->course->Units}}</td>
                                            <td>{{$mycourse->category->Category}}</td>
                                            <td>Year {{$mycourse->Level}}</td>
                                            <td>{{$mycourse->Semester}}</td>
                                            <td>{{$mycourse->Session}}</td> 
                                              <td class="center"><a href="/UploadMyresults/{{$mycourse->category->id}}">Upload</a></td>
                                              @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
 
   

 
                </div> 
                 
@endsection
