<!-- Header -->
<header class="header">
    <!-- Fixed navbar -->
    <nav class="navbar fixed-top">
        <div class="container-fluid">
            <button class="btn btn-link btn-square menu-btn me-2" type="button">
                <i class="bi bi-list fs-4"></i>
            </button>
            <div class="header-title align-self-center">
                <h5 class="mb-0">{{env('APP_NAME')}}</h5>
                <p class="text-secondary small">Portal</p>
            </div>
            
            <div class="ms-auto">
                <div class="row">
                    
                    <div class="col-auto align-self-center">
                        <div class="dropdown">
                            <a class="dd-arrow-none dropdown-toggle" id="userprofiledd" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                <div class="row">
                                    <div class="col-auto align-self-center">
                                        <figure class="avatar avatar-30 rounded-circle coverimg vm">
                                            <img src="/dashboard/assets/img/user-1.jpg" alt="" id="userphotoonboarding2">
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
                                <div class="dropdown-info bg-radial-gradient-theme">
                                    <div class="row">
                                        <div class="col-auto">
                                            <figure class="avatar avatar-50 rounded-circle coverimg vm">
                                                <img src="/dashboard/assets/img/user-1.jpg" alt="" id="userphotoonboarding3">
                                            </figure>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <h6 class="mb-0"><span class="username">{{explode(' ',Auth::user()->name)[0]}}</span></h6>
                                            <p class="text-muted small">Balance: $100.00</p>
                                        </div>
                                    </div>
                                </div>
                                <div><a class="dropdown-item" href="profile.html">My Profile</a></div>
                                <div>
                                    <a class="dropdown-item" href="index.html">
                                        <div class="row g-0">
                                            <div class="col align-self-center">My Dashboard</div>
                                            <div class="col-auto">
                                                <figure class="avatar avatar-20 coverimg rounded-circle">
                                                    <img src="/dashboard/assets/img/user-2.jpg" alt="">
                                                </figure>
                                                <figure class="avatar avatar-20 coverimg rounded-circle">
                                                    <img src="/dashboard/assets/img/user-3.jpg" alt="">
                                                </figure>
                                                <figure class="avatar avatar-20 coverimg rounded-circle">
                                                    <img src="/dashboard/assets/img/user-4.jpg" alt="">
                                                </figure>
                                                <div class="avatar avatar-20 bg-theme rounded-circle">
                                                    <small class="fs-10 vm">9+</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div><a class="dropdown-item" href="your-settings.html">Account Setting</a></div>
                                <div><a class="dropdown-item" href="login.html">Logout</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- Header ends -->