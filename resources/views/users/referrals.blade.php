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
