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
                                Profile
                            </h1>

                        </div>

                    </div> <!-- / .row -->
                </div> <!-- / .header-body -->

            </div>
        </div> <!-- / .header -->

        <!-- CARDS -->
        <div class="container-fluid">

            <div class="row justify-content-center">
                @if(Session::has('error'))
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                </div>
                @endif
                <div class="col-12 col-lg-10 col-xl-8">
                    <h4>Basic User Information</h4>
                    <!-- Form -->
                    <form method="post" action="?type=info">
                        @csrf
                        <!-- Divider -->
                        <hr class="my-2">

                        <div class="row mb-4">
                            <div class="col-12 col-md-6">

                                <!-- First name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Name
                                    </label>

                                    <!-- Input -->
                                    <input type="text" name="name" value="{{ $user->name }}" 
                                        class="form-control" required>

                                </div>

                            </div>
                            
                            <div class="col-12 col-md-6">

                                <!-- Email address -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                        Email address
                                    </label>

                                    <!-- Input -->
                                    <input type="email" name="email" value="{{ $user->email }}"  class="form-control" required>

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
                                    Update Profile
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <button type="submit" class="btn btn-primary" >
                                    Update
                                </button>

                            </div>
                        </div> <!-- / .row -->

                    </form>

                    <br><br>

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <h4 class="text-success">Change Password</h4>
                    <!-- Form -->
                    <form action="?type=password" method="POST">
                        @csrf
                        <!-- Divider -->
                        <hr class="my-2">

                        <div class="row mb-4">
                            <div class="col-12 col-md-6">

                                <!-- First name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Old Password
                                    </label>

                                    <!-- Input -->
                                    <input type="password" name="old_password" 
                                        class="form-control" required>

                                </div>

                            </div>
                            
                            <div class="col-12 col-md-6">

                                <!-- Email address -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                        New Password
                                    </label>

                                    <!-- Input -->
                                    <input type="password" name="password" class="form-control" required>

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
                                    Update Password
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <button type="submit" class="btn btn-primary" >
                                    Update
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
