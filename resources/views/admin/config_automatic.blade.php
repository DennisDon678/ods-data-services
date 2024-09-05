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
                                Automatic Funding Config
                            </h1>

                        </div>

                    </div> <!-- / .row -->
                </div> <!-- / .header-body -->

            </div>
        </div> <!-- / .header -->

        <!-- CARDS -->
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <h4>Config Information</h4>
                    <!-- Form -->
                    <form method="POST">
                        @csrf
                        <!-- Divider -->
                        <hr class="my-2">

                        <div class="row mb-4">
                            <div class="col-12 ">

                                <!-- First name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Charge Amount
                                    </label>

                                    <!-- Input -->
                                    <input type="text" value="{{ $auto_config->charge_amount }}" name="charge_amount" class="form-control">

                                </div>

                            </div>
                        </div> <!-- / .row -->


                        <h4>Actions</h4>
                        <!-- Divider -->
                        <hr class=" mb-5">

                        <div class="row justify-content-between">
                            <div class="col-12 col-md-6">

                                <!-- Heading -->
                                <h4>
                                    Update Configuration
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <button class="btn btn-primary" type="submit">
                                    Update
                                </button>

                            </div>
                        </div> <!-- / .row -->

                    </form>

                    <br><br>

                </div>
            </div>
        </div>
    </div><!-- / .main-content -->
    @include('admin.partials.script')

    @if (Session::has('message'))
    @endif

</body>

</html>
