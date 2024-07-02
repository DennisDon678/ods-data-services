<!doctype html>
<html lang="en">

@include('users.partials.head')

<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled" data-sidebarstyle="sidebar-pushcontent">

    @include('users.partials.preloader')

    @include('users.partials.headNav')

    @include('users.partials.sideNav')

    <!-- Begin page content -->
    <main class="main mainheight">
        <!-- content -->
        <div class="container mt-4">
            <div class="row">
                <!-- Balance card -->
                <div class="col-12 col-md-12 col-lg-12 mb-4 ">
                    <div class="card border-0 bg-radial-gradient h-100">
                        <div class="card-header bg-none">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="fw-medium">
                                        <i class="bi bi-wallet2 h5 me-1 avatar avatar-30 rounded"></i>
                                        Wallet
                                    </h6>
                                </div>

                            </div>
                        </div>
                        <div class="card-body bg-none text-white">
                            <div class="text-center mb-3">
                                <h5 class="fw-normal mb-0 username">{{ explode(' ', Auth::user()->name)[0] }}</h5>
                                <h3 class="fw-medium">&#8358;{{ number_format(Auth::user()->balance, 2) }}</h3>
                            </div>

                            {{-- <div class="row">
                                <div class="col-6">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="avatar avatar-40 rounded-circle bg-green">
                                                <i class="bi bi-arrow-down-left"></i>
                                            </div>
                                        </div>
                                        <div class="col ps-0">
                                            <p class="small text-muted mb-1">Income</p>
                                            <p class="">1525 <small>k</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 text-end border-left-dashed">
                                    <div class="row align-items-center">
                                        <div class="col pe-0">
                                            <p class="small text-muted mb-1">Expense</p>
                                            <p class="">1321 <small>k</small></p>
                                        </div>
                                        <div class="col-auto">
                                            <div class="avatar avatar-40 rounded-circle bg-red">
                                                <i class="bi bi-arrow-up-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <style>
                    .swiper-slide {}
                </style>

                {{-- Services --}}
                <div class="col-12 col-md-12 col-lg-12 col-xxl-12 mb-4 ">
                    <div class="card border-0 h-100">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="bi bi-cash h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                </div>
                                <div class="col ps-0">
                                    <h6 class="fw-medium mb-0">Services</h6>
                                    <p class="small text-secondary">What are you looking for today?</p>
                                </div>
                                <div class="col-auto">
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <div class="swiper-container creditcards">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card border-0 mb-3 ">
                                            <div class="card-body" style="text-align:center;">
                                                <h4>Airtime</h4>
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#airtimeModal" class="btn btn-primary">Buy
                                                    Now</button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card border-0  mb-3">
                                            <div class="card-body" style="text-align:center;">
                                                <h4>Mobile Data</h4>
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#dataModal" class="btn btn-primary">Buy Now</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body" style="text-align:center;">
                                                <h4>TV</h4>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#cableModal">Buy Now</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body" style="text-align:center;">
                                                <h4>Electricity</h4>
                                                <a href="" class="btn btn-primary">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('users.partials.transaction')
        </div>


    </main>
    {{-- Forms Airtime --}}
    @include('users.forms.airtime')
    @include('users.forms.data')
    @include('users.forms.tv')
    @include('users.forms.services')

    {{--  --}}
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')
</body>

</html>
