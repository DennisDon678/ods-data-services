<!-- Header -->
<header class="header">
    <!-- Fixed navbar -->
    <nav class="navbar fixed-top">
        <div class="container-fluid">
            <button class="btn btn-link btn-square menu-btn me-1" type="button">
                <i class="bi bi-list fs-4"></i>
            </button>
            <div class="header-title align-self-center">
                <h5 class="mb-0">{{env('APP_NAME')}}</h5>
            </div>
            
            <div class="ms-auto">
                <div class="row">
                    
                    <div class="col-auto align-self-center">
                        <div class="dropdown">
                            <a class="dd-arrow-none dropdown-toggle" id="userprofiledd" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                <div class="row">
                                    <div class="col-auto align-self-center">
                                        <figure class="avatar avatar-30 rounded-circle coverimg vm">
                                            <img src="/dashboard/assets/img/profile.png" alt="" id="userphotoonboarding2">
                                        </figure>
                                    </div>
                                    <div class="col ps-0 align-self-center d-none d-lg-block">
                                        <p class="mb-0">
                                            <span class="text-dark username">{{explode(' ',Auth::user()->name)[0]}}</span><br>
                                            <small class="small">{{Auth::user()->state}}</small>
                                        </p>
                                    </div>
                                    <div class="col ps-0 align-self-center d-none d-lg-block">
                                        <i class="bi bi-chevron-down small vm"></i>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end w-300" aria-labelledby="userprofiledd">
                                <div class="dropdown-info text-light" style="background-color: #0a062b !important;">
                                    <div class="row">
                                        <div class="col-auto">
                                            <figure class="avatar avatar-50 rounded-circle coverimg vm">
                                                <img src="/dashboard/assets/img/profile_.png"  alt="" id="userphotoonboarding3">
                                            </figure>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <h6 class="mb-0"><span class="username">{{explode(' ',Auth::user()->name)[0]}} {{Auth::user()->is_vendor == true?"(Vendor)":""}}</span></h6>
                                            <p class="text-muted small">Balance: &#8358;{{number_format(Auth::user()->balance,2)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div><a class="dropdown-item" href="/user/profile">My Profile</a></div>
                                <div><a class="dropdown-item" href="/auth/logout">Logout</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- Header ends -->