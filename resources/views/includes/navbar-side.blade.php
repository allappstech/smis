   <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
            
                
                    
                    <li>
                        <a class=""  href="/home"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="/Staff/courses"><i class="fa fa-table fa-3x"></i> My Courses</a>
                    </li>
                   
                       @if( Auth::user()->Account =="HOD")                      
                    <li  >
                        <a  href="/Department/Courses"><i class="fa fa-table fa-3x"></i> Courses</a>
                    </li>
                    <li  >
                        <a  href="/Department/Core-Courses"><i class="fa fa-table fa-3x"></i> Core Courses</a>
                    </li>
                      <li  >
                        <a  href="/Department/Students"><i class="fa fa-users fa-3x"></i> Students</a>
                    </li>

                     <li>
                        <a  href="/Department/Results"><i class="fa fa-qrcode fa-3x"></i>  Results</a>
                    </li>
                     <li  >
                        <a   href="/Manage/Users"><i class="fa fa-users fa-3x"></i>Users</a>
                    </li> 
                    @endif

                        
                       @if((Auth::user()->Account =="Admin")||(Auth::user()->Account =="WEBMASTER")) 
                          <li>
                        <a  href="/Department/Results"><i class="fa fa-qrcode fa-3x"></i>  Results</a>
                    </li>

                      <li  >
                        <a   href="/College"><i class="fa fa-building-o fa-3x"></i>College</a>
                    </li> 

                      <li  >
                        <a   href="/Departments"><i class="fa fa-building-o fa-3x"></i>Department</a>
                    </li> 
                     


                    <li  >
                        <a  href="/Department/Courses"><i class="fa fa-table fa-3x"></i> Courses</a>
                    </li>
                   
					<li  >
                        <a   href="/Manage/Users"><i class="fa fa-users fa-3x"></i>Users</a>
                    </li> 
                      <li  >
                        <a  href="/Department/Students"><i class="fa fa-users fa-3x"></i> Students</a>
                    </li>
                    @endif

                      @if((Auth::user()->Account =="CAM")||(Auth::user()->Account =="WEBMASTER")) 
   <li  >
                        <a  href="/Staff/ResultsUpload"><i class="fa fa-users fa-3x"></i> Upload Results</a>
                    </li>
                     @endif



                    
   
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->