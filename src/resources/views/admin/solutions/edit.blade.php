
@extends('modules-eos-solution::admin.layout.master')

@section('dashboard-content')

    <section>
        <div class="row">
            <div class="col-lg-10 col-md-9 col-sm-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title font-weight-bold text-center">
                            Edit Solution
                        </h2>
                        <div class="card-text">
                            @if(Session::get('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            <form method="post" action="{{ route('update.soln') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="mb-4">
                                    <input type="text" value="{{ $solution->id }}" name="id" class="form-control d-none">
                                    <label for="">Title</label>
                                    <input type="text" value="{{ $solution->name }}" name="name" class="form-control">
                                    @error('name')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="description" rows="4">
                                        {{ $solution->description }}
                                    </textarea>
                                    @error('description')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="">What you need to build.</label>
                                    <textarea class="ckeditor form-control" name="what_you_need_to_build" rows="4">
                                        {{ $solution->what_you_need_to_build }}
                                    </textarea>
                                    @error('what_you_need_to_build')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="">Solicitation tyoe</label>
                                    <select name="solicitation_type"  class="form-control">
                                        <option value="solicited">Solicited</option>
                                    </select>
                                    @error('solicitation_type')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="">Cover image</label>
                                    <input type="file" name="cover_image" class="form-control">
                                    @error('cover_image')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="">Functional Requirements Document (FRD)</label>
                                    <input type="file" name="frd" class="form-control">
                                    @error('frd')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="">Submission Deadline</label>
                                    <input value="{{ $solution->submission_deadline }}" class="date form-control" type="datetime" name="submission_deadline" >
                                    @error('submission_deadline')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="">Select a cycle</label>
                                    <select name="solution_cycle_id"  class="form-control">
                                        @foreach($cycles as $cycle)
                                            <option value="{{$cycle->id}}">{{ $cycle->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('solution_cycle_id')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>

                                <button class="btn btn-outline-primary mt-4 px-6">
                                    Update
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
        CKEDITOR.replace('what_you_need_to_build', {
            filebrowserUploadUrl: "{{route('update.soln', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        $('.date').datepicker({
            format: 'mm-dd-yyyy'
        });
    </script>
@endsection
