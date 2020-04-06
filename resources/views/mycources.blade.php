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
                                            <th>Semester</th>
                                             <th>Sesion</th>
                                               <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>Internet Explorer</td>
                                            <td>COM 111</td>
                                            <td class="center">4</td>
                                            <td class="center">NDCS II</td>
                                            <td class="center">1</td>
                                            <td class="center">2018/2019</td>
                                              <td class="center">Upload</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
 
   

 
                </div> 
                 
@endsection
