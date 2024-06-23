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
                        <li class="h3"><a href="/" >Back Home</a></li>
                        <li>Privacy Policy</li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about pt-0">
            <div class="container" data-aos="fade-up">

                <div class="col-lg-6 content order-last  order-lg-first">
                    <h3>Privacy Policy</h3>
                    <p>
                        At {{env('APP_NAME')}}, we are committed to protecting your privacy and ensuring the security of your
                        personal information. This privacy policy explains how we collect, use, and disclose your
                        information when you use our services, including instant recharge of airtime, internet data,
                        cable TV, electricity bill payments, WAEC & NECO PIN, airtime 2 cash conversion, and many more..

                        <br> <br>

                        1. <b>Information We Collect:</b> <br><b>Personal Information:</b> <br>When you sign up for an
                        account, we may collect personal information such as your name, email address, phone number, and
                        payment details. <br><b>- Transaction Information:</b><br> We collect information about your
                        transactions, including the type of service you purchased, the amount paid, and the date and
                        time of the transaction. <br><b>- Device Information:</b> We may collect information about the
                        device you use to access our services, including your IP address, browser type, and operating
                        system. <br><b>- Usage Information: </b><br>We collect information about how you use our
                        services, including the pages you visit, the features you use, and the actions you take.


                        <br> <br>
                        2. <b>How We Use Your Information:</b> - To Provide Services: We use your information to process
                        your transactions and provide the services you request, such as recharging airtime, internet
                        data, cable TV, and electricity bills. - To Improve Our Services: We analyze your usage patterns
                        and preferences to improve our services, develop new features, and personalize your experience.
                        - To Communicate with You: We may send you transactional emails, service updates, and
                        promotional offers. You can opt-out of receiving promotional emails at any time. - To Protect
                        Our Users: We may use your information to detect and prevent fraud, unauthorized access, or
                        other illegal activities.

                        <br><br>

                        3.<b> Data Security:</b> We take reasonable measures to protect your personal information from
                        unauthorized access, loss, misuse, or alteration. However, no method of transmission over the
                        internet or electronic storage is 100% secure, and we cannot guarantee its absolute security.

                        <br><br>

                        4. <b>Information Sharing and Disclosure:</b> Service Providers: We may share your information
                        with trusted third-party service providers who assist us in delivering our services, such as
                        payment processors and telecommunications companies. - Legal Compliance: We may disclose your
                        information if required by law or in response to a valid legal request, such as a court order or
                        government investigation. - Business Transfers: If we are involved in a merger, acquisition, or
                        sale of assets, your information may be transferred as part of that transaction.
                        <br><br>


                        5. <b>Data Retention:</b> We retain your personal information only for as long as necessary to
                        fulfill the purposes for which it was collected and to comply with legal obligations. We will
                        securely delete or anonymize your personal information when it is no longer needed.

                        <br><br>

                        6. <b>Childrens Privacy:</b> Our services are not intended for use by individuals under the age
                        of 16. We do not knowingly collect personal information from children. If we become aware that
                        we have collected personal information from a child without parental consent, we will take steps
                        to remove the information from our systems.
                        <br><br>


                        7. <b>Changes to Privacy Policy:</b> We may update this privacy policy from time to time to
                        reflect changes in our practices or legal requirements. We will notify you of any material
                        changes by posting the updated policy on our website or through other communication channels.

                        <br><br>

                        8. <b>Contact Us:</b> If you have any questions or concerns about our privacy policy or the way
                        we handle your personal information, please contact us at <b>support@{{env('APP_NAME')}}.mwb.ng/</b> or
                        call <b>08101820177</b>.

                        <br><br><br>

                        <b>By using our services, you consent to the collection, use, and disclosure of your information
                            as described in this privacy policy.</b>


                    </p>


                </div>
            </div>
        </section><!-- End About Us Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('partials.footer')

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    @include('partials.script')

</body>

</html>
