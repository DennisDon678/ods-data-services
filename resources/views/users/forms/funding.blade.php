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
                    <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#automated"
                        type="button" role="tab" aria-controls="personal" aria-selected="true">Automated</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#manual"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Manual</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#card" type="button"
                        role="tab" aria-controls="payment" aria-selected="false">Card</button>
                </li>

            </ul>
            <div class="tab-content py-3" id="myTabContent">
                <div class="tab-pane fade show active" id="automated" role="tabpanel" aria-labelledby="personal-tab">
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
                                                <h5>Account Number: <em
                                                        class="text-muted">{{ $account->account_number }}</em>
                                                </h5>
                                                <h6 class="">Account Name: <em
                                                        class="text-muted">{{ $account->account_name }}</em> </h6>
                                                <h6>Bank Name: <em class="text-muted">{{ $account->bank_name }}</em>
                                                </h6>
                                            </div>
                                            <small>Charges applies (&#8358;{{number_format(App\Models\Automatic_funding_config::first()->charge_amount,2)}})</small>
                                        </div>
                                    @else
                                        <div class="col-12">
                                            <Button class="btn btn-primary" id="generateBank">Generate Account</Button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="card" role="tabpanel" aria-labelledby="personal-tab">
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
                                            <button class="btn btn-primary" id="paywithcard"
                                                onclick="payWithMonnify()">Pay
                                                With
                                                Card</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="manual" role="tabpanel" aria-labelledby="personal-tab">
                    <div class="p-2 mb-2 ">
                        <div class="card">

                            <div class="card-header">
                                <h6 class="title" id="exampleModalLabel">Manual Funding</h6>
                            </div>
                            <div class="col-12 col-lg-12 mb-2 p-2">

                                <div class="modal-body">
                                    @php
                                        $accounts = App\Models\Manual_funding::get();
                                        $sn = 1;
                                    @endphp

                                    @forelse ($accounts as $account)
                                        <div class="col-12">
                                            <div class="accountinfo">
                                                <h5>Account Number: <em
                                                        class="text-muted">{{ $account->account_number }}</em>
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
                                                                    id="fundamount" name="amount" required=""
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
                                                                    class="form-control border-start-0">
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
    <script>
        function payWithMonnify() {
            const amount = $('#fundamount').val();
            // console.log(amount);
            MonnifySDK.initialize({
                amount: amount,
                currency: "NGN",
                reference: new String((new Date()).getTime()),
                customerFullName: "{{ Auth::user()->name }}",
                customerEmail: "{{ Auth::user()->email }}",
                apiKey: "{{ env('MONIFY_KEY') }}",
                contractCode: "{{ env('MONIFY_CONTRACT') }}",
                paymentDescription: "Wallet Funding",

                onLoadStart: () => {
                    console.log("loading has started");
                },
                onLoadComplete: () => {
                    console.log("SDK is UP");
                },
                onComplete: function(response) {
                    //Implement what happens when the transaction is completed.
                    if (response.status == "SUCCESS") {
                        const reference = response.transactionReference
                        const amount = response.authorizedAmount;
                        const status = response.status


                        $.ajax({
                            type: "post",
                            url: "/user/fund-wallet/create",
                            data: {
                                _token: "{{ csrf_token() }}",
                                reference: reference,
                                amount: amount,
                                status: status,
                            },
                            success: function(response) {
                                console.log(response)
                            }
                        });
                    }
                },
                onClose: function(data) {
                    //Implement what should happen when the modal is closed here
                    console.log(data);
                    if (data.status == "SUCCESS") {
                        swal("Alert!", "You have successfully funded your wallet", "success")

                        // reload page
                        setTimeout(function() {
                            location.replace('/user/dashboard')
                        }, 1000)
                    } else {
                        swal("Alert!", "You have canceled this transaction", "error")
                    }
                }
            });
        }


        // Generate bank
        $('#generateBank').on('click', function() {
            $('#generateBank').html(
                '<i class="fa fa-spinner fa-spin text-warning" aria-hidden="true"></i> Generating Bank Please wait .'
            );
            $.ajax({
                type: "get",
                url: "/user/generate_bank",
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
                        swal('Alert!!', "Insufficient Balance", "error");
                        $('#submitManual').html(
                            `Submit Request`
                        );
                    } else if (response == 2) {
                        swal('Alert!!', "An error occured please contact support", "error");
                        $('#submitManual').html(
                            `Submit Request`
                        );
                    }
                }
            });
        })
    </script>
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')
</body>

</html>
