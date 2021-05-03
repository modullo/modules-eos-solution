
@extends('modules-eos-solution::admin.layout.master')

@section('dashboard-content')

    <section>
        <div class="row">
            <div class="col-lg-10 col-md-9 col-sm-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title font-weight-bold text-center">
                            Create Solution Cycle
                        </h2>
                        <div class="card-text">
                            @if(Session::get('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            <form method="post" action="{{ route('cycle-create') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="">Cycle Name</label>
                                    <input class="form-control" type="text" name="cycle_name" >
                                    @error('cycle_name')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="">Start cycle</label>
                                    <input class="date form-control" type="datetime-local" name="start_cycle" >
                                    @error('start_cycle')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="">End cycle</label>
                                    <input class="date form-control" type="datetime-local" name="end_cycle" >
                                    @error('end_cycle')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>

                                <button class="btn btn-outline-success mt-4 px-6">
                                    Create
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
    {{--<script src="{{ asset('public/vendor/js/modules-eos-solution/ckeditor.js') }}"></script>--}}
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        $('.date').datepicker({
            format: 'mm-dd-yyyy'
        });
    </script>
@endsection
