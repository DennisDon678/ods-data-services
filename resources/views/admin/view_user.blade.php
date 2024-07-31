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
                                User
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
                    <h4>Basic User Information</h4>
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
                                        First name
                                    </label>

                                    <!-- Input -->
                                    <input type="text" value="{{ ucfirst(explode(' ', $user->name)[0]) }}" readonly
                                        class="form-control">

                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- Last name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Last name
                                    </label>

                                    <!-- Input -->
                                    <input type="text" value="{{ array_key_exists('1',explode(' ',$user->name))? ucfirst(explode(' ', $user->name)[1]):"" }}" readonly
                                        class="form-control">

                                </div>

                            </div>
                            <div class="col-12">

                                <!-- Email address -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                        Email address
                                    </label>

                                    <!-- Input -->
                                    <input type="email" value="{{ $user->email }}" readonly class="form-control">

                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Phone
                                    </label>

                                    <!-- Input -->
                                    <input type="text" value="{{ $user->phone }}" readonly class="form-control mb-3"
                                        placeholder="(___)___-____" data-inputmask="'mask': '(999)999-9999'">

                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- Birthday -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        State
                                    </label>

                                    <!-- Input -->
                                    <input type="text" value="{{ $user->state }}" readonly class="form-control">

                                </div>

                            </div>
                        </div> <!-- / .row -->

                        <h4>Finance And Statistics</h4>
                        <hr class="my-2">

                        <div class="row mb-4">
                            <div class="col-12 col-md-6">

                                <!-- First name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Balance
                                    </label>

                                    <!-- Input -->
                                    <input type="text" value="&#8358;{{ number_format($user->balance, 2) }}" readonly
                                        class="form-control">

                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- Last name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Referral Balance
                                    </label>

                                    <!-- Input -->
                                    <input type="text" value="&#8358;{{ number_format($user->referral_balance, 2) }}"
                                        readonly class="form-control">

                                </div>

                            </div>
                            <div class="col-12">

                                <!-- Email address -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                        Total Deposits
                                    </label>
                                    @php
                                        $deposits = App\Models\Transactions::where('user_id', '=', $user->id)
                                            ->where('type', '=', 'deposit')
                                            ->where('status', '=', 'success')
                                            ->sum('amount');
                                    @endphp
                                    <!-- Input -->
                                    <input type="email" value="&#8358;{{ number_format($deposits, 2) }}" readonly
                                        class="form-control">

                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Total Expenses
                                    </label>
                                    @php
                                        $exp = App\Models\Transactions::where('user_id', '=', $user->id)
                                            ->where('type', '!=', 'deposit')
                                            ->where('status', '=', 'success')
                                            ->sum('amount');
                                    @endphp

                                    <!-- Input -->
                                    <input type="text" value="&#8358;{{ number_format($exp, 2) }}" readonly
                                        class="form-control mb-3">

                                </div>

                            </div>

                        </div> <!-- / .row -->

                        <h4>Actions</h4>
                        <!-- Divider -->
                        <hr class=" mb-5">

                        <div class="row justify-content-between">
                            <div class="col-12 col-md-6">

                                <!-- Heading -->
                                <h4>
                                    Credit User
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#credit">
                                    Credit
                                </button>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Divider -->
                        <hr class="mt-4 mb-5">

                        <div class="row justify-content-between">
                            <div class="col-12 col-md-6">

                                <!-- Heading -->
                                <h4>
                                    Debit User
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <button class="btn btn-danger"type="button" data-bs-toggle="modal"
                                    data-bs-target="#debit">
                                    Debit
                                </button>

                            </div>
                        </div> <!-- / .row -->
                        <!-- Divider -->
                        <hr class="mt-4 mb-5">

                        <div class="row justify-content-between">
                            <div class="col-12 col-md-6">

                                <!-- Heading -->
                                <h4>
                                    Message User
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                    data-bs-target="#message">
                                    Message
                                </button>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Divider -->
                        <hr class="mt-4 mb-5">

                        <div class="row justify-content-between">
                            <div class="col-12 col-md-6">

                                <!-- Heading -->
                                <h4>
                                    Delete user account
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <button class="btn btn-danger" type="button" data-bs-target="#delete" data-bs-toggle="modal">
                                    Delete
                                </button>

                            </div>
                        </div> <!-- / .row -->

                    </form>

                    <br><br>

                </div>
            </div>
        </div>

        {{-- modal --}}
        <div class="modal fade" id="credit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-card card">
                        <div class="card-header">

                            <!-- Title -->
                            <h4 class="card-header-title" id="exampleModalCenterTitle">
                                Credit User
                            </h4>

                            <!-- Close -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>

                        </div>

                        <div class="card-body">

                            <!-- Form -->
                            <form id="creditForm" method="post" action="/admin/user/credit?id={{ $user->id }}">
                                @csrf
                                <div class="input-group ">
                                    <input class="form-control " type="number" name="creditAmount"
                                        placeholder="Enter Amount">
                                    <div class="input-group-text">
                                        <button class="btn btn-primary" type="submit">Credit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="debit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-card card">
                        <div class="card-header">

                            <!-- Title -->
                            <h4 class="card-header-title" id="exampleModalCenterTitle">
                                Debit User
                            </h4>

                            <!-- Close -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>

                        </div>

                        <div class="card-body">

                            <!-- Form -->
                            <form id="creditForm" method="post" action="/admin/user/debit?id={{ $user->id }}">
                                @csrf
                                <div class="input-group ">
                                    <input class="form-control " type="number" name="debitAmount"
                                        placeholder="Enter Amount">
                                    <div class="input-group-text">
                                        <button class="btn btn-primary" type="submit">Debit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-card card">
                        <div class="card-header">

                            <!-- Title -->
                            <h4 class="card-header-title" id="exampleModalCenterTitle">
                                Message User (Email)
                            </h4>

                            <!-- Close -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>

                        </div>

                        <div class="card-body">

                            <!-- Form -->
                            <form id="creditForm" method="post" action="/admin/user/message?id={{ $user->id }}">
                                @csrf
                                <div class="mb-3">
                                    <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>

                                </div>
                                <div class="">
                                    <button class="btn btn-primary" type="submit">Send Mail</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-card card">
                        <div class="card-header">

                            <!-- Title -->
                            <h4 class="card-header-title" id="exampleModalCenterTitle">
                               Delete User
                            </h4>

                            <!-- Close -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>

                        </div>

                        <div class="card-body">

                            <h5>This User will be deleted from  your website, Do you wish to continue?</h5>
                            <a href="/admin/user/delete?id={{$user->id}}" class="btn btn-primary">Confirm Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- / .main-content -->
    @include('admin.partials.script')

    @if (Session::has('message'))
    @endif

</body>

</html>
