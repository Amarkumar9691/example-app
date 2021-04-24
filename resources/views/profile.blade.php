@extends('layouts.app')
@section('content')

@isset($userprofile)

<div class="jumbotron col-sm-8 mx-auto ">
  <div class="alert alert-dark text-center" >
    <strong>Your Profile Details</strong>
  </div>
    <form method="POST" action="{{ route('profile.update',Auth::user()->id) }}" enctype="multipart/form-data">
        @method('PUT')
           @csrf
            <fieldset>
              


            
               <div class="row" >
                <div class="col-sm-1">
                    
                </div>

              <div class="col-sm-3">
                      
              <div class="form-group row">
                           
              <ul class="list-unstyled">
              <li style="color:black;">Profile Picture</li>

               <li >
            
              
               <div class="input-group ">
                    
                     <div class="img-thumbnail  text-center">
                     @if($userprofile->thumbnail !== NULL)
                     <img src= "{{asset('storage/'.$userprofile->thumbnail)}}" id="imgthumbnail" class="img-fluid" alt="">
                     @else
                     <img src= "{{asset('image/image.jpg')}}" id="imgthumbnail" class="img-fluid" alt="">
                     @endif
                     </div>
                     <div class="custom-file">
                     <input type="file" class="custom-file-input" name="thumbnail" id="thumbnail">
                     <label class="custom-file-label" for="thumbnail">Upload pic</label>
                     </div>
                     </div>
                     <input type="hidden" name="path" value="{{$userprofile->thumbnail}}">
                   
                
                </li>

              </ul>  
              </div>

                         

      </div>
                    
                    <div class="col-sm-1">
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">

                    </div>
                     
                        <div class="col-sm-5">
                      
                       <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{  Auth::user()->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>


                           <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-10">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{  Auth::user()->email}}" required autocomplete="name" autofocus>

                               @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>


                           <div class="form-group row">
                            <label for="address" class="col-md-2 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-10">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$userprofile->address}}"  autofocus>

                               


                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>


                           <div class="form-group row">
                            <label for="mobile" class="col-md-2 col-form-label text-md-right">{{ __('Mobile') }}</label>

                            <div class="col-md-10">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" p  autofocus placeholder="+91 722591XXXX" pattern="[0-9]{10}" min="6000000000" max="9999999999" value="{{$userprofile->phone}}">

                              
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                             <div class="form-group row">
                            <label for="mobile" class="col-md-2 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-10">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" p  autofocus placeholder="your city" value="{{$userprofile->city}}">

                              
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>

                             <div class="form-group row">
                            <label for="mobile" class="col-md-2 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-10">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" p  autofocus placeholder="your state" value="{{$userprofile->state}}">

                              
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                             <div class="form-group row">
                            <label for="mobile" class="col-md-2 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-10">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" p  autofocus placeholder="your country" value="{{$userprofile->country}}">

                              
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                
                              <input type="submit" name="submit" value="update" class="btn btn-dark">

                            </div>
                    </fieldset>
            </form>
   </div>

@endisset


@endsection