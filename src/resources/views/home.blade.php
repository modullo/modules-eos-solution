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
                        Hi, Ayanwoye
                    </h2>
                    <div class="card-text">
                        <p>
                            Improve your chances by updating your profile
                        </p>
                        <button class="btn btn-outline-success mt-4">
                            Update your profile
                        </button>
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
        <div class="row">
            <div class="col-lg-3">
                <a href="/developer/projects/Some quick example text to build" class="text-dark d-block">
                    <div class="card" >
                        <img src="https://www.nigeriadriverslicence.org/assets/images/4wheeler-banner.png" class="d-block w-100" style="height: 20vh; object-fit: cover" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Drivers license</h5>
                            <p class="card-text">Drivers license application made seamless within 24hours</p>
{{--                            <a href="#" class="btn btn-primary mt-4">Go somewhere</a>--}}
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="/developer/projects/Some quick example text to build" class="text-dark d-block">
                    <div class="card">
                        <img src="{{ asset('/traffic.svg') }}" class="d-block w-100" style="height: 20vh; object-fit: cover" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Traffic checker</h5>
                            <p class="card-text">Traffic system that can manage, traffic lights with a single button.</p>
{{--                            <a href="#" class="btn btn-primary mt-4">Go somewhere</a>--}}
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="/developer/projects/Some quick example text to build" class="text-dark d-block">
                    <div class="card">
                        <img src="{{ asset('/voice.svg') }}" class="d-block w-100" style="height: 20vh; object-fit: cover" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Ivr renewal</h5>
                            <p class="card-text">Automate Inbound And Outbound Voice-based Processes.</p>
{{--                            <a href="#" class="btn btn-primary mt-4">Go somewhere</a>--}}
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="/developer/projects/Some quick example text to build" class="text-dark d-block">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1778&q=80" class="d-block w-100" style="height: 20vh; object-fit: cover" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Inverter Manager</h5>
                            <p class="card-text">Provide you with reliable power faster and smarter.</p>
{{--                            <a href="#" class="btn btn-primary mt-4">Go somewhere</a>--}}
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

@endsection
@section('body_js')

@endsection