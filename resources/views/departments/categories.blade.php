@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                      <a  href="/Departments">Departments</a> / 
                    <a href="/Department/Programs">Programs</a> / 
					 <a href="/Department/Program/Numbers">Numbers</a> 
                    <a href=""></a> 
                        <hr />
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Classes Table  <a class="btn btn-success right-full" data-toggle="modal" data-target="#class_modal" href="">Add Class</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                            	   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Class</th>
                                            <th>Program</th>
                                             <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($categories)>0)
                                        @foreach($categories as $category)
                                       <tr class="odd gradeX">
                                            <td>{{$category->category_id}}</td>
                                            <td>{{$category->Program_Code}}</td>
                                             <td width="130">
                                                
                                                <a href="/category/{{$category->category_id}}/edit" class="btn btn-primary">Edit</a>
                                                 <a href="" data-toggle="modal" data-target="#collegs_delete{{$category->category_id}}" class="btn btn-danger">Delete</a>
                                                <!--start delete modal -->
                        
                         <div class="modal fade" id="collegs_delete{{$category->category_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-success">
                                          
                                            <div class=""><strong>Delete Collage</strong></div>
                                        </div>
                                         
                                        <div class="modal-body">
                                            <div class="alert alert-danger"><strong>Are You Sure You Want To Delete The Class: <br>{{$category->category_id}} </strong></div>
                                                 <div class = "modal-footer">
                                                    {!!Form::open(['action' => ['CategoriesController@destroy',$category->category_id],'method' => 'POST'])!!}
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
                 @include('modals.classes_modal')
                  
@endsection
