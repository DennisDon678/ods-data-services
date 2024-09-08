
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="no-referrer-when-downgrade">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="static/img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta content="{{env('APP_NAME')}}- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services" name="descriptison">

    <meta itemprop="name" content="{{env('APP_NAME')}}- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta itemprop="description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta itemprop="image" content="static/styling/images/bg.html">
    <link rel="stylesheet" href="static/ogbam/w3.css">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="static/styling/images/bg.html">
    <meta name="twitter:title" content="{{env('APP_NAME')}}- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta name="twitter:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta name="twitter:image:src" content="static/styling/images/bg.html">

    <!-- Open Graph data -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="{{env('APP_NAME')}}- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta property="og:image" content="static/styling/images/bg.html">
    <meta property="og:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta property="og:site_name" content="{{env('APP_NAME')}}">
    <meta property="og:url" content="index.html">
    <meta property="og:type" content="website">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Ayman Fikry">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <!-- favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="static/chronic/assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="static/chronic/assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="static/chronic/assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="static/chronic/assets/images/favicons/site.webmanifest">
    <!-- plugin styles -->
    <link href="css2?family=Nunito:wght@600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="static/chronic/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/chronic/assets/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="static/chronic/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="static/chronic/assets/css/animate.min.css">
    <link rel="stylesheet" href="static/chronic/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="static/chronic/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="static/chronic/assets/css/jquery.bxslider.min.css">
    <link rel="stylesheet" href="static/chronic/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="static/chronic/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="static/chronic/assets/css/swiper.min.css">
    <link rel="stylesheet" href="static/chronic/assets/css/oapee-icons.css">
    <!-- template styles -->
    <link rel="stylesheet" href="static/chronic/assets/css/style.css">
    <link rel="stylesheet" href="static/chronic/assets/css/responsive.css">
</head>

