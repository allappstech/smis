@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-12">
                     
                        <hr />
                    </div> 
                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Users    
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">                               
                           <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                         <div class="form-group">
                                            <label>College </label>
                                          <select id="college" class="form-control" name="college">
                                            <option>...Collect.....</option>
                                              @foreach($colleges as $college)
                                              <option value="{{$college->college_id}}">{{$college->College}}</option>
                                              @endforeach
                                          </select>
                                      </div>

                                          <div class="form-group">
                                            <label>College </label>
                                          <select id="department" class="form-control" name="department">
                                            <option>...Department.....</option>                                            
                                          </select>
                                      </div>

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Name</label>

                            
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class=" control-label">E-Mail Address</label>

                            
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                             
                        </div>
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>

                            
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                           <div class="form-group">
                            <label for="password-confirm" class="control-label">Confirm Password</label>
                                 
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            
                        </div>
                         <div class="form-group">
                                            <label>College </label>
                                          <select id="account" class="form-control" name="account">
                                            <option value="">...Acount.....</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Exams Officer">Exams Officer</option>
                                            <option value="HOD">HOD</option>     
                                            <option value="CAM">Coordinator Academic Matter</option>                                
                                             <option value="Staff">Staff</option> </select>
                                      </div>

                                   <br>
                                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <div class="col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>                                 
                                                                            </div>                                 
                                       </form>
                                   </div>
                               </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">



                </script>
 
   

 
                </div> 
                  
@endsection
