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
            <div class="row">
                <!-- Transactions -->
                <div class="col-12 col-md-12 position-relative ">
                    <div class="card border-0 overflow-hidden mb-4" id="receipt">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-auto mb-2">
                                    <i class="bi bi-shop h5 avatar avatar-40 bg-light-theme rounded"></i>
                                </div>
                                <div class="col align-self-center mb-2">
                                    <h6 class="fw-medium mb-0">Airtime to Cash</h6>
                                    <p class="text-secondary small">Details</p>
                                </div>
                            </div>
                        </div>
                        @php
                            $config = App\Models\AirtimetoCashConfig::first();
                        @endphp
                        <div class="card-body px-4">
                            <div class="">
                                <div class="upper-part text-center mb-5">
                                    <i class="bi bi-arrow-right-circle-fill text-primary" style="font-size:70px"></i>
                                    <div class="mt-1">
                                        <h5>Airtime to Cash</h5>
                                    </div>
                                </div>

                                <div class="details-of-trans">
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <h6>Send To</h6>
                                        </div>
                                        <div class="col-6 mx-auto" id="to">
                                            {{$config->to}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <h6>Send From</h6>
                                        </div>
                                        <div class="col-6 mx-auto" id="from">
                                            {{ $req->convNumber }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <h6>Network</h6>
                                        </div>
                                        <div class="col-6 mx-auto" id="network">
                                            {{ strtoupper($req->network2) }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <h6>Amount</h6>
                                        </div>
                                        <div class="col-6 bold mx-auto" id="amount">
                                            &#8358;{{ number_format($req->convAmount, 2) }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <h6>You will receive</h6>
                                        </div>
                                        <div class="col-6 bold mx-auto" id="amount">
                                            &#8358;{{ number_format($req->convAmount*($config->percent/100), 2) }} ({{$config->percent}}%)
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <h6>Disbursement</h6>
                                        </div>
                                        <div class="col-6 mx-auto" id="settlement">
                                            @if ($req->a2cBank != '')
                                                <h6>Bank</h6>
                                            @else
                                                <h6>Wallet</h6>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>

                                    @if ($req->a2cBank != '')
                                        <h6 class="text-center">Your Account Details</h6>
                                        <hr>

                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <h6>Bank Name</h6>
                                            </div>
                                            <div class="col-6 bold mx-auto" id="bankName">
                                                {{ $req->a2cBank }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <h6>Account Number</h6>
                                            </div>
                                            <div class="col-6 bold mx-auto" id="bankAccount">
                                                {{ $req->a2cAccountNumber }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <h6>Account Name</h6>
                                            </div>
                                            <div class="col-6 bold mx-auto" id="accountName">
                                                {{ $req->a2cAccountName }}
                                            </div>
                                        </div>
                                        <hr>
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="message mx-4">
                            <p class="text-success h5 mb-4">
                                Ensure that You have transferred the amount to the phone number above before clicking
                                the submit button to avoid ban on your account.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex mb-5 gap-1">
                        <button type="button" class="btn btn-primary col-6" id="print">
                            <i class="bi bi-printer"></i> Print Order Details
                        </button>

                        <button type="button" class="btn btn-success col-6 " id="submitBtn">
                            Submit Order
                        </button>
                    </div>

                    <br>
                    <br>
                </div>

            </div>

        </div>
    </main>
    {{--  --}}
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')

    <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>

    <script>
        const print = document.getElementById('print');
        print.addEventListener('click', function() {
            $('#receipt').printThis();
        });


        $('#submitBtn').click(function() {
            $('#submitBtn').html(
                '<i class="fa fa-spinner fa-spin text-warning" aria-hidden="true"></i> Submitting Order Please wait .'
            );
            const from = $('#from').text().trim();
            const to = $('#to').text().trim();
            const amount = $('#amount').text().trim();
            const network = $('#network').text().trim();
            const bankName = $('#bankName').text().trim();
            const bankAccount = $('#bankAccount').text().trim();
            const accountName = $('#accountName').text().trim();
            const settlement = $('#settlement').text().trim();

            $.ajax({
                type: "post",
                url: "/user/airtime_to_cash_convert",
                data: {
                    _token: '{{ csrf_token() }}',
                    from: from,
                    to: to,
                    amount: amount,
                    networks: network,
                    bankName: bankName,
                    bankAccount: bankAccount,
                    accountName: accountName,
                    settlement: settlement
                },
                success: function(response) {
                    console.log(response);
                    $('#submitBtn').html('Submit Order');
                    if (response == 0) {
                        swal('Alert!!', "Order submitted Successfully.", "success");
                        setTimeout(function() {
                            location.replace('/user/dashboard')
                        }, 1000)
                    }else {
                        swal('Alert!!', "Failed to submit order.", "error");
                    }
                }
            });
        })
    </script>
</body>

</html>
