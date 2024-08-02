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

                    <div class="">
                        <div class="row card-body">
                            <div class="col-12 col-lg-12 mb-2">
                                <div class="row">
                                    <div class="col-12 col-md-12 mb-2">
                                        <div class="form-group mb-3 position-relative check-valid">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">
                                                    <select class="form-select border-0" id="country2" required="">
                                                        <option value="">Choose Your Network...</option>
                                                        <option>MTN</option>
                                                        <option>Airtel</option>
                                                        <option>GLO</option>
                                                        <option>9Mobile</option>
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
                                                <input type="number" placeholder="09032431003" required=""
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
                                                <input type="number" placeholder="100" required=""
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
                                                <input type="number" placeholder="1234" required=""
                                                    class="form-control border-start-0">
                                                <label>Enter Your Pin</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Buy" required=""
                                    class=" border-start-0 btn btn-primary mb-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')
</body>

</html>
