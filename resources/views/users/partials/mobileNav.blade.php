<br>
<br>
<br>
<!-- footer sticky bottom -->
<footer class="footer-sticky">
    <div class="container">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
                <a class="nav-link" href="/user/dashboard">
                    <span>
                        <i class="nav-icon bi bi-house"></i>
                        <span class="nav-text">Home</span>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="services" data-bs-toggle="modal" data-bs-target="#servicesModal">
                    <span>
                        <i class="nav-icon bi bi-binoculars"></i>
                        <span class="nav-text">Sevices</span>
                    </span>
                </button>
            </li>
            <li class="nav-item centerbutton">
                <button class="nav-link" id="fundWallet" data-bs-toggle="modal" data-bs-target="#fundModal">
                    <span class="" style="background-color: #0a062b !important;">
                        <i class="bi bi-plus-circle size-22"></i>
                    </span>
                </button>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user/notifications">
                    <span>
                        <i class="nav-icon bi bi-bell"></i>
                        <span class="nav-text">Notification</span>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user/profile">
                    <span>
                        <i class="nav-icon bi bi-person"></i>
                        <span class="nav-text">Profile</span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</footer>
<!-- footer sticky bottom ends -->
{{-- Forms Airtime --}}
@include('users.forms.airtime')
@include('users.forms.data')
@include('users.forms.tv')
@include('users.forms.funding')
@include('users.forms.services')
@include('users.forms.preorder')
@include('users.forms.a2c')
@include('users.forms.electricity')
