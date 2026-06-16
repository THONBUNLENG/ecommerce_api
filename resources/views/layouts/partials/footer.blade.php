<!-- footer start -->
<footer class="mt-20 overflow-hidden">
    <div class="footer-top bg-4" style="padding: 50px 0 100px;">
        <div class="container">
            <div class="footer-widget-wrapper">
                <div class="row justify-content-between">
                    <div class="col-xl-2 col-lg-2 col-md-6 col-12 footer-widget">
                        <div class="footer-widget-inner">
                            <h4 class="footer-heading d-flex align-items-center justify-content-between">
                                <span>About</span>
                                <span class="d-md-none">
                                    <svg class="icon icon-dropdown" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff"
                                        stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </span>
                            </h4>
                            <ul class="footer-menu list-unstyled mb-0 d-md-block">
                                <li class="footer-menu-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="footer-menu-item"><a href="{{ route('featured-collection') }}">Shop</a></li>
                                <li class="footer-menu-item"><a href="#">Blog</a></li>
                                <li class="footer-menu-item"><a href="{{ route('about') }}">About Us</a></li>
                                <li class="footer-menu-item"><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-12 footer-widget">
                        <div class="footer-widget-inner">
                            <h4 class="footer-heading d-flex align-items-center justify-content-between">
                                <span>Shopping</span>
                                <span class="d-md-none">
                                    <svg class="icon icon-dropdown" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff"
                                        stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </span>
                            </h4>
                            <ul class="footer-menu list-unstyled mb-0 d-md-block">
                                <li class="footer-menu-item"><a href="{{ route('view-products') }}">All Products</a></li>
                                <li class="footer-menu-item"><a href="#">New Arrivals</a></li>
                                <li class="footer-menu-item"><a href="#">Best Sellers</a></li>
                                <li class="footer-menu-item"><a href="#">Special Offers</a></li>
                                <li class="footer-menu-item"><a href="#">Shipping Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-12 footer-widget">
                        <div class="footer-widget-inner">
                            <h4 class="footer-heading d-flex align-items-center justify-content-between">
                                <span>Customer Service</span>
                                <span class="d-md-none">
                                    <svg class="icon icon-dropdown" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff"
                                        stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </span>
                            </h4>
                            <ul class="footer-menu list-unstyled mb-0 d-md-block">
                                <li class="footer-menu-item"><a href="{{ route('faq') }}">FAQ</a></li>
                                <li class="footer-menu-item"><a href="#">Returns</a></li>
                                <li class="footer-menu-item"><a href="#">Shipping</a></li>
                                <li class="footer-menu-item"><a href="#">Track Order</a></li>
                                <li class="footer-menu-item"><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6 col-12 footer-widget">
                        <div class="footer-widget-inner">
                            <h4 class="footer-logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('img/looma2.png') }}" alt="looma" width="150"></a>
                            </h4>
                            <div class="footer-newsletter">
                                <p class="footer-text mb-3">Stay up to date with all the news.</p>
                                <div class="newsletter-wrapper">
                                    <form action="#" class="footer-newsletter-form d-flex align-items-center">
                                        <input class="footer-newsletter-input bg-transparent" type="email"
                                            placeholder="Your e-mail" autocomplete="off">
                                        <button class="footer-newsletter-btn newsletter-btn-white"
                                            type="submit">SIGN UP</button>
                                    </form>
                                </div>
                                <div class="footer-social-wrapper">
                                    <ul class="footer-social list-unstyled d-flex align-items-center flex-wrap mb-0">
                                        <li class="footer-social-item">
                                            <a href="#">
                                                <svg class="icon icon-twitter" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.1452 6.62529C17.1452 6.79391 17.1452 6.94848 17.1452 7.08899C17.1452 8.35363 16.9063 9.60422 16.4286 10.8407C15.9789 12.0492 15.3185 13.1593 14.4473 14.171C13.6042 15.1827 12.4941 16.0117 11.1171 16.6581C9.76815 17.2763 8.27869 17.5855 6.64871 17.5855C4.59719 17.5855 2.71429 17.0375 1 15.9415C1.28103 15.9696 1.57611 15.9836 1.88525 15.9836C3.59953 15.9836 5.13115 15.4637 6.48009 14.4239C5.66511 14.3958 4.93443 14.1429 4.28806 13.6651C3.66979 13.1874 3.24824 12.5831 3.02342 11.8525C3.24824 11.9087 3.47307 11.9368 3.69789 11.9368C4.03513 11.9368 4.35831 11.8806 4.66745 11.7681C3.82436 11.5995 3.12178 11.178 2.55972 10.5035C1.99766 9.82904 1.71663 9.05621 1.71663 8.18501C1.71663 8.15691 1.71663 8.14286 1.71663 8.14286C2.25059 8.42389 2.81265 8.57845 3.40281 8.60656C2.30679 7.84777 1.75878 6.82201 1.75878 5.52927C1.75878 4.8548 1.9274 4.23653 2.26464 3.67447C3.19204 4.79859 4.30211 5.69789 5.59485 6.37237C6.91569 7.04684 8.33489 7.42623 9.85246 7.51054C9.79625 7.22951 9.76815 6.94848 9.76815 6.66745C9.76815 5.65574 10.1194 4.79859 10.822 4.09602C11.5527 3.36534 12.4239 3 13.4356 3C14.5035 3 15.4028 3.37939 16.1335 4.13817C16.9766 3.96956 17.7635 3.67447 18.4941 3.25293C18.2131 4.12412 17.6651 4.79859 16.8501 5.27635C17.6089 5.19204 18.3255 5.00937 19 4.72834C18.4941 5.45902 17.8759 6.09133 17.1452 6.62529Z"
                                                        fill="#FEFEFE" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="footer-social-item">
                                            <a href="#">
                                                <svg class="icon icon-facebook" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.3021 4.58314H14.0258C13.1546 4.58314 12.4098 4.89227 11.7916 5.51054C11.2014 6.12881 10.9063 6.87354 10.9063 7.74473V9.97892H9.09368V12.6768H10.9063V18.9578H13.6042V12.6768H16.3021V9.97892H13.6042V8.16628C13.6042 7.94145 13.6885 7.74473 13.8571 7.57611C14.0258 7.37939 14.2365 7.28103 14.4895 7.28103H16.3021V4.58314ZM1 2C1 1.44772 1.44772 1 2 1H18C18.5523 1 19 1.44772 19 2V17.9578C19 18.5101 18.5523 18.9578 18 18.9578H2C1.44772 18.9578 1 18.5101 1 17.9578V2Z"
                                                        fill="#FEFEFE" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="footer-social-item">
                                            <a href="#">
                                                <svg class="icon icon-instagram" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.5 1.75H5.5A3.75 3.75 0 0 0 1.75 5.5v8.999a3.75 3.75 0 0 0 3.75 3.75h8.999a3.75 3.75 0 0 0 3.75-3.75V5.5A3.75 3.75 0 0 0 14.5 1.75Zm2.25 12.249a2.25 2.25 0 0 1-2.25 2.25H5.5a2.25 2.25 0 0 1-2.25-2.25V5.5a2.25 2.25 0 0 1 2.25-2.25h8.999a2.25 2.25 0 0 1 2.25 2.25v8.499ZM10 5.5A4.5 4.5 0 1 0 14.5 10 4.505 4.505 0 0 0 10 5.5Zm0 1.5A3 3 0 1 1 7 10a3.003 3.003 0 0 1 3-3Zm4.5-.75a.75.75 0 1 1 0 1.5.75.75 0 0 1 0-1.5Z"
                                                        fill="#FEFEFE" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="footer-social-item">
                                            <a href="#">
                                                <svg class="icon icon-tiktok" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M13.2367 1C13.5336 3.55445 14.9591 5.0774 17.4375 5.23942V8.11251C16.0012 8.25292 14.7431 7.78307 13.2799 6.89739V12.2709C13.2799 19.0972 5.8393 21.2304 2.84795 16.3375C0.925716 13.189 2.10282 7.66426 8.26909 7.44284V10.4725C7.79933 10.5481 7.29717 10.667 6.83821 10.8236C5.46673 11.288 4.68919 12.1575 4.90518 13.6913C5.32094 16.6292 10.7097 17.4986 10.2615 11.7579V1.0054H13.2367V1Z"
                                                        fill="#FEFEFE" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="footer-social-item">
                                            <a href="#">
                                                <svg class="icon icon-youtube" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18.7892 6.69789C18.9297 7.6815 19 8.65105 19 9.60656V10.9555L18.7892 13.8642C18.6768 14.6792 18.4379 15.2693 18.0726 15.6347C17.6792 16.0281 17.089 16.281 16.3021 16.3934C15.5433 16.4496 14.63 16.4918 13.5621 16.5199C12.5222 16.548 11.6651 16.5621 10.9906 16.5621H9.97892C6.85948 16.534 4.82201 16.4778 3.86651 16.3934C3.86651 16.3934 3.7541 16.3794 3.52927 16.3513C3.30445 16.3232 3.12178 16.2951 2.98126 16.267C2.84075 16.2389 2.65808 16.1686 2.43326 16.0562C2.23653 15.9438 2.05386 15.8033 1.88525 15.6347C1.74473 15.466 1.60422 15.2412 1.4637 14.9602C1.35129 14.6511 1.28103 14.3841 1.25293 14.1593L1.16862 13.8642C1.05621 12.8806 1 11.911 1 10.9555V9.60656L1.16862 6.69789C1.28103 5.8829 1.51991 5.29274 1.88525 4.9274C2.27869 4.50585 2.8829 4.25293 3.69789 4.16862C4.45667 4.11241 5.35597 4.07026 6.39578 4.04215C7.4356 4.01405 8.29274 4 8.96721 4H9.97892C12.5082 4 14.6159 4.05621 16.3021 4.16862C17.089 4.25293 17.6792 4.50585 18.0726 4.9274C18.185 5.03981 18.2834 5.18033 18.3677 5.34895C18.452 5.48946 18.5222 5.64403 18.5785 5.81265C18.6347 5.95316 18.6768 6.09368 18.7049 6.23419C18.733 6.37471 18.7611 6.48712 18.7892 6.57143V6.69789ZM12.4239 10.4075L13.0141 10.1124L8.16628 7.58314V12.6417L12.4239 10.4075Z"
                                                        fill="#FEFEFE" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom bg-4">
        <div class="container">
            <div class="footer-bottom-inner d-flex flex-wrap justify-content-md-between justify-content-center align-items-center">
                <ul class="footer-bottom-menu list-unstyled d-flex flex-wrap align-items-center mb-0">
                    <li class="footer-menu-item"><a href="#">Privacy policy</a></li>
                    <li class="footer-menu-item"><a href="#">Terms & Conditions</a></li>
                </ul>
                <p class="copyright footer-text">©<span class="current-year"></span> {{ date('Y') }} LOOMA. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->
