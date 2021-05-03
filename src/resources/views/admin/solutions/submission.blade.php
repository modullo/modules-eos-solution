
@extends('modules-eos-solution::admin.layout.master')

@section('dashboard-content')
    <div class="card" style="min-height: 80vh">
        <div class="card-body">
            @if(Session::get('approve'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('approve') }}
                </div>
            @endif
            @if(Session::get('reject'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('reject') }}
                </div>
            @endif
            @if(Session::get('review'))
                <div class="alert alert-warning" role="alert">
                    {{ Session::get('review') }}
                </div>
            @endif
            @error('message')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Developer</th>
                    <th scope="col">Solution</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($submissions) > 0)
                    @foreach($submissions as $key => $solution)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $solution->first_name .' '. $solution->last_name }}</td>
                            <td>{{ $solution->name }}</td>
                            <td>
                                @switch($solution->stages)
                                    @case('submitted')
                                        <span class="text-primary">
                                            Submitted
                                        </span>
                                    @break
                                    @case('reviewed')
                                        <span class="text-warning">
                                            Reviewed
                                        </span>
                                    @break
                                    @case('rejected')
                                        <span class="text-danger">
                                            Rejected
                                        </span>
                                    @break
                                    @case('approved')
                                        <span class="text-success">
                                            Approved
                                        </span>
                                    @break
                                @endswitch
                            </td>
                            <td class="">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button data-toggle="modal" data-target="#submit-solution"
                                                data-github="{{ $solution->github_url }}"
                                                data-docker_url="{{ $solution->docker_url }}"
                                                data-description="{{ $solution->description }}"
                                                class="dropdown-item test dropdown-item" >
                                            View submission
                                        </button>
                                        <a class="dropdown-item submission-status" href="#"
                                           data-toggle="modal" data-target="#submission-status"
                                           data-user-id="{{ $solution->uuid }}"
                                           data-solution-id="{{ $solution->solution_id }}"
                                           data-status = "reviewed"
                                        >
                                            Solution Reviewed
                                        </a>
                                        <a class="dropdown-item submission-status"
                                           data-toggle="modal" data-target="#submission-status"
                                           data-user-id="{{ $solution->uuid }}"
                                           data-solution-id="{{ $solution->solution_id }}"
                                           data-status = "approved"
                                        >
                                            Approve solution
                                        </a>
                                        <a class="dropdown-item submission-status"
                                           data-toggle="modal" data-target="#submission-status"
                                           data-user-id="{{ $solution->uuid }}"
                                           data-solution-id="{{ $solution->solution_id }}"
                                           data-status = "rejected"
                                        >
                                            Reject solution
                                        </a>
{{--                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('review-{{ $solution->developer_id }}').submit()">--}}
{{--                                            Solution Reviewed--}}
{{--                                        </a>--}}
{{--                                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('approve-{{ $solution->developer_id }}').submit()">--}}
{{--                                            Approve solution--}}
{{--                                        </a>--}}
{{--                                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('reject-{{ $solution->developer_id }}').submit()">--}}
{{--                                            Reject solution--}}
{{--                                        </a>--}}
                                    </div>
{{--                                    <form action="{{ route('submission.status') }}" method="POST" id="review-{{ $solution->developer_id }}" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                        @method('PUT')--}}
{{--                                        <input type="hidden" name="solution_id" value="{{ $solution->solution_id }}">--}}
{{--                                        <input type="hidden" name="developer_id" value="{{ $solution->developer_id }}">--}}
{{--                                        <input type="hidden" name="status" value="reviewed">--}}
{{--                                    </form>--}}
{{--                                    <form action="{{ route('submission.status') }}" method="POST" id="reject-{{ $solution->developer_id }}" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                        @method('PUT')--}}
{{--                                        <input type="hidden" name="solution_id" value="{{ $solution->solution_id }}">--}}
{{--                                        <input type="hidden" name="developer_id" value="{{ $solution->developer_id }}">--}}
{{--                                        <input type="hidden" name="status" value="rejected">--}}
{{--                                    </form>--}}
{{--                                    <form action="{{ route('submission.status') }}" method="POST" id="approve-{{ $solution->developer_id }}" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                        @method('PUT')--}}
{{--                                        <input type="hidden" name="solution_id" value="{{ $solution->solution_id }}">--}}
{{--                                        <input type="hidden" name="developer_id" value="{{ $solution->developer_id }}">--}}
{{--                                        <input type="hidden" name="status" value="approved">--}}
{{--                                    </form>--}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
            <div class="">
                {{--                {{ $solutions->links() }}--}}
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="submit-solution">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Submitted Solution</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label for="">Github Url</label>
                        <p>
                            <a href="#" id="github_url"></a>
                        </p>
                    </div>
                    <div class="mb-4">
                        <label for="">Docker Url</label>
                        <p>
                            <a href="#" id="docker_url"></a>
                        </p>
                    </div>
                    <div class="mb-4">
                        <label for=""> How to run the app.</label>
                        <p id="description"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="submission-status">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Submitted Solution</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('submission.status') }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="uuid" name="developer_id">
                        <input type="hidden" id="statuss" name="status">
                        <input type="hidden" id="solution_id" name="solution_id">
                        <div class="mb-4">
                            <label for="">Message</label>
                            <textarea name="message" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Send</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('body_js')
<script>
    $(document).ready(function (e) {
        $('.test').on('click', function(e) {
            var link     = $(this).attr('data-description');
            $('#description').html(link)
                .show();
            let github = $(this).attr('data-github');
            let docker = $(this).attr('data-docker_url');
            $('#github_url').html(github)
                .show();
            $('#github_url').attr('href',github);
            $('#docker_url').html(docker)
                .show();
            $('#docker_url').attr('href',docker);
            // console.log(link)
        })

        $('.submission-status').on('click', function(e) {
            let id = $(this).attr('data-user-id');
            let status = $(this).attr('data-status');
            let solutionId = $(this).attr('data-solution-id');
            $('#uuid').val(id);
            $('#statuss').val(status);
            $('#solution_id').val(solutionId);
            console.log(status)
        })
    });

</script>
@endsection