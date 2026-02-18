
    @php
        $current = request()->segment(1);
    @endphp
    
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="">business.sarva<span>.</span>one</a>
        
        <button class="navbar-toggler" type="button"
    data-bs-toggle="collapse"
    data-bs-target="#navbarNav"
    aria-controls="navbarNav"
    aria-expanded="false"
    aria-label="Toggle navigation">
    <i class="fa fa-bars"></i>
</button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item ">
                    <a class="nav-link" href="https://property.sarva.one/">Property</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="https://jobs.sarva.one/">Jobs</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="https://business.sarva.one/">Business</a>
                </li>

            </ul>
        </div>
    </div>
</nav>