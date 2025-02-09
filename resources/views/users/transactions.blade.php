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
                                            <h6 class="fw-medium mb-0">History</h6>
                                            <p class="text-secondary small">All Transactions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-4">
                            <table class="table table-borderless">
                                <tbody class="">
                                    @forelse ($transactions as $tran)
                                        <tr class="">
                                            <td>
                                                <a href="/user/transaction/view/{{ $tran->transaction_id }}">
                                                    <div class="row align-items-center p-4 border rounded">
                                                        <div class="col-8 ps-0">
                                                            <h6 class="mb-0 bold">{{ strtoupper($tran->title) }}</h6>
                                                            <p class="text-secondary small">TRANSACTION
                                                                {{ strtoupper($tran->status) }} <br>
                                                                <small
                                                                    style="color: rgb(29, 23, 24)">{{ $date->format('M d, Y h:i A') }}</small>
                                                            </p>
                                                        </div>

                                                        <div class="col-4">
                                                            <h6
                                                                class="{{ $tran->type == 'deposit' ? 'text-success' : 'text-danger' }}">
                                                                &#8358;{{ number_format($tran->amount, 2) }}</h6>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                                {{ $trans->links('pagination::bootstrap-5') }}
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
