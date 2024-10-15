<!DOCTYPE html>
<html lang="en" data-bs-theme="">
@include('admin.partials.head')

<body>

    <!-- NAVIGATION -->
    @include('admin.partials.sideNav')
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- HEADER -->
        <div class="header">
            <div class="container-fluid">

                <!-- Body -->
                <div class="header-body">
                    <div class="row align-items-end">
                        <div class="col">

                            <!-- Pretitle -->
                            <h6 class="header-pretitle">
                                Overview
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title">
                                Dashboard
                            </h1>

                        </div>

                    </div> <!-- / .row -->
                </div> <!-- / .header-body -->

            </div>
        </div> <!-- / .header -->

        <!-- CARDS -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-4">

                    <!-- Value  -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="text-uppercase text-body-secondary mb-2">
                                        API Balance
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                                        &#8358;{{number_format($balance, 2)}}
                                    </span>
                                </div>
                            </div> <!-- / .row -->
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6 col-xl-4">

                    <!-- Hours -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="text-uppercase text-body-secondary mb-2">
                                        Total Users Balance
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                                        &#8358;{{number_format(App\Models\User::sum('balance'),2)}}
                                    </span>

                                </div>

                            </div> <!-- / .row -->
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6 col-xl-4">

                    <!-- Exit -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="text-uppercase text-body-secondary mb-2">
                                        Preorders today
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                                        {{count(App\Models\count_preorder::whereDate('created_at', Carbon\Carbon::today())->get())}}
                                    </span>

                                </div>
                            </div> <!-- / .row -->
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6 col-xl-4">

                    <!-- Time -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="text-uppercase text-body-secondary mb-2">
                                        Total Preoder Amount
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                                        &#8358;{{App\Models\count_preorder::whereDate('created_at', Carbon\Carbon::today())->sum('price')}}
                                    </span>

                                </div>
                            </div> <!-- / .row -->
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6 col-xl-4">

                    <!-- Time -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="text-uppercase text-body-secondary mb-2">
                                        Total Users
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                                        {{count(App\Models\User::all())}}
                                    </span>

                                </div>
                            </div> <!-- / .row -->
                        </div>
                    </div>

                </div>

                <div class="col-12 col-lg-6 col-xl-4">

                    <!-- Time -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="text-uppercase text-body-secondary mb-2">
                                        No. of Vendors
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                                        {{count(App\Models\User::where('is_vendor','=',true)->get())}}
                                    </span>

                                </div>
                            </div> <!-- / .row -->
                        </div>
                    </div>

                </div>
            </div> <!-- / .row -->

            <div class="row">

                <div class="col-12 col-xl-4-12">

                    <!-- Sales -->
                    <div class="card">
                        <div class="card-header">

                            <!-- Title -->
                            <h4 class="card-header-title">
                                Account Funding
                            </h4>

                        </div>
                        <div class="card-body">

                            <!-- Chart -->
                            <div class="chart">
                                <canvas id="salesChart" class="chart-canvas"></canvas>
                            </div>

                        </div>
                    </div>

                </div>
            </div> <!-- / .row -->
        </div>

    </div><!-- / .main-content -->
    @include('admin.partials.script')

</body>

</html>
