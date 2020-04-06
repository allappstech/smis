 

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
       
     <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
 <style>
   #wrapper{
	      bacjkground:rgba(0, 255, 0, 0.5) !important;
   }
    
 </style>
 
</head> 
<body style=" background-image: url('{{asset('img/001.jpg')}}');">
    <div class="container-fluid wrapper" > 
 
    <div id="wrapper">
     @include('includes.navbar-top')
     <div class="row">
     
       
       <div class="col-md-12"> 
           <div id="page-wrapper" > 
             <div id="page-inner">
<!--ghhhhhh  -->
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <h4 class="text-primary">This Is MIS Umaru Ali Shinkafi Polytechnic Sokoto</h4>
            <h1 class="text-danger">The Page You are Lookinh For is Not Found </h1>

        </div>

       


      
    </div>
</div>


<!--/////// -->

 </div>
          </div> 
      </div>
     </div>
   
       

          
       
    </div>
    </div>
  

 
    <script src="{{ asset('js/app.js') }}"></script>
     
   
  
</body>
</html> 