@extends('layouts.themes.tabler.tabler')
@section('body_content_header_extras')

@endsection

@section('body_content_main')
    @include('modules-eos-solution::dev.inc.nav',['name' => 'Developer'])
    <div class="mb-3">
        <h3 class="display-5">Developer Cycle</h3>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card" style="height: 90%!important;">
                <div class="card-body text-center">
                    <h2 class="card-title font-weight-bold">
                        Hi, {{ Auth::user()->first_name }}
                    </h2>
                    <div class="card-text">
                        <p>
                            Improve your chances by updating your profile
                        </p>
                        <a href="/developer/profile" class="btn btn-outline-success mt-4">
                            Update your profile
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-6">
            <div id="carouselExampleSlidesOnly" class="carousel slide mb-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://www.nigeriadriverslicence.org/assets/images/4wheeler-banner.png" class="d-block w-100" style="height: 35vh; object-fit: cover" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1593642634367-d91a135587b5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="d-block w-100" style="height: 35vh; object-fit: cover" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/voice.svg') }}" class="d-block w-100" style="height: 35vh; object-fit: cover" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="my-6">
        <h2 class="mb-5">Most popular <span class="text-primary">solutions</span> </h2>
        <ul class="nav nav-tabs h4">
            <li class="nav-item" id="solicited">
                <a class="nav-link active" aria-current="page" href="#">Solicited</a>
            </li>
            <li class="nav-item inactive" id="unsolicited">
                <a class="nav-link" href="#">Unsolicited</a>
            </li>
        </ul>
        <div class="row" id="solicitedMenu">
            @if(count($solutions) > 0)
                @foreach($solutions as $solution)
{{--                   @if($solution->published == 1)--}}
                        <div class="col-lg-3">
                            <a href="/developer/projects/{{ $solution->slug }}" class="text-dark d-block">
                                <div class="card" >
                                    <img src="{{ $solution->image_url }}" class="d-block w-100" style="height: 20vh; object-fit: cover" alt="{{$solution->name}}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $solution->name }}</h5>
                                        <p class="card-text">{!! substr($solution->description,0,50) !!}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
{{--                    @endif--}}
                @endforeach
            @endif
        </div>
        <div class="row d-none card mt-1" id="unsolicitedMenu">
            <div class="p-4">
                <div class=" d-block">
                    <div class="d-flex align-items-center justify-content-center col-4 mx-auto text-center" style="height: 35vh">
                        <h5>No solution Found</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('body_js')
<script>
    let solicit = document.getElementById('solicited');
    let solicitMenu = document.getElementById('solicitedMenu');
    let unsolicitMenu = document.getElementById('unsolicitedMenu');
    let unsolicit = document.getElementById('unsolicited');

    solicit.addEventListener('click', function(e) {
        e.preventDefault();
        unsolicitMenu.classList.add('d-none');
        solicitMenu.classList.remove('d-none');
        console.log('wroking on clicking');
    })

    // unsolicit.addEventListener('click', function(e) {
    //     e.preventDefault();
    //     solicitMenu.classList.add('d-none');
    //     unsolicitMenu.classList.remove('d-none');
    //     console.log('wroking on clicking');
    // })
</script>
@endsection