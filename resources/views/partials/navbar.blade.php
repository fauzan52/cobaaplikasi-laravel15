<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="/">MR. NOBODY WEBSITE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ $active === "home" ? "active" : '' }}"  href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $active === "posts" ? "active" : '' }}" href="/posts">Post</a>
          </li>
            <li class="nav-item">
                <a class="nav-link {{ $active === "categories" ? "active" : '' }}" href="/categories">Category</a>
            </li>
          <li class="nav-item">
            <a class="nav-link {{ $active === "about" ? "active" : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" class="nav-link {{ $title === "Kuis 1" || "Kuis 2" || "Kuis 3" ? "active" : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              More
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/kuis1">Kuis 1</a></li>
              <li><a class="dropdown-item" href="/kuis2">Kuis 2</a></li>
              <li><a class="dropdown-item" href="/kuis3">Kuis 3</a></li>
            </ul>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Hi, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-list-check"></i> Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i> Logout</button>
                            </form>

                        </li>
                    </ul>
                </li>
            @else
                  <li class="nav-item">
                      <a href="/login" class="nav-link {{ $active === "login" ? "active" : '' }}"><i class="bi bi-arrow-right-square-fill"></i> Login</a>
                  </li>
            @endauth
              </ul>



      </div>
    </div>
  </nav>
