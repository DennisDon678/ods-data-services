<!DOCTYPE html>
<html lang="en" data-bs-theme="">
@include('admin.partials.head')

<body>

    <!-- NAVIGATION -->
    @include('staff.partial.sidebar')
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
                                Profile
                            </h1>

                        </div>

                    </div> <!-- / .row -->
                </div> <!-- / .header-body -->

            </div>
        </div> <!-- / .header -->

        <!-- CARDS -->
        <div class="container-fluid">

            <div class="row justify-content-center">
                @if (Session::has('error'))
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    </div>
                @endif
                <div class="col-12 col-lg-10 col-xl-8">
                    <h4>Basic User Information</h4>
                    <!-- Form -->
                    <form method="post" action="?type=info">
                        @csrf
                        <!-- Divider -->
                        <hr class="my-2">

                        <div class="row mb-4">
                            <div class="col-12 col-md-6">

                                <!-- First name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Name
                                    </label>

                                    <!-- Input -->
                                    <input type="text" name="name" value="{{ $user->name }}"
                                        class="form-control" readonly>

                                </div>

                            </div>

                            <div class="col-12 col-md-6">

                                <!-- Email address -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                        Email address
                                    </label>

                                    <!-- Input -->
                                    <input type="email" name="email" value="{{ $user->email }}"
                                        class="form-control" readonly>

                                </div>

                            </div>

                        </div> <!-- / .row -->
                    </form>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <h4 class="text-bold">Change Password</h4>
                    <!-- Form -->
                    <form  method="POST">
                        @csrf
                        <!-- Divider -->
                        <hr class="my-2">

                        <div class="row mb-4">
                            <div class="col-12 col-md-6">

                                <!-- First name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Old Password
                                    </label>

                                    <!-- Input -->
                                    <input type="password" name="old_password" class="form-control" required>

                                </div>

                            </div>

                            <div class="col-12 col-md-6">

                                <!-- Email address -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                        New Password
                                    </label>

                                    <!-- Input -->
                                    <input type="password" name="password" class="form-control" required>

                                </div>

                            </div>

                        </div> <!-- / .row -->


                        <div class="col-auto">

                            <!-- Button -->
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>

                        </div>

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
