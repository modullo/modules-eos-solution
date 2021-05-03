
@extends('modules-eos-solution::admin.layout.master')

@section('dashboard-content')

    <div class="card" style="min-height: 80vh">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($users) > 0)
                    @foreach($users as $key => $user)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-flex align-items-center">
                                <button
                                        data-toggle="modal" data-target="#userEdit"
                                        class="btn edit"
                                        data-first_name ="{{ $user->first_name }}"
                                        data-last_name ="{{ $user->last_name }}"
                                        data-email ="{{ $user->email }}"
                                        data-id ="{{ $user->uuid }}"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-4 text-danger" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </td>
                        </tr>
                        <div class="modal" tabindex="-1" id="userEdit">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Developer</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <input type="hidden" name="id" id="id"  class="form-control">
                                            <div class="mb-4">
                                                <label for="">First name</label>
                                                <input type="text" name="first_name" id="first_name"  class="form-control">
                                            </div>
                                            <div class="mb-4">
                                                <label for="">Last name</label>
                                                <input type="text" name="last_name" id="last_name"  class="form-control">
                                            </div>
                                            <div class="mb-4">
                                                <label for=""> Email</label>
                                                <input type="text" name="email" id="email" class="form-control">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
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

            <div>
                {{ $users->links() }}
            </div>
{{--            <nav aria-label="Page navigation example">--}}
{{--                <ul class="pagination">--}}
{{--                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
{{--                </ul>--}}
{{--            </nav>--}}
        </div>
    </div>


@endsection
@section('body_js')
<script>
    $(document).ready(function() {
        $('.edit').on('click', function() {
            $('#first_name').val($(this).attr('data-first_name'))
            $('#last_name').val($(this).attr('data-last_name'))
            $('#email').val($(this).attr('data-email'))
            $('#id').val($(this).attr('data-id'))
           console.log($(this).attr('data-first_name'))
        });
    });
</script>
@endsection