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
                    <input type="hidden" name="" id="state">
                    <div class="card-header">
                        <h6 class="title" id="exampleModalLabel">Become A Vendor <em class="text-success">(Earn 50% of
                                your referrals Upgrade.)</em></h6>
                    </div>
                    <div class="row card-body">
                        <div class="fee text-center mb-4">
                            <button class="btn btn-primary payBtn">Pay Vendor Onetime Fee</button>
                        </div>
                        <div class="col-lg-8 mb-2 ">
                            <p class="h4">Who is a Vendor?</p>
                            <p>A vendor is an upgraded ODS user who gets discounts on product prices. As a vendor all
                                ODS products will be discounted and you can resell to make some profit.</p>
                            <p class="h4">Why should I become a Vendor?</p>
                            <ol>
                                <li>You will be getting our products at a discounted price.</li>
                                <li>You will be able to make a profit by selling the products.</li>
                                <li class="text-success">Earn 50% of your referrals Upgrade.</li>
                                <li>Lighten support response.</li>
                            </ol>
                            <p class="h4">How do I become a Vendor?</p>
                            <ol>
                                <li>Be A registered ODS User.</li>
                                <li>Fund Your Wallet with a minimum of 2000.</li>
                                <li>Pay Vendor Onetime Fee (2000).</li>
                            </ol>
                            <p>Congratulations, You are now an ODS Vendor!!!</p>


                        </div>
                        <div class="fee text-center mt-4">
                            <button class="btn btn-primary payBtn">Pay Vendor Onetime Fee</button>
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
        $('.payBtn').on('click', () => {
            if ($('#state').val() == '') {
                $('#state').val('processing');
                $('.payBtn').html(
                    '<i class="fa fa-spinner fa-spin text-warning" aria-hidden="true"></i> Processing Please wait...'
                );

                // Send Ajax
                $.ajax({
                    type: "get",
                    url: "/user/pay-vendor-fee?id={{ Auth::user()->id }}",
                    success: function(response) {
                        if (response == 1) {
                            swal("Alert!!", "Insufficient Balance", "error");
                            $('.payBtn').html(
                                'Pay Vendor Onetime Fee'
                            );
                            $('#state').val('');

                            return false;
                        }
                    }
                });
            }
        })
    </script>
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')
</body>

</html>
