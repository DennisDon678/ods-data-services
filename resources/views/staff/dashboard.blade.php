<!DOCTYPE html>
<html lang="en" data-bs-theme="">
@include('admin.partials.head')

<body>

    <!-- NAVIGATION -->
    @include('staff.partial.sidebar')
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
                                Dashboard
                            </h1>

                        </div>

                    </div> <!-- / .row -->
                </div> <!-- / .header-body -->

            </div>
        </div> <!-- / .header -->

        <!-- CARDS -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-4">
                    <!-- Value  -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="text-uppercase text-body-secondary mb-2">
                                        Pending funding
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                                        {{ $pendings->count() }}
                                    </span>
                                </div>
                            </div> <!-- / .row -->
                        </div>
                    </div>
                </div>
            </div> <!-- / .row -->

            <div class="row">

                <div class="col-12 col-xl-4-12">

                    <!-- Sales -->
                    <div class="card">
                        <div class="card-header">

                            <!-- Title -->
                            <h4 class="card-header-title">
                                Account Funding
                            </h4>

                        </div>
                        <div class="card-body">

                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Sender Name</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Sender Bank</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sn = 1;
                                        @endphp
                                        @forelse ($pendings as $pending)
                                            <tr>
                                                <th scope="row">{{ $sn }}</th>
                                                <td>{{ ucfirst($pending->sender_name) }}</td>
                                                <td>&#8358;{{ number_format($pending->amount, 2) }}</td>
                                                <td>{{ $pending->sender_bank }}</td>
                                                <td class="row align-items-center gap-1">
                                                    <div class="col-6">
                                                        <a href="/staff/pending_funding/approve?id={{ $pending->id }}"
                                                            class="btn btn-primary">Approve</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="/staff/pending_funding/reject?id={{ $pending->id }}"
                                                            class="btn btn-danger">Reject</a>
                                                    </div>
                                                </td>
                                            </tr>

                                            @php
                                                $sn++;
                                            @endphp
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No pending funding</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div> <!-- / .row -->
        </div>

    </div><!-- / .main-content -->
    @include('admin.partials.script')

</body>

</html>
