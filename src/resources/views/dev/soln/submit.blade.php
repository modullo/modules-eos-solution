
@extends('layouts.themes.tabler.tabler')
@section('body_content_header_extras')

@endsection

@section('body_content_main')
    @include('modules-eos-solution::dev.inc.nav',['name' => 'Developer'])
    <section>
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title font-weight-bold text-center">
                            Submit Solution
                        </h2>
                        <div class="card-text">
                            <form action="">
                                <div class="mb-4">
                                    <label for="">Github repo</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="">Url</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="">Description</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>
                                <button class="btn btn-outline-success mt-4 px-6">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('body_js')

@endsection