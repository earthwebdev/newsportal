<nav class="navbar navbar-expand-lg navbar-light bg-body border-bottom">
    <div class="container">
        <a class="navbar-brand" href="{{ route('landing-page') }}">
            <img width="100px" src="{{ asset('images/codeitnews.png') }}" alt="{{ config('app.name') }}" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Categories
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('category-page', $category->slug) }}">{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
                </li>

            </ul>
        </div>
    </div>
  </nav>
