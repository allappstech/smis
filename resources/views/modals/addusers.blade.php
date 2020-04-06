<div class="modal fade" id="addsers_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-warning">
                                          
                                            <div class=""><strong>Add New Staff</strong></div>
                                        </div>
										 
                                        <div class="modal-body">
                                                                   {!! Form::open(['action' => 'UsersController@store', 'method'=>'POST']) !!}


                                          <div class="form-group">
                                        
                                          <input id="department" type="hidden" class="form-control" name="department" value="{{ Auth::user()->department_id }}" required >
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
                             
                                      </div>
									      <div class="form-group">
                                            <label>User Account </label>
                                          <select id="account" class="form-control" name="account">
                                            <option value="">...Acount.....</option>
                                         
                                            <option value="Exams Officer">Exams Officer</option>  
                                             <option value="Staff">Staff</option> </select>
                                      </div>

                                   <br>
                                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                                      
									  <input type="hidden" name="department" value="{{  Auth::user()->department_id }}">
                         <div class="form-group">
                            <div class="col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>                                 
                                                                            </div>                                 
                                      {!! Form::close() !!}
 

                                </div>
                            </div>



                          

