
@extends('layouts.themes.tabler.tabler')
@section('body_content_header_extras')

@endsection

@section('body_content_main')
    @include('modules-eos-solution::dev.inc.nav',['name' => 'Developer'])
    <section>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        @if(Session::get('message'))
                            <div class="alert alert-success" role="alert">
                                {!! Session::get('message')  !!}
                            </div>
                        @endif
                        <h2 class="card-title font-weight-bold">
                            Solution Cycle
                        </h2>
                        <div class="card-text">
                            @if(isset($submission))
                                @switch($submission->stages)
                                    @case('interest')
                                        <p>
                                            Deadline for the solution is
                                            <span class="text-danger">{{ Carbon\Carbon::createFromFormat("Y-m-d H:i:s",$solution->submission_deadline)->toDayDateTimeString() }}</span>
                                        </p>
                                    @if(Carbon\Carbon::now() >= $solution->submission_deadline)
                                        <p class="text-danger">Solution Submission Closed</p>
                                    @else
                                        <button data-toggle="modal" data-target="#submit-solution" class="btn btn-outline-success mt-4 px-6 btn-block">
                                            Submit
                                        </button>
                                    @endif
                                    @break
                                    @case('submitted')
                                        <p>
                                            Status: Submission Completed. Awaiting Review
                                        </p>
                                    @break
                                    @case('reviewed')
                                    <p>
                                        Status: Your Solution has been reviewed. Please respond to your email
                                    </p>
                                    @break
                                    @case('rejected')
                                    <p class="text-danger">Closed</p>
                                    <p>
                                        Status: Unfortunately, your solution was not accepted. Please refer to your email on next steps
                                    </p>
                                    @break
                                    @case('approved')
                                    <p>
                                        Status: Congratulations! Your solution has been accepted. Please refer to your email for next steps
                                    </p>
                                    @break
                                @endswitch
                            @else
                                @if(empty($solution->frd))
                                    <p>
                                        Status: Awaiting Publishing of FRD
                                    </p>
                                    <p>
                                        FRD Published Date: <span class="text-success">{{ Carbon\Carbon::createFromFormat("Y-m-d H:i:s",$solution->frd_date)->toDayDateTimeString() }}</span>
                                    </p>

                                @else
                                    <p>
                                        Deadline for the solution:
                                        <span class="text-danger">{{ Carbon\Carbon::createFromFormat("Y-m-d H:i:s",$solution->submission_deadline)->toDayDateTimeString() }}</span>
                                    </p>
                                    <p>
                                        <a href="{{ $solution->frd }}" target="_blank" download>Download FRD</a>
                                    </p>
                                    <button onclick="event.preventDefault(); document.getElementById('indicate-interest').submit()" class="btn btn-outline-success mt-4 px-6">
                                        Indicate interest
                                    </button>
                                @endif

                                <form action="{{ route('interest') }}" method="POST" id="indicate-interest" class="d-none">
                                    @csrf
                                    <input type="hidden" class="d-none" name="developer_id" value="{{ Auth::user()->uuid }}">
                                    <input type="hidden" class="d-none" name="solution_id" value="{{ $solution->id }}">
                                </form>
                            @endif

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-8 col-12">
                <h3>{{ $solution->name }}</h3>
                <div class="">
                    <img src="{{ $solution->image_url }}" class="d-block w-100" style="height: 35vh; object-fit: cover" alt="{{ $solution->name }}">
                </div>
                <div class="col-10">
                    <h4 class="font-weight bold"></h4>
                    <p>
                        {{ $solution->description }}
                    </p>
                    {!! $solution->what_you_need_to_build !!}
                </div>
            </div>
        </div>
    </section>

    <div class="modal" tabindex="-1" id="submit-solution">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Submit Solution</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('submit.soln') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label for="">Github URL</label>
                            <input type="text" name="github_url"  class="form-control">
                        </div>
                        <div class="mb-4 d-flex">
                            <div class="mr-4">
                                <label for="private">Private</label>
                                <input type="radio" id="private" name="github_repo" value="private">
                            </div>
                            <div class=" ml-4">
                                <label for="public">Public</label>
                                <input type="radio" id="public" name="github_repo" value="public">
                            </div>
                        </div>
                        <input type="hidden" name="solution_developer_id" value="{{ isset($submission) ? $submission->id : ''}}"  class="form-control">
                        <div class="mb-4">
                            <label for="">Docker Url</label>
                            <input type="text" name="docker_url" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="">Setup information/Any other information needed to run your app</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('body_js')
@endsection