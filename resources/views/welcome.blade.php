<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

@include('partials.heads')

<body>
    <!-- ===============================================--><!--    Main Content--><!-- ===============================================-->
    <main class="main" id="top">
        <div class="content">
            @include('partials.nav')
            <div data-bs-target="#navbar" data-bs-spy="scroll" tabindex="0">
                <section class="hero-section overflow-hidden position-relative z-0 mb-4 mb-lg-0" id="home">
                    <div class="hero-background">
                        <div class="container">
                            <div class="row gy-4 gy-md-8 pt-9 pt-lg-0">
                                <div class="col-lg-6 text-center text-lg-start">
                                    <h1 class="fs-2 fs-lg-1 text-white fw-bold mb-2 mb-lg-x1 lh-base mt-3 mt-lg-0">
                                        Instant Topup <span class="text-nowrap">With {{ env('APP_NAME') }}</span></h1>
                                    <p class="fs-8 text-white mb-3 mb-lg-4 lh-lg">Buy Cheap Mobile Data, Airtime, Pay
                                        Electricity Bill, Pay TV Subscription, Educational Payment, Print Recharge Card
                                        & Data Pin.</p>
                                    <div class="d-flex justify-content-center justify-content-lg-start"><a
                                            class="btn btn-primary btn-lg lh-xl mb-4 mb-md-5 mb-lg-7"
                                            href="/auth/sign-up">Create New Account</a></div>
                                    <p class="mb-x1 fs-10 button-text text-uppercase fw-bold lh-base text-300">Download
                                        Our App</p>
                                    <div
                                        class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-2 position-relative z-2">
                                        <a class="border-0 p-0 bg-transparent cursor-pointer rounded-1"
                                            href="/auth/sign-up"> <img class="img-fluid"
                                                src="assets/img/logos/App_Store.webp"
                                                alt="assets/img/logos/App_Store.webp"></a><a
                                            class="border-0 p-0 bg-transparent cursor-pointer rounded-1" href="/">
                                            <img class="img-fluid" src="assets/img/logos/Play_Store.webp"
                                                alt="assets/img/logos/Play_Store.webp"></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 position-lg-relative">
                                    <div class="position-lg-absolute z-1 text-center"><img class="img-fluid chat-image"
                                            src="assets/img/1000x14.png" alt="">
                                        <div class="position-absolute dots d-none d-md-block"> <img
                                                class="img-fluid w-50 w-lg-75" src="assets/img/illustrations/Dots.webp"
                                                alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute bottom-0 start-0 end-0 z-1"><img class="wave mb-md-n2"
                            src="assets/img/illustrations/Wave.svg" alt="">
                        <div class="bg-white py-2 py-md-5"></div>
                    </div>
                </section>
                <section class="container border-bottom mb-8 mb-lg-10">
                    <div class="row pb-6 pb-lg-8 g-3 g-lg-8 px-3">
                        <div class="col-12 col-md-4">
                            <h2 class="fs-3 fw-bold lh-sm mb-2 text-center"
                                data-countup='{"endValue":100,"suffix":"%"}'>0</h2>
                            <h6 class="fs-8 fw-normal lh-lg mb-0 opacity-70 text-center"> Efficiency</h6>
                        </div>
                        <div class="col-12 col-md-4">
                            <h2 class="fs-3 fw-bold lh-sm mb-2 text-center"
                                data-countup='{"endValue":100,"suffix":"%"}'>0</h2>
                            <h6 class="opacity-70 fs-8 fw-normal lh-lg mb-0 text-center"> Satisfaction</h6>
                        </div>
                        <div class="col-12 col-md-4">
                            <h2 class="fs-3 fw-bold lh-sm mb-2 text-center"
                                data-countup='{"endValue":100395,"autoIncreasing":true}'>0</h2>
                            <h5 class="opacity-70 fs-8 fw-normal lh-lg mb-0 text-center"> Customers</h5>
                        </div>
                    </div>
                </section>
                <section class="container mb-8 mb-lg-13" id="about">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6 col-xl-7"><img class="img-fluid" src="assets/img/1206x1246.png"
                                alt=""></div>
                        <div class="col-12 col-lg-6 col-xl-5">
                            <div class="row justify-content-center justify-content-lg-start">
                                <div class="col-sm-10 col-md-8 col-lg-12">
                                    <h2 class="fs-4 fs-lg-3 fw-bold mb-2 text-center text-lg-start">Why Us</h2>
                                    <p class="fs-8 mb-4 mb-lg-5 lh-lg text-center text-lg-start fw-normal">
                                        {{ env('APP_NAME') }}
                                        helps you make payments for services you enjoy right from the comfort of your
                                        home or office. The experience of total convenience, fast service delivery and
                                        easy payment is just at your fingertips.</p>
                                </div>
                                <div class="col-12">
                                    <div class="mb-x1 mb-lg-3">
                                        <h5 class="fs-8 fw-bold lh-lg mb-1">We Bring Speed </h5>
                                        <p class="mb-0 lh-xl">Speed is important to us and we work hard to ensure your
                                            data is dispensed at the least amount of time possible.</p>
                                    </div>
                                    <div>
                                        <h5 class="fs-8 fw-bold lh-lg mb-1"> Earn More as Vendor</h5>
                                        <p class="lh-xl mb-0">Vendors will purchase Airtime, Data and other Utilities at a very discounted price.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="container mb-8 mb-lg-13">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6 col-xl-5 order-lg-1"><img class="img-fluid"
                                src="assets/img/1006x1252.png" alt=""></div>
                        <div class="col-12 col-lg-6 col-xl-7">
                            <div class="row justify-content-center justify-content-lg-start">
                                <div class="col-sm-10 col-md-8 col-lg-11">
                                    <h2 class="fs-4 fs-lg-3 fw-bold mb-2 text-center text-lg-start"> Steps to Become Vendor.</h2>
                                    <p class="fs-8 mb-4 mb-lg-5 lh-lg text-center text-lg-start fw-normal">Proceed to
                                        registration page and register with your correct details, then verify your email
                                        and proceed to your dashboard.</p>
                                </div>
                                <div class="col-12">
                                    <div class="mb-x1 mb-lg-3">
                                        <h5 class="fs-8 fw-bold lh-lg mb-1">Become a Vendor </h5>
                                        <p class="b-0 lh-xl">Register and Fund your account and from your dashboard,
                                            click upgrade account then pay the required sum of money. The amount paid is
                                            non-refundable.</p>
                                    </div>
                                    <div>
                                        <h5 class="fs-8 fw-bold lh-lg mb-1"> Get Discounted Prices</h5>
                                        <p class="lh-xl mb-0">All product will have a discount after your have upgraded to a vendor.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="container mb-8 mb-lg-11">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-7">
                            <h3 class="fs-4 fs-lg-3 fw-bold text-center mb-2 mb-lg-x1"> How does <span
                                    class="text-nowrap">it work?</span></h3>
                            <p class="fs-8 mb-7 mb-lg-8 text-center lh-lg">We offer instant recharge of Airtime,
                                Databundle, CableTV (DStv, GOtv & Startimes), Electricity Bill Payment and Airtime to
                                Cash.</p>
                        </div>
                        <div class="col-12">
                            <div class="row g-sm-2 g-lg-3 align-items-center timeline">
                                <div
                                    class="col-12 col-lg-4 d-flex flex-row flex-lg-column justify-content-center gap-2 gap-sm-x1 gap-md-4 gap-lg-0">
                                    <div class="timeline-step-1 w-25 w-lg-100 mb-4 mb-lg-5 mb-xl-6">
                                        <div class="timeline-item d-flex justify-content-center">
                                            <div
                                                class="timeline-icon bg-primary rounded-circle d-flex justify-content-center align-items-center">
                                                <span class="fs-6 fs-lg-5 fs-xl-4 text-white"> 1</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-1 py-lg-0 px-lg-5 w-75 w-sm-50 w-lg-100 timeline-content">
                                        <h6 class="fs-8 fw-bold text-lg-center lh-lg mb-2">Create an Account</h6>
                                        <p class="text-lg-center lh-xl mb-0">Login or Create an Account to get started.
                                            Sign up is easy and can be completed within seconds. No Long form to fill.
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-lg-4 d-flex flex-row flex-lg-column justify-content-center gap-2 gap-sm-x1 gap-md-4 gap-lg-0">
                                    <div class="timeline-step-2 w-25 w-lg-100 mb-4 mb-lg-5 mb-xl-6">
                                        <div class="timeline-item d-flex justify-content-center">
                                            <div
                                                class="timeline-icon bg-success rounded-circle d-flex justify-content-center align-items-center">
                                                <span class="fs-6 fs-lg-5 fs-xl-4 text-white"> 2</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-1 py-lg-0 px-lg-5 w-75 w-sm-50 w-lg-100 timeline-content">
                                        <h6 class="fs-8 fw-bold text-lg-center lh-lg mb-2">Fund your wallet</h6>
                                        <p class="text-lg-center lh-xl mb-0">Fund your {{ env('APP_NAME') }}
                                            wallet using
                                            any of our automated means of payment. <span class="text-nowrap">from bank.
                                            </span></p>
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-lg-4 d-flex flex-row flex-lg-column justify-content-center gap-2 gap-sm-x1 gap-md-4 gap-lg-0">
                                    <div
                                        class="timeline-step-3 position-relative z-1 overflow-hidden w-25 w-lg-100 mb-4 mb-lg-5 mb-xl-6">
                                        <div class="timeline-item d-flex justify-content-center">
                                            <div
                                                class="timeline-icon bg-info rounded-circle d-flex justify-content-center align-items-center">
                                                <span class="fs-6 fs-lg-5 fs-xl-4 text-white"> 3</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-1 py-lg-0 px-lg-5 w-75 w-sm-50 w-lg-100 timeline-content">
                                        <h6 class="fs-8 fw-bold text-lg-center lh-lg mb-2">Place an order</h6>
                                        <p class="text-lg-center lh-xl mb-0">Simply order for any of our services you
                                            wish to purchase. All are highly affordable and <span
                                                class="text-nowrap">delivery is almost instant!</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="experience position-relative overflow-hidden" id="service">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="position-relative z-1 text-center mb-8 mb-lg-9 video-player-paused"
                                    data-video-player-container="data-video-player-container"><video
                                        class="w-100 h-100 rounded-4" src="https://youtu.be/dbUC_FreYLk"
                                        poster="assets/img/Hero/experiences.webp" type="youtube"
                                        data-video-player="data-video-player"></video>
                                    <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 rounded-4 bg-1100 object-cover"
                                        data-overlay="data-overlay"> </div><button
                                        class="btn play-button position-absolute justify-content-center align-items-center bg-white rounded-circle cursor-pointer"
                                        data-play-button="data-play-button"> <img class="play-icon w-25"
                                            src="assets/img/illustrations/play-solid.svg" alt=""
                                            data-play-icon="data-play-icon"><img class="pause-icon w-25"
                                            src="assets/img/illustrations/pause-solid.svg" alt=""
                                            data-pause-icon="data-pause-icon"></button>
                                    <div class="position-absolute dots d-none d-sm-block"><img class="img-fluid w-100"
                                            src="assets/img/illustrations/Dots.webp" alt=""></div>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-7">
                                <h2 class="fs-4 fs-lg-3 fw-bold text-center text-white mb-5 mb-lg-9 lh-sm">We Made
                                    {{ env('APP_NAME') }} For You.</h2>
                            </div>
                            <div class="col-12">
                                <div class="row gy-4 g-md-3 pb-8 pb-lg-11 px-1">
                                    <div class="col-12 col-md-6 col-lg-4 d-flex align-items-start gap-2"><img
                                            src="assets/img/icons/roadmap.svg" alt="">
                                        <div>
                                            <h5 class="fs-8 text-white lh-lg fw-bold">Automation Services</h5>
                                            <p class="text-white text-opacity-50 lh-xl mb-0">We use cutting-edge
                                                technology to run our services. Our data delivery and wallet funding is
                                                automated, airtime top-up and data purchase are automated.</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 d-flex align-items-start gap-2"><img
                                            src="assets/img/icons/users-wm.svg" alt="">
                                        <div>
                                            <h5 class="fs-8 text-white lh-lg fw-bold">Swift Delivery</h5>
                                            <p class="text-white text-opacity-50 lh-xl mb-0">We offer instant recharge
                                                of Airtime, Databundle, CableTV (DStv, GOtv & Startimes), Electricity
                                                Bill Payment and Educational PIN(s) with instant delivery.</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 d-flex align-items-start gap-2"><img
                                            src="assets/img/icons/share-91.svg" alt="">
                                        <div>
                                            <h5 class="fs-8 text-white lh-lg fw-bold">Customer Support</h5>
                                            <p class="text-white text-opacity-50 lh-xl mb-0">At {{ env('APP_NAME') }}
                                                Our customers
                                                are premium to us, hence satisfying them is our topmost priority. Our
                                                customer service is just a click away. We are Online 24/7..</p>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute top-0 start-0 end-0">
                        <div class="bg-white py-3 py-md-9 py-xl-10"> </div><img class="wave"
                            src="assets/img/illustrations/Wave_2.svg" alt="">
                    </div>
                </section>
                <section class="bg-1100 mt-n1">
                    <div class="mx-auto text-center">
                        <hr class="horizontal-rule m-0 d-inline-block">
                    </div>
                    <div class="container pb-8 pb-lg-10">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-7">
                                <h2
                                    class="fs-6 fs-lg-5 fw-bold text-white text-center pt-7 pb-4 pt-lg-9 pb-lg-6 lh-lg">
                                    <span class="">What Our Happy Customer Says - </span>Get to Know!
                                </h2>
                            </div>
                            <div class="col-12 mb-4 mb-lg-6">
                                <div class="row g-2">
                                    <div class="swiper-theme-container">
                                        <div class="swiper position-relative"
                                            data-swiper='{"spaceBetween":20,"mousewheel":{"forceToAxis":true,"sensitiviye":20,"releaseOnEdges":true},"autoplay":{"delay":3000,"disableOnInteraction":false},"breakpoints":{"0":{"slidesPerView":1,"direction":"horizontal","centeredSlide":true,"loop":true},"768":{"direction":"horizontal","centeredSlide":true,"slidesPerView":2,"loop":true},"992":{"slidesPerView":3,"direction":"vertical","loop":false}}}'>
                                            <div class="swiper-wrapper">
                                                <div class="col-12 swiper-slide">
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <div
                                                            class="d-flex flex-column flex-lg-row gap-2 px-4 py-x1 review-card-1">
                                                            <div class="text-center text-lg-start"><img
                                                                    class="card-image rounded-circle object-fit-cover"
                                                                    src="goocr.png" alt=""></div>
                                                            <div class="text-center text-lg-start">
                                                                <p class="fs-8 mb-2 lh-lg line-clamp-3 text-1100">
                                                                    “{{ env('APP_NAME') }} is hands-down the best place
                                                                    to purchase
                                                                    your data and pay for utility bills. They sell at
                                                                    discount and their service is top-notch.”</p>
                                                                <p class="text-800 lh-xl mb-0">Samuel Okoro</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 swiper-slide">
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <div
                                                            class="d-flex flex-column flex-lg-row gap-2 px-4 py-x1 review-card-2">
                                                            <div class="text-center text-lg-start"><img
                                                                    class="card-image rounded-circle object-fit-cover"
                                                                    src="goocr.png" alt=""></div>
                                                            <div class="text-center text-lg-start">
                                                                <p class="fs-8 mb-2 lh-lg line-clamp-3 text-1100">“I
                                                                    was seriously looking for a side hustle when I came
                                                                    across {{ env('APP_NAME') }}, it’s been over a year
                                                                    now and
                                                                    still counting. Thank you for this opportunity.”</p>
                                                                <p class="text-800 lh-xl mb-0">Omotosho Gbenga</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 swiper-slide">
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <div
                                                            class="d-flex flex-column flex-lg-row gap-2 px-4 py-x1 review-card-3">
                                                            <div class="text-center text-lg-start"><img
                                                                    class="card-image rounded-circle object-fit-cover"
                                                                    src="goocr.png" alt=""></div>
                                                            <div class="text-center text-lg-start">
                                                                <p class="fs-8 mb-2 lh-lg line-clamp-3 text-1100">
                                                                    “{{ env('APP_NAME') }} is hands-down the best place
                                                                    to purchase
                                                                    your data and pay for utility bills. They sell at
                                                                    discount and their service is top-notch.”</p>
                                                                <p class="text-800 lh-xl mb-0">Esther</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 swiper-slide">
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <div
                                                            class="d-flex flex-column flex-lg-row gap-2 px-4 py-x1 review-card-4">
                                                            <div class="text-center text-lg-start"><img
                                                                    class="card-image rounded-circle object-fit-cover"
                                                                    src="goocr.png" alt=""></div>
                                                            <div class="text-center text-lg-start">
                                                                <p class="fs-8 mb-2 lh-lg line-clamp-3 text-1100">“Wow
                                                                    i love their customer service as they response to
                                                                    queries asap. God bless you guys.”</p>
                                                                <p class="text-800 lh-xl mb-0">Ibrahim Isa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 swiper-slide">
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <div
                                                            class="d-flex flex-column flex-lg-row gap-2 px-4 py-x1 review-card-5">
                                                            <div class="text-center text-lg-start"><img
                                                                    class="card-image rounded-circle object-fit-cover"
                                                                    src="goocr.png" alt=""></div>
                                                            <div class="text-center text-lg-start">
                                                                <p class="fs-8 mb-2 lh-lg line-clamp-3 text-1100">“Keep
                                                                    up the good job Freshway, always fast and reliable.”
                                                                </p>
                                                                <p class="text-800 lh-xl mb-0">Ebuka Josh</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center"><a class="py-1 link-success" href="/auth/sign-in"><span>Read
                                        more reviews </span><span class="uil uil-arrow-right icon"></span></a></div>
                        </div>
                    </div>
                </section>
                <section class="bg-300" id="pricing">
                    <div class="container py-8 py-lg-10">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-7">
                                <h3 class="fs-4 fs-lg-3 fw-bold text-center mb-2 mb-lg-x1 lh-sm">Pricing</h3>
                                <p class="fs-8 mb-7 mb-lg-8 text-center lh-lg fw-normal">Affordable Data Plans And
                                    Prices. </p>
                            </div>
                            <div class="col-12">
                                <div
                                    class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
                                    <div
                                        class="p-x1 text-center price-card-1 bg-transparent border mb-3 mb-md-0 rounded-2 pricing-card">
                                        @php
                                            $sme = App\Models\Dataplans::where('plan_id', '=', 1)->get();
                                            $profit = App\Models\Profits::where('plan_type', '=', 1)->first();
                                        @endphp
                                        <p class="fs-10 text-uppercase mb-3 fw-bold text-primary ls-2"> MTN</p>
                                        <ul class="list-unstyled fs-8 lh-xl fw-light text-1100 ls-1">
                                            @foreach ($sme as $sme)
                                                <li class="py-x1 px-1 border-top"> {{ $sme->size }} -
                                                    ₦{{ $sme->price + ($profit->profit/100 * $sme->price) }} ({{ $sme->validity }} ) </li>
                                            @endforeach
                                            <li class="mt-1 d-grid"> <button
                                                    class="btn btn-secondary btn-lg lh-xl">Check More</button></li>
                                        </ul>
                                    </div>
                                    <div class="p-x1 text-center bg-white border shadow-sm rounded-2 pricing-card">
                                        @php
                                            $sme = App\Models\Dataplans::where('plan_id', '=', 8)->get();
                                            $profit = App\Models\Profits::where('plan_type', '=', 1)->first();

                                        @endphp
                                        <p class="fs-10 text-uppercase mb-3 fw-bold text-primary ls-2"> Airtel</p>

                                        <ul class="list-unstyled fs-8 lh-xl fw-light text-1100 ls-1">
                                            @if ($sme != null)
                                                @foreach ($sme as $sme)
                                                    <li class="py-x1 px-1 border-top"> {{ $sme->size }} -
                                                        ₦{{ $sme->price + ($profit->profit/100 * $sme->price) }} ({{ $sme->validity }} ) </li>
                                                @endforeach
                                            @endif
                                            <li class="mt-1 d-grid"> <button
                                                    class="btn btn-secondary btn-lg lh-xl">Check More</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="bg-300" id="pricing">
                    <div class="container py-8 py-lg-10">
                        <div class="row justify-content-center">

                            <div class="col-12">
                                <div
                                    class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
                                    <div
                                        class="p-x1 text-center price-card-1 bg-transparent border mb-3 mb-md-0 rounded-2 pricing-card">
                                        @php
                                            $sme = App\Models\Dataplans::where('plan_id', '=', 8)->get();
                                            $profit = App\Models\Profits::where('plan_type', '=', 1)->first();

                                        @endphp
                                        <p class="fs-10 text-uppercase mb-3 fw-bold text-primary ls-2"> GLO</p>

                                        <ul class="list-unstyled fs-8 lh-xl fw-light text-1100 ls-1">
                                            @if ($sme != null)
                                                @foreach ($sme as $sme)
                                                    <li class="py-x1 px-1 border-top"> {{ $sme->size }} -
                                                        ₦{{ $sme->price + ($profit->profit/100 * $sme->price)}} ({{ $sme->validity }} ) </li>
                                                @endforeach
                                            @endif
                                            <li class="mt-1 d-grid"> <button
                                                    class="btn btn-secondary btn-lg lh-xl">Check More</button></li>
                                        </ul>
                                    </div>
                                    <div class="p-x1 text-center bg-white border shadow-sm rounded-2 pricing-card">
                                        <p class="fs-10 text-uppercase mb-3 fw-bold text-primary ls-2"> 9Moblie</p>
                                        @php
                                            $sme = App\Models\Dataplans::where('plan_id', '=', 11)->get();
                                            $profit = App\Models\Profits::where('plan_type', '=', 1)->first();

                                        @endphp
                                        <ul class="list-unstyled fs-8 lh-xl fw-light text-1100 ls-1">
                                            @if ($sme != null)
                                                @foreach ($sme as $sme)
                                                    <li class="py-x1 px-1 border-top"> {{ $sme->size }} -
                                                        ₦{{ $sme->price + ($profit->profit/100 * $sme->price)}} ({{ $sme->validity }} ) </li>
                                                @endforeach
                                            @endif
                                            <li class="mt-1 d-grid"> <button
                                                    class="btn btn-secondary btn-lg lh-xl">Check More</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="bg-1100">
                    <div class="container">
                        <div class="row py-8 py-md-10 py-lg-11">
                            <div class="col-lg-6">
                                <div class="row justify-content-center justify-content-lg-start">
                                    <div class="col-md-8 col-lg-12 col-xl-11">
                                        <h2
                                            class="text-white fs-4 fs-lg-3 lh-sm mb-2 text-center text-lg-start fw-bold">
                                            We are always here for your backup.</h2>
                                        <p
                                            class="fs-8 text-white text-opacity-65 mb-4 mb-md-6 mb-lg-7 lh-lg mb-6 mb-lg-7 text-center text-lg-start">
                                            A technology platform that offers solutions to digital needs at best
                                            possible price without compromising quality.</p>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="d-flex gap-2 gap-lg-x1 mb-4 mb-lg-5">
                                            <div>
                                                <div
                                                    class="check-icon bg-success mb-1 rounded-circle d-flex align-items-center justify-content-center">
                                                    <span class="uil uil-check text-white"></span>
                                                </div>
                                            </div>
                                            <div>
                                                <h5 class="fs-8 fw-bold lh-lg mb-1 text-white">Integrate Our API</h5>
                                                <p class="lh-xl text-white text-opacity-70 mb-0">With our ready-to-use
                                                    and developer friendly API, you can easily integrate with your
                                                    website or app for FREE to start receiving payments in a breeze.</p>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 gap-lg-x1 mb-4 mb-lg-5">
                                            <div>
                                                <div
                                                    class="check-icon bg-success mb-1 rounded-circle d-flex align-items-center justify-content-center">
                                                    <span class="uil uil-check text-white"></span>
                                                </div>
                                            </div>
                                            <div>
                                                <h5 class="fs-8 fw-bold lh-lg mb-1 text-white">24/7 Support</h5>
                                                <p class="lh-xl text-white text-opacity-70 mb-0">Get support from our
                                                    efficient customer support team, 24/7, all year round. Our mobile
                                                    app will soon be available for download on Google Playstore free.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="accordion mt-lg-4 ps-3 pe-x1 bg-white" id="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading1"><button
                                                class="accordion-button fs-8 lh-lg fw-bold pt-x1 pb-2" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse1"
                                                aria-expand="true" aria-controls="collapse1"
                                                data-accordion-button="data-accordion-button">How long does the data
                                                last?</button></h2>
                                        <div class="accordion-collapse collapse show" id="collapse1"
                                            data-bs-parent="#accordion">
                                            <div class="accordion-body lh-xl pt-0 pb-x1">Every data plan on the
                                                platform lasts for 30  unless stated otherwise.</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading2"><button
                                                class="accordion-button fs-8 lh-lg fw-bold pt-x1 pb-2 collapsed"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#collapse2"
                                                aria-expand="false" aria-controls="collapse2"
                                                data-accordion-button="data-accordion-button">How can I fund my
                                                wallet?</button></h2>
                                        <div class="accordion-collapse collapse" id="collapse2"
                                            data-bs-parent="#accordion">
                                            <div class="accordion-body lh-xl pt-0 pb-x1">You can fund your account by transferring money to your automatic virtual account or manually by using the manual option displayed on your dashboard.</div>
                                        </div>
                                    </div>
                                    
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading4"><button
                                                class="accordion-button fs-8 lh-lg fw-bold pt-x1 pb-2 collapsed"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#collapse4"
                                                aria-expand="false" aria-controls="collapse4"
                                                data-accordion-button="data-accordion-button">Who is a vendor?</button>
                                        </h2>
                                        <div class="accordion-collapse collapse" id="collapse4"
                                            data-bs-parent="#accordion">
                                            <div class="accordion-body lh-xl pt-0 pb-x1">A vendor is an upgraded
                                                ODS member that buys data cheaper than the regular.</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading5"><button
                                                class="accordion-button fs-8 lh-lg fw-bold pt-x1 pb-2 collapsed"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#collapse5"
                                                aria-expand="false" aria-controls="collapse5"
                                                data-accordion-button="data-accordion-button">Do vendors get data and
                                                airtime cheaper?</button></h2>
                                        <div class="accordion-collapse collapse" id="collapse5"
                                            data-bs-parent="#accordion">
                                            <div class="accordion-body lh-xl pt-0 pb-x1">Yes. Prices are cheaper for vendors. 
