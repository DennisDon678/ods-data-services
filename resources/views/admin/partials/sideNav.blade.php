    <div data-bs-theme="">
        <nav class="navbar navbar-vertical fixed-start navbar-expand-md" id="sidebar">
            <div class="container-fluid">

                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse"
                    aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Brand -->
                <a class="navbar-brand" href="index.html">
                    <img src="/assets/img/logos/spiner.jpg" class="navbar-brand-img mx-auto" alt="...">
                </a>

                <!-- User (xs) -->
                <div class="navbar-user d-md-none">

                    <!-- Dropdown -->
                    <div class="dropdown">

                        <!-- Toggle -->
                        <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-sm avatar-online">
                                <img src="/admin/assets/img/avatars/profiles/avatar-1.jpg"
                                    class="avatar-img rounded-circle" alt="...">
                            </div>
                        </a>

                        <!-- Menu -->
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarIcon">
                            <a href="profile-posts.html" class="dropdown-item">Profile</a>
                            <a href="account-general.html" class="dropdown-item">Settings</a>
                            <hr class="dropdown-divider">
                            <a href="sign-in.html" class="dropdown-item">Logout</a>
                        </div>
                    </div>

                </div>

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">

                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/dashboard">
                                <i class="fe fe-home"></i> Dashboards
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/users">
                                <i class="fe fe-users"></i> Users Management
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarAuth">
                                <i class="fe fe-terminal"></i> Data Configuration
                            </a>
                            <div class="collapse" id="sidebarAuth">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="/admin/networks" class="nav-link">
                                            Networks
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/data-types" class="nav-link">
                                            Data Types
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/data-plans" class="nav-link">
                                            Data Plans
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/admin/preorders">
                                            Pre Orders
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#cable" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarAuth">
                                <i class="fe fe-terminal"></i> Cable Configuration
                            </a>
                            <div class="collapse" id="cable">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="/admin/cables" class="nav-link">
                                            Cable lists
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/cable-plans" class="nav-link">
                                            Cable Plans
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>

                    <!-- Divider -->
                    <hr class="navbar-divider my-3">

                    <!-- Heading -->
                    <h6 class="navbar-heading">
                        Charging and other Site settings
                    </h6>

                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-4">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/profits" >
                                <i class="fe fe-clipboard"></i> Profit Config
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarComponents" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarComponents">
                                <i class="fe fe-book-open"></i> Components
                            </a>
                            <div class="collapse " id="sidebarComponents">
                                <ul class="nav nav-sm flex-column">
                                    <li>
                                        <a href="docs/components.html#accordion" class="nav-link">
                                            Accordion
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#alerts" class="nav-link">
                                            Alerts
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#autosize" class="nav-link">
                                            Autosize
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#avatars" class="nav-link">
                                            Avatars
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#badges" class="nav-link">
                                            Badges
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#breadcrumb" class="nav-link">
                                            Breadcrumb
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#buttons" class="nav-link">
                                            Buttons
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#buttonGroup" class="nav-link">
                                            Button group
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#cards" class="nav-link">
                                            Cards
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#charts" class="nav-link">
                                            Charts
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#checklist" class="nav-link">
                                            Checklist
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#dropdowns" class="nav-link">
                                            Dropdowns
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#forms" class="nav-link">
                                            Forms
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#icons" class="nav-link">
                                            Icons
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#kanban" class="nav-link">
                                            Kanban
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#listGroup" class="nav-link">
                                            List group
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#map" class="nav-link">
                                            Map
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#modals" class="nav-link">
                                            Modal
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#navbarDocs" class="nav-link">
                                            Navbar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#navsAndTabs" class="nav-link">
                                            Navs & tabs
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#offcanvas" class="nav-link">
                                            Offcanvas
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#pageHeaders" class="nav-link">
                                            Page headers
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#pagination" class="nav-link">
                                            Pagination
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#placeholders" class="nav-link">
                                            Placeholders
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#popovers" class="nav-link">
                                            Popovers
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#progress" class="nav-link">
                                            Progress
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#socialPosts" class="nav-link">
                                            Social post
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#spinners" class="nav-link">
                                            Spinners
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#tables" class="nav-link">
                                            Tables
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#toasts" class="nav-link">
                                            Toasts
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#tooltips" class="nav-link">
                                            Tooltips
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#typography" class="nav-link">
                                            Typography
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs/components.html#utilities" class="nav-link">
                                            Utilities
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="docs/changelog.html">
                                <i class="fe fe-git-branch"></i> Changelog <span
                                    class="badge bg-primary ms-auto">v2.3.0</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Push content down -->
                    <div class="mt-auto"></div>

                    <!-- Customize -->
                    <div class="mb-4" id="popoverDemo" title="Make Dashkit Your Own!"
                        data-bs-content="Switch the demo to Dark Mode or adjust the navigation layout, icons, and colors!">
                        <a class="btn w-100 btn-primary" data-bs-toggle="offcanvas" href="#offcanvasDemo"
                            aria-controls="offcanvasDemo">
                            <i class="fe fe-sliders me-2"></i> Customize
                        </a>
                    </div>
                    <div id="popoverDemoContainer" data-bs-theme="dark"></div>

                    <!-- User (md) -->
                    <div class="navbar-user d-none d-md-flex" id="sidebarUser">

                        <!-- Icon -->
                        <a class="navbar-user-link" data-bs-toggle="offcanvas" href="#sidebarOffcanvasActivity"
                            aria-controls="sidebarOffcanvasActivity">
                            <span class="icon">
                                <i class="fe fe-bell"></i>
                            </span>
                        </a>

                        <!-- Dropup -->
                        <div class="dropup">

                            <!-- Toggle -->
                            <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-sm avatar-online">
                                    <img src="/admin/assets/img/avatars/profiles/avatar-1.jpg"
                                        class="avatar-img rounded-circle" alt="...">
                                </div>
                            </a>

                            <!-- Menu -->
                            <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                                <a href="profile-posts.html" class="dropdown-item">Profile</a>
                                <a href="account-general.html" class="dropdown-item">Settings</a>
                                <hr class="dropdown-divider">
                                <a href="sign-in.html" class="dropdown-item">Logout</a>
                            </div>

                        </div>

                        <!-- Icon -->
                        <a class="navbar-user-link" data-bs-toggle="offcanvas" href="#sidebarOffcanvasSearch"
                            aria-controls="sidebarOffcanvasSearch">
                            <span class="icon">
                                <i class="fe fe-search"></i>
                            </span>
                        </a>

                    </div>

                </div> <!-- / .navbar-collapse -->

            </div>
        </nav>
    </div>
