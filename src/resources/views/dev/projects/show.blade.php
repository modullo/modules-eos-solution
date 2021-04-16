
@extends('layouts.themes.tabler.tabler')
@section('body_content_header_extras')

@endsection

@section('body_content_main')
    @include('modules-eos-solution::dev.inc.nav',['name' => 'Developer'])
    <section>
        <div class="row">
            <div class="col-lg-9 col-md-9 col-12">
                <h3>Drivers license</h3>
                <div id="carouselExampleSlidesOnly" class="carousel slide my-5" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1778&q=80" class="d-block w-100" style="height: 65vh; object-fit: cover" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1593642634367-d91a135587b5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="d-block w-100" style="height: 65vh; object-fit: cover" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1618134660387-4eaa27b02524?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2464&q=80" class="d-block w-100" style="height: 65vh; object-fit: cover" alt="...">
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <h4 class="font-weight bold"></h4>
                    <p>
                        I love building apps and I promise you will do your project while Im enjoying that. I worked on many enterprise apps and I have a full team behind me to finish your project as fast we can. then do not hesitate to send me a message any time you like. try my best to answer your question and concerns ASAP

                        I am an experienced React (JavaScript) Developer expert in developing user-friendly Web Apps.

                        If you want a professionally developed react js web application on a very reasonable budget then you are at the right place.

                        With 10+ years of experience in web development, I can develop any kind of web app that fits your needs and business requirements.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title font-weight-bold">
                            How to apply
                        </h2>
                        <div class="card-text">
                            <p>
                                The button below link up the application form and requirements.
                            </p>
                            <button class="btn btn-outline-success mt-4 px-6">
                                Apply
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('body_js')

@endsection