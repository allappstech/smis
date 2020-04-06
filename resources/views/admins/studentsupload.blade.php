 
@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                     <h2>Upload Student</h2>   
                        
                        <hr />
                    </div> 
                    
                     <div class="col-md-12 login border">
  Choose your xls:
 
        @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif
 
    @if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('error') }}</strong>
    </div>
    @endif
 @if (count($errors) > 0)
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      <div>
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
</div>
@endif
    <div class="row">
        <form id="formoidxx" action="{{ route('uploads') }}" method="POST" enctype="multipart/form-data">
        
    {{ csrf_field() }}
  
    <div class="col-md-5">
    
	 
	   
	    
	 
	  <div class="form-group">     
    <input type="file" required name="fileupload" class="form-control">  
     </div> 


<div class="col-md-2">
        <div class="loader"><img src="{{asset('img/loader.gif')}}"></div>
     <input type="submit" value="Upload" class="btn btn-primary" style="margin-top: 3%">

</div>
</div> 
<div class="col-md-2">

</div>
  </form>
</div>
<div class="results">
</div>
<a href="/test" id="proceed-link" class="btn btn-success ">proceed</a>


  
 
                         <hr/>



                     </div>


                 
   

 
                </div> 

@endsection
