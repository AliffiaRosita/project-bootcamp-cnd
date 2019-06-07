<!-- Start Header Area -->
<header class="default-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('blogger/img/logo.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>
                        <a href="{{ url('/search') }}">
                            <i class="fa fa-search"></i> Pencarian
                        </a>
                    </li>
                    <li class="dropdown">
                            <button class="btn btn-transparent dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Category
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    @foreach ($categories as $category)
                                    <a href="{{ url('category/'.$category->id) }}" class="dropdown-item" >{{$category->name}}</a>
                              @endforeach
                            </div>
                        </li>
                        <li>
                            <a href="{{ url('/login') }}">
                                <i class="fa fa-sign-in"></i> login
                            </a>
                        </li>
                </div>
        </div>
    </nav>
</header>
<!-- End Header Area -->
