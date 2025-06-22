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
                                Preorder Plans
                            </h1>

                        </div>

                    </div> <!-- / .row -->
                </div> <!-- / .header-body -->

            </div>
        </div> <!-- / .header -->

        <!-- CARDS -->
        <div class="container-fluid">
            <!-- Preorder Toggle -->
            @php
                $preorder_service = \App\Models\AvailableServices::where('name', 'preorder')->first();
                $preorder_enabled = $preorder_service ? $preorder_service->status : 'inactive';
            @endphp
            <div class="mb-3">
                <form method="POST" action="{{ route('admin.toggle_preorder') }}">
                    @csrf
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="preorderSwitch" name="enabled"
                            value="1" onchange="this.form.submit()"
                            {{ $preorder_enabled == 'active' ? 'checked' : '' }}>
                        <label class="form-check-label" for="preorderSwitch">
                            Preorder is {{ $preorder_enabled == 'active' ? 'Enabled' : 'Disabled' }}
                        </label>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5>Add preorder Plan</h5>
                    <button class="btn btn-primary" data-bs-target="#addNew" data-bs-toggle="modal">Add preorder
                        Plan</button>
                </div>
            </div>

            {{-- <div class="card">
                <div class="card-body">
                    <h5>Filter</h5>
                    <form action="/admin/data-plans" method="get" class="row" id="filterForm">
                        @php
                            $nets = App\Models\Network_list::all();
                        @endphp
                        <div class="mb-3 col-6">
                            <label for="">Choose Network</label>
                            <select name="network_id" id="filter" class="form-control">
                                <option value="">Select Network</option>
                                @foreach ($nets as $net_s)
                                    <option value="{{ $net_s->network_id }}">
                                        {{ strtoupper($net_s->label) }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="">Plan</label>
                            <select name="plan_id" id="planFilter" class="form-control">
                                <option value="" id="emptyfilter">----------------
                                </option>
                            </select>
                        </div>
                    </form>
                </div>
            </div> --}}
            <!-- Card -->
            <div class="card">
                <div class="card-body">

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Validity(Days)</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn = 1;
                                @endphp
                                @forelse ($preorders as $network)
                                    <tr>
                                        <th scope="row">{{ $sn }}</th>
                                        <td>{{ $network->size }}</td>
                                        <td>&#8358;{{ number_format($network->price, 2) }}</td>
                                        <td>{{ strtoupper($network->validity) }}</td>
                                        <td><button type="button" class="btn btn-primary"
                                                data-bs-target="#edit-{{ $network->id }}"
                                                data-bs-toggle="modal">Edit</button></td>
                                        <td><a href="/admin/preorder/delete?id={{ $network->id }}"
                                                class="btn btn-danger">Delete</a></td>
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
                                                            action="/admin/preorder/edit?id={{ $network->id }}">
                                                            @csrf
                                                            <input type="hidden" name="network_id" value="1">
                                                            <div class="mb-3 ">
                                                                <label for="">Size</label>
                                                                <input class="form-control "
                                                                    value="{{ $network->size }}" type="text"
                                                                    name="size" placeholder="Enter size">
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="">Price</label>
                                                                <input class="form-control "
                                                                    value="{{ $network->price }}" type="number"
                                                                    name="price" placeholder="Enter Amount">
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="">Validity</label>
                                                                <input class="form-control "
                                                                    value="{{ $network->validity }}" type="number"
                                                                    name="validity" placeholder="Enter validity">
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
                                <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-card card">
                                                <div class="card-header">

                                                    <!-- Title -->
                                                    <h4 class="card-header-title" id="exampleModalCenterTitle">
                                                        Add preorder Plan
                                                    </h4>

                                                    <!-- Close -->
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>

                                                </div>

                                                <div class="card-body">

                                                    <!-- Form -->
                                                    <form id="creditForm" method="post"
                                                        action="/admin/preorder/add">
                                                        @csrf
                                                        <input type="hidden" name="network_id" value="1">
                                                        <div class="mb-3 ">
                                                            <label for="">Size</label>
                                                            <input class="form-control " type="text"
                                                                name="size" placeholder="Enter Size">
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="">Price</label>
                                                            <input class="form-control " type="number"
                                                                name="price" placeholder="Enter amount">
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="">Validity</label>
                                                            <input class="form-control " type="number"
                                                                name="validity" placeholder="Enter validity">
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
