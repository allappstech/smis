<div class="modal fade" id="numbers_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-warning">
                                          
                                            <div class=""><strong>Program Admission Number  Code</strong></div>
                                        </div>
										 
                                        <div class="modal-body">
										             {!! Form::open(['action' => 'IdnumbersController@store', 'method'=>'POST']) !!}
										 <div class="control-group">
                                            <label>College </label>
                                          <select required id="college" class="form-control" name="college">
                                          	<option value="">...Collect.....</option>
                                              @foreach($colleges as $college)
                                              <option value="{{$college->college_id}}">{{$college->College}}</option>
                                              @endforeach
                                          </select>
                                      </div>

                                          <div class="control-group">
                                            <label>Department </label>
                                          <select required id="department" class="form-control" name="department">
                                          	<option value="">...Department.....</option>
                                              
                                          </select>
                                      </div>
									  
									  <div class="control-group">
                                            <label>program </label>
                                          <select required id="program" class="form-control" name="program">
                                          	<option value="">...program.....</option>
                                              
                                          </select>
                                      </div>
									  
									     <div class="control-group">
									     		<label>Category</label>
                                         <select class="form-control" name="cats" id="cats">
                                         	<option value="">----Category----</option>
                                         	<option value="Morning">Morning</option>
                                         	<option value="Evening">Evening</option>
                                         </select>
									    </div>
									  
									  
									  

                           
                                   
									       <div class="control-group">
                                         	{{Form::label('Code','Code ')}}
									        {{Form::text('Code','',['placeholder'=>'Enter  Code','class'=>'form-control'])}}
									    </div>
                                            <div class = "modal-footer">

									    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
									    {{Form::button('Close', ['class'=>'btn btn-default','data-dismiss'=> 'modal'])}}
									</div>
                                      									           
                                       {!! Form::close() !!}

                                </div>
                            </div>



                          

