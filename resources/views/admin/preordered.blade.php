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
                                Preordered Data List
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
                                    <th scope="col">Size</th>
                                    <th scope="col">User</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn = 1;
                                @endphp
                                @forelse ($preorders as $preorder)
                                    <tr>
                                        <th scope="row">{{ $sn }}</th>
                                        <td>{{ ucfirst($preorder->size) }}</td>
                                        <td>{{App\Models\User::find($preorder->user_id)->email}}</td>
                                        <td>{{ $preorder->number }}</td>
                                        <td><a href="/admin/preorder/approve?id={{ $preorder->id }}"
                                                class="btn btn-primary">Delivered</a></td>
                                    </tr>

                                    @php
                                        $sn++;
                                    @endphp
                                @empty
                                    No Preorders to Display
                                @endforelse

                            </tbody>
                        </table>
                        {{ $preorders->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>

    </div><!-- / .main-content -->
    @include('admin.partials.script')

</body>

</html>
