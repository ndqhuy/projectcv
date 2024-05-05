<header class="fixed-top">
    <nav class="navbar navbar-expand-lg bg-white p-0">
        <div class="container-fluid">
            <div class="col-md-2 d-flex justify-content-center p-0">
                <a class="navbar-brand p-0" href="{{ route('home') }}">
                    <img src="{{ asset('images/logocv.png') }}" width="100%" height="50px" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse col-md-8" id="navbarSupportedContent">
                <div class="col-md-8">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Việc làm
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('jobList') }}">Việc làm phù hợp</a></li>
                                <li><a class="dropdown-item" href="{{ route('savedJob') }}">Việc làm đã lưu</a></li>
                                <li><a class="dropdown-item" href="{{ route('jobApplied') }}">Việc làm đã ứng tuyển</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Hồ sơ và CV
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('cvModel') }}">Mẫu CV</a></li>
                                <li><a class="dropdown-item" href="{{ route('viewUserCvs') }}">Quản lý CV</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Công ty
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('companyList') }}">Danh sách công ty</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('companyList') }}">Top các công ty</a></li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Lĩnh vực/Ngành nghề
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('companyList') }}">Công nghệ thông tin</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('companyList') }}">Kinh doanh</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Môi trường</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Blog
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('searchNav') }}" method="get" class="d-flex">
                        <input class="form-control me-2" type="search" name="keyword" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="col-md-2 d-flex justify-content-evenly">
                @if (Auth::check())
                    <div class="row">
                        <div class="col p-0">
                            Welcome,<br>{{ Auth::user()->username }}
                        </div>
                        <div class="col">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf <!-- CSRF Token -->
                                <button type="submit" class="btn btn-dark">
                                    <span>Log out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-dark">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-dark">Register</a>
                @endif
            </div>
        </div>
    </nav>
</header>
