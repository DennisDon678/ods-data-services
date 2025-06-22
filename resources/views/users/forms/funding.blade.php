<!doctype html>
<html lang="en">

@include('users.partials.head')

<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled" data-sidebarstyle="sidebar-pushcontent">

    @include('users.partials.preloader')

    @include('users.partials.headNav')

    @include('users.partials.sideNav')

    <!-- Begin page content -->
    <main class="main mainheight">
        {{-- <div class="container-fluid mb-4">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0">Wallet Funding</h5>
                </div>
                
            </div>
        </div> --}}

        <!-- content -->
        <div class="container mt-4">
            <ul class="nav nav-tabs justify-content-center nav-adminux " id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="payment-tab" data-bs-toggle="tab" data-bs-target="#card" type="button"
                        role="tab" aria-controls="payment" aria-selected="false">Monnify</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#manual"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Manual</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="personal-tab" data-bs-toggle="tab" data-bs-target="#automated"
                        type="button" role="tab" aria-controls="personal" aria-selected="true">Automated</button>
                </li>
                
            </ul>
            <div class="tab-content py-3" id="myTabContent">
                <div class="tab-pane fade " id="automated" role="tabpanel" aria-labelledby="personal-tab">
                    <div class="p-2 mb-2 ">
                        <div class="card">

                            <div class="card-header">
                                <h6 class="title" id="exampleModalLabel">Automated Bank</h6>
                            </div>
                            <div class="col-12 col-lg-12 mb-2 p-2">

                                <div class="modal-body">
                                    @php
                                        $account = App\Models\Reserved_bank::where(
                                            'user_id',
                                            '=',
                                            Auth::user()->id,
                                        )->first();
                                    @endphp

                                    @if ($account)
                                        <div class="col-12">
                                            <div class="accountinfo">
                                                <h5>
                                                    Account Number:
                                                    <span class="text-muted" id="autoAccountNumber">
                                                        {{ $account->account_number }}
                                                    </span>
                                                    <button type="button" class="btn btn-sm btn-outline-primary ms-2 copy-btn"
                                                        data-copy-target="autoAccountNumber">
                                                        <i class="fa fa-copy"></i> Copy
                                                    </button>
                                                </h5>
                                                <h6 class="">Account Name: <em
                                                        class="text-muted">{{ $account->account_name }}</em> </h6>
                                                <h6>Bank Name: <em class="text-muted">{{ $account->bank_name }}</em>
                                                </h6>
                                            </div>
                                            <small>Charges applies
                                                (&#8358;{{ number_format(App\Models\Automatic_funding_config::first()->charge_amount, 2) }})</small>
                                        </div>
                                    @else
                                        <div class="mtn p-3" style="background-color: rgba(230, 230, 76, 0.685);">
                                            <p>Due to CBN order, we have been mandated to provide customers BVN
                                                during account generation. <br>
                                                Please Note that we do not store your BVN but only Send it For CBN
                                                validation.
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <div class="form-group mb-3 position-relative check-valid">
                                                    <div class="input-group input-group-lg">
                                                        <div class="form-floating">
                                                            <input type="number" placeholder="100" id="bvn"
                                                                class="form-control border-start-0">
                                                            <label>Enter Your BVN</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <Button class="btn btn-primary" id="generateBank">Generate
                                                Account</Button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="card" role="tabpanel" aria-labelledby="personal-tab">
                    <div class="">
                        <div class="card">

                            <div class="card-header">
                                <h6 class="title" id="exampleModalLabel">Pay With Card or USSD</h6>
                            </div>
                            <div class="col-12 col-lg-12 mb-2 p-2">

                                <div class="modal-body">
                                    <div class="alt">
                                        <div class="mb-2">
                                            <div class="form-group mb-3 position-relative check-valid">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <input type="number" placeholder="100" id="fundamount"
                                                            required="" class="form-control border-start-0">
                                                        <label>Enter Amount (&#8358;)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="payWithCard">
                                            <button class="btn btn-primary" onclick="payWithMonnify()">Pay With
                                                Card</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="manual" role="tabpanel" aria-labelledby="personal-tab">
                    <div class="p-2 mb-2 ">
                        <div class="card">

                            <div class="card-header">
                                <h6 class="title" id="exampleModalLabel">Manual Funding</h6>
                            </div>
                            <div class="col-12 col-lg-12 mb-2 p-2">
                                <div class="col-lg-12 mb-2 ">
                                    <div class="mtn p-3" style="background-color: rgba(230, 230, 76, 0.685);">
                                        To fund your wallet:
                                        <br>
                                        <br>
                                        1. Transfer the exact amount of money you want in your wallet to the displayed
                                        account number.
                                        <br>
                                        <br>
                                        2. Fill the following details:
                                        - Amount transferred
                                        - Your account number
                                        - Your bank name
                                        <br>
                                        <br>
                                        3. Submit the request after completing the transfer.
                                        <br>
                                        <br>
                                        No Charges!
                                        <br>
                                        <br>
                                        NB: Please make sure you have transferred the money before submitting the
                                        request to avoid account restrictions.
                                    </div>
                                </div>

                                <div class="modal-body">,

                                    @php
                                        $accounts = App\Models\Manual_funding::get();
                                        $sn = 1;
                                    @endphp

                                    @forelse ($accounts as $account)
                                        <div class="col-12">
                                            <div class="accountinfo">
                                                <h5>
                                                    Account Number: 
                                                    <span class="text-muted" id="manualAccountNumber{{ $sn }}">
                                                        {{ $account->account_number }}
                                                    </span>
                                                    <button type="button" class="btn btn-sm btn-outline-primary ms-2 copy-btn"
                                                        data-copy-target="manualAccountNumber{{ $sn }}">
                                                        <i class="fa fa-copy"></i> Copy
                                                    </button>
                                                </h5>
                                                <h6 class="">Account Name: <em
                                                        class="text-muted">{{ $account->account_name }}</em> </h6>
                                                <h6>Bank Name: <em class="text-muted">{{ $account->bank_name }}</em>
                                                </h6>
                                            </div>
                                        </div>
                                        <hr>

                                        @php
                                            $sn = $sn + 1;
                                        @endphp
                                    @empty
                                        <div class="col-12">
                                            No Methods listed Here.
                                        </div>
                                    @endforelse

                                    @if (count($accounts) > 0)
                                        <h5 class="mt-3 text-success">Fill out the details to submit Funding Request.
                                        </h5>
                                        <form action="" id="funding">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <div class="alt">
                                                <div class="mb-2">
                                                    <div class="form-group mb-3 position-relative check-valid">
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input type="number" placeholder="100"
                                                                    id="fundamount" name="amount" min="1000" required=""
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
                                                                <input type="text" placeholder="100"
                                                                    id="fundamount" name="sender_name" required=""
                                                                    class="form-control border-start-0" >
                                                                <label>Enter Sender's Account Name</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <div class="form-group mb-3 position-relative check-valid">
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input type="text" placeholder="100"
                                                                    id="fundamount" name="sender_bank" required=""
                                                                    class="form-control border-start-0">
                                                                <label>Enter Sender's Bank Name</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="payWithCard">
                                                    <button class="btn btn-primary" type="submit"
                                                        id="submitManual">Submit Request
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>
    <script src="/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
    <script src="/jquery-3.6.0.min.js"></script>
    <script src="https://js.paystack.co/v2/inline.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/short-unique-id@5.2.0/dist/short-unique-id.min.js"></script>
    <script>
        // Generate bank
        $('#generateBank').on('click', function() {
            const bvn = $('#bvn').val();

            if (!bvn) {
                swal("Alart!", "Enter Your BVN", "warning")
                return
            }
            $('#generateBank').html(
                '<i class="fa fa-spinner fa-spin text-warning" aria-hidden="true"></i> Generating Bank Please wait .'
            );
            $.ajax({
                type: "get",
                url: "/user/generate_bank?bvn=" + bvn,
                success: function(response) {
                    if (response == 0) {
                        swal("Alart!", "Bank created successfully, wait while we refresh your profile.",
                            "success")

                        setTimeout(() => {
                            location.replace('/user/dashboard')
                        }, 2000)
                    }
                    if (response == 2) {
                        $('#generateBank').html(
                            'Generating Account'
                        );
                        swal("Alart!",
                            "This Service is currently unavailable try again in some minutes.",
                            "error")

                    }
                }
            });
        });

        $('#funding').on('submit', (e) => {
            e.preventDefault();
            $('#submitManual').html(
                '<i class="fa fa-spinner fa-spin text-warning" aria-hidden="true"></i> Submitting Please wait .'
            );

            $.ajax({
                type: "POST",
                url: "/user/fund-wallet",
                data: new FormData($('#funding')[0]),
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response == 0) {
                        swal('Alert!!', "Request Submitted Succesfully", "success");
                        setTimeout(function() {
                            location.replace('/user/dashboard')
                        }, 1000)
                    } else if (response == 1) {
                        swal('Alert!!',
                            "You Have A request pending approval. Kindly wait while we process that.",
                            "error");
                        $('#submitManual').html(
                            `Submit Request`
                        );
                    } else if (response == 2) {
                        swal('Alert!!', "This Service is not available at the moment. Please try again later", "error");
                        $('#submitManual').html(
                            `Submit Request`
                        );
                    }
                }
            });
        })

        $('#paywithcard').click(() => {
            $("#paywithcard").html(`
                <i class="fa fa-spinner fa-spin text-warning" aria-hidden="true"></i> Initializing payment Please wait ...
            `)

            // check for empty amount field
            const amount = $('#fundamount').val();
            if (!amount) {
                swal('Invalid Input', 'Please enter a valid amount', 'error')
                $("#paywithcard").html(`Pay with card`);
                return;
            }

            const uid = new ShortUniqueId({
                length: 10
            });
            const ref = uid.rnd();
            const popup = new PaystackPop()
            popup.newTransaction({
                key: '{{ env('PAYSTACK_PUBLIC_KEY') }}',
                email: '{{ Auth::user()->email }}',
                amount: (amount * 100) + ((amount * 100) * 0.015),
                reference: ref,
                onLoad: (response) => {
                    // create a new deposit transaction
                    $.ajax({
                        type: "get",
                        url: `/user/paystack/create-transaction?reference=${ref}&amount=${amount}`,
                        success: function(response) {
                            console.log(response);
                        }
                    });
                },
                onSuccess: function(transaction) {
                    $("#paywithcard").html(
                        `
                    <i class="fa fa-spinner fa-spin text-warning" aria-hidden="true"></i> Processing Payment Please wait ...`
                    );
                    $.ajax({
                        type: "get",
                        url: `/user/paystack/update-transaction?reference=${ref}&status=${transaction.status}`,
                        success: function(response) {
                            $('#paywithcard').html('Pay with card');
                            $('#fundamount').val('');
                            swal('Success', "Payment Completed successfully", 'success');
                        }
                    });
                },
                onClose: function(transaction) {
                    $("#paywithcard").html(
                        `
                    <i class="fa fa-spinner fa-spin text-warning" aria-hidden="true"></i> Closing Payment Please wait ...`
                    );

                    $.ajax({
                        type: "get",
                        url: `/user/paystack/update-transaction?reference=${ref}&status=canceled`,
                        success: function(response) {
                            $('#paywithcard').html('Pay with card');
                            $('#fundamount').val('');
                            swal('Error', "Payment was cancelled", 'error');
                        }
                    });
                },
                onError: function(transaction) {
                    $("#paywithcard").html(`Pay with card`);
                    console.log('Transaction failed')
                    console.log(transaction)
                }
            })


        });

        function payWithMonnify() {
            const amount = $('#fundamount').val();
            const charge = amount*(1.65/100);
            const toAdd = charge<2000?Math.round(charge):2000;
            const ref = new String((new Date()).getTime())
            // console.log(amount);
            MonnifySDK.initialize({
                amount: Number(amount) + toAdd,
                currency: "NGN",
                reference: ref,
                customerFullName: "{{ Auth::user()->name }}",
                customerEmail: "{{ Auth::user()->email }}",
                apiKey: "{{ env('MONIFY_KEY') }}",
                contractCode: "{{ env('MONIFY_CONTRACT') }}",
                paymentDescription: "Wallet Funding",
                onLoadStart: (response) => {
                    console.log("loading has started", response);
                },
                onLoadComplete: () => {
                    $.ajax({
                        type: "post",
                        url: "/user/fund-wallet/create",
                        data: {
                            _token: "{{ csrf_token() }}",
                            reference: ref,
                            amount: amount,
                            status: 'pending',
                        },
                        success: function(response) {
                            console.log(response)
                        }
                    });
                },
                onComplete: function(response) {

                },
                onClose: function(data) {
                    //Implement what should happen when the modal is closed here
                    console.log(data);
                    if (data.paymentStatus == "USER_CANCELLED") {
                        $('#paywithcard').html('Pay with card');
                        $('#fundamount').val('');
                        $.ajax({
                            type: "get",
                            url: `/user/paystack/update-transaction?reference=${ref}&status=cancelled`,
                            success: function(response) {
                                $('#paywithcard').html('Pay with card');
                                $('#fundamount').val('');
                                swal("Alert!", "You have canceled this transaction", "error")
                            }
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1000)
                    } else {
                        if (data.status == "SUCCESS") {
                            $.ajax({
                                type: "get",
                                url: `/user/paystack/update-transaction?reference=${ref}&status=${data.status}`,
                                success: function(response) {
                                    $('#paywithcard').html('Pay with card');
                                    $('#fundamount').val('');
                                    swal('Success', "Payment Completed successfully", 'success');
                                }
                            });
                            swal("Alert!", "You have successfully funded your wallet", "success")

                            // reload page
                            setTimeout(function() {
                                location.replace('/user/dashboard')
                            }, 1000)
                        } else {
                            $.ajax({
                                type: "get",
                                url: `/user/paystack/update-transaction?reference=${ref}&status=${data.status}`,
                                success: function(response) {
                                    $('#paywithcard').html('Pay with card');
                                    $('#fundamount').val('');
                                    swal("Alert!", "You have canceled this transaction", "error")

                                    setTimeout(function() {
                                        // reload current page
                                        location.href = '/user/fund-wallet';
                                    }, 1000)
                                }
                            })
                        }
                    }
                }
            });
        }

        $(document).on('click', '.copy-btn', function() {
            var targetId = $(this).data('copy-target');
            var accountNumber = $('#' + targetId).text().trim();
            if (navigator.clipboard) {
                navigator.clipboard.writeText(accountNumber).then(function() {
                    swal('Copied!', 'Account number copied to clipboard.', 'success');
                }, function() {
                    swal('Error', 'Could not copy account number.', 'error');
                });
            } else {
                // Fallback for older browsers
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val(accountNumber).select();
                document.execCommand("copy");
                $temp.remove();
                swal('Copied!', 'Account number copied to clipboard.', 'success');
            }
        });
    </script>
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')
</body>

</html>
