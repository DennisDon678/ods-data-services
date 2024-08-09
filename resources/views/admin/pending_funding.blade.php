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
                                pendinged Data List
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
                                        <td>&#8358;{{ number_format($pending->amount,2) }}</td>
                                        <td>{{ $pending->sender_bank }}</td>
                                        <td class="row align-items-center gap-1">
                                            <div class="col-6">
                                                <a href="/admin/pending_funding/approve?id={{ $pending->id }}"
                                                class="btn btn-primary">Approve</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="/admin/pending_funding/reject?id={{ $pending->id }}"
                                                class="btn btn-danger">Reject</a>
                                            </div>
                                        </td>
                                    </tr>

                                    @php
                                        $sn++;
                                    @endphp
                                @empty
                                    No pendings Manual Funding to Display
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
