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
                                Cable List
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
                    <h5>Add Network</h5>
                    <button class="btn btn-primary" data-bs-target="#addNetwork" data-bs-toggle="modal">Add New
                        Network</button>
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
                                    <th scope="col">Label</th>
                                    <th scope="col">Cable ID</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn = 1;
                                @endphp
                                @forelse ($cable_lists as $network)
                                    <tr>
                                        <th scope="row">{{ $sn }}</th>
                                        <td>{{ strtoupper($network->label) }}</td>
                                        <td>{{ $network->cable_id }}</td>
                                        <td><button type="button" class="btn btn-primary" data-bs-target="#edit-{{$network->id}}"
                                                data-bs-toggle="modal">Edit</button></td>
                                        <td><a href="/admin/cable/delete?id={{ $network->id }}"
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
                                                            Edit Network
                                                        </h4>

                                                        <!-- Close -->
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>

                                                    </div>

                                                    <div class="card-body">

                                                        <!-- Form -->
                                                        <form id="creditForm" method="post"
                                                            action="/admin/cable/edit?id={{ $network->id }}">
                                                            @csrf
                                                            <div class="mb-3 ">
                                                                <label for="">Label</label>
                                                                <input class="form-control "
                                                                    value="{{ $network->label }}" type="text"
                                                                    name="label" placeholder="Enter Amount">
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="">Network ID
                                                                    <small>(Most be Unique)</small></label>
                                                                <input class="form-control "
                                                                    value="{{ $network->cable_id }}" type="number"
                                                                    name="network_id" placeholder="Enter Amount">
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
                                    No Network to Display
                                @endforelse
                                <div class="modal fade" id="addNetwork" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-card card">
                                                <div class="card-header">

                                                    <!-- Title -->
                                                    <h4 class="card-header-title" id="exampleModalCenterTitle">
                                                        Add Network
                                                    </h4>

                                                    <!-- Close -->
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>

                                                </div>

                                                <div class="card-body">

                                                    <!-- Form -->
                                                    <form id="creditForm" method="post"
                                                        action="/admin/cable/add">
                                                        @csrf
                                                        <div class="mb-3 ">
                                                            <label for="">Label</label>
                                                            <input class="form-control "
                                                                type="text" name="label"
                                                                placeholder="Enter Amount">
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="">Network ID
                                                                <small>(Most be Unique)</small></label>
                                                            <input class="form-control" type="number"
                                                                name="cable_id" placeholder="Enter Amount">
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
