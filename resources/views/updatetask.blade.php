@isset($edittask)

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="alert" class="alert alert-secondary alert-dismissable" style="display: none;">
            </div>
            <div class="card">
                <div class="card-header  text-center text-dark"> {{ __('Update Task') }}</div>

                <div class="card-body">
                   

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Task Description') }}</label>

                           <div class="col-md-6">

                            	<textarea cols="30" rows="4" class="form-control  @error('task') is-invalid @enderror" id="task" name="task" value="{{ old('task') }}" required autocomplete="task" autofocus>{{$edittask->task }}</textarea>
                              

                                @error('task')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>
                        </div>  

                          <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Task Status') }}</label>

                           <div class="col-md-6">

                            	<select class="form-control" name="task_status" id="task_status">
                            	  <option value="pending" @if(isset($edittask) && $edittask->status == "pending"){{ 'selected' }} @endif >Pending</option>
                            	  <option value="done"  @if(isset($edittask) && $edittask->status == "done"){{ 'selected' }} @endif>Done</option>
                            	</select>
                              

                                @error('task_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                             </div>
                           </div>  

                        <input type="hidden" id="user_id" name="user_id" value="{{$edittask->user_id}}">

                        <input type="hidden" id="task_id" name="task_id" value="{{$edittask->id}}">
                        <input type="hidden" id="api_token" name="api_token" value="{{$token}}">

                      

                      

                     

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="updatetask">
                                    {{ __('update task') }}
                                </button>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endisset