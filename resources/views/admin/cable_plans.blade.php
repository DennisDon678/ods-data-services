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
                                Cable Plans
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
                    <h5>Update Cable Plan</h5>
                    <div class="col-auto">
                        <div class="col-auto">
                            <a class="btn btn-primary" href="/admin/generate_cable_plans">Update Update Cable Plan</a>
                        </div>
                    </div>
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
                                    <th scope="col">Cable plan ID</th>
                                    <th scope="col">Cable</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn = 1;
                                @endphp
                                @forelse ($cable_plans as $network)
                                    @php
                                        $cable = App\Models\Cable_list::find($network->cable_id);
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $sn }}</th>
                                        <td>{{ $network->plan_id }}</td>
                                        <td>{{ strtoupper($cable->label) }}</td>
                                        <td>{{ $network->plan_name }}</td>
                                        <td>&#8358;{{ number_format($network->price, 2) }}</td>
                                        <td><button type="button" class="btn btn-primary"
                                                data-bs-target="#edit-{{ $network->id }}"
                                                data-bs-toggle="modal">Edit</button></td>
                                        <td><a href="/admin/cable-plan/delete?id={{ $network->id }}"
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
                                                            Edit cable Plan
                                                        </h4>

                                                        <!-- Close -->
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>

                                                    </div>

                                                    <div class="card-body">

                                                        <!-- Form -->
                                                        <form id="creditForm" method="post"
                                                            action="/admin/cable-plan/edit?id={{ $network->id }}">
                                                            @csrf
                                                            <div class="mb-3 ">
                                                                <label for="">Plan ID</label>
                                                                <input class="form-control " type="number" value="{{$network->plan_id}}"
                                                                    name="plan_id" placeholder="Enter Data ID">
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="">Name</label>
                                                                <input class="form-control " type="text" value="{{$network->plan_name}}"
                                                                    name="plan_name" placeholder="Enter Name">
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="">Price</label>
                                                                <input class="form-control " type="number" value="{{$network->price}}"
                                                                    name="price" placeholder="Enter amount">
                                                            </div>

                                                            @php
                                                                $cables = App\Models\Cable_list::all();
                                                            @endphp

                                                            <div class="mb-3 ">
                                                                <label for="">Cable</label>
                                                                <select name="cable_id" id="plan"
                                                                    class="form-control">
                                                                    <option value="" id="emptyPlan">Choose Cable
                                                                    </option>
                                                                    @foreach ($cables as $cable)
                                                                        <option value="{{ $cable->id }}"
                                                                            id="" {{$cable->id == $network->cable_id?"selected":""}}>{{ $cable->label }}</option>
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
                                <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-card card">
                                                <div class="card-header">

                                                    <!-- Title -->
                                                    <h4 class="card-header-title" id="exampleModalCenterTitle">
                                                        Add cable Plan
                                                    </h4>

                                                    <!-- Close -->
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>

                                                </div>

                                                <div class="card-body">

                                                    <!-- Form -->
                                                    <form id="creditForm" method="post"
                                                        action="/admin/cable-plan/add">
                                                        @csrf
                                                        <div class="mb-3 ">
                                                            <label for="">Plan ID</label>
                                                            <input class="form-control " type="number"
                                                                name="plan_id" placeholder="Enter Data ID">
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="">Name</label>
                                                            <input class="form-control " type="text"
                                                                name="plan_name" placeholder="Enter Name">
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="">Price</label>
                                                            <input class="form-control " type="number"
                                                                name="price" placeholder="Enter amount">
                                                        </div>

                                                        @php
                                                            $cables = App\Models\Cable_list::all();
                                                        @endphp

                                                        <div class="mb-3 ">
                                                            <label for="">Cable</label>
                                                            <select name="cable_id" id="plan"
                                                                class="form-control">
                                                                <option value="" id="emptyPlan">Choose Cable
                                                                </option>
                                                                @foreach ($cables as $cable)
                                                                    <option value="{{ $cable->id }}"
                                                                        id="">{{ $cable->label }}</option>
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
