<!-- Sidebar -->
<div class="sidebar-wrap">
    <div class="sidebar">
        <div class="container">
            <div class="row mb-4">
                <div class="col align-self-center">
                    <h6>Main navigation</h6>
                </div>
                <div class="col-auto">
                    <a class="" data-bs-toggle="collapse" data-bs-target="#usersidebarprofile" aria-expanded="false"
                        role="button" aria-controls="usersidebarprofile">
                        <i class="bi bi-person-circle"></i>
                    </a>
                </div>
            </div>

            <!-- user information -->
            <div class="row text-center collapse " id="usersidebarprofile">
                <div class="col-12">
                    <div class="avatar avatar-100 rounded-circle shadow-sm mb-3 bg-white">
                        <figure class="avatar avatar-90 rounded-circle coverimg">
                            <img src="/dashboard/assets/img/user-1.jpg" alt="" id="userphotoonboarding">
                        </figure>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <h6 class="mb-1" id="usernamedisplay">{{explode(' ',Auth::user()->name)[0]}}</h6>
                    <p class="text-secondary small">{{Auth::user()->state}}</p>
                </div>
            </div>

            <!-- user menu navigation -->
            <div class="row mb-4">
                <div class="col-12 px-0">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.html">
                                <div class="avatar avatar-40 icon"><i class="bi bi-house-door"></i></div>
                                <div class="col">Home</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                data-bs-display="static" href="#" role="button" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-coin"></i></div>
                                <div class="col">Finance</div>
                                <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                        class="bi bi-chevron-up minus"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-link" href="finance-dashboard.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-speedometer2"></i>
                                        </div>
                                        <div class="col align-self-center">Finance Dashboard</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="finance-crypto.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-currency-bitcoin"></i>
                                        </div>
                                        <div class="col align-self-center">Crypto</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="finance-banks.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-bank"></i>
                                        </div>
                                        <div class="col align-self-center">Banks</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="finance-wallet.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-wallet2"></i>
                                        </div>
                                        <div class="col align-self-center">Wallet</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="finance-rewards.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-award"></i>
                                        </div>
                                        <div class="col align-self-center">Rewards</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                data-bs-display="static" href="#" role="button" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-hdd-network"></i></div>
                                <div class="col">Network</div>
                                <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                        class="bi bi-chevron-up minus"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-link" href="network-dashboard.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-grid"></i>
                                        </div>
                                        <div class="col align-self-center">Network Dashboard</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="network-performance.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-speedometer"></i>
                                        </div>
                                        <div class="col align-self-center">Performance</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="network-devices.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-pc-display-horizontal"></i>
                                        </div>
                                        <div class="col align-self-center">Devices</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                data-bs-display="static" href="#" role="button" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-boxes"></i></div>
                                <div class="col">Inventory</div>
                                <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                        class="bi bi-chevron-up minus"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-link" href="inventory-dashboard.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-box"></i>
                                        </div>
                                        <div class="col align-self-center">Inventory Dash</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="inventory-stock.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-clipboard-check"></i>
                                        </div>
                                        <div class="col align-self-center">Stock</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="inventory-orders.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-bag-check"></i>
                                        </div>
                                        <div class="col align-self-center">Orders</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                data-bs-display="static" href="#" role="button" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-people"></i></div>
                                <div class="col">Social</div>
                                <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                        class="bi bi-chevron-up minus"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-link" href="social-dashboard.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-bullseye"></i>
                                        </div>
                                        <div class="col align-self-center">Social Dashboard</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="social-analytics.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-bar-chart"></i>
                                        </div>
                                        <div class="col align-self-center">Analytics</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="social-schedule.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-calendar-week"></i>
                                        </div>
                                        <div class="col align-self-center">Schedule</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                data-bs-display="static" href="#" role="button" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-folder"></i></div>
                                <div class="col">Project</div>
                                <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                        class="bi bi-chevron-up minus"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-link" href="project-dashboard.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-file-post"></i>
                                        </div>
                                        <div class="col align-self-center">Project Dashboard</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="project-projects.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-folder-check"></i>
                                        </div>
                                        <div class="col align-self-center">Projects</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                data-bs-display="static" href="#" role="button" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-book"></i></div>
                                <div class="col">Learning</div>
                                <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                        class="bi bi-chevron-up minus"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-link" href="learning-dashboard.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-box"></i>
                                        </div>
                                        <div class="col align-self-center">Learning Dashboard</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="learning-courses.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-award"></i>
                                        </div>
                                        <div class="col align-self-center">Courses</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="learning-institutes.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-building"></i>
                                        </div>
                                        <div class="col align-self-center">Institutions</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- applications -->
            <div class="row mb-3">
                <div class="col align-self-center">
                    <h6>Applications</h6>
                </div>
                <div class="col-auto">
                    <div class="dropdown">
                        <a class="text-theme dd-arrow-none dropdown-toggle" id="sidebaredits"
                            data-bs-display="display" data-bs-toggle="dropdown" role="button"
                            aria-expanded="false">
                            <i class="bi bi-sliders"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-dontclose mt-2 w-200"
                            aria-labelledby="sidebaredits">
                            <ul class="list-group list-group-flush bg-none">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">Email</div>
                                        <div class="col-auto pe-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="sidebaredits1" checked="">
                                                <label class="form-check-label" for="sidebaredits1"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">Explorer</div>
                                        <div class="col-auto pe-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="sidebaredits2" checked="">
                                                <label class="form-check-label" for="sidebaredits2"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">Calendar</div>
                                        <div class="col-auto pe-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="sidebaredits3" checked="">
                                                <label class="form-check-label" for="sidebaredits3"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">Chat</div>
                                        <div class="col-auto pe-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="sidebaredits4" checked="">
                                                <label class="form-check-label" for="sidebaredits4"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">Support</div>
                                        <div class="col-auto pe-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="sidebaredits5">
                                                <label class="form-check-label" for="sidebaredits5"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 px-0">
                    <ul class="nav nav-pills nav-iconic">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="app-email.html">
                                <div class="avatar avatar-36 icon"><i class="bi bi-envelope"></i></div>
                                <div class="col">Email</div>
                                <div class="col-auto align-self-center">
                                    <figure class="avatar avatar-24 coverimg rounded-circle">
                                        <img src="/dashboard/assets/img/user-2.jpg" alt="">
                                    </figure>
                                    <figure class="avatar avatar-24 coverimg rounded-circle">
                                        <img src="/dashboard/assets/img/user-3.jpg" alt="">
                                    </figure>
                                    <figure class="avatar avatar-24 bg-light-theme rounded-circle">
                                        <small class="fs-10 vm">9+</small>
                                    </figure>
                                </div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="app-explorer.html">
                                <div class="avatar avatar-36 icon">
                                    <span class="bi bi-folder position-relative">
                                        <span
                                            class="position-absolute top-0 start-100 p-1 bg-danger border border-light rounded-circle">
                                            <span class="visually-hidden">New alerts</span>
                                        </span>
                                    </span>
                                </div>
                                <div class="col">Explorer</div>
                                <div class="arrow">
                                    <i class="bi bi-chevron-right"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="app-calendar.html">
                                <div class="avatar avatar-36 icon"><i class="bi bi-calendar-event"></i></div>
                                <div class="col">Calendar</div>
                                <div class="col-auto">
                                    <figure class="avatar avatar-24 rounded-circle bg-theme ">
                                        <i class="bi bi-calendar-event fs-10 vm"></i>
                                    </figure>
                                </div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- user secondary menu navigation -->
            <h6>Pages</h6>
            <div class="row mb-4">
                <div class="col-12 px-0">
                    <ul class="nav nav-pills">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                data-bs-display="static" href="#" role="button" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-person-circle"></i></div>
                                <div class="col">Profile</div>
                                <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                        class="bi bi-chevron-up minus"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-link" href="profile.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-briefcase"></i>
                                        </div>
                                        <div class="col align-self-center">Professional</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="profile-social.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-people"></i>
                                        </div>
                                        <div class="col align-self-center">Social</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="profile-analytics.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-bar-chart"></i>
                                        </div>
                                        <div class=" col align-self-center">Analytical</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                data-bs-display="static" href="#" role="button" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-building"></i></div>
                                <div class="col">Company</div>
                                <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                        class="bi bi-chevron-up minus"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-link" href="company-profile.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-easel2"></i>
                                        </div>
                                        <div class="col align-self-center">Company Profile</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="company-branding.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-palette"></i>
                                        </div>
                                        <div class="col align-self-center">Branding</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="company-userroles.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-people"></i>
                                        </div>
                                        <div class="col align-self-center">User Roles</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="company-resources.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-journal-bookmark"></i>
                                        </div>
                                        <div class="col align-self-center">Resources</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="management.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-stopwatch"></i>
                                        </div>
                                        <div class="col align-self-center">Management</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="career.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-file-earmark-person"></i>
                                        </div>
                                        <div class="col align-self-center">Career</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="help-center.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-life-preserver"></i>
                                        </div>
                                        <div class="col align-self-center">Help Center</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="contact-us.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-envelope"></i>
                                        </div>
                                        <div class="col align-self-center">Contact us</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                data-bs-display="static" href="#" role="button" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-question-circle"></i></div>
                                <div class="col">Forum</div>
                                <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                        class="bi bi-chevron-up minus"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-link" href="forum.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-question-circle"></i>
                                        </div>
                                        <div class="col align-self-center">Forum</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="forum-details.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-people"></i>
                                        </div>
                                        <div class="col align-self-center">Forum Details</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                data-bs-display="static" href="#" role="button" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-window-stack"></i></div>
                                <div class="col">Supportive Pages</div>
                                <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                        class="bi bi-chevron-up minus"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-link" href="supportive-signin.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-person"></i>
                                        </div>
                                        <div class="col align-self-center">Sign in</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="supportive-signup.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-person-plus"></i>
                                        </div>
                                        <div class="col align-self-center">Sign up</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="supportive-password.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-key"></i>
                                        </div>
                                        <div class="col align-self-center">Change Password</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="supportive-verify.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-person-check"></i>
                                        </div>
                                        <div class="col align-self-center">Verify</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="supportive-maintenance.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-gear"></i>
                                        </div>
                                        <div class="col align-self-center">Maintenance</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="supportive-comingsoon.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-alarm"></i>
                                        </div>
                                        <div class="col align-self-center">Coming soon</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="supportive-error.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-exclamation-circle"></i>
                                        </div>
                                        <div class="col align-self-center">Error</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="supportive-onboarding.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-emoji-smile"></i>
                                        </div>
                                        <div class="col align-self-center">Onboarding</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="supportive-search.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-search"></i>
                                        </div>
                                        <div class="col align-self-center">Search</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="supportive-contact.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-envelope"></i>
                                        </div>
                                        <div class="col align-self-center">Contact</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="supportive-timeline.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-calendar-week"></i>
                                        </div>
                                        <div class="col align-self-center">Timeline</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                data-bs-display="static" href="#" role="button" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-layers"></i></div>
                                <div class="col">Components</div>
                                <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                        class="bi bi-chevron-up minus"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-link" href="component-cards.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-card-list"></i>
                                        </div>
                                        <div class="col align-self-center">Cards</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="component-forms.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-input-cursor-text"></i>
                                        </div>
                                        <div class="col align-self-center">Forms</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="component-charts.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-bar-chart"></i>
                                        </div>
                                        <div class="col align-self-center">Charts</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="component-events.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-calendar-event"></i>
                                        </div>
                                        <div class=" col align-self-center">Events</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="component-files.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-folder"></i>
                                        </div>
                                        <div class="col align-self-center">Files</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="component-summary.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-list"></i>
                                        </div>
                                        <div class="col align-self-center">Summary</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="component-news.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-newspaper"></i>
                                        </div>
                                        <div class=" col align-self-center">News</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="component-rating.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-star"></i>
                                        </div>
                                        <div class="col align-self-center">Ratings</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="component-users.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-people"></i>
                                        </div>
                                        <div class="col align-self-center">Users</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="component-progress.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-clock-history"></i>
                                        </div>
                                        <div class=" col align-self-center">Progress</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="component-pricing.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-cash-stack"></i>
                                        </div>
                                        <div class="col align-self-center">Pricing</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="supportive-wizard.html">
                                        <div class="avatar avatar-40 icon"><i class="bi bi-list-nested"></i>
                                        </div>
                                        <div class=" col align-self-center">Wizards</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Quick links -->
            <div class="row mb-3">
                <div class="col align-self-center">
                    <h6>Quick Links</h6>
                </div>
                <div class="col-auto">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 px-0">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="get-started.html">
                                <div class="avatar avatar-40 icon"><i class="bi bi-journal-code"></i></div>
                                <div class="col">Documentation</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Sidebar ends -->
