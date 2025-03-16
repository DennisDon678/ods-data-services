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
                                Staffs List
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
                                    <th scope="col">name</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn = 1;
                                @endphp
                                @forelse ($staffs as $user)
                                    <tr>
                                        <th scope="row">{{ $sn }}</th>
                                        <td>{{ ucfirst($user->name) }}</td>
                                        <td><a href="/admin/staff/delete?id={{ $user->id }}"
                                                class="btn btn-danger">Delete</a></td>
                                    </tr>

                                    @php
                                        $sn++;
                                    @endphp
                                @empty
                                    No Staff to Display
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
