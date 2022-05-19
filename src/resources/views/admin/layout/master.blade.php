
@extends('layouts.themes.tabler.tabler')
@section('body_content_header_extras')

@endsection
@section('head_css')
    <style>
        .hidden{
            display:none;
        }
    </style>
@endsection
@section('body_content_main')
    @include('modules-eos-solution::admin.inc.nav',['name' => 'Admin'])
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-end align-items-center">
            <a href="{{url('admin/dashboard')}}" class="btn btn-outline-secondary mr-3">
                User Management
            </a>
            <a href="{{url('admin/solution/cycles')}}" class="btn btn-outline-secondary mr-3">
                View Cycles
            </a>
            {{--  <a href="{{url('admin/solution')}}" class="btn btn-outline-secondary">
                Solution Management
            </a>  --}}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-12 mb-4">
            <div class="card" style="min-height: 80vh">
                <div class="">
                    <h4 class=" px-4 pt-6">
                        Welcome {{ Auth::user()->first_name }}
                    </h4>
                    <hr>
                </div>
                <div class="card-body">
                    <a href="/admin/dashboard" class="d-flex align-items-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="mx-3">Manage Developers</span>
                    </a>
                    <a href="/admin/solution"  class="d-flex align-items-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 3.636a1 1 0 010 1.414 7 7 0 000 9.9 1 1 0 11-1.414 1.414 9 9 0 010-12.728 1 1 0 011.414 0zm9.9 0a1 1 0 011.414 0 9 9 0 010 12.728 1 1 0 11-1.414-1.414 7 7 0 000-9.9 1 1 0 010-1.414zM7.879 6.464a1 1 0 010 1.414 3 3 0 000 4.243 1 1 0 11-1.415 1.414 5 5 0 010-7.07 1 1 0 011.415 0zm4.242 0a1 1 0 011.415 0 5 5 0 010 7.072 1 1 0 01-1.415-1.415 3 3 0 000-4.242 1 1 0 010-1.415zM10 9a1 1 0 011 1v.01a1 1 0 11-2 0V10a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        <span class="mx-3">Manage Solutions</span>
                    </a>
                    <a href="/admin/solution/create"  class="d-flex align-items-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="mx-3">Create Solutions</span>
                    </a>
                    <a href="/admin/solution/submission"  class="d-flex align-items-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="mx-3">Manage Submission</span>
                    </a>
                    <a href="/admin/solution/create/cycle"  class="d-flex align-items-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="mx-3">Manage Cycle</span>
                    </a>

                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-12 mb-4">
            @yield('dashboard-content')
        </div>
    </div>

@endsection
@section('body_js')

@endsection