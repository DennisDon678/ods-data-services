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
                                Manual Funding Methods
                            </h1>

                        </div>

                    </div> <!-- / .row -->
                </div> <!-- / .header-body -->

            </div>
        </div> <!-- / .header -->

        <!-- CARDS -->
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">
                    <h5>Add Method</h5>
                    <button class="btn btn-primary" data-bs-target="#addNetwork" data-bs-toggle="modal">Add New
                        Method</button>
                </div>
            </div>
            <!-- Card -->
            <div class="card">
                <div class="card-body">

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Account Number</th>
                                    <th scope="col">Bank name</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn = 1;
                                @endphp
                                @forelse ($methods as $network)
                                    <tr>
                                        <th scope="row">{{ $sn }}</th>
                                        <td>{{ $network->account_number }}</td>
                                        <td>{{ strtoupper($network->bank_name) }}</td>
                                        <td><button type="button" class="btn btn-primary" data-bs-target="#edit-{{$network->id}}"
                                                data-bs-toggle="modal">Edit</button></td>
                                        <td><a href="/admin/config/funding/delete?id={{ $network->id }}"
                                                class="btn btn-danger">Delete</a></td>
                                    </tr>

                                    @php
                                        $sn++;
                                    @endphp

                                    <div class="modal fade" id="edit-{{$network->id}}" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-card card">
                                                    <div class="card-header">

                                                        <!-- Title -->
                                                        <h4 class="card-header-title" id="exampleModalCenterTitle">
                                                            Edit Method
                                                        </h4>

                                                        <!-- Close -->
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>

                                                    </div>

                                                    <div class="card-body">

                                                        <!-- Form -->
                                                        <form id="creditForm" method="post"
                                                            action="/admin/config/funding/edit?id={{ $network->id }}">
                                                            @csrf
                                                            <div class="mb-3 ">
                                                                <label for="">Account Name</label>
                                                                <input class="form-control "
                                                                    value="{{ $network->account_name }}" type="text"
                                                                    name="account_name" placeholder="Enter Amount">
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="">Bank Name</label>
                                                                <input class="form-control "
                                                                    value="{{ $network->bank_name }}" type="text"
                                                                    name="bank_name" placeholder="Enter Amount">
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="">Account Number</label>
                                                                <input class="form-control "
                                                                    value="{{ $network->account_number }}" type="text"
                                                                    name="account_number" placeholder="Enter Amount">
                                                            </div>
                                                            <div class="">
                                                                <button class="btn btn-primary"
                                                                    type="submit">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    No Method to Display
                                @endforelse
                                <div class="modal fade" id="addNetwork" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-card card">
                                                <div class="card-header">

                                                    <!-- Title -->
                                                    <h4 class="card-header-title" id="exampleModalCenterTitle">
                                                        Add Method
                                                    </h4>

                                                    <!-- Close -->
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>

                                                </div>

                                                <div class="card-body">

                                                    <!-- Form -->
                                                    <form id="creditForm" method="post"
                                                            action="">
                                                            @csrf
                                                            <div class="mb-3 ">
                                                                <label for="">Account Name</label>
                                                                <input class="form-control "
                                                                     type="text"
                                                                    name="account_name" placeholder="Enter Amount">
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="">Bank Name</label>
                                                                <input class="form-control "
                                                                     type="text"
                                                                    name="bank_name" placeholder="Enter Amount">
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="">Account Number</label>
                                                                <input class="form-control "
                                                                     type="text"
                                                                    name="account_number" placeholder="Enter Amount">
                                                            </div>
                                                            <div class="">
                                                                <button class="btn btn-primary"
                                                                    type="submit">Save</button>
                                                            </div>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div><!-- / .main-content -->
    @include('admin.partials.script')

</body>

</html>
