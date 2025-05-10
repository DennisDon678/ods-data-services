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
                                        API Balance
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                                        &#8358;{{ number_format($balance, 2) }}
                                    </span>
                                </div>
                            </div> <!-- / .row -->
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6 col-xl-4">

                    <!-- Hours -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="text-uppercase text-body-secondary mb-2">
                                        Total Users Balance
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                                        &#8358;{{ number_format(App\Models\User::sum('balance'), 2) }}
                                    </span>

                                </div>

                            </div> <!-- / .row -->
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6 col-xl-4">

                    <!-- Exit -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="text-uppercase text-body-secondary mb-2">
                                        Preorders today
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                                        {{ count(App\Models\count_preorder::whereDate('created_at', Carbon\Carbon::today())->get()) }}
                                    </span>

                                </div>
                            </div> <!-- / .row -->
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6 col-xl-4">

                    <!-- Time -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="text-uppercase text-body-secondary mb-2">
                                        Total Preoder Amount
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                                        &#8358;{{number_format(App\Models\count_preorder::whereDate('created_at', Carbon\Carbon::today())->sum('price'),2)}}
                                    </span>

                                </div>
                            </div> <!-- / .row -->
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6 col-xl-4">

                    <!-- Time -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="text-uppercase text-body-secondary mb-2">
                                        Total Users
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                                        {{ count(App\Models\User::all()) }}
                                    </span>

                                </div>
                            </div> <!-- / .row -->
                        </div>
                    </div>

                </div>

                <div class="col-12 col-lg-6 col-xl-4">

                    <!-- Time -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="text-uppercase text-body-secondary mb-2">
                                        No. of Vendors
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                                        {{ count(App\Models\User::where('is_vendor', '=', true)->get()) }}
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
                            <div class="row align-items-center mb-4">
                                <div class="col">
                                    <ul class="nav nav-tabs nav-overflow" role="tablist">
                                        <li class="nav-item">
                                            <a href="#all-fundings" class="nav-link active" data-bs-toggle="tab"
                                                role="tab" aria-controls="all-fundings" aria-selected="true">
                                                All
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#today-fundings" class="nav-link" data-bs-toggle="tab"
                                                role="tab" aria-controls="today-fundings" aria-selected="false">
                                                Today
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#month-fundings" class="nav-link" data-bs-toggle="tab"
                                                role="tab" aria-controls="month-fundings" aria-selected="false">
                                                This Month
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="all-fundings" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-sm table-nowrap card-table">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Amount</th>
                                                    <th>Method</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse(App\Models\Transactions::where('type', 'deposit')->latest()->take(10)->get() as $funding)
                                                    <tr>
                                                        <td>
                                                            <a href="">
                                                                {{ $funding->user->name ? explode(' ', $funding->user->name)[0] : 'N/A' }}
                                                            </a>
                                                            <br>
                                                            <small
                                                                class="text-muted">{{ $funding->user->phone }}</small>
                                                        </td>
                                                        <td>₦{{ number_format($funding->amount, 2) }}</td>
                                                        <td>{{ $funding->title }}</td>
                                                        <td>
                                                            @if (strtoupper($funding->status) == strtoupper('successful') || strtoupper($funding->status) == strtoupper('success'))
                                                                <span class="badge bg-success">Successful</span>
                                                            @elseif(strtoupper($funding->status) == strtoupper('pending'))
                                                                <span class="badge bg-warning">Pending</span>
                                                            @else
                                                                <span class="badge bg-danger">{{$funding->status??'failed'}}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $funding->created_at->format('d M, Y H:i') }}</td>
                                                        {{-- <td>
                                                            <a href="#" class="btn btn-sm btn-white"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#fundingModal{{ $funding->id }}">
                                                                View
                                                            </a>
                                                        </td> --}}
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">No funding records found
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="today-fundings" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-sm table-nowrap card-table">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Amount</th>
                                                    <th>Method</th>
                                                    <th>Status</th>
                                                    <th>Time</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse(App\Models\Transactions::where('type', 'deposit')->whereDate('created_at', Carbon\Carbon::today())->latest()->get() as $funding)
                                                    <tr>
                                                        <td>
                                                            <a href="">
                                                                {{ $funding->user->name ? explode(' ', $funding->user->name)[0] : 'N/A' }}
                                                            </a>
                                                            <br>
                                                            <small
                                                                class="text-muted">{{ $funding->user->phone }}</small>
                                                        </td>
                                                        <td>₦{{ number_format($funding->amount, 2) }}</td>
                                                        <td>{{ $funding->title }}</td>
                                                        <td>
                                                            @if (strtoupper($funding->status) == strtoupper('successful') || strtoupper($funding->status) == strtoupper('success'))
                                                                <span class="badge bg-success">Successful</span>
                                                            @elseif(strtoupper($funding->status) == strtoupper('pending'))
                                                                <span class="badge bg-warning">Pending</span>
                                                            @else
                                                                <span class="badge bg-danger">
                                                                    {{$funding->status??'failed'}}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $funding->created_at->format('H:i') }}</td>
                                                        {{-- <td>
                                                            <a href="#" class="btn btn-sm btn-white"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#fundingModal{{ $funding->id }}">
                                                                View
                                                            </a>
                                                        </td> --}}
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">No funding records for
                                                            today</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="month-fundings" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-sm table-nowrap card-table">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Amount</th>
                                                    <th>Method</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse(App\Models\Transactions::where('type', 'deposit')->whereMonth('created_at', Carbon\Carbon::now()->month)->whereYear('created_at', Carbon\Carbon::now()->year)->latest()->get() as $funding)
                                                    <tr>
                                                        <td>
                                                            <a href="">
                                                                {{ $funding->user->name ? explode(' ', $funding->user->name)[0] : 'N/A' }}
                                                            </a>
                                                            <br>
                                                            <small
                                                                class="text-muted">{{ $funding->user->phone }}</small>
                                                        </td>
                                                        <td>₦{{ number_format($funding->amount, 2) }}</td>
                                                        <td>{{ $funding->title }}</td>
                                                        <td>
                                                            @if (strtoupper($funding->status) == strtoupper('successful') || strtoupper($funding->status) == strtoupper('success'))
                                                                <span class="badge bg-success">Successful</span>
                                                            @elseif(strtoupper($funding->status) == strtoupper('pending'))
                                                                <span class="badge bg-warning">Pending</span>
                                                            @else
                                                                <span class="badge bg-danger">
                                                                    {{$funding->status??'failed'}}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $funding->created_at->format('d M, Y') }}</td>
                                                        {{-- <td>
                                                            <a href="#" class="btn btn-sm btn-white"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#fundingModal{{ $funding->id }}">
                                                                View
                                                            </a>
                                                        </td> --}}
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">No funding records this
                                                            month</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 text-center">
                                <a href="" class="btn btn-sm btn-outline-primary">
                                    View All Fundings
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div> <!-- / .row -->

            <div class="row mt-4">
                <div class="col-12 col-xl-4-12">
                    <!-- Preorders -->
                    <div class="card">
                        <div class="card-header">
                            <!-- Title -->
                            <h4 class="card-header-title">
                                Preorder History
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center mb-4">
                                <div class="col">
                                    <ul class="nav nav-tabs nav-overflow" role="tablist">
                                        <li class="nav-item">
                                            <a href="#all-preorders" class="nav-link active" data-bs-toggle="tab"
                                                role="tab" aria-controls="all-preorders" aria-selected="true">
                                                All
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#today-preorders" class="nav-link" data-bs-toggle="tab"
                                                role="tab" aria-controls="today-preorders" aria-selected="false">
                                                Today
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#month-preorders" class="nav-link" data-bs-toggle="tab"
                                                role="tab" aria-controls="month-preorders" aria-selected="false">
                                                This Month
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="all-preorders" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-sm table-nowrap card-table">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Amount</th>
                                                    <th>Item</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse(App\Models\Transactions::where('type', 'preorder')->latest()->take(10)->get() as $preorder)
                                                    <tr>
                                                        <td>
                                                            <a href="">
                                                                {{ $preorder->user->name ? explode(' ', $preorder->user->name)[0] : 'N/A' }}
                                                            </a>
                                                            <br>
                                                            <small class="text-muted">{{ $preorder->user->phone ?? 'N/A' }}</small>
                                                        </td>
                                                        <td>₦{{ number_format($preorder->amount, 2) }}</td>
                                                        <td>{{ $preorder->title ?? $preorder->size ?? 'N/A' }}</td>
                                                        <td>
                                                            @if (strtoupper($preorder->status) == strtoupper('completed') || strtoupper($preorder->status) == strtoupper('successful'))
                                                                <span class="badge bg-success">Completed</span>
                                                            @elseif(strtoupper($preorder->status) == strtoupper('pending'))
                                                                <span class="badge bg-warning">Pending</span>
                                                            @elseif(strtoupper($preorder->status) == strtoupper('processing'))
                                                                <span class="badge bg-info">Processing</span>
                                                            @else
                                                                <span class="badge bg-danger">{{ $preorder->status ?? 'Failed' }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $preorder->created_at->format('d M, Y H:i') }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">No preorder records found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="today-preorders" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-sm table-nowrap card-table">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Amount</th>
                                                    <th>Item</th>
                                                    <th>Status</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse(App\Models\Transactions::where('type', 'preorder')->whereDate('created_at', Carbon\Carbon::today())->latest()->get() as $preorder)
                                                    <tr>
                                                        <td>
                                                            <a href="">
                                                                {{ $preorder->user->name ? explode(' ', $preorder->user->name)[0] : 'N/A' }}
                                                            </a>
                                                            <br>
                                                            <small class="text-muted">{{ $preorder->user->phone ?? 'N/A' }}</small>
                                                        </td>
                                                        <td>₦{{ number_format($preorder->amount, 2) }}</td>
                                                        <td>{{ $preorder->title ?? $preorder->size ?? 'N/A' }}</td>
                                                        <td>
                                                            @if (strtoupper($preorder->status) == strtoupper('completed') || strtoupper($preorder->status) == strtoupper('successful'))
                                                                <span class="badge bg-success">Completed</span>
                                                            @elseif(strtoupper($preorder->status) == strtoupper('pending'))
                                                                <span class="badge bg-warning">Pending</span>
                                                            @elseif(strtoupper($preorder->status) == strtoupper('processing'))
                                                                <span class="badge bg-info">Processing</span>
                                                            @else
                                                                <span class="badge bg-danger">{{ $preorder->status ?? 'Failed' }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $preorder->created_at->format('H:i') }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">No preorder records for today</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="month-preorders" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-sm table-nowrap card-table">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Amount</th>
                                                    <th>Item</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse(App\Models\Transactions::where('type', 'preorder')->whereMonth('created_at', Carbon\Carbon::now()->month)->whereYear('created_at', Carbon\Carbon::now()->year)->latest()->get() as $preorder)
                                                    <tr>
                                                        <td>
                                                            <a href="">
                                                                {{ $preorder->user->name ? explode(' ', $preorder->user->name)[0] : 'N/A' }}
                                                            </a>
                                                            <br>
                                                            <small class="text-muted">{{ $preorder->user->phone ?? 'N/A' }}</small>
                                                        </td>
                                                        <td>₦{{ number_format($preorder->amount, 2) }}</td>
                                                        <td>{{ $preorder->title ?? $preorder->size ?? 'N/A' }}</td>
                                                        <td>
                                                            @if (strtoupper($preorder->status) == strtoupper('completed') || strtoupper($preorder->status) == strtoupper('successful'))
                                                                <span class="badge bg-success">Completed</span>
                                                            @elseif(strtoupper($preorder->status) == strtoupper('pending'))
                                                                <span class="badge bg-warning">Pending</span>
                                                            @elseif(strtoupper($preorder->status) == strtoupper('processing'))
                                                                <span class="badge bg-info">Processing</span>
                                                            @else
                                                                <span class="badge bg-danger">{{ $preorder->status ?? 'Failed' }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $preorder->created_at->format('d M, Y') }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">No preorder records this month</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 text-center">
                                <a href="" class="btn btn-sm btn-outline-primary">
                                    View All Preorders
                                </a>
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
