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
                        <h6 class="title" id="exampleModalLabel">Buy Airtime</h6>
                    </div>
                    <form action="" id="airtimeForm">
                        @csrf
                        <div class="">
                            <div class="row card-body">
                                <div class="col-12 col-lg-12 mb-2">

                                    <div class="row">
                                        <div class="col-12 col-md-12 mb-2">
                                            <div class="form-group mb-3 position-relative check-valid">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <select class="form-select border-0" id="network"
                                                            name="network" required="">
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
                                                        <label for="country2">Network</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-group mb-3 position-relative check-valid">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">
                                                    <input type="number" placeholder="09032431003" id="phone"
                                                        name="phone" required=""
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
                                                    <input type="number" placeholder="100" id="amount"
                                                        name="amount" required=""
                                                        class="form-control border-start-0">
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
                                                        name="pin" class="form-control border-start-0">
                                                    <label>Enter Your Pin</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button id="buyBtn" type="submit"
                                        class=" border-start-0 btn btn-primary mb-2">Buy Now
                                    </button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>



    {{-- Operations --}}
    <script src="/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
    <script src="/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>


    <script>
        // $(document).ready(function() {
        //     alert('Hello');
        // });
        $('#airtimeForm').on('submit', function(e) {
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
                            `Buy Now`
                        );
                        return false;
                    }
                    const formData = new FormData($('#airtimeForm')[0]);
                    $.ajax({
                        type: "post",
                        url: "/user/airtime/buy_airtime",
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if (data == 0) {
                                $('#buyBtn').html(
                                    `Buy Now`
                                );

                                swal('Alert!!', "Airtime Purchased Succesfully", "success");
                            } else if (data == 1) {
                                $('#buyBtn').html(
                                    `Buy Now`
                                );
                                swal('Alert!!', "Insufficient Balance", "error");
                            } else {
                                $('#buyBtn').html(
                                    `Buy Now`
                                );
                                swal('Alert!!', "An error occured please contact admin",
                                    "error");
                            }
                        }
                    })
                }
            })

        })
    </script>
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')
</body>

</html>
