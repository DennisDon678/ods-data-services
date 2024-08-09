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
                        <h6 class="title" id="exampleModalLabel">Buy Mobile Data</h6>
                    </div>
                    <div class="row card-body">
                        <div class="col-lg-8 mb-2 ">
                            <p class="text-center">Codes for Data Balance:</p>
                            <div class="mtn p-3" style="background-color: rgba(230, 230, 76, 0.685);">
                                <p>MTN [SME] *461*4#</p>
                                <p>MTN [Gifting] *323#</p>
                                <p>MTN [Corporate Gifting] *323*1#</p>
                                <p>MTN [data coupon] send 2 to 312 as a text, it's called promo data</p>
                            </div>

                            <div class="9mobile p-3" style="background-color: #64811fc4">
                                <p>9mobile [C.G and Gifting] *323#</p>
                            </div>

                            <div class="airtel p-3" style="background-color: #f74f4faf">
                                <p>Airtel [Gifting] *323#</p>
                                <p> Airtel [C.G ] *323#, it's called edu data.</p>
                            </div>

                            <div class="glo p-3" style="background-color: #a3fc67af">
                                <p>Glo [C.G and Gifting] *323#</p>
                            </div>
                        </div>

                        <div class="col-lg-8 mb-2">
                            <form action="" id="buyData">
                                @csrf
                                <div class="">
                                    <div class="row">
                                        <div class="col-12 col-md-12 mb-2">
                                            <div class="form-group mb-3 ">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <select class="form-select border-0" id="network"
                                                            name="network_id" required="">
                                                            <option value="">Choose Your Network...</option>
                                                            @php
                                                                $networks = App\Models\Network_list::all();
                                                            @endphp
                                                            @foreach ($networks as $network)
                                                                @if (strtoupper($network->label) != 'SMILE')
                                                                    <option value="{{ $network->network_id }}">
                                                                        {{ $network->label }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <label for="network">Network</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-12 mb-2">
                                            <div class="form-group mb-3 ">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <select class="form-select border-0" id="plan_type"
                                                            required="">
                                                            <option value="" id="emptyType">----------------------
                                                            </option>
                                                        </select>
                                                        <label for="country2">Data Type</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-12 mb-2">
                                            <div class="form-group mb-3 ">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <select class="form-select border-0" id="plan"
                                                            name="plan_id" required="">
                                                            <option value="" id="emptyPlan">----------------------
                                                            </option>
                                                        </select>
                                                        <label for="plan">Data Plan</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-group mb-3 ">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">
                                                    <input type="number" placeholder="09032431003" id="phone"
                                                        name="mobile_number" required=""
                                                        class="form-control border-start-0">
                                                    <label>Enter Phone Number</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-group mb-3 ">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">
                                                    <input type="number" placeholder="100" required=""
                                                        class="form-control border-start-0" id="amount"
                                                        name="amount" readonly>
                                                    <label>Enter Amount (&#8358;)</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-group mb-3 ">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">
                                                    <input type="number" placeholder="1234" id="pin"
                                                        required="" class="form-control border-start-0">
                                                    <label>Enter Your Pin</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="" id="buyBtn">
                                        <input type="submit" value="Buy Now" required=""
                                            class=" border-start-0 btn btn-primary mb-2">
                                    </div>

                                </div>
                            </form>
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
        // Working on Data type
        $('#network').on('change', () => {
            const network_id = $('#network').val();


            $('#plan_type').html(
                '<option value="" id="emptyType">----------------------</option>')
            $('#plan').html(
                '<option value="" id="emptyPlan">----------------------</option>')
            $('#amount').val('');


            $.ajax({
                type: "GET",
                url: "/user/data/get_plan_type?network_id=" + network_id,
                success: function(response) {
                    if (response.length > 0) {
                        $('#emptyType').remove();
                        $('#plan_type').append(
                            '<option value="">Choose a Data type</option>'
                        )
                        response.forEach((data) => {
                            // console.log(data);
                            $('#plan_type').append(
                                '<option value="' + data.id + '">' + data.plan_type +
                                '</option>'
                            )
                            $('#amount').val('');
                        });
                    } else {
                        $('#plan_type').html(
                            '<option value="" id="emptyType">No Data Type to Show</option>')
                        $('#plan').html(
                            '<option value="" id="emptyPlan">----------------------</option>')
                        $('#amount').val('');
                    }

                }
            });
        })

        $('#plan_type').on('change', () => {
            const plan_id = $('#plan_type').val();
            // console.log(plan_id);
            $.ajax({
                type: "GET",
                url: "/user/data/get_data_plans?plan_id=" + plan_id,
                success: function(response) {
                    if (response.length > 0) {
                        $('#emptyPlan').remove();
                        $('#plan').html(
                            '<option value="">Choose a Data Plan</option>'
                        )
                        response.forEach((data) => {
                            // console.log(data);
                            $('#plan').append(
                                '<option value="' + data.data_id + '">' + data.size +
                                ' for ' + data.validity + '.</option>'
                            )
                            $('#amount').val('');
                        });
                    } else {
                        $('#plan').html(
                            '<option value="" id="emptyPlan">No Data Plan to Show</option>');
                        $('#amount').val('');
                    }

                }
            });
        })
        // Get Plan details
        $('#plan').on('change', () => {
            const data_id = $('#plan').val();
            $.ajax({
                type: "get",
                url: "/user/data/get_plan?data_id=" + data_id,
                success: function(response) {
                    $('#amount').val(response)
                    // console.log(response);
                }
            });
        })

        // Buy data 
        $('#buyData').on('submit', (e) => {
            e.preventDefault();

            // check if number is 11 digits alert message
            if ($('#phone').val().length != 11) {
                swal('Alert!!', "Phone number should be 11 digits!", "error");
                return false;
            }

            $('#buyBtn').html(
                '<i class="fa fa-spinner fa-spin text-warning" aria-hidden="true"></i> Buying Please wait .');
            // Verify Pin Code
            const pin = $("#pin").val();
            $.ajax({
                type: "get",
                url: "/user/check_pin_code?pin=" + pin,
                success: function(response) {
                    // console.log(response);
                    if (response != 0) {
                        swal('Alert!!', "Pin code is not correct", "error");
                        $('#buyBtn').html(
                            `<input type="submit" value="Buy Now"
                                class="border-start-0 btn btn-primary mb-2">`
                        );
                        return false;
                    }

                    // Submit form to server
                    const formData = new FormData($('#buyData')[0]);
                    $.ajax({
                        type: "post",
                        url: "/user/data/buy_data",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response == 0) {
                                swal('Alert!!', "Data Purchased Succesfully", "success");
                                setTimeout(function() {
                                    location.replace('/user/dashboard')
                                }, 1000)
                            } else if (response == 1) {
                                swal('Alert!!', "Insufficient Balance", "error");
                                $('#buyBtn').html(
                                    `<input type="submit" value="Buy Now"
                                class="border-start-0 btn btn-primary mb-2">`
                                );
                            }else if(response == 2){
                                swal('Alert!!', "An error occured please contact support", "error");
                                $('#buyBtn').html(
                                    `<input type="submit" value="Buy Now"
                                class="border-start-0 btn btn-primary mb-2">`
                                );
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
