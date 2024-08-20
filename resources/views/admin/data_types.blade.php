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
                                Data Types
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
                    <h5>Update Plans</h5>
                    
                    <div class="col-auto">
                        <div class="col-auto">
                            <a class="btn btn-primary" href="/admin/generate_data_plan_types">Update My Plans</a>
                        </div>
                    </div>
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
                                    <th scope="col">ID</th>
                                    <th scope="col">Label</th>
                                    <th scope="col">Network ID</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn = 1;
                                @endphp
                                @forelse ($data_types as $network)
                                    @php
                                        $net = App\Models\Network_list::find($network->network_id);
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $sn }}</th>
                                        <td>{{ $network->id }}</td>
                                        <td>{{ strtoupper($network->plan_type) }}</td>
                                        <td>{{ strtoupper($net->label) }}</td>
                                        <td><button type="button" class="btn btn-primary"
                                                data-bs-target="#edit-{{ $network->id }}"
                                                data-bs-toggle="modal">Edit</button></td>

                                        <td><a href="/admin/data-type/status?id={{ $network->id }}"
                                                class="btn btn-{{ $network->status == 'active' ? 'danger' : 'success' }}">{{ $network->status == 'active' ? 'Deactivate' : 'Activate' }}</a>
                                    </tr>

                                    @php
                                        $sn++;
                                    @endphp

                                    <div class="modal fade" id="edit-{{ $network->id }}" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-card card">
                                                    <div class="card-header">

                                                        <!-- Title -->
                                                        <h4 class="card-header-title" id="exampleModalCenterTitle">
                                                            Edit Data Type
                                                        </h4>

                                                        <!-- Close -->
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>

                                                    </div>

                                                    <div class="card-body">

                                                        <!-- Form -->
                                                        <form id="creditForm" method="post"
                                                            action="/admin/data-type/edit?id={{ $network->id }}">
                                                            @csrf
                                                            <div class="mb-3 ">
                                                                <label for="">Label</label>
                                                                <input class="form-control "
                                                                    value="{{ $network->plan_type }}" type="text"
                                                                    name="label" placeholder="Enter Amount">
                                                            </div>
                                                            @php
                                                                $nets = App\Models\Network_list::all();
                                                            @endphp
                                                            <div class="mb-3 ">
                                                                <label for="">Network</label>
                                                                <select name="network_id" id=""
                                                                    class="form-control">
                                                                    <option value="">Select Network</option>
                                                                    @foreach ($nets as $net_s)
                                                                        <option value="{{ $net_s->network_id }}"
                                                                            {{ $net_s->network_id == $network->network_id ? 'selected' : '' }}>
                                                                            {{ strtoupper($net_s->label) }}</option>
                                                                    @endforeach

                                                                </select>
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
                                <div class="modal fade" id="addNetwork" tabindex="-1" role="dialog"
                                    aria-hidden="true">
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
                                                    <form id="creditForm" method="post" action="/admin/data-type/add">
                                                        @csrf
                                                        <div class="mb-3 ">
                                                            <label for="">Label</label>
                                                            <input class="form-control " type="text" name="label"
                                                                placeholder="Enter Plan Name">
                                                        </div>
                                                        @php
                                                            $nets = App\Models\Network_list::all();
                                                        @endphp
                                                        <div class="mb-3 ">
                                                            <label for="">Network</label>
                                                            <select name="network_id" id=""
                                                                class="form-control">
                                                                <option value="">Select Network</option>
                                                                @foreach ($nets as $net_s)
                                                                    <option value="{{ $net_s->network_id }}">
                                                                        {{ strtoupper($net_s->label) }}</option>
                                                                @endforeach

                                                            </select>
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
