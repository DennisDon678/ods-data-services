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
                <!-- summary blocks -->
                <div class="col-6 col-md-6 col-lg-6 col-xxl-3">
                    <div class="card border-0 mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <p class="text-secondary small mb-1">Task Completed</p>
                                    <h5 class="fw-medium">60<small>%</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6 col-xxl-3">
                    <div class="card border-0 mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <p class="text-secondary small mb-1">Construction</p>
                                    <h5 class="fw-medium">12550<small>USD</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6 col-xxl-3">
                    <div class="card border-0 mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <p class="text-secondary small mb-1">Event Joined</p>
                                    <h5 class="fw-medium">1525<small>k</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6 col-xxl-3">
                    <div class="card border-0 mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <p class="text-secondary small mb-1">Temperature</p>
                                    <h5 class="fw-medium">45 <small><sup>0</sup>C, R-32</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{--  --}}
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')
    @include('users.forms.funding')
</body>

</html>
