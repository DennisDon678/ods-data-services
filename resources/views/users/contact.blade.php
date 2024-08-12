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
                                            <h6 class="fw-medium mb-0">Contact Us</h6>
                                            <p class="text-secondary small"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-4">
                            <table class="table table-borderless">
                                <tbody class="">
                                    <tr class="">
                                        <td>
                                            <div class="row align-items-center p-4 border rounded">
                                                <div class="col-8 ps-0">
                                                    <a href="mailto:{{ $contact->email }}">

                                                        <h6 class="mb-0 bold">
                                                            {{ strtoupper('contact us through email') }}</h6>
                                                        <p class="text-secondary small">
                                                            {{ $contact->email }}</p>
                                                    </a>

                                                </div>

                                                <div class="col-4">

                                                    <a href="mailto:{{ $contact->email }}">
                                                        <i class="bi bi-envelope h2 text-success"></i>
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="">
                                        <td>
                                            <div class="row align-items-center p-4 border rounded">
                                                <div class="col-8 ps-0">
                                                    <a href="https://api.whatsapp.com/send?phone={{ $contact->whatsapp }}" target="_blank">

                                                        <h6 class="mb-0 bold">{{ strtoupper('Contact us on whatsapp') }}
                                                        </h6>
                                                        <p class="text-secondary small">
                                                            +{{ $contact->whatsapp }}</p>
                                                    </a>

                                                </div>

                                                <div class="col-4">
                                                    
                                                        <a href="https://api.whatsapp.com/send?phone={{ $contact->whatsapp }}"
                                                            target="">
                                                            <i class="bi bi-whatsapp h2 text-success"></i>
                                                        </a>
                                                   
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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
