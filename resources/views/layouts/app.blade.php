
@include('includes.header')
    <div class="container-fluid puls wrapper" style=" background-images: url('{{asset('img/001.jpg')}}');"> 
 
    <div id="wrapper">
     @include('includes.navbar-top')
     <div class="row">
      <div class="col-md-2"> 
        @include('includes.navbar-side')
      </div>
       
       <div class="col-md-10"> 
           <div id="page-wrapper" > 
             <div id="page-inner">
              @yield('content')

               </div>
          </div> 
      </div>
     </div>
   
       

          
       
    </div>
     


 @include('modals.college_modal')   
  @include('includes.footer')