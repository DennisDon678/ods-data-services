<!DOCTYPE html>
<html lang="en">

@include('partials.heads')

<body>

    <!-- ======= Header ======= -->

    <!-- End Header -->
    <!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/cta-bg.jpg');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Deletion</h2>
                            <p>Updated - {{date('M')}}/2024</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ul>
                        <li class="h3"><a href="/">Home</a></li>
                        <li>Account Deletion Policy</li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about pt-0">
            <div class="container" data-aos="fade-up">

                <div class="col-lg-6 content order-last  order-lg-first">
                    <h3>Account Deletion</h3>
                    <p>
                        At {{env('APP_NAME')}}, we have a user profile deletion policy for Buy Cheap Instant Internet Data and
                        Airtime, and contact importing. This policy outlines the steps and requirements for users who
                        wish to delete their accounts.

                        <br><br><br>

                        1. <b>Account Deletion Request: </b>To initiate the account deletion process, users need to
                        submit a written request to our customer support team. This request can be sent via email or
                        through our online contact form.

                        <br><br>

                        2. <b>Verification Process: </b>Upon receiving the account deletion request, our customer
                        support team will verify the identity of the user. This is done to ensure that the request is
                        legitimate and authorized by the account owner.

                        <br><br>

                        3. <b>Data Backup:</b> Before proceeding with the account deletion, we will inform the user
                        about the consequences of deleting their account. This includes the permanent loss of all data,
                        including contact lists, message history, and any other stored information.
                        <br><br>


                        4. <b>Account Deletion Confirmation: </b>Once the user confirms their intention to delete the
                        account and acknowledges the consequences, our team will proceed with the deletion process. This
                        process involves permanently removing all user data from our servers.
                        <br><br>


                        5. <b>Confirmation Email:</b> After the account deletion is completed, we will send a
                        confirmation email to the user, notifying them that their account has been successfully deleted.
                        <br><br>


                        <b>It is important to note that the account deletion process is irreversible. Once an account is
                            deleted, all data associated with it will be permanently removed from our system.</b>
                        Therefore, users are advised to carefully consider the consequences before requesting an account
                        deletion.

                        <br><br><br>

                        Please keep in mind that this policy specifically applies to your {{env('APP_NAME')}} account, and contact
                        importing account with us at {{env('APP_NAME')}}. For any other services or features provided by
                        {{env('APP_NAME')}}, different policies may apply.


                    </p>


                </div>
            </div>
        </section><!-- End About Us Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('partials.footer')
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    @include('partials.script')

</body>

</html>
