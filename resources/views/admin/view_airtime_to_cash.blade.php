<!DOCTYPE html>
<html lang="en" data-bs-theme="">
@include('admin.partials.head')

<body>

    <!-- NAVIGATION -->
    @include('admin.partials.sideNav')
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- HEADER -->
        <div class="header">
            <div class="container-fluid">

                <!-- Body -->
                <div class="header-body">
                    <div class="row align-items-end">
                        <div class="col">

                            <!-- Pretitle -->
                            <h6 class="header-pretitle">
                                Overview
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title">
                                Airtime to Cash
                            </h1>

                        </div>

                    </div> <!-- / .row -->
                </div> <!-- / .header-body -->

            </div>
        </div> <!-- / .header -->

        <!-- CARDS -->
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <h4>Desbursment Information</h4>
                    <!-- Form -->
                    <form>
                        <!-- Divider -->
                        <hr class="my-2">

                        <div class="row mb-4">
                            <div class="col-12 col-md-6">

                                <!-- First name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        settlement Choice
                                    </label>

                                    <!-- Input -->
                                    <input type="text" value="{{ $ato->bank_name == '' ? 'WALLET' : 'BANK' }}"
                                        readonly class="form-control">

                                </div>

                            </div>
                            @if ($ato->bank_name != '')
                                <div class="col-12 col-md-6">
                                    @php
                                        $config = App\Models\AirtimetoCashConfig::first();
                                    @endphp
                                    <!-- First name -->
                                    <div class="form-group">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Amount
                                        </label>

                                        <!-- Input -->
                                        <input type="text" value="{{ number_format($ato->amount*($config->percent/100),2) }}" readonly class="form-control">

                                    </div>

                                </div>
                                <div class="col-12 col-md-6">

                                    <!-- Last name -->
                                    <div class="form-group">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Bank name
                                        </label>

                                        <!-- Input -->
                                        <input type="text" value="{{ $ato->bank_name }}" readonly
                                            class="form-control">

                                    </div>

                                </div>
                                <div class="col-12">

                                    <!-- Email address -->
                                    <div class="form-group">

                                        <!-- Label -->
                                        <label class="mb-1">
                                            Account Name
                                        </label>

                                        <!-- Input -->
                                        <input type="email" value="{{ $ato->account_name }}" readonly
                                            class="form-control">

                                    </div>

                                </div>
                                <div class="col-12 col-md-6">

                                    <!-- Phone -->
                                    <div class="form-group">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Account Number
                                        </label>

                                        <!-- Input -->
                                        <input type="text" value="{{ $ato->account_number }}" readonly
                                            class="form-control mb-3">

                                    </div>

                                </div>
                            @endif
                        </div> <!-- / .row -->


                        <h4>Actions</h4>
                        <!-- Divider -->
                        <hr class=" mb-5">

                        <div class="row justify-content-between">
                            <div class="col-12 col-md-6">

                                <!-- Heading -->
                                <h4>
                                    Approve Coversion
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <a class="btn btn-primary" href="/admin/airtime_to_cash/approve?id={{ $ato->id }}">
                                    Approve
                                </a>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Divider -->
                        <hr class="mt-4 mb-5">

                        <div class="row justify-content-between">
                            <div class="col-12 col-md-6">

                                <!-- Heading -->
                                <h4>
                                    Reject Conversion
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <a class="btn btn-danger" href="/admin/airtime_to_cash/reject?id={{ $ato->id }}">
                                    reject
                                </a>

                            </div>
                        </div> <!-- / .row -->

                    </form>

                    <br><br>

                </div>
            </div>
        </div>
    </div><!-- / .main-content -->
    @include('admin.partials.script')

    @if (Session::has('message'))
    @endif

</body>

</html>
