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
                                Data Plans
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
                    <h5>Update Data Plan</h5>
                    <div class="col-auto">
                        <div class="col-auto">
                            <a class="btn btn-primary" href="/admin/generate_data_plans">Update My Plans</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
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
                                    <th scope="col">Data ID</th>
                                    <th scope="col">Network</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Validity(Days)</th>
                                    <th scope="col">Plan</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn = 1;
                                @endphp
                                @forelse ($data_plans as $network)
                                    @php
                                        $plan = App\Models\plan_type_list::find($network->plan_id);
                                        $net = App\Models\Network_list::find($plan->network_id);
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $sn }}</th>
                                        <td>{{ $network->data_id }}</td>
                                        <td>{{ $net->label }}</td>
                                        <td>{{ strtoupper($network->size) }}</td>
                                        <td>&#8358;{{ number_format((int)$network->price, 2) }}</td>
                                        <td>{{ strtoupper($network->validity) }}</td>
                                        <td>{{ strtoupper($plan->plan_type) }}</td>
                                        <td><button type="button" class="btn btn-primary"
                                                data-bs-target="#edit-{{ $network->id }}"
                                                data-bs-toggle="modal">Edit</button></td>
                                        <td><a href="/admin/data-plan/delete?id={{ $network->id }}"
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
                                                            action="/admin/data-plan/edit?id={{ $network->id }}">
                                                            @csrf
                                                            <div class="mb-3 ">
                                                                <label for="">Data ID</label>
                                                                <input class="form-control "
                                                                    value="{{ $network->data_id }}" type="text"
                                                                    name="data_id" placeholder="Enter data ID">
                                                            </div>
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
                                                                    value="{{ $network->validity }}" type="text"
                                                                    name="validity" placeholder="Enter validity">
                                                            </div>
                                                            @php
                                                                $nets = App\Models\Network_list::all();
                                                                $exact = App\Models\plan_type_list::find(
                                                                    $network->plan_id,
                                                                );
                                                                $plans = App\Models\plan_type_list::where(
                                                                    'network_id',
                                                                    '=',
                                                                    $exact->network_id,
                                                                )->get();
                                                            @endphp
                                                            <div class="mb-3 ">
                                                                <label for="">Network</label>
                                                                <select name="network_id" id=""
                                                                    class="form-control">
                                                                    <option value="">Select Network</option>
                                                                    @foreach ($nets as $net_s)
                                                                        <option value="{{ $net_s->network_id }}"
                                                                            {{ $net_s->network_id == $network->plan_id ? 'selected' : '' }}>
                                                                            {{ strtoupper($net_s->label) }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="">Plan</label>
                                                                <select name="plan_id" id=""
                                                                    class="form-control">
                                                                    <option value="">Select Plan</option>
                                                                    @foreach ($plans as $plan_s)
                                                                        <option value="{{ $plan_s->id }}"
                                                                            {{ $plan_s->id == $network->id ? 'selected' : '' }}>
                                                                            {{ strtoupper($plan_s->plan_type) }}
                                                                        </option>
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
                                <div class="modal fade" id="addNew" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-card card">
                                                <div class="card-header">

                                                    <!-- Title -->
                                                    <h4 class="card-header-title" id="exampleModalCenterTitle">
                                                        Add Data Plan
                                                    </h4>

                                                    <!-- Close -->
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>

                                                </div>

                                                <div class="card-body">

                                                    <!-- Form -->
                                                    <form id="creditForm" method="post"
                                                        action="/admin/data-plan/add">
                                                        @csrf
                                                        <div class="mb-3 ">
                                                            <label for="">Data ID</label>
                                                            <input class="form-control " type="number"
                                                                name="data_id" placeholder="Enter Data ID">
                                                        </div>
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
                                                            <input class="form-control " type="text"
                                                                name="validity" placeholder="Enter validity">
                                                        </div>
                                                        @php
                                                            $nets = App\Models\Network_list::all();
                                                            $plans = App\Models\plan_type_list::all();
                                                        @endphp
                                                        <div class="mb-3 ">
                                                            <label for="">Network</label>
                                                            <select name="" id="network"
                                                                class="form-control">
                                                                <option value="">Select Network</option>
                                                                @foreach ($nets as $net_s)
                                                                    <option value="{{ $net_s->network_id }}">
                                                                        {{ strtoupper($net_s->label) }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="">Plan</label>
                                                            <select name="plan_id" id="plan"
                                                                class="form-control">
                                                                <option value="" id="emptyPlan">----------------
                                                                </option>
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
    <script src="/jquery-3.6.0.min.js"></script>
    <script>
        $('#network').on('change', function() {
            if ($(this).val() != '') {
                $.ajax({
                    type: "get",
                    url: "/admin/data/get_plan_type?network_id=" + $(this).val(),
                    success: function(response) {
                        if (response.length > 0) {
                            $('#emptyPlan').remove();
                            $('#plan').append(
                                '<option value="">Choose a Data type</option>'
                            )
                            response.forEach((data) => {
                                // console.log(data);
                                $('#plan').append(
                                    '<option value="' + data.id + '">' + data.plan_type +
                                    '</option>'
                                )

                            });
                        } else {
                            $('#plan').html(
                                '<option value="" id="emptyPlan">No Data Type to Show</option>')
                        }
                    }
                });
            } else {
                $('#plan').html(
                    '<option value="" id="emptyPlan">---------------------</option>')
            }
        })

        // FIlter
        $('#filter').on('change', function() {
            if ($(this).val() != '') {
                $.ajax({
                    type: "get",
                    url: "/admin/data/get_plan_type?network_id=" + $(this).val(),
                    success: function(response) {
                        if (response.length > 0) {
                            $('#emptyfilter').remove();
                            $('#planFilter').append(
                                '<option value="">Choose a Data type</option>'
                            )
                            response.forEach((data) => {
                                // console.log(data);
                                $('#planFilter').append(
                                    '<option value="' + data.id + '">' + data.plan_type +
                                    '</option>'
                                )

                            });
                        } else {
                            $('#planFilter').html(
                                '<option value="" id="emptyfilter">No Data Type to Show</option>')
                        }
                    }
                });
            } else {
                $('#planFilter').html(
                    '<option value="" id="emptyfilter">---------------------</option>')
            }
        })

        $("#planFilter").on('change', function() {
            if ($(this).val() != '') {
                // submit form
                $('#filterForm').submit();
            }
        })
    </script>

</body>

</html>
