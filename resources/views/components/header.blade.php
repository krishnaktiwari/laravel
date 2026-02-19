@php
$current = request()->segment(1);
@endphp

<nav class="navbar navbar-expand-lg bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="https://sarva.one/">sarva<span>.</span>one</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item ">
                    <a class="nav-link" href="https://property.{{ config('app.main_domain') }}">Property</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="https://jobs.{{ config('app.main_domain') }}">Jobs</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="https://business.{{ config('app.main_domain') }}">Business</a>
                </li>

            </ul>
        </div>
    </div>
</nav>