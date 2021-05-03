
@extends('layouts.themes.tabler.tabler')
@section('body_content_header_extras')

@endsection

@section('body_content_main')
    @include('modules-eos-solution::dev.inc.nav',['name' => 'Developer'])
    <section>
        <h2 class="mb-5">My solutions</h2>
        <div class="row">
            @if(count($mySolutions) > 0)
                @foreach($mySolutions as $soln)
                    <div class="col-lg-4">
                        <a href="/developer/projects/{{ $soln->slug }}" class="text-dark d-block mb-3">
                            <div class="card"  >
                                <img src="https://www.nigeriadriverslicence.org/assets/images/4wheeler-banner.png" class="d-block w-100" style="height: 20vh; object-fit: cover" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $soln->name }}</h5>
                                    <p class="card-text">{{ substr($soln->description,0,50) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                @else
                <div class="row card mt-1 mx-3">
                    <div class=" col-12">
                        <div class=" d-block">
                            <div class="d-flex align-items-center justify-content-center col-4 mx-auto text-center" style="height: 35vh">
                                <h5>You've not applied for a solution</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
@section('body_js')

@endsection