<!doctype html>
<html lang="en">

@include('users.partials.head')

<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled" data-sidebarstyle="sidebar-pushcontent">

    @include('users.partials.preloader')

    @include('users.partials.headNav')

    @include('users.partials.sideNav')

    <!-- Begin page content -->
    <main class="main mainheight">
        <div class="container">
            <div class="tab-content py-3" id="myTabContent">
                <!-- personal info tab-->
                <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                    <h6 class="title">Basic Details</h6>
                    <div class=" row mb-3">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="First Name"
                                        value="{{ explode(' ', Auth::user()->name)[0] }}" disabled="" required=""
                                        class="form-control border-start-0">
                                    <label>First Name</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="Last Name"
                                        value="{{ explode(' ', Auth::user()->name)[1] }}" disabled="" required=""
                                        class="form-control border-start-0">
                                    <label>Last Name</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="email" placeholder="Email Address" value="{{ Auth::user()->email }}"
                                        required="" disabled="" required=""
                                        class="form-control border-start-0">
                                    <label>Email Address</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="title">Address Details</h6>
                    <div class="row mb-3">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="State" value="{{ Auth::user()->state }}"
                                        disabled='' required="" class="form-control border-start-0">
                                    <label>State</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="title">Change Password</h6>
                    <form method="post" id="changePasswordForm">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12 ">
                                <div class="form-group mb-3 position-relative check-valid">
                                    <div class="form-floating">
                                        <input type="password" placeholder="Enter Your Old Password" id="oldpass"
                                            required="" name="oldPassword" class="form-control border-start-0">
                                        <label>Enter Your Old Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="form-group mb-3 position-relative check-valid">
                                    <div class="form-floating">
                                        <input type="password" required="" placeholder="Enter Your new password"
                                            id="newpass" name="newPassword" class="form-control border-start-0">
                                        <label>Enter Your new password</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <!-- submit button -->
                                <button class="btn btn-theme" id="changePasswordBtn" type="submit">Submit</button>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-white" type="button">Cancel</button>
                            </div>
                        </div>
                    </form>

                    <h6 class="title mt-4">Change Pin</h6>
                    <form method="post" id="changePinForm">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12 ">
                                <div class="form-group mb-3 position-relative check-valid">
                                    <div class="form-floating">
                                        <input type="password" required="" placeholder="Enter Your new Pin"
                                            id="newpin" name="newPin" class="form-control border-start-0">
                                        <label>Enter Your new Pin</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <!-- submit button -->
                                <button class="btn btn-theme" id="changePinBtn" type="submit">Submit</button>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-white" type="button">Cancel</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </main>
    {{--  --}}
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')

    <script src="/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
    <script src="/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

    <script>
        $("document").ready(function() {
            $("#changePasswordForm").submit(function(e) {
                e.preventDefault();

                const oldPass = $('#oldpass').val();
                const newPass = $('#newpass').val();

                var msg = "";
                if (newPass.length > 15) {
                    msg = "New Password should not be more than 15 character.";
                }
                if (newPass.length < 8) {
                    msg = "New Password should be at least 8 character.";
                }
                if (newPass == '{{ Auth::user()->phone }}') {
                    msg = "You can't use your phone number as password.";
                }
                if (newPass == "" || newPass == " ") {
                    msg = "Please Enter Password.";
                }

                if (msg != "") {
                    swal("Alert!!", msg, "info");
                    msg = "";
                    return;
                }
                $('#changePasswordBtn').html(
                    '<i class="fa fa-spinner fa-spin text-warning" aria-hidden="true"></i> Changing Please wait .');

                // Change Password
                $.ajax({
                    type: "post",
                    url: "/user/change_password",
                    data: new FormData($('#changePasswordForm')[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response == 0) {
                            swal("Alert!!", "Password Changed Successfully.", "success");
                            setTimeout(function() {
                                location.replace('/user/dashboard')
                            }, 1000)
                        }

                        if (response == 1) {
                            swal("Alert!!", "Old Password is Incorrect.", "error");
                            $('#changePasswordBtn').html('Submit');
                            return false;
                        }
                    }
                });

            });

            // Change Pin
            $("#changePinForm").submit(function(e) {
                e.preventDefault();
                const newPin = $('#newpin').val();
                var msg = "";
                if (newPin.length < 4) {
                    msg = "New Pin should be at least 4 character.";
                }
                if (newPin == "" || newPin == " ") {
                    msg = "Please Enter Pin.";
                }
                if (msg!= "") {
                    swal("Alert!!", msg, "info");
                    msg = "";
                    return;
                }

                $('#changePinBtn').html(
                    '<i class="fa fa-spinner fa-spin text-warning" aria-hidden="true"></i> Changing Please wait.');

                // use ajax request to change
                $.ajax({
                    type: "post",
                    url: "/user/change_pin",
                    data: new FormData($('#changePinForm')[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response == 0) {
                            swal("Alert!!", "Pin Changed Successfully.", "success");
                            setTimeout(function() {
                                location.replace('/user/dashboard')
                            }, 1000)
                        }
                        if (response == 1) {
                            swal("Alert!!", "Pin is not valid.", "error");
                            $('#changePinBtn').html('Submit');
                            return false;
                        }
                    }
                });
            })
        });
    </script>
</body>

</html>
