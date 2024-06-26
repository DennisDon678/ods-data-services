<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-hidden="true">
    <div class="row  justify-content-center mb-2 modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Buy Mobile Data</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="col-12 col-lg-12 border">
                <form action="" id="buyData">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-12 mb-2">
                                <div class="form-group mb-3 position-relative check-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="network" name="network_id"
                                                required="">
                                                <option value="">Choose Your Network...</option>
                                                <option value="1">MTN</option>
                                                <option value="4">Airtel</option>
                                                <option value="2">GLO</option>
                                                <option value="3">9Mobile</option>
                                            </select>
                                            <label for="network">Network</label>
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
                                            <select class="form-select border-0" id="plan_type" required="">
                                                <option value="" id="emptyType">----------------------</option>
                                            </select>
                                            <label for="country2">Data Type</label>
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
                                            <select class="form-select border-0" id="plan" name="plan_id"
                                                required="">
                                                <option value="" id="emptyPlan">----------------------</option>
                                            </select>
                                            <label for="plan">Data Plan</label>
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
                                            name="mobile_number" required="" class="form-control border-start-0">
                                        <label>Enter Phone Number</label>
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
                                        <label>Enter Amount (&#8358;)</label>
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
                        <input type="submit" value="Buy" required=""
                            class=" border-start-0 btn btn-primary mb-2">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
<script src="/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script>
    // Working on Data type
    $('#network').on('change', () => {
        const network_id = $('#network').val();

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
                    $('#price').val(0);
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
                            ' for ' + data.validity +
                            ' days.</option>'
                        )
                        $('#amount').val('');
                    });
                } else {
                    $('#plan').html(
                        '<option value="" id="emptyPlan">No Data Type to Show</option>');
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
                $('#amount').val(response.price)
                // console.log(response);
            }
        });
    })

    // Buy data 
    $('#buyData').on('submit', (e) => {
        e.preventDefault();

        // check if number is 11 digits alert message
        if ($('#phone').val().length != 11) {
            swal('Alert!!', "Phone number should be 11 digitl", "error");
            return false;
        }

        // Verify Pin Code
        const pin = $("#pin").val();
        $.ajax({
            type: "get",
            url: "/user/check_pin_code?pin=" + pin,
            success: function(response) {
                // console.log(response);
                if (response != 0) {
                    swal('Alert!!', "Pin code is not correct", "error");
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
                        console.log(response);
                        if (response == 0) {
                            swal('Alert!!', "Data Purchased Succesfully", "success");
                            setTimeout(function() {
                                location.replace('/user/dashboard')
                            }, 1000)
                        } else if (response == 1) {
                            swal('Alert!!', "Data Buy Failed", "error");
                        }
                    }
                });
            }
        });
    })
</script>
