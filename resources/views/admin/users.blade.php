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
                                Users List
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
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn = 1;
                                @endphp
                                @forelse ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $sn }}</th>
                                        <td>{{ ucfirst(explode(' ', $user->name)[0]) }}</td>
                                        <td>{{ array_key_exists('1',explode(' ',$user->name))? ucfirst(explode(' ', $user->name)[1]):""}}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td><a href="/admin/user/view?id={{ $user->id }}"
                                                class="btn btn-primary">View</a></td>
                                    </tr>

                                    @php
                                        $sn++;
                                    @endphp
                                @empty
                                    No Users to Display
                                @endforelse

                            </tbody>
                        </table>
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>

    </div><!-- / .main-content -->
    @include('admin.partials.script')

</body>

</html>
