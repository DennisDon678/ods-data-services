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
                                Profit List
                            </h1>

                        </div>

                    </div> <!-- / .row -->
                </div> <!-- / .header-body -->

            </div>
        </div> <!-- / .header -->

        <!-- CARDS -->
        <div class="container-fluid">
            <!-- Card -->
            <div class="card">
                <div class="card-body">

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Network</th>
                                    <th scope="col">Label</th>
                                    <th scope="col">Profit</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn = 1;
                                @endphp
                                @forelse ($profits as $network)
                                @php
                                    $plan = App\Models\plan_type_list::where('id', '=', $network->plan_type)->first();
                                    $net = App\Models\Network_list::where('network_id', '=', $plan->network_id)->first();
                                @endphp
                                    <tr>
                                        <th scope="row">{{ $sn }}</th>
                                        <td>{{ strtoupper($net->label) }}</td>
                                        <td>{{ strtoupper($plan->plan_type) }}</td>
                                        <td>{{ $network->profit }}%</td>
                                        <td><button type="button" class="btn btn-primary" data-bs-target="#edit-{{$network->id}}"
                                                data-bs-toggle="modal">Edit</button></td>
                                        
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
                                                            Edit Profit
                                                        </h4>

                                                        <!-- Close -->
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>

                                                    </div>

                                                    <div class="card-body">

                                                        <!-- Form -->
                                                        <form id="creditForm" method="post"
                                                            action="/admin/profit/edit?id={{ $network->id }}">
                                                            @csrf
                                                            
                                                            <div class="mb-3 ">
                                                                <label for="">Amount
                                                                <input class="form-control "
                                                                    value="{{ $network->profit }}" type="text"
                                                                    name="profit" placeholder="Enter Amount">
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
