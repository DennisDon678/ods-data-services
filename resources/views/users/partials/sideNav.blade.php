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
                    <h6 class="mb-1" id="usernamedisplay">{{ explode(' ', Auth::user()->name)[0] }}</h6>
                    <p class="text-secondary small">{{ Auth::user()->state }}</p>
                </div>
            </div>

            <!-- user menu navigation -->
            <div class="row mb-4">
                <div class="col-12 px-0">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/user/dashboard">
                                <div class="avatar avatar-40 icon"><i class="bi bi-house-door"></i></div>
                                <div class="col">Home</div>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="/user/services" role="button" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-binoculars"></i></div>
                                <div class="col">Our Services</div>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link " href="/user/services" role="button" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-coin"></i></div>
                                <div class="col">Payments</div>
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
                            <a class="nav-link " href="/user/profile" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-person-circle"></i></div>
                                <div class="col">Profile</div>

                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="/user/faqs" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-question-circle"></i></div>
                                <div class="col">FAQs</div>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link " data-bs-toggle="dropdown" data-bs-auto-close="false"
                                data-bs-display="static" href="#" role="button" aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-chat"></i></div>
                                <div class="col">Contact Us</div>

                            </a>
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
                            <a class="nav-link active" href="/auth/logout">
                                <div class="avatar avatar-40 icon"><i class="bi bi-box-arrow-left"></i></div>
                                <div class="col">Logout</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Sidebar ends -->
