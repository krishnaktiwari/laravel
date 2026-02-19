<footer class="main-footer bg-primary-dark">
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <h5>{{ config('app.name') }}</h5>
                    <p>{{ config('app.tagline') }}</p>
                    <p>{{ config('app.description') }}</p>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5>Services</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="https://property.sarva.one/" class="footer-link">Property</a>
                        </li>
                        <li>
                            <a href="https://jobs.sarva.one/" class="footer-link">Jobs</a>
                        </li>
                        <li>
                            <a href="https://business.sarva.one/" class="footer-link">Business Listings</a>
                        </li>

                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ config('app.main_domain') }}/about" class="footer-link">About Us</a></li>

                        <li><a href="{{ config('app.main_domain') }}/privacy-policy" class="footer-link">Privacy
                                Policy</a></li>
                        <li><a href="{{ config('app.main_domain') }}/terms-of-service" class="footer-link">Terms &
                                Conditions</a></li>
                        <li><a href="{{ config('app.main_domain') }}/contact" class="footer-link">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5>Contact Info</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="mailto:{{ config('app.email') }}" class="footer-link">
                                <i class="fa fa-envelope me-2"></i>{{ config('app.email') }}
                            </a>
                        </li>
                        <li>
                            <a href="tel:+917470822468" class="footer-link" href="tel:{{ config('app.phone') }}">
                                <i class="fa fa-phone me-2"></i>{{ config('app.phone') }}
                            </a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <a href="#" class="footer-link me-2" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="footer-link me-2" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="footer-link me-2" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="footer-link" aria-label="Twitter">
                            <i class="fab fa-x-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer-bottom py-3 text-center border-top border-secondary">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <small>All rights reserved.</small>

                <a href="https://sarva.one/" target="_blank" class="footer-link" rel="noopener noreferrer">
                    <small>sarva.one</small>
                </a>
            </div>
        </div>
    </section>
</footer>