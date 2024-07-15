<!doctype html>
<html lang="en">

@include('admin.partials.head')

<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled" data-sidebarstyle="sidebar-pushcontent">

    @include('admin.partials.preloader')

    @include('admin.partials.headNav')

    @include('admin.partials.sideNav')

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
                                <h5 class="fw-normal mb-0 username">Admin</h5>
                                <h3 class="fw-medium">&#8358;{{ number_format(0, 2) }}</h3>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="avatar avatar-40 rounded-circle bg-green">
                                                <i class="bi bi-arrow-down-left"></i>
                                            </div>
                                        </div>
                                        <div class="col ps-0">
                                            <p class="small text-muted mb-1">30 days Income </p>
                                            <p class="">1525 <small>k</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 text-end border-left-dashed">
                                    <div class="row align-items-center">
                                        <div class="col pe-0">
                                            <p class="small text-muted mb-1">30 days Expense</p>
                                            <p class="">1321 <small>k</small></p>
                                        </div>
                                        <div class="col-auto">
                                            <div class="avatar avatar-40 rounded-circle bg-red">
                                                <i class="bi bi-arrow-up-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    .swiper-slide {}
                </style>

            </div>

            @include('admin.partials.transaction')
        </div>


    </main>
    {{--  --}}
    @include('admin.partials.mobileNav')
    @include('admin.partials.scripts')
</body>

</html>
