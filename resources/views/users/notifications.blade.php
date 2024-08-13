<!doctype html>
<html lang="en">

@include('users.partials.head')

<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled" data-sidebarstyle="sidebar-pushcontent">

    @include('users.partials.preloader')

    @include('users.partials.headNav')

    @include('users.partials.sideNav')

    <!-- Begin page content -->
    <main class="main mainheight">
        <!-- content -->
        <div class="container mt-4">
            <div class="row">
                <!-- Transactions -->
                <div class="col-12 col-md-12 position-relative ">
                    <div class="card border-0 overflow-hidden mb-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-auto mb-2">
                                            <i class="bi bi-shop h5 avatar avatar-40 bg-light-theme rounded"></i>
                                        </div>
                                        <div class="col align-self-center mb-2">
                                            <h6 class="fw-medium mb-0">Notifications</h6>
                                            <p class="text-secondary small">All Notifications</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-4">
                            <table class="table table-borderless">
                                <tbody class="">
                                    @forelse ($notifications as $tran)
                                        <tr class="">
                                            <td>
                                                <div class="row align-items-center p-4 border rounded">
                                                    <div class="col-12 ps-0">
                                                        <h6 class="mb-0 bold">{{ strtoupper($tran->title) }}</h6>
                                                        <p class="text-secondary small">
                                                            {{ $tran->description }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        Nothing to show here!
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    {{--  --}}
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')
</body>

</html>
