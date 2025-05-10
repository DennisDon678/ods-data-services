<!DOCTYPE html>
<html lang="en" data-bs-theme="">
@include('admin.partials.head')

<body>

    <!-- NAVIGATION -->
    @include('admin.partials.sideNav')
    <!-- MAIN CONTENT -->
    <div class="main-content">
        
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    <!-- Header -->
                    <div class="header mt-md-5">
                        <div class="header-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <!-- Pretitle -->
                                    <h6 class="header-pretitle">
                                        Admin Configuration
                                    </h6>

                                    <!-- Title -->
                                    <h1 class="header-title">
                                        Airtime Discount
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-header-title">
                                Configure Airtime Discount
                            </h4>
                        </div>
                        <div class="card-body">
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <form method="POST" action="">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="mtn">MTN Discount (%)</label>
                                            <input type="number" step="0.01" class="form-control" id="mtn"
                                                name="mtn" value="{{ $discount->mtn ?? 0 }}" required>
                                            <small class="text-muted">Discount percentage for MTN airtime
                                                purchases</small>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="glo">GLO Discount (%)</label>
                                            <input type="number" step="0.01" class="form-control" id="glo"
                                                name="glo" value="{{ $discount->glo ?? 0 }}" required>
                                            <small class="text-muted">Discount percentage for GLO airtime
                                                purchases</small>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="airtel">Airtel Discount (%)</label>
                                            <input type="number" step="0.01" class="form-control" id="airtel"
                                                name="airtel" value="{{ $discount->airtel ?? 0 }}" required>
                                            <small class="text-muted">Discount percentage for Airtel airtime
                                                purchases</small>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="mobile">9Mobile Discount (%)</label>
                                            <input type="number" step="0.01" class="form-control" id="mobile"
                                                name="mobile" value="{{ $discount->mobile ?? 0 }}" required>
                                            <small class="text-muted">Discount percentage for 9Mobile airtime
                                                purchases</small>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <div class="alert alert-info">
                                            <i class="fa fa-info-circle"></i> These discounts will be applied to all
                                            airtime purchases. For example, if MTN discount is set to 3%, a ₦100
                                            purchase will cost the customer ₦97.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">
                                            Update Airtime Discount
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- / .main-content -->
    @include('admin.partials.script')

</body>

</html>
