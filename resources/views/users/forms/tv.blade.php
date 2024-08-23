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
                        <h6 class="title" id="exampleModalLabel">Buy Cable Subscription</h6>
                    </div>

                    <div class="">
                        <div class="row card-body">
                            <div class="col-12 col-lg-12 mb-2">
                                <form action="" id="BuyTV">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 col-md-12 mb-2">
                                                <div class="form-group mb-3 position-relative check-valid">
                                                    <div class="input-group input-group-lg">
                                                        <div class="form-floating">
                                                            <select class="form-select border-0" id="cablename"
                                                                name="cablename" required="">
                                                                <option value="">Choose Your Cable...</option>
                                                                <option value="1">GOTV</option>
                                                                <option value="2">DSTV</option>
                                                                <option value="3">STARTIMES</option>
                                                            </select>
                                                            <label for="network">Cable Name</label>
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
                                                            <select class="form-select border-0" name="plan"
                                                                id="Cable_plan" required="">
                                                                <option value="" id="emptyCablePlan">
                                                                    ----------------------</option>
                                                            </select>
                                                            <label for="country2">Cable Plan</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <div class="form-group mb-3 position-relative check-valid">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <input type="number" placeholder="9032431003" name="iuc"
                                                            id="iuc" name="mobile_number" required=""
                                                            class="form-control border-start-0">
                                                        <label>Smart Card number / IUC number</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <button type="button" id="validateIUC" class="btn btn-warning">Validate
                                                IUC</button>
                                            <div id="valid"></div>
                                        </div>

                                        <div class="mb-2">
                                            <div class="form-group mb-3 position-relative check-valid">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <input type="number" placeholder="100" required=""
                                                            class="form-control border-start-0" id="planPrice" readonly>
                                                        <label>Enter Amount (&#8358;)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <div class="form-group mb-3 position-relative check-valid">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <input type="number" placeholder="1234" id="pin"
                                                            required="" class="form-control border-start-0">
                                                        <label>Enter Your Pin</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit"  id="buyBtn" 
                                            class=" border-start-0 btn btn-primary mb-2">Buy</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
    <script src="/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script>
        $('#buyBtn').hide();
        // Working on Data type
        $('#cablename').on('change', () => {
            const cable = $('#cablename').val();

            $('#valid').html(``);

            $('#validateIUC').removeClass('btn-success');
            $('#validateIUC').addClass('btn-warning');
            $('#validateIUC').html('Validate IUC');

            if (cable === '') {
                $('#Cable_plan').empty();
                $('#Cable_plan').append('<option value="" id="emptyCablePlan">----------------------</option>');
                return;
            } else {
                // console.log(cable);
                $.ajax({
                    type: "GET",
                    url: "/user/tv/get_plans?cable_id=" + cable,
                    success: function(response) {
                        // console.log(response);
                        if (response.length > 0) {
                            $('#emptyCablePlan').remove();
                            $('#Cable_plan').html(
                                '<option value="">Choose a Cable Plan</option>'
                            )
                            response.forEach((data) => {
                                // console.log(data.plan_id);
                                $('#Cable_plan').append(
                                    '<option value="' + data.plan_id + '">' + data
                                    .plan_name +
                                    '</option>'
                                )
                                $('#planPrice').val('');
                            });
                        } else {
                            $('#Cable_plan').html(
                                '<option value="" id="emptyCablePlan">No cable Plan to Show</option>'
                            )
                        }

                    }
                });
            }
        })


        // Get Plan details
        $('#Cable_plan').on('change', () => {
            const plan_id = $('#Cable_plan').val();
            // console.log(plan_id);
            if (plan_id == '') {
                $('#planPrice').val('');
                return;
            } else {
                $.ajax({
                    type: "get",
                    url: "/user/tv/get_plan_info?plan_id=" + plan_id,
                    success: function(response) {
                        $('#planPrice').val(response.price)
                        // console.log(response);
                    }
                });
            }
        })

        // Validate IUC
        $('#validateIUC').on('click', () => {
            const selectedIndex = document.getElementById('cablename').selectedIndex;
            const selectedOption = document.getElementById('cablename').options[selectedIndex];
            const cablename = selectedOption.text;
            const iuc = $('#iuc').val();

            if (cablename == '' || iuc == '') {
                swal('Alert', 'Please enter both cablename and IUC', 'error');
                return false;
            }
            $('#validateIUC').html(
                '<i class="fa fa-spinner fa-spin text-warning text-light" aria-hidden="true"></i> Validating Please wait... '
            );

            $.ajax({
                type: "get",
                url: "/user/validate_subscriber?cablename=" + cablename + "&iuc=" + iuc,
                success: function(response) {
                    if (response == 1) {
                        $('#validateIUC').html('Validate IUC');
                        swal('Alert', 'Invalid IUC/Smart Card Number', 'error');

                        return false;
                    } else {
                        $('#valid').html(`<p class="text-success my-2">${response.name}</p>`);

                        $('#validateIUC').removeClass('btn-warning');
                        $('#validateIUC').addClass('btn-success');
                        $('#validateIUC').html('Valid');
                        $('#buyBtn').show();
                        return false;
                    }
                }
            });

        });

        // Submit
        $('#BuyTV').on('submit', (e) => {

            e.preventDefault();
            $('#buyBtn').html('<i class="fa fa-spinner fa-spin text-warning" aria-hidden="true"></i> Buying Please wait .');
                const pin = $("#pin").val();
            $.ajax({
                type: "get",
                url: "/user/check_pin_code?pin=" + pin,
                success: function(response) {
                    // console.log(response);
                    if (response != 0) {
                        swal('Alert!!', "Pin code is not correct", "error");
                        $('#buyBtn').html(
                            `Buy`
                        );
                        return false;
                    }
                    $.ajax({
                        type: "POST",
                        url: "/user/buy_cable_subscription",
                        data: new FormData($('#BuyTV')[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response == 1) {
                                swal('Alert!!', "Insufficient Balance", "error");
                                $('#buyBtn').html(`Buy`);
                            }

                            if(response == 2){
                                swal('Alert!!', "An error occured please contact support", "error");
                                $('#buyBtn').html(
                                    `Buy`
                                );
                            }
                        }
                    });
                }
            })
        });
    </script>
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')
</body>

</html>
