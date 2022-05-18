
@extends('modules-eos-solution::admin.layout.master')
<style>
    #displaySuccessMessage , #displayErrorMessage{
        display: none;
    }
    button, input[type="submit"], input[type="reset"] {
        background: none;
        color: inherit;
        border: none;
        padding: 0;
        font: inherit;
        cursor: pointer;
        outline: inherit;
    }

</style>

@section('dashboard-content')
    <div class="card" style="min-height: 80vh">
        <div class="card-body">
            @if(Session::get('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            @if(Session::get('deactivate'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('deactivate') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($cycles) > 0)
                    @foreach($cycles as $key => $cycle)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $cycle->name }}</td>
                            <td>{{ $cycle->start_date->format('Y F d') }}</td>
                            <td>
                               {{$cycle->end_date->format('Y F d') }}
                            </td>

                            <td class="d-flex align-items-center">
                                <button
                                        data-toggle="modal" data-target="#cycleEdit"
                                        class="btn edit"
                                        data-name ="{{ $cycle->name }}"
                                        data-start_date ="{{ $cycle->start_date }}"
                                        data-end_date ="{{ $cycle->end_date }}"
                                        data-cycle_uuid ="{{ $cycle->id }}"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <a onclick="deleteFunc()" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-4 text-danger" type="submit" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                         onclick="return confirm('Are you sure you want to delete this cycle ?');" >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                                <form action="{{ url('admin/solution/cycle/destroy/'. $cycle->id)}}" id="delete-form" method="POST">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        <div class="modal" tabindex="-1" id="cycleEdit">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Cycle</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="alert alert-success" id="displaySuccessMessage" role="alert">
                                            <p id="display_response_message"></p>
                                        </div>
                                        <div class="alert alert-danger" id="displayErrorMessage" role="alert">
                                            <p id="display_error_message"></p>
                                        </div>
                                        <form action="" method="post">
                                            <input type="hidden" name="id" id="id"  class="form-control">
                                            <div class="mb-4">
                                                <label for="name">Cycle name</label>
                                                <input type="text" name="name" id="name"  class="form-control">
                                                <input type="hidden" name="cycle_uuid" id="cycle_uuid"  class="form-control">
                                            </div>
                                            <div class="mb-4">
                                                <label for="start_date">Start Date</label>
                                                <input type="text" name="start_date" id="start_date"  class="form-control">
                                            </div>
                                            <div class="mb-4">
                                                <label for="end_date">End Date</label>
                                                <input type="text" name="end_date" id="end_date" class="form-control" >
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" id="disabledButton" class="btn btn-primary submitEditedChanges">Save changes</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                </tbody>
            </table>
            <div class="">
                {{--                {{ $solutions->links() }}--}}
            </div>
        </div>
    </div>

@endsection
@section('body_js')
    <script>
        $(document).ready(function() {
            $('.edit').on('click', function() {
                $('#name').val($(this).attr('data-name'))
                $('#start_date').val($(this).attr('data-start_date'))
                $('#end_date').val($(this).attr('data-end_date'))
                $('#cycle_uuid').val($(this).attr('data-cycle_uuid'))
                console.log($(this).attr('data-cycle_uuid'))
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".submitEditedChanges").click(function(e){
            e.preventDefault();

            let name        = $("input[name=name]").val();
            let start_date  = $("input[name=start_date]").val();
            let end_date    = $("input[name=end_date]").val();
            let cycle_uuid   = $("input[name=cycle_uuid]").val();



            $("#disabledButton").prop('disabled', true);

            $.ajax({
                type:'PUT',
                url: "/admin/solution/cycle/update",
                data:{"_token": "{{ csrf_token() }}",name , start_date , end_date , cycle_uuid},
                success:function(data){
                    if(data.success)
                    {
                        document.getElementById("displaySuccessMessage").style.display = "block";
                        $("#display_response_message").append("<p>"+ data.message + "</p>");

                        setTimeout(function(){
                            location.reload(true);
                        }, 3000);

                    }else{

                        document.getElementById("displayErrorMessage").style.display = "block";
                        $("#display_error_message").append("<p>"+ data.message + "</p>");

                        setTimeout(function(){
                            location.reload(true);
                        }, 3000);
                    }
                }
            });

        });

        function deleteFunc() {
            document.getElementById("delete-form").submit();
        }

    </script>
@endsection