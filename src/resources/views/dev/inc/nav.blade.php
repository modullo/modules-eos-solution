<nav class="navbar navbar-expand-lg navbar-light bg-white mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="{{$company_logo}}" height="40" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
{{--            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">--}}
{{--                <li class="nav-item">--}}
{{--                    <form class="container-fluid">--}}
{{--                        <div class="input-group">--}}
{{--                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">--}}
{{--                            <span class="input-group-text" id="basic-addon1">search</span>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </li>--}}
{{--            </ul>--}}
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Available solutions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Performance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">My Solutions</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li>
                            <a href="#" class="dropdown-item">
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="{{route('logout')}}" class="dropdown-item">
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>