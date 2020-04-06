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
	      background:rgba(0, 255, 0, 0.5) !important;
   }
 </style>
</head> 
<body>

<div class="container-fluid wrapper" style=" background-image: url('{{asset('img/001.jpg')}}');"> 
 
    <div id="wrapper">
     @include('includes.navbar-top')
     <div class="row">
     
       
       <div class="col-md-12"> 
           <div id="page-wrapper" > 
             <div id="page-inner">
<!--ghhhhhh  -->
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
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

 

 