They get all the services at a discounted price.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-300 position-relative z-0" id="contact">
                    <div class="container py-8 py-lg-9">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-8">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-lg-10">
                                        <h2 class="fs-4 fs-lg-3 fw-bold text-center mb-2 lh-sm">Get latest updates</h2>
                                        <p class="fs-8 mb-5 mb-lg-6 text-center lh-lg fw-normal"> Subscribe to our
                                            monthly newsletter to stay connected with everything you need!</p>
                                    </div>
                                    <div class="col-10 col-lg-7">
                                        <form method="POST" onsubmit="return false;">
                                            <div class="mb-2 w-100"><input class="form-control email-input"
                                                    id="email" type="email" placeholder="Enter your email"
                                                    required="required"></div>
                                            <div class="d-grid"><button class="btn btn-lg btn-primary lh-xl mb-x1"
                                                    type="submit"> Subscribe </button></div>
                                        </form>
                                    </div>
                                    <div class="col-10 col-lg-7">
                                        <p class="text-center lh-lg mb-0">We’ll never share your details with third
                                            parties. View our Privacy Policy for more info.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute bottom-0 end-0 z-n1 d-none d-lg-block"><img
                            src="assets/img/illustrations/Green_dots.svg" alt=""></div>
                    <div class="position-relative bottom-0 start-0 z-1"><img class="img-fluid w-100"
                            src="assets/img/illustrations/Wave_3.svg" alt=""></div>
                </section>
            </div><button
                class="btn scroll-to-top text-white rounded-circle d-flex justify-content-center align-items-center bg-primary"
                data-scroll-top="data-scroll-top"><span class="uil uil-angle-up"></span></button>
            @include('partials.footer')
        </div>
    </main>
    <!-- ===============================================--><!--    End of Main Content--><!-- ===============================================-->

    @include('partials.script')
</body>

</html>
