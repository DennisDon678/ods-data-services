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
            <div class="p-2 mb-2 ">
                <div class="card">

                    <div class="card-header">
                        <h6 class="title" id="exampleModalLabel">Buy Electricity</h6>
                    </div>

                    <div class="card-body">
                        <div class="row ">
                            <div class="col-12 col-md-12 mb-2">
                                <div class="form-group mb-3 position-relative check-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="disco" name="disco"
                                                required="">
                                                <option value="">Choose Your Disco...</option>
                                                <option value="1">Ikeja Electric</option>

                                                <option value="2">Eko Electric</option>

                                                <option value="3">Abuja Electric</option>

                                                <option value="4">Kano Electric</option>

                                                <option value="5">Enugu Electric</option>

                                                <option value="6">Port Harcourt Electric</option>

                                                <option value="7">Ibadan Electric</option>

                                                <option value="8">Kaduna Electric</option>

                                                <option value="9">Jos Electric</option>

                                                <option value="10">Benin Electric</option>

                                                <option value="11">Yola Electric</option>
                                            </select>
                                            <label for="disco">Disco Name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-12 mb-2">
                                <div class="form-group mb-3 position-relative check-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="plan" name="plan" required="">
                                                <option value="" id="">----------------------</option>
                                                <option value="Prepaid">Prepaid</option>

                                                <option value="Postpaid">Postpaid</option>
                                            </select>
                                            <label for="country2">Meter Type</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input type="text" placeholder="9032431003" id="meter"
                                            name="meter" required="" class="form-control border-start-0">
                                        <label>Meter Number</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <button type="button" id="validateMeter" class="btn btn-warning">Validate Meter</button>
                        </div>
                        <div id="valid"></div>

                        <div class="mb-2">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input type="number" placeholder="100" required=""
                                            class="form-control border-start-0" id="amount" readonly>
                                        <label>Enter Amount (&#8358;)</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input type="number" placeholder="100" required=""
                                            class="form-control border-start-0" id="amount" readonly>
                                        <label>Customer Phone</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input type="number" placeholder="1234" id="pin" required=""
                                            class="form-control border-start-0">
                                        <label>Enter Your Pin</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" id="buyBtn">Buy</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
    <script src="/jquery-3.6.0.min.js" ></script>
    <script>
         $('#buyBtn').hide();

        //  Validate Meter
        $('#validateMeter').on('click', () => {
            const selectedIndex = document.getElementById('disco').selectedIndex;
            const selectedOption = document.getElementById('disco').options[selectedIndex];
            const disco = selectedOption.text;
            const meter = $('#meter').val();
            const plan = $('#plan').val();

             if (disco == '' || meter == '') {
                swal('Alert', 'Please enter both disco and meter', 'error');
                return false;
            }
            $('#validateMeter').html(
                '<i class="fa fa-spinner fa-spin text-warning text-light" aria-hidden="true"></i> Validating Please wait... '
            );

            $.ajax({
                type: "get",
                url: "/user/validate_subscriber?disconame=" + disco + "&meter=" + meter+'&mtype='+plan,
                success: function(response) {
                    if (response == 1) {
                        $('#validateMeter').html('Validate meter number');
                        swal('Alert', 'Invalid meter', 'error');

                        return false;
                    } else {
                        $('#valid').html(`<p class="text-success my-2">${response.name}</p>`);

                        $('#validateMeter').removeClass('btn-warning');
                        $('#validateMeter').addClass('btn-success');
                        $('#validateMeter').html('Valid');
                        $('#buyBtn').show();
                        return false;
                    }
                }
            });
        });
    </script>

    @include('users.partials.mobileNav')
    @include('users.partials.scripts')
</body>

</html>
