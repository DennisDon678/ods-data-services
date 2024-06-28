<!doctype html>
<html lang="en" >

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
                    <h6 class="title">Basic Details</h6>
                    <div class=" row mb-3">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="First Name"
                                        value="{{ explode(' ', Auth::user()->name)[0] }}" disabled="" required=""
                                        class="form-control border-start-0">
                                    <label>First Name</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="Last Name"
                                        value="{{ explode(' ', Auth::user()->name)[1] }}" disabled="" required=""
                                        class="form-control border-start-0">
                                    <label>Last Name</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="email" placeholder="Email Address" value="{{ Auth::user()->email }}"
                                        required="" disabled="" required=""
                                        class="form-control border-start-0">
                                    <label>Email Address</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="title">Address Details</h6>
                    <div class="row mb-3">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="State" value="{{Auth::user()->state}}" disabled='' required=""
                                        class="form-control border-start-0">
                                    <label>State</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="title">Security Details</h6>
                    <div class="row mb-3">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="Company name" value="" required=""
                                        class="form-control border-start-0">
                                    <label>Company name</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="email" placeholder="Company Registration" required=""
                                        class="form-control border-start-0">
                                    <label>Company Registration</label>
                                </div>
                            </div>
                            <div class="invalid-feedback mb-3">Add insert valid data </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="email" placeholder="Company ID" required=""
                                        class="form-control border-start-0">
                                    <label>Company ID</label>
                                </div>
                            </div>
                            <div class="invalid-feedback mb-3">Add insert valid data </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="Address Line 1" value="" required=""
                                        class="form-control border-start-0">
                                    <label>Address Line 1</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="email" placeholder="Address Line 2" required=""
                                        class="form-control border-start-0">
                                    <label>Address Line 2</label>
                                </div>
                            </div>
                            <div class="invalid-feedback mb-3">Add insert valid data </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="Landmark" required=""
                                        class="form-control border-start-0">
                                    <label>Landmark</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="email" placeholder="Street" required=""
                                        class="form-control border-start-0">
                                    <label>Street</label>
                                </div>
                            </div>
                            <div class="invalid-feedback mb-3">Add insert valid data </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="Country" value="" required=""
                                        class="form-control border-start-0">
                                    <label>Country</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="Pincode" value="" required=""
                                        class="form-control border-start-0">
                                    <label>Pincode</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="State" value="" required=""
                                        class="form-control border-start-0">
                                    <label>State</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="City" value="" required=""
                                        class="form-control border-start-0">
                                    <label>City</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- submit button -->
                            <button class="btn btn-theme" type="button">Submit</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-white" type="button">Cancel</button>
                        </div>
                    </div>

                </div>

                <!-- profile tab-->
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h6 class="title">Company details</h6>
                    <div class="row justify-content-center align-items-center mb-4">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar avatar-100 text-center rounded">
                                        <img src="assets/img/logo.png" alt="" class="mw-100"
                                            id="companylogolight">
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label for="companylogolightinput" class="form-label">Upload company logo
                                            (Light layout)</label><br>
                                        <input class="form-control d-none" accept="image/*" type="file"
                                            id="companylogolightinput">
                                        <button class="btn btn-theme" onclick="$(this).prev().click()"><i
                                                class="bi bi-camera"></i> Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group my-2 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="Company Name" value="AdminUX" required=""
                                        class="form-control">
                                    <label>Company Name</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group my-2 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="Company Tagline" value="Admin app UI"
                                        required="" class="form-control">
                                    <label>Company Tagline</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                    </div>
                    <h6 class="title">Profile details</h6>
                    <div class=" row mb-3">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="UserName" value="Maxartkiller" required=""
                                        class="form-control border-start-0">
                                    <label>UserName</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-8">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="Tagline" value="" required=""
                                        class="form-control border-start-0">
                                    <label>Tagline</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="Headline" value="" required=""
                                        class="form-control border-start-0">
                                    <label>Headline</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <textarea placeholder="About me" rows="5" class="form-control border-start-0 h-auto"></textarea>
                                    <label>About me</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                    </div>
                    <h6 class="title">Public Visibility</h6>
                    <div class="row mb-4">
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="profileswitch1" checked="">
                                <label class="form-check-label" for="profileswitch1">Show my profile publicly</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="profileswitch2" checked="">
                                <label class="form-check-label" for="profileswitch2">Show my availability</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="profileswitch3">
                                <label class="form-check-label" for="profileswitch3">Show tagline in profile</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="profileswitch4">
                                <label class="form-check-label" for="profileswitch4">Make profile inactive</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- submit button -->
                            <button class="btn btn-theme" type="button">Submit</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-white" type="button">Cancel</button>
                        </div>
                    </div>
                </div>

                <!-- payment tab-->
                <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                    <div class="collapse show" id="addcard">
                        <div class="card border-0 bg-gradient-theme-light theme-blue mb-3">
                            <div class="card-header">
                                <h6>Add new card</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="row mb-3">
                                            <div class="col-7">
                                                <div class="form-group position-relative check-valid">
                                                    <div class="form-floating">
                                                        <input type="text" placeholder="Card Number"
                                                            value="" required=""
                                                            class="form-control border-start-0">
                                                        <label>Card Number</label>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">Please enter valid input</div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group position-relative check-valid">
                                                    <div class="form-floating">
                                                        <input type="text" placeholder="Code" value="205"
                                                            required="" class="form-control border-start-0">
                                                        <label>Code</label>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">Please enter valid input</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="row mb-3">
                                            <div class="col-7">
                                                <div class="form-group position-relative check-valid">
                                                    <div class="form-floating">
                                                        <select class="form-control border-start-0">
                                                            <option selected="">January</option>
                                                            <option>February</option>
                                                            <option>March</option>
                                                            <option>April</option>
                                                            <option>May</option>
                                                            <option>June</option>
                                                            <option>July</option>
                                                            <option>August</option>
                                                            <option>September</option>
                                                            <option>October</option>
                                                            <option>November</option>
                                                            <option>December</option>
                                                        </select>
                                                        <label>Expiry month</label>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">Please enter valid input</div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group position-relative check-valid">
                                                    <div class="form-floating">
                                                        <select class="form-control border-start-0">
                                                            <option selected="">2022</option>
                                                            <option>2023</option>
                                                            <option>2024</option>
                                                            <option>2025</option>
                                                            <option>2026</option>
                                                            <option>2027</option>
                                                            <option>2028</option>
                                                            <option>2029</option>
                                                        </select>
                                                        <label>Expiry year</label>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">Please enter valid input</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group position-relative check-valid">
                                            <div class="form-floating">
                                                <input type="text" placeholder="Card Holder" required=""
                                                    class="form-control border-start-0">
                                                <label>Card Holder</label>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">Please enter valid input</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-theme" type="button">Add Card</button>
                                <button class="btn btn-white ms-1" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#addcard">Cancel</button>
                            </div>
                        </div>
                    </div>

                    <div class="title h6">
                        <div class="row align-items-center">
                            <div class="col">May cards</div>
                            <div class="col-auto">
                                <button class="btn btn-sm btn-link" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#addcard" aria-expanded="true" aria-controls="addcard">
                                    <i class="bi bi-plus"></i> Add Card
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-container creditcards mb-4">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card border-0 bg-radial-gradient theme-blue">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-4">
                                            <div class="col-auto align-self-center">
                                                <img src="assets/img/visa.png" alt="">
                                            </div>
                                            <div class="col text-end">
                                                <p class="size-12">
                                                    <span class="text-muted small">City Bank</span><br>
                                                    <span class="">Credit Card</span>
                                                </p>
                                            </div>
                                        </div>
                                        <p class="fw-medium h6 mb-3">
                                            000 0000 0001 546598
                                        </p>
                                        <div class="row">
                                            <div class="col-auto size-12">
                                                <p class="mb-0 text-muted small">Expiry</p>
                                                <p>09/023</p>
                                            </div>
                                            <div class="col text-end size-12">
                                                <p class="mb-0 text-muted small">Card Holder</p>
                                                <p>Maxartkiller</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card border-0 bg-radial-gradient theme-pink">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-4">
                                            <div class="col-auto align-self-center">
                                                <img src="assets/img/visa.png" alt="">
                                            </div>
                                            <div class="col text-end">
                                                <p class="size-12">
                                                    <span class="text-muted small">City Bank</span><br>
                                                    <span class="">Credit Card</span>
                                                </p>
                                            </div>
                                        </div>
                                        <p class="fw-medium h6 mb-3">
                                            000 0000 0001 546598
                                        </p>
                                        <div class="row">
                                            <div class="col-auto size-12">
                                                <p class="mb-0 text-muted small">Expiry</p>
                                                <p>09/023</p>
                                            </div>
                                            <div class="col text-end size-12">
                                                <p class="mb-0 text-muted small">Card Holder</p>
                                                <p>Maxartkiller</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card border-0 bg-radial-gradient theme-yellow">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-4">
                                            <div class="col-auto align-self-center">
                                                <img src="assets/img/visa.png" alt="">
                                            </div>
                                            <div class="col text-end">
                                                <p class="size-12">
                                                    <span class="text-muted small">City Bank</span><br>
                                                    <span class="">Credit Card</span>
                                                </p>
                                            </div>
                                        </div>
                                        <p class="fw-medium h6 mb-3">
                                            000 0000 0001 546598
                                        </p>
                                        <div class="row">
                                            <div class="col-auto size-12">
                                                <p class="mb-0 text-muted small">Expiry</p>
                                                <p>09/023</p>
                                            </div>
                                            <div class="col text-end size-12">
                                                <p class="mb-0 text-muted small">Card Holder</p>
                                                <p>Maxartkiller</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="title">PayPal Address <small class="text-secondary fw-normal">(Provide to receive
                            payouts)</small></h6>
                    <div class="row mb-3">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="email" placeholder="Email" value="testmail@maxartkiller.com"
                                        required="" class="form-control border-start-0">
                                    <label>Email</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 align-self-center">
                            <p class="mb-2 text-success"><i class="bi bi-patch-check me-1"></i> Verified</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- submit button -->
                            <button class="btn btn-theme" type="button">Submit</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-white" type="button">Cancel</button>
                        </div>
                    </div>

                </div>
                <!-- email and social tab-->
                <div class="tab-pane fade" id="emailsocials" role="tabpanel" aria-labelledby="emailsocials-tab">

                    <h6 class="title">Website </h6>
                    <div class="row mb-3">
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="Provide website url"
                                        value="https://www.maxartkiller.com" required=""
                                        class="form-control border-start-0">
                                    <label>Website</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                    </div>

                    <h6 class="title">Social account <small class="text-secondary fw-normal">(Provide username, page
                            name only)</small></h6>
                    <div class="row mb-3">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="email" placeholder="Provide twitter username" value="maxartkiller"
                                        required="" class="form-control border-start-0">
                                    <label>Twitter</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="email" placeholder="Provide Facebook username"
                                        value="maxartkiller" required="" class="form-control border-start-0">
                                    <label>Facebook</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="email" placeholder="Provide Linkdein username"
                                        value="maxartkiller" required="" class="form-control border-start-0">
                                    <label>LinkdeIn</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="form-floating">
                                    <input type="email" placeholder="Provide Pinterest username"
                                        value="maxartkiller" required="" class="form-control border-start-0">
                                    <label>Pinterest</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please enter valid input</div>
                        </div>
                    </div>

                    <h6 class="title">Email settings </h6>
                    <ul class="list-group list-group-flush bg-none mb-4">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Show emails to publicly</div>
                                <div class="col-auto">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="emailsocial1">
                                        <label class="form-check-label" for="emailsocial1"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Send an email reminding me to rate an item a week after purchase
                                </div>
                                <div class="col-auto">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="emailsocial2"
                                            checked="">
                                        <label class="form-check-label" for="emailsocial2"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Send an email when an item I've purchased is updated</div>
                                <div class="col-auto">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="emailsocial3"
                                            checked="">
                                        <label class="form-check-label" for="emailsocial3"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Send me a daily summary of all items approved or rejected</div>
                                <div class="col-auto">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="emailsocial4">
                                        <label class="form-check-label" for="emailsocial4"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="row">
                        <div class="col">
                            <!-- submit button -->
                            <button class="btn btn-theme" type="button">Submit</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-white" type="button">Cancel</button>
                        </div>
                    </div>
                </div>
                <!-- tax information tab-->
                <div class="tab-pane fade" id="taxinfo" role="tabpanel" aria-labelledby="taxinfo-tab">
                    <div class="card bg-gradient-theme-light border-0 theme-green mb-4">
                        <div class="card-body p-3">
                            <h6>You successfully submitted your tax information on 25 Jun 2021 18:26:20 UTC.</h6>
                            <p>Your tax information will expire on 1st July 2025. Please re-submit your form before
                                expiry.</p>
                            <p>If you wish to update these details, please re-submit the form below.</p>
                        </div>
                        <div class="card-footer p-3">
                            <p>For questions relating to why we need this information,<br>please check our help center
                                for <a href="">W-9</a>, <a href="">W-8</a> articles or email <a
                                    href="">testmail@axartkiller.com</a>.</p>
                        </div>
                    </div>
                    <p>US federal tax law requires getAdminUX to collect US Author tax information through an IRS Form
                        W-9 and report on income paid.</p>
                    <br>
                    <h5>If you are a U.S. Person</h5>
                    <p>No matter where you are worldwide you can submit a Form W-9 to getAdminUX to satisfy your filing
                        requirement. Typically there will be no withholding of taxes on any of your getAdminUX income.
                        If you do not submit a valid Form W-9, getAdminUX will be required to deduct 24% withholding tax
                        from sales proceeds and remit these directly to the Internal Revenue Service. If you have any
                        questions, please check our help center for W-9 articles.</p>
                    <br>
                    <h5>If you are not a U.S. Person</h5>
                    <p>You will need to submit a Form W-8. If you are a resident of a country that has a tax treaty with
                        the U.S., you will benefit from the reduced or zero withholding rate that is specified in your
                        country's tax treaty. If you are a resident of a country that does not have a tax treaty with
                        the U.S., then your U.S. source income from AdminUX will be subject to a 30% withholding tax. If
                        you have any questions, please check our help center for W-8 articles.</p>
                    <br>
                    <p>While getAdminUX cannot give tax and/or legal advice, we will do our best to provide you with the
                        information you need to make your own decision about how to comply with applicable U.S. tax
                        laws. If you still have questions after reviewing the information provided by the IRS, please
                        contact your legal and/or tax advisor.</p>

                    <p>Please indicate whether you are a US Person and we will direct you to the correct Forms. More
                        information- An individual who is a US citizen or US resident alien, or who satisfies the
                        substantial presence test.</p>

                    <p>- A partnership, corporation, company, or association created or organized in the United States
                        or under the laws of the United States.</p>

                    <p>- An estate (other than a foreign estate), or</p>

                    <p>- A domestic trust (as defined in US tax regulations).</p>
                    <br>
                    <ul class="list-group bg-none mb-4">
                        <li class="list-group-item">
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="usnoneus" type="radio" id="usnoneus1">
                                <label class="form-check-label" for="usnoneus1">I am a US Person</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="usnoneus" type="radio" id="usnoneus2">
                                <label class="form-check-label" for="usnoneus2">I am not a US Person</label>
                            </div>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col">
                            <!-- submit button -->
                            <button class="btn btn-theme" type="button">Next</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-white" type="button">Cancel</button>
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
