 

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

        </div>

        <div class="col-md-6">
            
                <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">The Rector</div>

                <div class="panel-body">
                 It is not a coincidence that food, shelter and clothing believed to be the three essentials that sustain mankind, also have some linkage to land. Whether in ancient times or today’s modern system land constitutes a  <img align="left" src="{{ url('img/002.jpg') }}">significant index for man’s wealth and as economic activities have assumed more sophistication over time, land has continued to playa central role in their development. House selling is the process of placing your house in the open market to be sold. In many ways, house selling is quite similar to ways in which we sell other things
                </div>
            </div>
        </div>

            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Director MIS</div>

                <div class="panel-body">
                 It is not a coincidence that food, shelter and clothing believed to be the three essentials that sustain mankind, also have some linkage to land. Whether in ancient times or today’s modern system land constitutes a significant index for man’s wealth and as economic activities have assumed more sophistication over time, land has continued to playa central role in their development. House selling is the process of placing your house in the open market to be sold. In many ways, house selling is quite similar to ways in which we sell other things
                </div>
            </div>
        </div>

        </div>

        <div class="col-md-6">
            
              <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Important</div>

                <div class="panel-body">
                 It is not a coincidence that food, shelter and clothing believed to be the three essentials that sustain mankind, also have some linkage to land. Whether in ancient times or today’s modern system land constitutes a significant index for man’s wealth and as economic activities have assumed more sophistication over time, land has continued to playa central role in their development. House selling is the process of placing your house in the open market to be sold. In many ways, house selling is quite similar to ways in which we sell other things
                </div>
            </div>
        </div>


          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">News & Event</div>

                <div class="panel-body">
                 It is not a coincidence that food, shelter and clothing believed to be the three essentials that sustain mankind, also have some linkage to land. Whether in ancient times or today’s modern system land constitutes a significant index for man’s wealth and as economic activities have assumed more sophistication over time, land has continued to playa central role in their development. House selling is the process of placing your house in the open market to be sold. In many ways, house selling is quite similar to ways in which we sell other things
                </div>
            </div>
        </div>

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