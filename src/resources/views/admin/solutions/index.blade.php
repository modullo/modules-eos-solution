
@extends('modules-eos-solution::admin.layout.master')

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
                    <th scope="col">Description</th>
                    <th scope="col">Published</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($solutions) > 0)
                    @foreach($solutions as $key => $solution)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $solution->name }}</td>
                            <td>{{ $solution->description }}</td>
                            <td>
                                @if($solution->published === 1)
                                    <span class="text-success">
                                        Published
                                    </span>
                                @else
                                    <span class="text-danger">
                                        Not Published
                                    </span>
                                @endif
                            </td>
                            <td class="">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('published-{{ $solution->id }}').submit()">
                                            @if($solution->published === 1)
                                                <span>
                                                    Unpublished
                                                </span>
                                                @else
                                                <span>
                                                    Publish
                                                </span>
                                            @endif
                                        </a>
                                        <a class="dropdown-item" href="/admin/solution/edit/{{ $solution->id }}">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                    <form action="/admin/solution/publish-solution/{{ $solution->id }}" method="POST" id="published-{{ $solution->id }}" class="d-none">
                                        @csrf
                                        @method('PUT')
                                    </form>
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

@endsection
@section('body_js')

@endsection