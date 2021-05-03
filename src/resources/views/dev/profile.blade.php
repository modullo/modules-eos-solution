@extends('layouts.themes.tabler.tabler')
@section('body_content_header_extras')

@endsection

@section('body_content_main')
    @include('modules-eos-solution::dev.inc.nav',['name' => 'Developer'])
    <div class="mb-3">
        <h3 class="display-5">Developer Cycle</h3>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card" style="height: 40vh">
                <div class="card-body text-center">
                    <div class="mx-auto d-flex align-items-center justify-content-center text-white" style="height: 6rem; width:6rem; border-radius: 50%; background-color: #eee">
                        <h2 class="font-weight-bold">
                            {{ strtoupper(substr(Auth::user()->first_name,0,1)) }}
                        </h2>
                    </div>
                    <div class="card-text my-2">
                        <h4>
                            {{ strtolower(Auth::user()->first_name .Auth::user()->last_name) }}
                        </h4>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 cursor-pointer text-secondary" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        <hr>
                        <div class="d-flex">

                        </div>
{{--                        <a href="/developer/profile" class="btn btn-outline-success mt-4">--}}
{{--                            Update your profile--}}
{{--                        </a>--}}
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-8 col-sm-6">
           <div class="card p-4">
               <h5 class="mb-5">Edit Profile</h5>
               <form action="">
                   <div class="row mb-5">
                       <div class="col-6">
                           <label for="">First name</label>
                           <input type="text" value="{{ Auth::user()->first_name }}" name="" id="" class="form-control">
                       </div>
                       <div class="col-6">
                           <label for="">Last name</label>
                           <input type="text" value="{{ Auth::user()->last_name }}" name="" id="" class="form-control">
                       </div>
                   </div>

                   <div class="row mb-5">
                       <div class="col-md-6 col-12">
                           <div class="">
                               <label class="form-label">Email address
                               </label>
                               <input class="form-control" type="email" value="{{ Auth::user()->email }}" name="email" value="{{ old('email') }}" placeholder="Email">
                               <div class="text-danger">@error('email') {{ $message }} @enderror</div>
                           </div>
                       </div>
                       <div class="col-md-6 col-12">
                           <div class="3">
                               <label class="form-label">Phone Number
                               </label>
                               <input class="form-control" value="{{ Auth::user()->phone_number }}" type="phone" name="phone_number" value="{{ old('phone_number') }}"
                                      placeholder="Phone Number">
                               <div class="text-danger">@error('phone_number') {{ $message }} @enderror</div>
                           </div>
                       </div>
                   </div>

                   <div class="mb-5">
                       <label class="form-label">Password</label>
                       <div class="mb-3">
                           <input class="form-control" type="password" name="password" value="{{ old('password') }}"
                                  placeholder="Password">
                           <div class="text-danger">@error('password') {{ $message }} @enderror</div>

                       </div>
                   </div>


                   <button type="button" disabled class="btn btn-outline-success btn-block">
                       Update
                   </button>
               </form>
           </div>
        </div>
    </div>

@endsection
@section('body_js')
@endsection