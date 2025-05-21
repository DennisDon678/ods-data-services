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
                    
                    <!-- Add discount information -->
                    <div class="card-body border-bottom">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="mb-2">Current Airtime Discounts</h6>
                                @php
                                    $discount = App\Models\Airtime_discount::first();
                                @endphp
                                
                                <div class="row">
                                    <div class="col-6 col-md-3 mb-2">
                                        <div class="small text-muted">MTN</div>
                                        <div class="fw-bold text-success">{{ $discount->mtn ?? 0 }}% OFF</div>
                                    </div>
                                    <div class="col-6 col-md-3 mb-2">
                                        <div class="small text-muted">GLO</div>
                                        <div class="fw-bold text-success">{{ $discount->glo ?? 0 }}% OFF</div>
                                    </div>
                                    <div class="col-6 col-md-3 mb-2">
                                        <div class="small text-muted">AIRTEL</div>
                                        <div class="fw-bold text-success">{{ $discount->airtel ?? 0 }}% OFF</div>
                                    </div>
                                    <div class="col-6 col-md-3 mb-2">
                                        <div class="small text-muted">9MOBILE</div>
                                        <div class="fw-bold text-success">{{ $discount->mobile ?? 0 }}% OFF</div>
                                    </div>
                                </div>
                                <div class="small text-muted fst-italic">Discounts are automatically applied at checkout</div>
                            </div>
                        </div>
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

                                    <!-- Add this after the amount input field -->
                                    <div class="mb-2" id="discountInfo" style="display: none;">
                                        <div class="alert alert-success p-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span class="small">Original Price:</span> <span class="text-decoration-line-through">₦<span id="originalAmount">0</span></span>
                                                </div>
                                                <div>
                                                    <span class="small">You Save:</span> <span class="text-success">₦<span id="savingsAmount">0</span></span>
                                                </div>
                                                <div>
                                                    <span class="small">You Pay:</span> <span class="fw-bold">₦<span id="finalAmount">0</span></span>
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
                                    
                                    <div class="mb-2">
                                        <div class="form-group mb-3 position-relative check-valid">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">
                                                    <select class="form-select border-0" id="beneficiarySelect">
                                                        <option value="">Choose from Beneficiaries...</option>
                                                        @foreach(App\Models\Beneficiary::where('user_id', auth()->id())->get() as $ben)
                                                            <option value="{{ $ben->number }}">{{ $ben->name }} ({{ $ben->number }})</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="beneficiarySelect">Saved Beneficiaries</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="1" id="saveBeneficiary" name="save_beneficiary">
                                        <label class="form-check-label" for="saveBeneficiary">
                                            Save this number as beneficiary
                                        </label>
                                    </div>
                                    <div class="mb-2" id="beneficiaryNameDiv" style="display:none;">
                                        <input type="text" class="form-control" id="beneficiaryName" name="beneficiary_name" placeholder="Beneficiary Name">
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
    <script src="/jquery-3.6.0.min.js" ></script>


    <script>
        // Add these variables at the beginning of your script
        const discounts = {
            @if($discount)
            "{{ App\Models\Network_list::where('network_id', 1)->first()->network_id ?? 1 }}": {{ $discount->mtn ?? 0 }},
            "{{ App\Models\Network_list::where('network_id', 2)->first()->network_id ?? 2 }}": {{ $discount->glo ?? 0 }},
            "{{ App\Models\Network_list::where('network_id', 3)->first()->network_id ?? 3 }}": {{ $discount->airtel ?? 0 }},
            "{{ App\Models\Network_list::where('network_id', 4)->first()->network_id ?? 4 }}": {{ $discount->mobile ?? 0 }},
            @endif
        };
        
        // Add this function to calculate discount
        function calculateDiscount() {
            const networkId = $('#network').val();
            const amount = parseFloat($('#amount').val()) || 0;
            
            if (networkId && amount > 0) {
                const discountPercent = discounts[networkId] || 0;
                const savings = (amount * discountPercent / 100).toFixed(2);
                const finalAmount = (amount - savings).toFixed(2);
                
                $('#originalAmount').text(amount.toFixed(2));
                $('#savingsAmount').text(savings);
                $('#finalAmount').text(finalAmount);
                $('#discountInfo').show();
            } else {
                $('#discountInfo').hide();
            }
        }
        
        // Add these event listeners
        $('#network, #amount').on('change keyup', function() {
            calculateDiscount();
        });
        
        // Your existing code continues...
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
                                if ($('#saveBeneficiary').is(':checked')) {
                                    $.post('/user/beneficiary/save', {
                                        _token: '{{ csrf_token() }}',
                                        name: $('#beneficiaryName').val(),
                                        number: $('#phone').val()
                                    }, function(res) {
                                        // Optionally show a message or update the dropdown
                                    });
                                }

                                $('#buyBtn').html(
                                    `Buy Now`
                                );

                                swal('Alert!!', "Airtime Purchased Succesfully", "success");
                                setTimeout(function() {
                                    location.replace('/user/dashboard')
                                }, 1000)
                            } else if (data == 1) {
                                $('#buyBtn').html(
                                    `Buy Now`
                                );
                                swal('Alert!!', "Insufficient Balance", "error");
                            } else {
                                $('#buyBtn').html(
                                    `Buy Now`
                                );
                                swal('Alert!!', "This Service is not available at the moment. Please try again later",
                                    "error");
                            }
                        }
                    })
                }
            })

        })

        // Autofill phone number when beneficiary is selected
        $('#beneficiarySelect').on('change', function() {
            $('#phone').val($(this).val());
        });

        // Show/hide beneficiary name input when checkbox is checked
        $('#saveBeneficiary').on('change', function() {
            if ($(this).is(':checked')) {
                $('#beneficiaryNameDiv').show();
            } else {
                $('#beneficiaryNameDiv').hide();
            }
        });

        // Add this script to show/hide beneficiary name input
        $('#saveBeneficiary').on('change', function() {
            if ($(this).is(':checked')) {
                $('#beneficiaryNameDiv').show();
                $('#beneficiaryName').prop('required', true);
            } else {
                $('#beneficiaryNameDiv').hide();
                $('#beneficiaryName').val('');
                $('#beneficiaryName').prop('required', false);
            }
        });
        
        $(document).on('click', '.delete-beneficiary', function() {
            var benId = $(this).data('id');
            var $row = $(this).closest('li');
            swal({
                title: "Are you sure?",
                text: "This beneficiary will be deleted.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '/user/beneficiary/delete/' + benId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            if (res.deleted) {
                                $row.remove();
                                // Optionally remove from select as well
                                $('#beneficiarySelect option').filter(function() {
                                    return $(this).val() == res.number;
                                }).remove();
                                swal("Beneficiary deleted!", { icon: "success" });
                            } else {
                                swal("Could not delete beneficiary.", { icon: "error" });
                            }
                        }
                    });
                }
            });
        });
    </script>
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')
</body>

</html>
