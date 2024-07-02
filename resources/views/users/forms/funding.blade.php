<div class="modal fade" id="fundModal" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-hidden="true">
    <div class="row  justify-content-center mb-2 modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Fund Your Wallet</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="col-12 col-lg-12 mb-2 border">

                <div class="modal-body">
                        @php
                            $account = App\Models\Reserved_bank::where('user_id', '=', Auth::user()->id)->first();
                        @endphp

                        @if ($account)
                            <div class="col-12">
                                <div class="accountinfo">
                                    <h5>{{$account->account_number}}, <h6 class="text-muted">{{$account->account_name}}, {{$account->bank_name}}</h6></h5>
                                </div>
                            </div>
                        @else
                            <div class="col-12">
                                <Button class="btn btn-primary" id="generateBank">Generate Account</Button>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <h6 class="text-center">OR</h6>
                    <hr>
                    <div class="alt">
                        <div class="mb-2">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input type="number" placeholder="100" id="fundamount" required=""
                                            class="form-control border-start-0">
                                        <label>Enter Amount (&#8358;)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="payWithCard">
                            <button class="btn btn-primary" id="paywithcard" onclick="payWithMonnify()">Pay With
                                Card</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

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
                    swal("Alart!","Bank created successfully, wait while we refresh your profile.", "success")

                    setTimeout(()=>{
                        location.replace('/user/dashboard')
                    },2000)
                }
            }
        });
    });
</script>
