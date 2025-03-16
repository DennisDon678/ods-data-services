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
                                New Staff
                            </h1>

                        </div>

                    </div> <!-- / .row -->
                </div> <!-- / .header-body -->

            </div>
        </div> <!-- / .header -->

        <!-- CARDS -->
        <div class="container-fluid">
            {{-- display error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- display success --}}
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <!-- Form -->
                    <form method="POST">
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
                                    <input type="text" value="" name="name" class="form-control" required>

                                </div>

                            </div>

                            <div class="col-12">

                                <!-- Email address -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                        Email address
                                    </label>

                                    <!-- Input -->
                                    <input type="email" value="" name="email" class="form-control" required>

                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Phone
                                    </label>

                                    <!-- Input -->
                                    <input type="text" value="" name="phone" class="form-control mb-3"
                                        placeholder="08012345678" required>

                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- Birthday -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label class="form-label">
                                        Password
                                    </label>

                                    <!-- Input -->
                                    <input type="text" value="" name="password" class="form-control" required>
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-primary" id="generate">Generate
                                            password</button>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->


                        <!-- Divider -->
                        <hr class="my-4">
                        <button class="btn btn-primary">Create Staff</button>
                    </form>

                    <br><br>

                </div>
            </div>
        </div>

    </div><!-- / .main-content -->
    @include('admin.partials.script')

    @if (Session::has('message'))
    @endif

    <script>
        document.getElementById('generate').addEventListener('click', function() {
            var password = Math.random().toString(36).slice(-10);
            document.querySelector('input[name="password"]').value = password;
        });
    </script>
</body>

</html>
