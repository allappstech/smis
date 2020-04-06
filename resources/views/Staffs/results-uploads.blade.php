<script type="text/javascript">
 $(document).ready(function () { 
alert(55);
  });
</script>
@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                     <h2>Upload Results</h2>   
                        
                        <hr />
                    </div> 
                    
                     <div class="col-md-12 login border">
					 @foreach($course_allocate as $allocation)
					 @endforeach
 <h2>@if($allocation->Category=="Morning")
 {{$allocation->Program_Code}}(M) {{$allocation->course_id}} 
     @else
	{{$allocation->Program_Code}}(E) {{$allocation->course_id}}
	 @endif
   </h2>  Choose your xls/csv File :
 
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
        <form id="formoid" action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        
    {{ csrf_field() }}
  
    <div class="col-md-5">
     
    <input type="file" name="file" class="form-control">
    
 <input type="hidden" value="{{ Auth::user()->id }}" name="code" id="code" class="form-control">
 <input type="hidden" id="catid" name="catid" value="{{$allocation->allocation_id}}" class="form-control">
   

 
</div> 
<div class="col-md-2">
        <div class="loader"><img src="{{asset('img/loader.gif')}}"></div>
     <input type="submit" value="Upload" class="btn btn-primary" style="margin-top: 3%">

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
