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
                        <h6 class="title" id="exampleModalLabel">Pre-Order Data</h6>
                    </div>
                    <div class="col-12 col-lg-12 mb-2 p-2">
                        <form action="/user/airtime-to-cash" id="convertForm">.
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12 col-md-12 mb-2">
                                        <div class="form-group mb-3 position-relative check-valid">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">
                                                    <select class="form-select border-0" id="preOrderNetwork"
                                                        name="network2" required="">
                                                        <option value="">Choose Your Network...</option>
                                                        <option value="MTN">MTN</option>
                                                    </select>
                                                    <label for="country2">Choose your Network</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <div class="form-group mb-3 position-relative check-valid">
                                        <div class="input-group input-group-lg">
                                            <div class="form-floating">
                                                <input type="number" placeholder="09032431003" name="convNumber"
                                                    id="preOrderPhone" required=""
                                                    class="form-control border-start-0">
                                                <label>Enter Phone Number Your are sending From</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <div class="form-group mb-3 position-relative check-valid">
                                        <div class="input-group input-group-lg">
                                            <div class="form-floating">
                                                <input type="number" placeholder="100" id="amountPreOrder"
                                                    name="convAmount" required=""
                                                    class="form-control border-start-0">
                                                <label>Enter Amount (&#8358;)</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="form-group mb-3 position-relative check-valid">
                                        <div class="input-group input-group-lg">
                                            <input type="checkbox" id="converOption" name="method"
                                                class="form-checkbox">
                                            <label for="converOption" class="mx-2">Withdraw to Bank. <small
                                                    class="text-success">Click to withdraw to your bank.</small></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="banks" style="display: none;">
                                    <div class="row">
                                        <div class="col-12 col-md-12 mb-2">
                                            <div class="form-group mb-3 position-relative check-valid">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <select class="form-select border-0" id="a2cBank"
                                                            name="a2cBank">
                                                            <option value="">Choose Your Bank...</option>
                                                            <option value="MTN">MTN</option>
                                                            <option value="Airtel">Airtel</option>
                                                            <option value="GLO">GLO</option>
                                                            <option value="9Mobile">9Mobile</option>
                                                        </select>
                                                        <label for="country2">Choose your Bank</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-group mb-3 position-relative check-valid">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">
                                                    <input type="number" placeholder="1234" id="a2cAccountNumber"
                                                        class="form-control border-start-0" name="a2cAccountNumber">
                                                    <label>Enter Your Account Number</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-group mb-3 position-relative check-valid">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">
                                                    <input type="text" placeholder="1234" id="a2cAccountName"
                                                        name="a2cAccountName" class="form-control border-start-0">
                                                    <label>Enter Your Account Name</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="preOrderBtn"
                                    class=" border-start-0 btn btn-primary mb-2">Convert</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
    </div>
    </div>
    </div>



    <script src="/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
    <script src="/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script>
        $('#converOption').on('click', () => {
            const dis = $('.banks').css('display');
            if (dis == 'none') {
                $('.banks').css('display', 'block');
            } else if (dis == 'block') {
                $('.banks').css('display', 'none');
                $('#a2cBank').val('');
                $('#a2cAccountNumber').val('');
                $('#a2cBankName').val('');
            }
        });
    </script>
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')
</body>

</html>
