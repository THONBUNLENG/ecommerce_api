    <!-- announcement bar start -->
    <div class="announcement-bar bg-4 py-1 py-lg-2">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-3 d-lg-block d-none">
                    <div class="announcement-call-wrapper">
                        <div class="announcement-call">
                            <a class="announcement-text text-white" href="tel:+1-078-2376">Call: +1 078 2376</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="announcement-text-wrapper d-flex align-items-center justify-content-center">
                        <p class="announcement-text text-white">New year sale - 30% off</p>
                    </div>
                </div>
                <div class="col-lg-3 d-lg-block d-none">
                    <div class="announcement-meta-wrapper d-flex align-items-center justify-content-end">
                        <div class="announcement-meta d-flex align-items-center">
                            @guest()
                            @include('layouts.partials.header-right-guest')
                            @endguest

                            @auth()
                            @include('layouts.partials.header-right-auth')
                            @endauth

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- announcement bar end -->