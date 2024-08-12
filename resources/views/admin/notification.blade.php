<!DOCTYPE html>
<html lang="en" data-bs-theme="">
@include('admin.partials.head')

<body>

    <!-- NAVIGATION -->
    @include('admin.partials.sideNav')
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- HEADER -->
        <div class="header">
            <div class="container-fluid">

                <!-- Body -->
                <div class="header-body">
                    <div class="row align-items-end">
                        <div class="col">

                            <!-- Pretitle -->
                            <h6 class="header-pretitle">
                                Overview
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title">
                               Notifiy User
                            </h1>

                        </div>

                    </div> <!-- / .row -->
                </div> <!-- / .header-body -->

            </div>
        </div> <!-- / .header -->

        <!-- CARDS -->
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <h4>Notification</h4>
                    <!-- Form -->
                    <form method="POST">
                        @csrf
                        <!-- Divider -->
                        <hr class="my-2">

                        <div class="row mb-4">
                            <div class="col-12 ">

                                <!-- First name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Title
                                    </label>

                                    <!-- Input -->
                                    <input type="text" value="{{ $notification->title }}" name="title" class="form-control">

                                </div>

                            </div>

                            <div class="col-12">

                                <!-- Last name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Message
                                    </label>

                                    <!-- Input -->
                                    <textarea  name="message"
                                        class="form-control">{{ $notification->message }}</textarea>

                                </div>

                            </div>

                        </div> <!-- / .row -->
                        <div class="col-12 ">

                                <!-- First name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Type
                                    </label>

                                    <!-- Input -->
                                    <select   name="type" class="form-control">
                                        <option value="" {{$notification->type == ''?'selected':''}}>Select Type</option>
                                        <option value="success" {{$notification->type == 'success'?'selected':''}}>Success</option>
                                        <option value="warning" {{$notification->type == 'warning'?'selected':''}}>Warning</option>
                                        <option value="info" {{$notification->type == 'info'?'selected':''}}>Info</option>
                                    </select>

                                </div>

                            </div>


                        <h4>Actions</h4>
                        <!-- Divider -->
                        <hr class=" mb-5">

                        <div class="row justify-content-between">
                            <div class="col-12 col-md-6">

                                <!-- Heading -->
                                <h4>
                                    Update Configuration
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <button class="btn btn-primary" type="submit">
                                    Update
                                </button>

                            </div>
                        </div> <!-- / .row -->

                    </form>

                    <br><br>

                </div>
            </div>
        </div>
    </div><!-- / .main-content -->
    @include('admin.partials.script')

    @if (Session::has('message'))
    @endif

</body>

</html>
