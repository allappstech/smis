@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                       <a href=""> > Users</a>
                         
                        <hr />
                    </div> 


                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Users Table 
                             @if( Auth::user()->Account =="HOD") 
                              <a class="btn btn-success right-full" data-toggle="modal" data-target="#addsers_modal" href="">Add User</a>
                             @else
                             
                              <a class="btn btn-success right-full" href="/Manage/adduser">Add User </a>@endif
                       
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                            	   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Full Name</th>
                                            <th>E-mail</th>
                                            <th>Account</th>
                                            <th>Department</th> 
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr class="odd gradeX">
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->Account}}</td>
                                            <td>{{$user->Department}}</td>
                                            <td>{{$user->Status}}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
 
   

 
                </div> 
                @include('modals.addusers')
                 
@endsection
