<!doctype html>
<html lang="en">

@include('users.partials.head')

<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled" data-sidebarstyle="sidebar-pushcontent">

    @include('users.partials.preloader')

    @include('users.partials.headNav')

    @include('users.partials.sideNav')

    <!-- Begin page content -->
    <main class="main mainheight">
        <div class="container">
            <div class="tab-content py-3" id="myTabContent">
                <!-- personal info tab-->
                <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                    <h6 class="title">Referral Details</h6>
                    <div class=" row mb-3">
                        <small class="mb-3">Click to copy your referral link.</small>
                        <div class="col-12" id="copy">
                            <div class="form-group mb-2">
                                <input type="text"
                                    value="{{ env('APP_URL') }}/auth/sign-in?referral-id={{ Auth::user()->referral_id }}"
                                    disabled="" class="form-control border-start-0" id="referral">

                            </div>
                            <button class="btn btn-primary" onclick="copy()">Copy link</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                @php
                    $transactions = App\Models\User::where('referred_by', '=', Auth::user()->referral_id)
                        ->orderby('created_at', 'ASC')
                        ->paginate(10);
                @endphp
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
                                            <h6 class="fw-medium mb-0">Referral History ({{ count($transactions) }})
                                            </h6>
                                            <p class="text-secondary small">All Referral</p>
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
                                                <div class="row align-items-center p-4 border rounded">
                                                    <div class="col-12 ps-0">
                                                        <h6 class="mb-0 bold">{{ strtoupper($tran->name) }}</h6>
                                                        <p class="text-secondary mb-0 small">Email: <em
                                                                class="bold">{{ $tran->email }}</em></p>
                                                        <p class="text-secondary mb-0 small">Is Vendor? <em
                                                                class="bold">{{ $tran->is_vendor ? 'Yes' : 'No' }}</em>
                                                        </p>
                                                        <p class="text-secondary mb-0 small">Referred on: <em
                                                                class="bold">{{ $tran->created_at }}</em></p>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        No referrals Yet!
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $transactions->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>
    <script>
        const ref = document.getElementById('referral');
        const copy = function() {
            console.log('click');
            navigator.clipboard.writeText(ref.value);
            // Focus the input element
            ref.focus();
            swal('Alert!!', "Referral Link Copied Successfully.", "success");
        }
    </script>
    {{--  --}}
    @include('users.partials.mobileNav')
    @include('users.partials.scripts')

    <script src="/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
    <script src="/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>


</body>

</html>
