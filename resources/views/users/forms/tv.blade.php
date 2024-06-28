<div class="modal fade" id="cableModal" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-hidden="true">
    <div class="row  justify-content-center mb-2 modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Pay Cable Subscription</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="col-12 col-lg-12 mb-2 border">
                <form action="" id="buyData">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-12 mb-2">
                                <div class="form-group mb-3 position-relative check-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="cable" name="cable_id"
                                                required="">
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
                                            <select class="form-select border-0" id="Cable_plan" required="">
                                                <option value="" id="emptyType">----------------------</option>
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
                                        <input type="number" placeholder="9032431003" id="phone"
                                            name="mobile_number" required="" class="form-control border-start-0">
                                        <label>Smart Card number / IUC number</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <button type="button" id="validateIUC" class="btn btn-warning">Validate IUC</button>
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
    $('#cable').on('change', () => {
        const cable = $('#cable').val();

        $.ajax({
            type: "GET",
            url: "/user/data/get_plan_type?network_id=" + cable,
            success: function(response) {
                if (response.length > 0) {
                    $('#emptyType').remove();
                    $('#Cable_plan').append(
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
                    $('#amount').val(0);
                }

            }
        });
    })


    // Get Plan details
    $('#Cable_plan').on('change', () => {
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

    // Validate IUC
    $('#validateIUC').on('click', ()=>{
        
        $('#validateIUC').removeClass('btn-warning');
        $('#validateIUC').addClass('btn-success');
    });

</script>
