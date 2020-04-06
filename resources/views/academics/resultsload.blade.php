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
   Choose your xls/csv File :
 
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
        <form id="formoids" action="{{ route('eximport') }}" method="POST" enctype="multipart/form-data">
        
    {{ csrf_field() }}
  
    <div class="col-md-5">
     
    <input type="file" name="file" class="form-control">
    
 <input type="hidden" value="{{ Auth::user()->id }}" name="code" id="code" class="form-control">
 
 

 
 
 
 Results Session
  <select class="form-control" name="sessions" id="sessions">
 <option value="">Session</option>
 <option value="2019/2020">2019/2020</option>
 <option value="2018/2019">2018/2019</option>
 <option value="2017/2018">2017/2018</option>
 <option value="2016/2017">2016/2017</option>
 <option value="2015/2016">2015/2016</option>
 <option value="2014/2015">2014/2015</option>
 <option value="2013/2014">2013/2014</option>
 <option value="2012/2013">2012/2013</option>
 <option value="2011/2012">2011/2012</option>
 <option value="2010/2011">2010/2011</option>
  
 </select>
  Level 
  <select class="form-control" name="level" id="level">
 <option value="">Level</option>
 <option value="I">Year I</option>
 <option value="II">Year II</option>
 <option value="SO">Spit Over</option>  
 </select>
 Semester 
  <select class="form-control" name="semesters" id="semesters">
 <option value="">Semester</option>
 <option value="First Semester">First Semester</option>
 <option value="Second Semester">Second Semester</option>
 
  
 </select>
   

 
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
