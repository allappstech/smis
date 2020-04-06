<div class="modal fade" id="class_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-warning">
                                          
                                            <div class=""><strong>Add  Class Category</strong></div>
                                        </div>
										 
                                        <div class="modal-body">

                                        {!! Form::open(['action' => 'CategoriesController@store', 'method'=>'POST']) !!}

                                          <div class="control-group">
                                            <label>Program</label>
                                            <select class="form-control" id="programcat" name="programcat">
                                                <option value="">....Program...</option>
                                                @foreach($programs as $program)
                                                <option value="{{$program->id}}">{{$program->Program_Code}}</option>

                                                @endforeach
                                            </select>
                                        </div>

                                            <div class="control-group">
                                            <label>Year</label>
                                            <select class="form-control" id="year" name="year">
                                                <option value="">....Program...</option>
                                                <option value="I">Year I</option>
                                                <option value="II">Year II</option>                                          
                                            </select>
                                        </div>

                                         <div class="control-group">
                                            <label>Catecory</label>
                                            <select class="form-control" id="cat" name="cat">
                                                <option value="">....Category...</option>
                                                <option value="E">Evening</option>
                                                <option value="M">Morning</option>                                          
                                            </select>
                                        </div>

                                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class = "modal-footer">

									    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
									    {{Form::button('Close', ['class'=>'btn btn-default','data-dismiss'=> 'modal'])}}
									</div>
                                      									           
                                       {!! Form::close() !!}

                                </div>
                            </div>



                          

