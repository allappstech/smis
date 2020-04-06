<div class="modal fade" id="collegs_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-warning">
                                          
                                            <div class=""><strong>Add New Collage</strong></div>
                                        </div>
										 
                                        <div class="modal-body">

                                        {!! Form::open(['action' => 'CollegesController@store', 'method'=>'POST']) !!}
                                         <div class="control-group">
                                         	{{Form::label('College Title','College Title')}}
									        {{Form::text('college_title','',['placeholder'=>'Enter Collage Title','class'=>'form-control'])}}
									    </div>
									       <div class="control-group">
                                         	{{Form::label('College Title','College Title')}}
									        {{Form::text('college_code','',['placeholder'=>'Enter Collage Code','class'=>'form-control'])}}
									    </div>
                                            <div class = "modal-footer">

									    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
									    {{Form::button('Close', ['class'=>'btn btn-default','data-dismiss'=> 'modal'])}}
									</div>
                                      									           
                                       {!! Form::close() !!}

                                </div>
                            </div>



                          

