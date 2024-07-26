<!doctype html>
<html lang="en" data-bs-theme="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/admin/assets/favicon/favicon.ico" type="image/x-icon">

    <!-- Map CSS -->
    {{-- <link rel="stylesheet" href="mapbox-gl-js/v0.53.0/mapbox-gl.css"> --}}

    <!-- Libs CSS -->
    <link rel="stylesheet" href="/admin/assets/css/libs.bundle.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/admin/assets/css/theme.bundle.css">
    <link rel="stylesheet" href="">

    <style>
        body {
            display: none;
        }
    </style>

    <!-- Title -->
    <title>{{ env('APP_NAME') }} admin portal</title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="gtag/js?id=UA-156446909-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());
        gtag("config", "UA-156446909-1");
    </script>
</head>

<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">

    <!-- CONTENT
    ================================================== -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-xl-4 my-5">

                <!-- Heading -->
                <h1 class="display-4 text-center mb-3">
                    Welcome {{ env('APP_NAME') }} admin, Sign in
                </h1>

                <!-- Form -->
                <form id="loginForm" method="post">
                    @csrf
                    <!-- Email address -->
                    <div class="form-group">

                        <!-- Label -->
                        <label class="form-label">
                            Email Address
                        </label>

                        <!-- Input -->
                        <input type="email" id="email" class="form-control" name="email" placeholder="name@address.com">

                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col">

                                <!-- Label -->
                                <label class="form-label">
                                    Password
                                </label>

                            </div>
                            <div class="col-auto">

                                <!-- Help text -->
                                <a href="password-reset-cover.html"  class="form-text small text-body-secondary">
                                    Forgot password?
                                </a>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Input group -->
                        <div class="input-group input-group-merge">

                            <!-- Input -->
                            <input class="form-control" id="password" name="password" type="password"
                                placeholder="Enter your password">

                            <!-- Icon -->
                            <span class="input-group-text">
                                <i class="fe fe-eye"></i>
                            </span>

                        </div>
                    </div>

                    <!-- Submit -->
                    <button id="submitBtn" class="btn btn-lg w-100 btn-primary mb-3">
                        Sign in
                    </button>

                    <!-- Link -->
                    <div class="text-center">
                        <small class="text-body-secondary text-center">
                            Don't have an account yet? <a href="sign-up.html">Sign up</a>.
                        </small>
                    </div>

                </form>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->

    <!-- JAVASCRIPT -->
    <!-- Map JS -->
    {{-- <script src='mapbox-gl-js/v0.53.0/mapbox-gl.js'></script> --}}

    <!-- Vendor JS -->
    <script src="/admin/assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="/admin/assets/js/theme.bundle.js"></script>
    <script src="/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="/jquery-3.6.0.min.js"></script>


    <script>
        $('#loginForm').submit((e) => {
            e.preventDefault();
            if ($('#email').val() != '' || $('#password').val() != '') {
                console.log($('#password').val())
                $('#submitBtn').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Verifying .')
                $.ajax({
                    type: "post",
                    url: "/auth/admin-sign-in",
                    data: new FormData($('#loginForm')[0]),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response === 0) {
                            location.replace('/admin/dashboard');
                        } else {
                            $('#submitBtn').html('Sign in');
                            swal(
                                'Alert!!',
                                "Invalid email or password.",
                                'error'
                            )
                        }
                    }
                })
            } else {
                swal(
                    'alert!!',
                    "All fields are required.",
                    'error'
                )
            }
        })
    </script>
</body>

</html>
