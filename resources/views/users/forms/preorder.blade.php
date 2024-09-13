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
                        <h6 class="title" id="exampleModalLabel">Pre-Order Data</h6>
                    </div>
                    <div class="col-12 col-lg-12 mb-2 p-2">
                        <div class=" ">
                            <p class="text-center">Notice:</p>
                            <div class="mtn p-3" style="background-color: rgba(230, 230, 76, 0.685);">
                                <p>Pre orders are delivered between the time of order and 12:00AM.</p>
                            </div>

                        </div>
                        <form action="" id="preOrderForm">.
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12 col-md-12 mb-2">
                                        <div class="form-group mb-3 position-relative check-valid">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">
                                                    <select class="form-select border-0" id="preOrderNetwork"
                                                        required="">
                                                        <option value="">Choose Your Network...</option>
                                                        <option value="1">MTN</option>
                                                        {{-- <option>Airtel</option>
                                            <option>GLO</option>
                                            <option>9Mobile</option> --}}
                                                    </select>
                                                    <label for="country2">Network</label>
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
                                                    <select class="form-select border-0" name="data_id"
                                                        id="preOrderPlan" required="">
                                                        <option value="" id="emptypreOrderPlan">
                                                            -------------------
                                                        </option>
                                                    </select>
                                                    <label for="country2">Data Plan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <div class="form-group mb-3 position-relative check-valid">
                                        <div class="input-group input-group-lg">
                                            <div class="form-floating">
                                                <input type="number" placeholder="09032431003" name="number"
                                                    id="preOrderPhone" required=""
                                                    class="form-control border-start-0">
                                                <label>Enter Phone Number</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <div class="form-group mb-3 position-relative check-valid">
                                        <div class="input-group input-group-lg">
                                            <div class="form-floating">
                                                <input type="number" placeholder="100" id="amountPreOrder"
                                                    required="" class="form-control border-start-0" readonly>
                                                <label>Enter Amount (&#8358;)</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <div class="form-group mb-3 position-relative check-valid">
                                        <div class="input-group input-group-lg">
                                            <div class="form-floating">
                                                <input type="number" placeholder="1234" id="preOrderPin" required=""
                                                    class="form-control border-start-0">
                                                <label>Enter Your Pin</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="preOrderBtn" class=" border-start-0 btn btn-primary mb-2">
                                    Place Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
    <script src="/jquery-3.6.0.min.js" ></script>
    <script>
        $('#preOrderNetwork').on('change', () => {
            const network_id = $('#preOrderNetwork').val();
            if (network_id == "") {
                $('#preOrderPlan').html(
                    '<option value="" id="emptypreOrderPlan">----------------------</option>')

                $('#amountPreOrder').val('');
                return false;
            }

            $.ajax({
                type: "get",
                url: "/user/get_preorders?network_id=" + network_id,
                success: function(response) {
                    $('#emptypreOrderPlan').remove();
                    $('#preOrderPlan').append(
                        '<option value="">Choose a Data type</option>'
                    )

                    response.forEach((data) => {
                        $('#preOrderPlan').append(
                            '<option value="' + data.id + '">' + data.size +
                            ' for ' + data.validity +
                            ' days.</option>'
                        )
                        $('#amount').val('');
                    })
                }
            });
        });

        $('#preOrderPlan').on('change', (event) => {
            const data_id = $('#preOrderPlan').val();
            if (data_id == "") {
                $('#amountPreOrder').val('');
                return false;
            }
            $.ajax({
                type: "get",
                url: "/user/get_preorders_details?data_id=" + data_id,
                success: function(response) {
                    if (response == 2) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'This data type is not available for preorder.',
                            icon: 'error',
                            confirmButtonText: 'Okay'
                        });
                        $('#preOrderPlan').val('');
                        return false;
                    } else if (response == 1) {
                        // insufficient balance
                        Swal.fire({
                            title: 'Error!',
                            text: 'Insufficient balance.',
                            icon: 'error',
                            confirmButtonText: 'Okay'
                        });
                        $('#preOrderPlan').val('');
                        return false;
                    }
                    $('#amountPreOrder').val(response)
                    // console.log(response);
                }
            });
        })

        $('#preOrderForm').on('submit', (e) => {
            e.preventDefault();

            // check if number is 11 digits alert message
            if ($('#preOrderPhone').val().length != 11) {
                swal('Alert!!', "Phone number should be 11 digits!", "error");
                return false;
            }

            $('#preOrderBtn').html(
                '<i class="fa fa-spinner fa-spin text-warning" aria-hidden="true"></i> Ordering Please wait .');
            // Verify Pin Code
            const pin = $("#preOrderPin").val();
            $.ajax({
                type: "get",
                url: "/user/check_pin_code?pin=" + pin,
                success: function(response) {
                    // console.log(response);
                    if (response != 0) {
                        swal('Alert!!', "Pin code is not correct", "error");
                        $('#preOrderBtn').html(
                            `Place Order`
                        );
                        return false;
                    }

                    // Submit form to server
                    const formData = new FormData($('#preOrderForm')[0]);
                    $.ajax({
                        type: "post",
                        url: "/user/submit_preorder",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response);
                            if (response == 0) {
                                swal('Alert!!', "Pre-Order Submitted.", "success");
                                setTimeout(function() {
                                    location.replace('/user/dashboard')
                                }, 1000)
                            } else if (response == 1) {
                                swal('Alert!!', "Insufficient Balance", "error");
                                $('#buyBtn').html(
                                    `<input type="submit" value="Buy Now"
                                class="border-start-0 btn btn-primary mb-2">`
                                );
                            } else if (response == 2) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'An error Occured.',
                                    icon: 'error',
                                    confirmButtonText: 'Okay'
                                });
                                $('#preOrderBtn').html(
                                    `Place Order`
                                );
                                return false;
                            }
                        }
                    });
                }
            });
        })
    </script>
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')
</body>

</html>
