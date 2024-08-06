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
                               Airtime to Cash List
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
                                    <th scope="col">From</th>
                                    <th scope="col">Amout</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn = 1;
                                @endphp
                                @forelse ($atocs as $preorder)
                                    <tr>
                                        <th scope="row">{{ $sn }}</th>
                                        <td>{{ strtoupper($preorder->networks) }}</td>
                                        <td>{{ ucfirst($preorder->from) }}</td>
                                        <td>{{ $preorder->amount }}</td>
                                        <td><a href="/admin/airtime_to_cash/view?id={{ $preorder->id }}"
                                                class="btn btn-primary">Settlement</a></td>
                                    </tr>

                                    @php
                                        $sn++;
                                    @endphp
                                @empty
                                    No Airtime to Cash to Display
                                @endforelse

                            </tbody>
                        </table>
                        {{ $atocs->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>

    </div><!-- / .main-content -->
    @include('admin.partials.script')

</body>

</html>
