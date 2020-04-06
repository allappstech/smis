@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                     <h2>User Dashboard</h2>   
                        
                        <hr />
                    </div> 
                    <a href="/home">
            <div class="col-md-3 col-sm-6 col-xs-6"> 

                  <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-dashboard "></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Dashboard</p>
                
                </div>
             </div>

             </div>
         </a>
 <a href="/my_cources">
               <div class="col-md-3 col-sm-6 col-xs-6"> 
                
                  <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Cource</p>
                 </div>
             </div>

             </div>
         </a>
 <a href="/UploadMyresults">
               <div class="col-md-3 col-sm-6 col-xs-6"> 
                
                  <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Upload Result</p>
                 </div>
             </div>

             </div>
         </a>
          <a href="">

               <div class="col-md-3 col-sm-6 col-xs-6"> 
                
                  <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">View Result</p>
                 </div>
             </div>

             </div>
         </a>

 
                </div> 
                 
@endsection