<body>

    <div class="preloader">
        <img src="/static/chronic/assets/images/loading.png" class="preloader__image" alt="">
    </div> 

    <div class="page-wrapper">


        <header class="site-header-one stricky site-header-one__fixed-top">
            <div class="container-fluid">
                <div class="site-header-one__logo">
                    <a href="index.htm">
                        <h4 class="text-uppercase bold text-white" style="color:white; font-weight:bold;"><spanv style="color:orange;">{{strtoupper(env('APP_NAME'))}}</spanv></h4>
                        <!-- <img src="/static/chronic/assets/images/logo-1-1.png" width="136" alt=""> -->
                    </a>
                    <span class="side-menu__toggler" style="margin-left:250px;"><i class="fa fa-bars"></i></span><!-- /.side-menu__toggler -->
                </div><!-- /.site-header-one__logo -->
                <div class="main-nav__main-navigation one-page-scroll-menu">
                    <ul class="main-nav__navigation-box">
                        <li class="scrollToLink">
                            <a href="#home">Home</a>
                        </li>
                        <li class="scrollToLink"><a href="#features">FAQ</a></li>
                        <li class="scrollToLink"><a href="#pricing">Pricing</a></li>
                        <li class="scrollToLink"><a href="#About Us">About Us</a></li>
                        
                        <div class="main-nav__right" style="margin-top:10px;">
                            
                            <a href="/auth/sign-in" class="thm-btn main-nav__btn " style="background:orange; margin-left:10px;"><span>Login</span></a>
                            <a href="/auth/sign-up" class="thm-btn main-nav__btn"><span>Register</span></a>
                            
                        </div>
                    </ul>
                </div>
            </div><!-- /.container-fluid -->
        </header><!-- /.site-header-one -->

        <section class="banner-one" id="home">

            <img src="static/chronic/assets/images/shapes/banner-shape-1-1.png" class="banner-one__bg-shape-1" alt="">
            <img src="static/chronic/assets/images/shapes/banner-shape-1-2.png" class="banner-one__bg-shape-2" alt="">
            <img src="static/chronic/assets/images/shapes/banner-shape-1-3.png" class="banner-one__bg-shape-3" alt="">
            <img src="static/chronic/assets/images/shapes/banner-shape-1-4.png" class="banner-one__bg-shape-4" alt="">
            <img src="static/chronic/assets/images/shapes/banner-shape-1-5.png" class="banner-one__bg-shape-5" alt="">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex">
                        <div class="my-auto">
                            <div class="banner-one__content">
                                <smal style="color: yellow;"> Welcome to:</smal>
                                <h4 class="text-white" style="color:white; font-weight:bold;">{{env('APP_NAME')}}</h4>
                                <p>{{env('APP_NAME')}} is a registered telecommunication company that provide voice or data transmission services, such as; Mobile Data, Cable Sub, Electric Bill, Airtime (VTU).
                                </p>
                                
                                <a href="login/index.htm" class="thm-btn banner-one__btn" style="background:turquoise; margin-left:10px;"><span>Login</span></a>
                                <a href="signup/index.htm" class="thm-btn banner-one__btn"><span>Register</span></a>
                                
                                <!-- /.thm-btn banner-one__btn -->
                            </div><!-- /.banner-one__content -->
                        </div><!-- /.my-auto -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6 d-flex justify-content-end wow fadeInUp" data-wow-duration="1500ms">
                        <div class="banner-one__image">
                            <img src="static/chronic/assets/images/resources/tla1.jpg" width="600px" style="border-radius: 300px; border: 30px solid purple;" alt="">
                        </div><!-- /.banner-one__image -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.banner-one -->

        <section class="service-one" id="features">
            <div class="container">
                <div class="block-title text-center">
                    <h3>Our Services</h3>
                    <p>We offer instant recharge of Airtime, Databundle, CableTV (DStv, GOtv & Startimes), Electricity Bill Payment, Airtime to cash, Educational pins and more...
                    </p>
                </div><!-- /.block-title -->
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="0ms">
                        <div class="service-one__single">
                            <h3>Buy Data</h3>
                            <p>Start enjoying very low rates Data plan for your internet browsing databundle.
                            </p>
                            <div class="service-one__icon">
                                <img src="static/styles/pheebee/img/feature/wifi.png" alt="" width="60" class="center">
                            </div><!-- /.service-one__icon -->
                        </div><!-- /.service-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                        <div class="service-one__single">
                            <h3>Airtime TopUp</h3>
                            <p>Making an online recharge has become very easy and safe on {{env('APP_NAME')}}
                            </p>
                            <div class="service-one__icon">
                                <img src="static/styles/pheebee/img/feature/phone.png" alt="" width="60" class="center">
                            </div><!-- /.service-one__icon -->
                        </div><!-- /.service-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                        <div class="service-one__single">
                            <h3>Cable Subscription</h3>
                            <p>Instantly Activate Cable subscription with favourable discount compared to others.
                            </p>
                            <div class="service-one__icon">
                                <img src="static/styles/pheebee/img/feature/tv.png" alt="" width="60" class="center">
                            </div><!-- /.service-one__icon -->
                        </div><!-- /.service-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="300ms">
                        <div class="service-one__single">
                            <h3>Airtime To Cash</h3>
                            <p>We offer this service at a very good attractive rate please login to get current conversion rate.
                            </p>
                            <div class="service-one__icon">
                                <img src="static/styles/pheebee/img/feature/airtime.png" alt="" width="60" class="center">
                            </div><!-- /.service-one__icon -->
                        </div><!-- /.service-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="0ms">
                        <div class="service-one__single">
                            <h3>Utility Payment</h3>
                            <p>Because we understand your needs, we have made bills and utilities payment more convenient.
                            </p>
                            <div class="service-one__icon">
                                <img src="static/styles/pheebee/img/feature/light.png" alt="" width="60" class="center">
                            </div><!-- /.service-one__icon -->
                        </div><!-- /.service-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="0ms">
                        <div class="service-one__single">
                            <h3>Bulk SMS</h3>
                            <p>Send BulkSMS to any number for as low as just 2.5kobo per unit
                            </p>
                            <div class="service-one__icon">
                                <img src="static/styles/pheebee/img/feature/sms.png" alt="" width="60" class="center">
                            </div><!-- /.service-one__icon -->
                        </div><!-- /.service-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.service-one -->

        <section class="cta-four">
            <img src="static/chronic/assets/images/shapes/cta-4-dot-1-1.png" class="cta-four__bg-shape-1" alt="">
            <img src="static/chronic/assets/images/shapes/cta-4-shape-1-1.png" class="cta-four__bg-shape-2" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cta-four__images">
                            <img src="static/chronic/assets/images/resources/google.png" class="wow fadeInUp" data-wow-duration="1500ms" alt="">
                            <img src="static/chronic/assets/images/resources/app%20store.jpg" class="wow fadeInUp" data-wow-duration="1500ms" alt="">
                            <img src="static/chronic/assets/images/resources/bck1.jpg" style="width: 500px; height: 250px;" class="wow fadeInUp" data-wow-duration="1500ms" alt="">
                        </div><!-- /.cta-four__images -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="cta-four__content">
                            <div class="block-title">
                                <h3>Welcome To {{env('APP_NAME')}}</h3>
                            </div><!-- /.block-title -->
                            <div class="cta-four__text">
                                <p>
                                    {{env('APP_NAME')}} is Nigeria's best option whenever you think of easy and instant online mobile recharge.<br> Welcome to Nigerian mobile online virtual topup Dear customer we deal on all kind of mobile virtual airtime topup recharge
                                    cards, data bundles, TV subscriptions, internet subscriptions, education payment and electricity bills. Many people have joined and our existing Clients had been enjoying this platform and ever since our exstence. We warmly
                                    welcome you as you join.
                                </p>
                            </div><!-- /.cta-four__text -->
                            <ul class="list-unstyled cta-four__list">
                                <li>
                                    <i class="fa fa-check-circle"></i>
                                    We Are Reliable
                                </li>
                                <li>
                                    <i class="fa fa-check-circle"></i>
                                    We are 100% secure
                                </li>
                                <li>
                                    <i class="fa fa-check-circle"></i>
                                    We're Fast
                                </li>
                            </ul><!-- /.list-unstyled -->

                            <div class="cta-four__porgress__bar-wrap">
                                <div class="cta-four__porgress__bar">
                                    <div class="cta-four__porgress__bar-top">
                                        <h3>Marketing</h3>
                                        <p>75%</p>

                                    </div><!-- /.cta-four__porgress__bar-top -->
                                    <div class="cta-four__porgress__bar-line">
                                        <span class="wow slideInLeft" data-wow-duration="1500ms" style="width: 75%;"></span>
                                    </div><!-- /.cta-four__porgress__bar-line -->
                                </div><!-- /.cta-four__porgress__bar -->
                                <div class="cta-four__porgress__bar">
                                    <div class="cta-four__porgress__bar-top">
                                        <h3>SEO Optimization</h3>
                                        <p>87%</p>

                                    </div><!-- /.cta-four__porgress__bar-top -->
                                    <div class="cta-four__porgress__bar-line">
                                        <span class="wow slideInLeft" data-wow-duration="1500ms" style="width: 87%;"></span>
                                    </div><!-- /.cta-four__porgress__bar-line -->
                                </div><!-- /.cta-four__porgress__bar -->
                            </div><!-- /.cta-four__porgress__bar-wrap -->


                            <a href="signup/index.htm" class="thm-btn cta-four__btn"><span>Create Acoount</span></a>
                            <!-- /.thm-btn cta-four__btn -->
                        </div><!-- /.cta-four__content -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.cta-four -->

        <section class="brand-one">
            <div class="container">
                <div class="brand-one__carousel owl-carousel thm__owl-carousel owl-theme" data-options='{"loop": true, "autoplay": true, "autoplayHoverPause": true, "autoplayTimeout": 5000, "items": 5, "dots": false, "nav": false, "margin": 100, "smartSpeed": 700, "responsive": { "0": {"items": 2, "margin": 30}, "480": {"items": 3, "margin": 30}, "991": {"items": 4, "margin": 50}, "1199": {"items": 5, "margin": 100}}}'>
                    <div class="item">
                        <img src="static/chronic/assets/images/resources/mtn.png" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="static/chronic/assets/images/resources/glo.png" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="static/chronic/assets/images/resources/9mobile.png" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="static/chronic/assets/images/resources/airtel.png" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="static/chronic/assets/images/resources/dstv.png" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="static/chronic/assets/images/resources/gotv.png" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="static/chronic/assets/images/resources/startime.png" alt="">
                    </div><!-- /.item -->
                    <div class="item">
                        <img src="static/chronic/assets/images/resources/ibedc.png" alt="">
                    </div><!-- /.item -->
                    <!--<div class="item">
                        <img src="/static/chronic/assets/images/resources/brand-1-1.png" alt="">
                    </div> /.item
                    <div class="item">
                        <img src="/static/chronic/assets/images/resources/brand-1-1.png" alt="">
                    </div>< /.item
                    <div class="item">
                        <img src="/static/chronic/assets/images/resources/brand-1-1.png" alt="">
                    </div>< /.item
                    <div class="item">
                        <img src="/static/chronic/assets/images/resources/brand-1-1.png" alt="">
                    </div>< /.item -->
                </div><!-- /.brand-one__carousel owl-carousel thm__owl-carousel owl-theme -->
            </div><!-- /.container -->
        </section><!-- /.brand-one -->

        <section class="cta-three">
            <img src="static/chronic/assets/images/shapes/cta-3-shape-1-2.png" class="cta-three__bg-shape-1" alt="">
            <img src="static/chronic/assets/images/shapes/cta-3-shape-1-1.png" class="cta-three__bg-shape-2" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cta-three__content">
                            <div class="block-title text-left">
                                <small>Welcome To {{env('APP_NAME')}}</small>
                                <p>Enjoy our services by creating an account with us.</p>
                            </div><!-- /.block-title text-left -->
                            <div class="cta-three__icon-wrap">
                                <div class="cta-three__icon-single">
                                    <div class="cta-three__icon">
                                        <i class="oapee-icon-app-development"></i>
                                    </div><!-- /.cta-three__icon -->
                                    <h3>Automation</h3>
                                </div><!-- /.cta-three__icon-single -->
                                <div class="cta-three__icon-single">
                                    <div class="cta-three__icon">
                                        <i class="oapee-icon-computer-graphic"></i>
                                    </div><!-- /.cta-three__icon -->
                                    <h3>Quick Support</h3>
                                </div><!-- /.cta-three__icon-single -->
                               
                            </div><!-- /.cta-three__icon-wrap -->
                           
                        </div><!-- /.cta-three__content -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6 wow fadeInRight" data-wow-duration="1500ms">
                      
                             <img src="static/chronic/assets/images/resources/img1.jpg" style="width: 500px; border-radius: 100px;" alt=""> 
                        </div>
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </section></div><!-- /.container -->
        <!-- /.cta-three -->

        <section class="cta-two">
            <img src="static/chronic/assets/images/shapes/cta-2-shape-1.png" alt="" class="cta-two__bg-shape-1">
            <img src="static/chronic/assets/images/shapes/cta-2-dot-1.png" class="cta-two__bg-shape-2" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="static/chronic/assets/images/resources/cover.png" class="cta-two__content-image" alt="">
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="cta-two__content">
                            <div class="block-title text-left">
                                <small>Welcome To {{env('APP_NAME')}}</small>
                                <h3>Become an Agent</h3>
                            </div><!-- /.block-title text-center -->
                            <p>
                                Join our network of outstanding entrepreneurs patnering with {{env('APP_NAME')}} Bring the {{env('APP_NAME')}} 'easy-payments' experience closer to your network and earn a commission for every transaction you perform for your customers. <br><br>We
                                offer our Referrers the best referral program incentives to encourage entrepreneurial and managerial skill acquisition; enhance growth and development and general empowerment among our students on campuses of higher learning
                                and youths in diaspora. Finally, to promote technology via the use of ICT tools in our society.
                            </p>

                        </div><!-- /.cta-two__content -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.cta-two -->
        <h2>Our Flexible Price</h2>
        <div class="row">
            <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="text-center">
                        <img src="https://qstoresng.com//static/styling/img/app-landing/mockup/a.jpg" style="border-radius: 50%;" alt="">
                        <span class="excerpt d-block">MTN DATA</span>
                        <div class="pricing-text mb-5">
                            <center>
                            <table class="table table-all table-responsive">
                        
                                    <tbody>
                                        
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 250.0MB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;68</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one week</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 500.0MB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;135</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>2weeks</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 500.0MB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;140</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>1month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 1.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;250</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 1.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;270</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 1.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;300</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 1.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;300</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one week</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 1.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;300</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>One_day</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 2.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;500</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 2.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;540</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 1.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;570</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1day</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 2.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;600</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 3.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;750</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>0ne month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 3.5GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;750</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>Two-days</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 3.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;810</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 3.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;900</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>1month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 3.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;900</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 1.5GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1140</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 5.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1350</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 5.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1500</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 5.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1500</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>0ne month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 3.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1520</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 6.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1600</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 4.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1900</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 15.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;2500</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>seven-days</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 9.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;2500</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 10.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;2700</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 12.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;3000</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 10.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;3000</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 10.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;3325</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 12.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;3840</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 15.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;4050</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 20.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;5280</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 20.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;5400</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 24.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;6000</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 40.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;10450</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 40.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;10500</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 75.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;15200</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 120.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;20900</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 200.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;28500</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                        </tr>
            
                                        <tr>
                                        <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 400.0GB </td>
                                        <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;47500</i></td>
                                        <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>2months</i></td>
                                        </tr>
            			
                                  </tbody></table>
                                  </center>
                        </div>

                       
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="text-center">
                        <img src="https://qstoresng.com//static/styling/img/app-landing/mockup/b.jpg" style="border-radius: 50%;" alt="">
                        <span class="excerpt d-block">AIRTEL DATA</span>
                        <div class="pricing-text mb-5">
                            <!--<table class="table table-all ">-->
                            <!--</table>-->
                            <center>
                            <table class="table table-all table-responsive">
                                

                                
                                <tbody>
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 100.0MB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;30</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>7days</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 300.0MB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;85</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>7days</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 500.0MB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;150</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 1.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;300</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 750.0MB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;480</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>2weeks</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 2.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;600</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 1.2GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1000</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>0ne month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 1.5GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1200</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 3.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1500</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 5.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1500</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 4.5GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;2000</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 6.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;2500</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>0ne month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 10.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;3000</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>One month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 10.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;3000</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>1month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 11.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;4000</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 15.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;4500</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>1month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 20.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;5000</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>1month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 20.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;6000</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>1month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 40.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;9500</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 75.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;15000</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 120.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;19000</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days</i></td>
                                    </tr>
                                
                                  
                                </tbody></table>
                                </center>
                        </div>


                       
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="text-center">
                        <img src="https://qstoresng.com//static/styling/img/app-landing/mockup/d.jpg" alt="">
                        <span class="excerpt d-block">GLO DATA</span>
                        <div class="pricing-text mb-5">
                            <!--<table class="table table-all ">-->
                            <!--</table>-->
                            <center>
                            <table class="table table-all table-responsive">
                                
                                
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 200.0MB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;60</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one week</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 500.0MB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;150</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>0ne month</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 1.0GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;300</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>One month</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 1.35GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;460</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(2weeks)</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 2.0GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;600</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>0ne month</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 3.0GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;900</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>0ne month</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 2.9GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;920</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 4.1GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1380</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 5.0GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1500</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>One month</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 5.8GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1840</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30days</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 7.7GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;2300</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30days</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 10.0GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;2760</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 10.0GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;3000</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>0ne month</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 14.0GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;3680</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 20.0GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;4600</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30days</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 29.5GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;7360</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 50.0GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;9200</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 93.0GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;13800</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30days</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 119.0GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;16560</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30days</i></td>
                                </tr>
                            
                                <tr>
                                <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 138.0GB </td>
                                <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;18400</i></td>
                                <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days</i></td>
                                </tr>
                            </table>
                            </center>
                        </div>

                       
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="text-center">
                        <img src="https://qstoresng.com//static/styling/img/app-landing/mockup/c.jpg" alt="">
                        <span class="excerpt d-block">9MOBILE DATA</span>
                        <div class="pricing-text mb-5">
                            <!--<table class="table table-all ">-->
                            <!--</table>-->
                            <center>
                            <table class="table table-all table-responsive">
                                <tbody>
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 300.0MB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;48</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one week</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 500.0MB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;78</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>2weeks</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 1.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;155</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 2.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;310</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 500.0MB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;440</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>1 week</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 3.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;465</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 5.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;725</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 1.5GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;870</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days{Gifting}</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 2.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1058</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>(1month)</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 3.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1305</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days{Gifting}</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 10.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1500</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 4.5GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;1740</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days{Gifting}</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 20.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;3100</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 11.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;3480</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days{Gifting}</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 15.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;4350</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days{Gifting}</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 40.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;5400</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>one month</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 40.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;8700</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days{Gifting}</i></td>
                                    </tr>
                                
                                    <tr>
                                    <td style="color: rgb(5, 37, 78); font-size:16px; font-weight: bolder;"> 75.0GB </td>
                                    <td style="color: rgb(5, 37, 78); font-size:16px;  font-weight: bolder;"><i> &#8358;13050</i></td>
                                    <td style="color: rgb(5, 37, 78); font-size:12px;  font-weight: bolder;"><i>30 days{Gifting}</i></td>
                                    </tr>
                                
                                </tbody></table>
                                <center>
                        </center></center></div>
                       

                    </div>
                </div>
            </div>
        </div>
        <section class="testimonials-one" id="testimonials">
            <img src="/static/chronic/assets/images/mojeed.jpg" alt="Awesome Image" class="testimonials-one__bg-shape-2">

            <div class="container">
                <img src="static/chronic/assets/images/testimonials/teni.jpg" style="width: 90px;" alt="Awesome Image" class="testimonials-one__bg-shape-1">
                <div class="row">
                    <div class="col-lg-6 d-flex">
                        <div class="my-auto">
                            <div id="testimonials-slider-pager">
                                <div class="testimonials-slider-pager-one">
                                    <a href="#" class="pager-item active" data-slide-index="0"><img src="static/chronic/assets/images/testimonials/teni.jpg" alt="Awesome Image"></a>
                                    <a href="#" class="pager-item" data-slide-index="1"><img src="static/chronic/assets/images/testimonials/mojeed.jpg" alt="Awesome Image"></a>
                                    <a href="#" class="pager-item" data-slide-index="2"><img src="static/chronic/assets/images/testimonials/pheebz.jpg" alt="Awesome Image"></a>
                                </div><!-- /.testimonials-slider-pager-one -->
                                <div class="testimonials-slider-pager-two">
                                    <a href="#" class="pager-item active" data-slide-index="0"><img src="static/chronic/assets/images/testimonials/mojeed.jpg" alt="Awesome Image"></a>
                                    <a href="#" class="pager-item" data-slide-index="1"><img src="static/chronic/assets/images/testimonials/pheebz.jpg" alt="Awesome Image"></a>
                                    <a href="#" class="pager-item" data-slide-index="2"><img src="static/chronic/assets/images/testimonials/teni.jpg" alt="Awesome Image"></a>
                                </div><!-- /.testimonials-slider-pager-two -->
                            </div><!-- /#testimonials-slider-pager -->
                        </div><!-- /.my-auto -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="block-title text-left">
                            <h3>What Our Customers Are <br>Talking <span>About Us</span></h3>
                        </div><!-- /.block-title text-center -->

                        <ul class="slider testimonials-slider">
                            <li class="slide-item">
                                <div class="testimonials-one__single">
                                    <p>I love the quick response to issues. We might just get along well. So far so good. I recommnd this platform to everyone.
                                    </p>
                                    <h3>Ademale Micheal</h3>
                                    <span>WEB DEVELOPER</span>
                                </div><!-- /.testimonials-one__single -->
                            </li>
                            <li class="slide-item">
                                <div class="testimonials-one__single">
                                    <p class="p-lg grey-color">These site is great. {{env('APP_NAME')}} is best platform when its come to affordable data plan for both end-user and resseller ,i recommend this platform it's fast, automated and secured.
                                    </p>
                                    <h3>Benjamin Josh</h3>
                                    <span>WEB DEVELOPER</span>
                                </div><!-- /.testimonials-one__single -->
                            </li>
                            <li class="slide-item">
                                <div class="testimonials-one__single">
                                    <p>This is due to their excellent service, competitive pricing and customer support.
                                        It’s throughly refresing to get such a personal touch.
                                    </p>
                                    <h3>Phillip Phy</h3>
                                    <span>FRONTEND DEVELOPER</span>
                                </div><!-- /.testimonials-one__single -->
                            </li>
                                </ul></div><!-- /.testimonials-one__single -->
                            
                        
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            <!-- /.container -->
        </section><!-- /.testimonials-one -->

        <section class="funfact-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="0ms">
                        <div class="funfact-one__single">
                            <h3 class="counter">1785</h3><!-- /.counter -->
                            <p>Active Member</p>
                        </div><!-- /.funfact-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
                    <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                        <div class="funfact-one__single">
                            <h3 class="counter">2600</h3><!-- /.counter -->
                            <p>Members</p>
                        </div><!-- /.funfact-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
                    <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                        <div class="funfact-one__single">
                            <h3 class="counter">660</h3><!-- /.counter -->
                            <p>Downloads</p>
                        </div><!-- /.funfact-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
                    <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="300ms">
                        <div class="funfact-one__single">
                            <h3 class="counter">8</h3><!-- /.counter -->
                            <p>Agent</p>
                        </div><!-- /.funfact-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.funfact-one -->
        <section class="faq-one">
            <div class="container">
                <div class="block-title text-center">
                    <h3>Frequently Asked <span>Questions</span></h3>
                    <p>Here at {{env('APP_NAME')}} our services are completely Fast, Secure & Automated. We provide 24/7hrs Support to our registered users</p>
                </div><!-- /.block-title text-center -->
                <div class="nav nav-tabs faq-one__post-filter">
                    <a href="#" class="nav-link active thm-btn" data-toggle="tab"><span>Data</span></a>
                    <a href="#" class="nav-link  thm-btn" data-toggle="tab"><span>Fund Wallet</span></a>
                    <a href="#" class="nav-link  thm-btn" data-toggle="tab"><span>Our Services</span></a>
                    <a href="#" class="nav-link  thm-btn" data-toggle="tab"><span>Check Balance</span></a>
                </div><!-- /.nav nav-tabs faq-one__post-filter -->
                <div class="tab-content">
                    <div class="tab-pane fade show active animated fadeInUp" id="general">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="accrodion-grp " data-grp-name="faq-accrodion-1">
                                    <div class="accrodion active ">
                                        <div class="accrodion-inner">
                                            <div class="accrodion-title">
                                                <h4>How To Buy Data?</h4>
                                            </div>
                                            <div class="accrodion-content">
                                                <div class="inner">
                                                    <p>1. Log in to your account <br> 2. If not click here to register <br> 3. After log in click fund my account <br> 4. Select Coupon payment <br> <br> NB:You can buy coupon code from our agents
                                                    </p>
                                                </div><!-- /.inner -->
                                            </div>
                                        </div><!-- /.accrodion-inner -->
                                    </div>
                                    <div class="accrodion  ">
                                        <div class="accrodion-inner">
                                            <div class="accrodion-title">
                                                <h4>What Are The Codes For Checking Data Balance?</h4>
                                            </div>
                                            <div class="accrodion-content">
                                                <div class="inner">
                                                    <p>MTN-&gt; *461*4#
                                                        <br> 9mobile[SME]-&gt; *229*9#
                                                        <br> 9mobile[Gifting]-&gt; *228#
                                                        <br> Airtel-&gt; *140#
                                                        <br> Glo-&gt; *127*0#. </p>
                                                </div><!-- /.inner -->
                                            </div>
                                        </div><!-- /.accrodion-inner -->
                                    </div>
                                    <div class="accrodion ">
                                        <div class="accrodion-inner">
                                            <div class="accrodion-title">
                                                <h4>How Do i Fund My Wallet?</h4>
                                            </div>
                                            <div class="accrodion-content">
                                                <div class="inner">
                                                    <p>You can fund your wallet using any of our Four payment means: Bank payment.
                                                        <br> Online Payment with your ATM card details via Pay stack Payment Gateway.
                                                        <br> Payment with airtime.
                                                        <br> Payment with Coupon Code(s). </p>
                                                </div><!-- /.inner -->
                                            </div>
                                        </div><!-- /.accrodion-inner -->
                                    </div>
                                    <div class="accrodion ">
                                        <div class="accrodion-inner">
                                            <div class="accrodion-title">
                                                <h4>Can I rollover my monthly data if it still reamins?</h4>
                                            </div>
                                            <div class="accrodion-content">
                                                <div class="inner">
                                                    <p>There are many variations of passages of available but majority
                                                        have
                                                        alteration in some by inject humour or random words. Lorem ipsum
                                                        dolor
                                                        sit amet.</p>
                                                </div><!-- /.inner -->
                                            </div>
                                        </div><!-- /.accrodion-inner -->
                                    </div>
                                </div>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="accrodion-grp " data-grp-name="faq-accrodion-2">
                                    <div class="accrodion  ">
                                        <div class="accrodion-inner">
                                            <div class="accrodion-title">
                                                <h4>How To Use Our Services?</h4>
                                            </div>
                                            <div class="accrodion-content">
                                                <div class="inner">
                                                    <p class="p-lg">STEP 1: Fund your wallet. <br>
                                                        STEP 2: Fill the data order form. <br>
                                                        STEP 3: Wait for 1-15 minutes, the recipient will receive notification(s) of data recharge(Except for 9mobile(SME), which should be confirmed with its balance code)
                                                                                                    </p>
                                                </div><!-- /.inner -->
                                            </div>
                                        </div><!-- /.accrodion-inner -->
                                    </div>
                                 
                                            </div>
                                        </div><!-- /.accrodion-inner -->
                                    </div>
                                </div>
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                    <!-- /.tab-pane fade show active animated fadeInUp -->
                <!-- /.tab-content -->
            <!-- /.container -->
        </section><!-- /.faq-one -->
        <footer class="site-footer">
            <div class="site-footer__upper">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6">
                            <div class="footer-widget footer-widget__about">
                                
                                <h4 class="text-uppercase bold " style="color:black; font-weight:bold;"><spanv style="color:orange;">{{strtoupper(env('APP_NAME'))}}</spanv></h4>
                                
                                <p>Here at {{env('APP_NAME')}}, we offer you<br> the most affordable and most cheapest data,<br> airtime, Dstv, Gotv and Startimes subscription.
                                    <br> </p> 
                                <a href="#" class="thm-btn"><span>Register</span></a><!-- /.thm-btn -->
                            </div><!-- /.footer-widget footer-widget__about -->
                        </div><!-- /.col-lg-4 -->
                        <div class="col-xl-2 col-lg-6">
                            <div class="footer-widget footer-widget__links">
                                <h3 style="color: green;">Explore</h3><!-- /.footer-widget__title -->
                                <ul class="list-unstyled footer-widget__links-list">
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Our Team</a></li>
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="#">Services</a></li>
                                </ul><!-- /.list-unstyled footer-widget__links-list -->
                            </div><!-- /.footer-widget footer-widget__links -->
                        </div><!-- /.col-lg-2 -->
                        <div class="col-xl-2 col-lg-6">
                            <div class="footer-widget footer-widget__contact">
                                <h3 style="color: green;">Contact</h3><!-- /.footer-widget__title -->
                                <ul class="footer-widget__contact-list list-unstyled">
                                    <li>
                                        <i class="fa fa-phone-square"></i>
                                        <a href="tel:2348109692838">0812 895 5919</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"></i>
                                        <a href="mailto:{{env('APP_NAME')}}@gmail.com"> {{env('APP_NAME')}}@gmail.com</a>
                                    </li>
                                    <!-- <li>
                                        <i class="fa fa-map-marker"></i>
                                        ***********************
                                    </li> -->
                                </ul><!-- /.footer-widget__contact-list list-unstyled -->
                            </div><!-- /.footer-widget footer-widget__contact -->
                        </div><!-- /.col-lg-2 -->
                      
                        </div><!-- /.col-lg-4 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            <!-- /.site-footer__upper -->
            <div class="site-footer__bottom">
                <div class="container">
                    <div class="inner-container">
                        <p>© copyright 2022 by {{env('APP_NAME')}}.com <a href="#">DEVELOPED BY : </a> <a href="https://www.linkedin.com/in/dennis-chiemezie-onah-7b3a90280/">{{strtoupper('Don Codes.(Chiemezie Dennis)')}}</a></p>
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div><!-- /.footer-social -->
                    </div><!-- /.inner-container -->
                </div><!-- /.container -->
            </div><!-- /.site-footer__bottom -->
        </footer><!-- /.site-footer -->
    <!-- /.page-wrapper -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

    <div class="side-menu__block">
        <div class="side-menu__block-overlay custom-cursor__overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div><!-- /.side-menu__block-overlay -->
        <div class="side-menu__block-inner ">
            <div class="side-menu__top justify-content-end">

                <a href="#" class="side-menu__toggler side-menu__close-btn">
                    <!-- <img src="/static/chronic/assets/images/shapes/close-1-1.png" alt=""> -->
                    <h4 class="text-uppercase bold " style="color:black; font-weight:bold;">geodna<spanv style="color:orange;">techsub</spanv></h4>
                       
                    </a>
            </div><!-- /.side-menu__top -->


            <nav class="mobile-nav__container">
                <!-- content is loading via js -->
            </nav>
            <div class="side-menu__sep"></div><!-- /.side-menu__sep -->
            <div class="side-menu__content">
               
                <div class="side-menu__social">
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div><!-- /.side-menu__content -->
        </div><!-- /.side-menu__block-inner -->
    </div><!-- /.side-menu__block -->

    <!-- Plugin scripts -->
    <script src="static/chronic/assets/js/jquery-3.5.0.min.js"></script>
    <script src="static/chronic/assets/js/bootstrap.bundle.min.js"></script>
    <script src="static/chronic/assets/js/bootstrap-datepicker.min.js"></script>
    <script src="static/chronic/assets/js/bootstrap-select.min.js"></script>
    <script src="static/chronic/assets/js/isotope.js"></script>
    <script src="static/chronic/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="static/chronic/assets/js/jquery.bxslider.min.js"></script>
    <script src="static/chronic/assets/js/jquery.counterup.min.js"></script>
    <script src="static/chronic/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="static/chronic/assets/js/jquery.validate.min.js"></script>
    <script src="static/chronic/assets/js/jquery.waypoints.min.js"></script>
    <script src="static/chronic/assets/js/owl.carousel.min.js"></script>
    <script src="static/chronic/assets/js/swiper.min.js"></script>
    <script src="static/chronic/assets/js/jquery.easing.min.js"></script>
    <script src="static/chronic/assets/js/TweenMax.min.js"></script>
    <script src="static/chronic/assets/js/wow.js"></script>
    <script src="static/chronic/assets/js/theme.js"></script>
</body>


<!-- Mirrored from layerdrops.com/oapee// by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Feb 2022 19:24:16 GMT -->
</html>