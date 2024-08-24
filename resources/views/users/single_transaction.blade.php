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
                <div class="col-12 col-md-12 position-relative " id="receipt">
                    <div class="card border-0 overflow-hidden mb-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-auto mb-2">
                                    <i class="bi bi-shop h5 avatar avatar-40 bg-light-theme rounded"></i>
                                </div>
                                <div class="col align-self-center mb-2">
                                    <h6 class="fw-medium mb-0">Transaction</h6>
                                    <p class="text-secondary small">Detail</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-4">
                            <div class="">
                                <div class="upper-part text-center mb-5">
                                    <i class="bi bi-arrow-right-circle-fill text-primary" style="font-size:70px"></i>
                                    <div class="mt-1">
                                        <h5>{{ strtoupper($trans->title) }}</h5>
                                    </div>
                                </div>

                                <div class="details-of-trans">
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <h6>Status</h6>
                                        </div>
                                        <div
                                            class="col-6 mx-auto {{ strtoupper($trans->status) == 'SUCCESS' ? 'text-success' : '' }} {{ strtoupper($trans->status) == 'SUCCESSFUL' ? 'text-success' : 'text-warning' }}">
                                            {{ strtoupper($trans->status) }} 
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <h6>Transaction ID</h6>
                                        </div>
                                        <div class="col-6 mx-auto">
                                            {{ strtoupper($trans->transaction_id) }}
                                        </div>
                                    </div>
                                    <hr>
                                    @if($trans->size != null)
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <h6>Plan Size</h6>
                                        </div>
                                        <div class="col-6 mx-auto">
                                            {{$trans->size}}
                                        </div>
                                    </div>
                                    <hr>
                                    @endif
                                    @if($trans->number != null)
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <h6>For</h6>
                                        </div>
                                        <div class="col-6 mx-auto">
                                            {{$trans->number}}
                                        </div>
                                    </div>
                                    <hr>
                                    @endif
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <h6>Receipt</h6>
                                        </div>
                                        <div class="col-6 mx-auto">
                                            YES
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <h6>Date</h6>
                                        </div>
                                        <div class="col-6 mx-auto">
                                            @php
                                                $date = new \DateTime($trans->created_at);
                                            @endphp
                                            {{ $date->format('M d, Y h:i A') }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <h6>Amount</h6>
                                        </div>
                                        <div class="col-6 bold mx-auto">
                                            &#8358;{{ number_format($trans->amount, 2) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <button type="button" class="btn btn-primary" id="print">
                        <i class="bi bi-printer"></i> Print Receipt
                    </button>
                </div>
              
            </div>

        </div>
    </main>
    {{--  --}}
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')

    <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js" ></script>

    <script>
        const print = document.getElementById('print');
        print.addEventListener('click', function() {
            $('#receipt').printThis();
        });
    </script>
</body>

</html>
