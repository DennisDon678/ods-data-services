<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/mobile/assets/styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/mobile/assets/styles/style.css">
    <link href="/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/mobile/assets/fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="/mobile/assets/scripts/_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="/mobile/assets/img/favicon.png">
    <link rel="icon" type="image/png" href="/mobile/assets/img/favicon.png">
    <style>
        body {
            background-color: #000000;
        }

        .card {
            background: rgba(0, 0, 0, 0.5);
            margin: 20px;
        }

        .form-control {
            background-color: #fafafa !important;
            border-radius: 1rem !important;
            padding: 25px !important;
            padding-left: 50px !important;
        }

        .form-control:focus {
            background-color: #ffffff !important;
        }


        .input-style i {
            padding-left: 20px !important;
        }

        .btn {
            border-radius: 1rem !important;
        }
    </style>
</head>

<body class="theme-light">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">



        <div class="page-content mt-3">

            <div style="display:flex; justify-content:center; align-content:center;">
                <div class="card card-style">
                    <div class="content ">

                        <div class="text-center">
                            <h2 class="mb-3 text-white mt-5" id="accountname">Welcome Back</h2>
                            <h4 class="font-25 mb-3 text-white" id="accountname2">Login To {{env('APP_NAME')}}</h4>
                        </div>

                        <div class="text-center">
                            <div class="pb-3 pt-3">
                                <a href="/"><img src="/assets/IMG_2024.png" class="img-fluid" width="200"></a>
                            </div>
                        </div>

                        <form id="login-form" method="post">
                            <div class="px-2">
                                <div class="input-style no-borders has-icon mb-4" id="phonediv">
                                    <i class="fa fa-phone"></i>
                                    <input type="number" class="form-control" id="phone" name="phone"
                                        placeholder="Phone Number" required="" readonly="">
                                    <label for="phone" class="color-highlight">Phone</label>
                                    <em>(required)</em>
                                </div>
                                <div class="input-style no-borders has-icon mb-4">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" required="" readonly="">
                                    <label for="password" class="color-highlight">Password</label>
                                    <em>(required)</em>
                                </div>

                                <button type="submit" id="submit-btn" style="width: 100%;"
                                    class="btn btn-full btn-l font-600 font-15 gradient-highlight mt-4 ">
                                    Login
                                </button>

                                <div class="row pt-5 mb-3">
                                    <div class="col-12 text-center font-15">
                                        <a class="text-white" href="/recovery/index.htm">Forget Password? Recover
                                            It</a>
                                    </div>
                                    <div class="col-12 text-center font-15 mt-2">
                                        <a class="text-white" href="/auth/sign-up">New User? Create New
                                            Account</a>
                                    </div>
                                    <div class="col-12 text-center font-15 mt-3">
                                        <a class="text-white"></a><b>{{env('APP_NAME')}} v1.0</b>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>



        </div>
        <!-- Page content ends here-->


    </div>

    <script src="/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="/mobile/assets/scripts/bootstrap.min.js"></script>
    <script src="/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="/mobile/assets/scripts/custom.js"></script>

    <script type="text/javascript">
        $("document").ready(function() {

            //Save Phone Number
            checkIfPhoneNumberSaved();

            //Enable Form Input
            $("#phone").click(function() {
                $(this).removeAttr("readonly");
            });
            $("#password").click(function() {
                $(this).removeAttr("readonly");
            });

            //Registration Form
            $('#login-form').submit(function(e) {
                e.preventDefault()
                $('#submit-btn').removeClass("gradient-highlight");
                $('#submit-btn').addClass("btn-secondary");
                $('#submit-btn').html(
                    '<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Verifying .');

                $.ajax({
                    url: '/home/includes/route.php?login',
                    data: new FormData($(this)[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    type: 'POST',
                    success: function(resp) {
                        console.log(resp);
                        if (resp == 0) {
                            swal('Alert!!', "Login Succesfull", "success");
                            setTimeout(function() {
                                location.replace('/home/')
                            }, 1000)
                        } else if (resp == 1) {
                            swal('Alert!!',
                                "Incorrect {{env('APP_NAME')}} Login Details, Please Try Again with a correct one to avoid suspension.",
                                "error");
                        } else if (resp == 2) {
                            swal('Alert!!',
                                "Sorry, Your Account Have Been Blocked By {{env('APP_NAME')}} Management. Please Contactus For Futher Support.",
                                "error");
                        } else {
                            swal('Alert!!', "Unknow Error, Please Contact us at {{env('APP_NAME')}}",
                                "error");
                        }

                        $('#submit-btn').removeClass("btn-secondary");
                        $('#submit-btn').addClass("gradient-highlight");
                        $('#submit-btn').html("Login");

                    }
                })
            });

        });

        function checkIfPhoneNumberSaved() {
            $phone = atob(unescape(getCookie("loginPhone")));
            $name = atob(unescape(getCookie("loginName")));
            if ($phone != null && $phone != "") {
                let msg =
                    '<p class="mb-3"><a href="javascript:showNumber();"><b class="text-white">Login With Another Account?</b></a></p>';
                $("#accountname2").after(msg);
                $("#accountname").append(" " + $name + "!");
                $("#phonediv").hide();
                $("#phone").val($phone);
            }
        }

        function showNumber() {
            $("#phonediv").show();
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1);
                if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
            }
            return "";
        }
    </script>

</body>

</html>
