<nav class="navbar navbar-expand-lg" style="background-color: #6b21a8;">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ route('home') }}">
            KursusKu
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('enrollments.create') }}">
                        Pendaftaran
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>