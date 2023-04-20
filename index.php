<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <title>Surface Archi: Malaysia's First Designers Surface Finishing Specialist</title>
        <meta name="description" content="Say Goodbye to Smelly Paints, Boring Tiles & Dull Ceilings! Surface Archi is the only designer surface finishes specialist that focuses on Natural Aesthetic. We Have All Your Needs For Floor, Wall & Ceiling Covered! We Produce, Import & Dealership To Give You The Ideal Finishing You Are Looking For! Contact Us Today For More Details!">
        <meta property="og:title" content="Surface Archi: Malaysia's First Designers Surface Finishing Specialist">
        <meta property="og:description" content="Say Goodbye to Smelly Paints, Boring Tiles & Dull Ceilings! Surface Archi is the only designer surface finishes specialist that focuses on Natural Aesthetic. We Have All Your Needs For Floor, Wall & Ceiling Covered! We Produce, Import & Dealership To Give You The Ideal Finishing You Are Looking For! Contact Us Today For More Details!">
        <meta property="og:url" content="<?php echo "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Surface Archi: Malaysia's First Designers Surface Finishing Specialist">
        <meta property="og:image:type" content="image/jpg">
        <meta property="og:image" content="https://surfacearchi.com/en/images/Team.jpg">
        <meta property="og:image:secure_url" content="https://surfacearchi.com/en/images/Team.jpg">
        <meta property="og:image:width" content="1391">
        <meta property="og:image:height" content="1082">
        <link rel="canonical" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>">
        
        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ephesis&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Baskervville&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css?<?php echo date("His", filemtime('css/bootstrap.min.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="css/splide.min.css?<?php echo date("His", filemtime('css/splide.min.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="css/mobile_menu.css?<?php echo date("His", filemtime('css/mobile_menu.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="css/video_module.css?<?php echo date("His", filemtime('css/video_module.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="css/custom.css?<?php echo date("His", filemtime('css/custom.css')); ?>" />
        <link rel="stylesheet" href="css/lightbox.css">
        <link rel="icon" href="images/fav-icon.png" type="image/x-icon">
        
        <!-- JS -->
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/splide.min.js"></script>
        <script src="js/lightbox.js"></script>
        <script src="js/video_module.js"></script>
        <script type="text/javascript">
            var videoWrapperId = '[data-title*="cf-vimeo-video"]';
            //var videoPlayer = null;
            var checkerMillis = 1000;
            var videoCurrentTime = 0;
            var timerInterval = null;
            var videoPlayers = [];
    
            $(function () {
                var playButtonImage =
                    "images/big-play-button.png"; //update with your own image
    
                var blocker = $(
                    '<div data-title="cf-vimeo-unmute cf-vimeo-restart cf-vimeo-remove-blocker" class="iframeBlocker"><div class="video-sound-overlay"><div class="play-button"><img src="' +
                    playButtonImage + '" /></div></div></div>');
                $('iframe', videoWrapperId).parents('.elVideo').append(blocker);
    
                $('[data-title*="cf-vimeo-remove-blocker"]').on('click', function () {
                    $(this).remove();
                });
            });
    
            $(function () {
                if (typeof Vimeo == 'undefined') {
                    $('body').append($('<script>', {
                        src: "https://player.vimeo.com/api/player.js"
                    }));
                    checkForVimeo();
                } else {
                    handleVimeoPlayer();
                }
    
                function checkForVimeo() {
                    if (typeof Vimeo == 'undefined') {
                        window.setTimeout(checkForVimeo, 100);
                    } else {
                        handleVimeoPlayer();
                    }
                }
            });
    
            function handleVimeoPlayer() {
                $(videoWrapperId).each(function () {
                    var thisThis = $(this);
                    var videoFrameSrc = $('iframe', thisThis).attr('src');
                    var newUrl = new URL(videoFrameSrc);
                    newUrl.searchParams.delete('autoplay');
                    newUrl.searchParams.delete('muted');
                    newUrl.searchParams.append('autoplay', '1');
                    newUrl.searchParams.append('muted', '1');
                    videoFrameSrc = newUrl.toString();
                    $('iframe', thisThis).attr('src', videoFrameSrc);
    
                    var videoPlayer = new Vimeo.Player($('iframe', thisThis));
                    videoPlayers.push(videoPlayer);
    
                    videoPlayer.ready().then(function () {
                        $('.elVideo', thisThis).next('iframe').remove();
    
                        $('[data-title*="cf-vimeo-unmute"]', thisThis).on('click', function () {
                            videoPlayer.setVolume(1);
                            videoPlayer.play();
                        });
    
                        $('[data-title*="cf-vimeo-restart"]', thisThis).on('click', function () {
                            videoPlayer.setCurrentTime(0);
                            videoPlayer.play();
                        });
    
                        videoPlayer.on('volumechange', function (data) {
                            var thisVolume = data.volume;
                            var thisElID = videoPlayer.element.id;
                            if (thisVolume > 0) {
                                $.each(videoPlayers, function (index, value) {
                                    var currElID = value.element.id;
    
                                    if (thisElID != currElID) {
                                        value.getVolume().then(function (volume) {
                                            if (volume > 0) {
                                                value.pause();
                                            }
                                        });
                                    }
                                });
                            }
                        });
    
                        videoPlayer.on('play', function (data) {
                            var thisVolume = 0;
                            videoPlayer.getVolume().then(function (volume) {
                                thisVolume = volume;
                            });
                            var thisElID = videoPlayer.element.id;
                            if (thisVolume > 0) {
                                $.each(videoPlayers, function (index, value) {
                                    var currElID = value.element.id;
    
                                    if (thisElID != currElID) {
                                        value.getVolume().then(function (volume) {
                                            if (volume > 0) {
                                                value.pause();
                                            }
                                        });
                                    }
                                });
                            }
                        });
                    });
                });
            }
        </script>
    </head>

    <body class="text-center">
        <div class="whatsapp">
            <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi" title="Whatsapp" target="_blank">
                <img src="images/footer/whatsapp.png" alt="whatsapp" />
            </a>
        </div>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light mobilenav" style="">
            <a class="navbar-brand" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>"><img src="images/logo/header-logo.png" height="50px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#sec4">Unique Designer Finishing for your Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sec11">Surface Archi Best Selling #1 (Vasari Signature)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sec12">Surface Archi Best Selling #2 (DIY Friendly)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sec13">Italy Made Decorative Finishes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sec20">Our Factory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sec23">The Celebrity Walls</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sec24">Application Ideas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sec28">Location</a>
                    </li>
                </ul>
            </div>
        </nav>
        <section id="sec1">
            <div>
                <a href="">
                    <img class="title" src="images/logo/header-logo.png" alt="logo">
                </a>
                <div class="my container">
                    <div class="text">
                        <p class="text_roboto_20px_23_dddddd">
                            Surface Archi —— Malaysia's First Designers
                            Surface Finishing Specialist
                        </p>
                        <p class="text_baskervville_40px_eabc70">
                            Home Transformation<span class="d-block"></span><span class="my-ml-6px text_baskervville_40px_ffffff">
                                without Spending
                            </span> RM100k <span class="text_baskervville_40px_ffffff">for Expensive IDs!</span>
                        </p>
                        <p class="second">
                            <span class="text_roboto_20px_23_dddddd">
                                (Unlock the secrets of Designer Surfaces below)
                            </span>
                            <span class="d-sm-block"></span>
                            <span class="text_roboto_20px_23_dddddd">
                                Surface Archi is the only designer surface finishes specialist that focuses on
                            </span>
                            <!--<span class="d-block d-sm-none"></span>-->
                            <img src="images/section1/icon01.png">
                            <span class="text_roboto_20px_bold_eabc70"> Natural Aesthetic</span>
                        </p>
                    </div>
                </div>
                <!--<div class="embed-responsive embed-responsive-16by9">-->
                <!--    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/662516062"-->
                <!--            allowfullscreen></iframe>-->
                <!--</div>-->
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div id="" class="col-lg-9 col-xl-7 align-self-center mpbothside-0" data-title="">
                            <div class="col-inner">
                                <div class="embed-responsive embed-responsive-16by9" id="tmp_video" data-title="cf-vimeo-video">
                                    <div class="elVideo">
                                        <div class="fluid-width-video-wrapper embed-responsive-item" style="padding-top: 56.25%;"><iframe
                                                src="https://player.vimeo.com/video/662516062"
                                            frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my2 container">
                    <div class="buttonBox">
                        <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi">
                            <button class="dgBtn">
                                <p class="text55"><span>Talk to our Specialist</span></p>
                                <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section id="sec2">
            <div class="container">
                <h2 class="text_baskervville_38px_40_191919 margin_top_40">We Proudly Serve</h2>
                <div class="brand-flex row">
                    <img class="col-3 col-md-2" src="images/section2/a&w.png" alt="a&w">
                    <img class="col-3 col-md-2" src="images/section2/adidas.png" alt="adidas">
                    <img class="col-3 col-md-2" src="images/section2/affiniti.png" alt="affiniti">
                    <img class="col-3 col-md-2" src="images/section2/amberchia.png" alt="amberchia">
                    <img class="col-3 col-md-2" src="images/section2/bata.png" alt="bata">
                    <img class="col-3 col-md-2" src="images/section2/genting.png" alt="genting">
                    <img class="col-3 col-md-2" src="images/section2/google.png" alt="google">
                    <img class="col-3 col-md-2" src="images/section2/ijm.png" alt="ijm">
                    <img class="col-3 col-md-2" src="images/section2/jkr.png" alt="jkr">
                    <img class="col-3 col-md-2" src="images/section2/mcd.png" alt="mcd">
                    <img class="col-3 col-md-2" src="images/section2/sunway.png" alt="sunway">
                    <img class="col-3 col-md-2" src="images/section2/sushiori.png" alt="sushiori">
                    <img class="col-3 col-md-2" src="images/section2/tealive.png" alt="tealive">
                    <img class="col-3 col-md-2" src="images/section2/tropicana.png" alt="tropicana">
                    <img class="col-3 col-md-2" src="images/section2/starbuck.png" alt="starbuck">
                    <img class="col-3 col-md-2" src="images/section2/boost.png" alt="boost">
                    <img class="col-3 col-md-2" src="images/section2/chanel.png" alt="chanel">
                    <img class="col-3 col-md-2" src="images/section2/coliseum.png" alt="coliseum">
                    <img class="col-3 col-md-2" src="images/section2/ecoworld.png" alt="ecoworld">
                    <img class="col-3 col-md-2" src="images/section2/erya.png" alt="erya">
                    <img class="col-3 col-md-2" src="images/section2/mini.png" alt="mini">
                    <img class="col-3 col-md-2" src="images/section2/novo.png" alt="novo">
                    <img class="col-3 col-md-2" src="images/section2/putien.png" alt="putien">
                    <img class="col-3 col-md-2" src="images/section2/samsung.png" alt="samsung">
                </div>
            </div>
        </section>
        <section id="sec3">
            <div class="container">
                <div class="row d-md-flex align-items-md-center">
                    <div class="col-md-12 col-lg-6 removePadding">
                        <!--<button class="playBtn active toVideo1"></button>-->
                        <!--<video id="myVideo" class="myVideo" playsinline>-->
                        <!--    <source src="images/section3/vasari.mp4" type="video/mp4">-->
                        <!--    Your browser does not support HTML5 video.-->
                        <!--</video>-->
                        <!--<script>-->
                        <!--    $('.toVideo1').click(function () {-->
                        <!--        console.log("click");-->
                        <!--        var video1 = document.getElementById('myVideo');-->
                        <!--        video1.addEventListener('ended', function () {-->
                        <!--            video1.load();-->
                        <!--            console.log("finish played");-->
                        <!--            $('.toVideo1').removeClass("playing");-->
                        <!--        });-->
                        <!--        if (!$('.toVideo1').hasClass("playing")) {-->
                        <!--            video1.play();-->
                        <!--            $(this).addClass("playing");-->
                        <!--        } else {-->
                        <!--            video1.pause();-->
                        <!--            $(this).removeClass("playing");-->
                        <!--        }-->
                        <!--    });-->
                        <!--</script>-->
                        <div id="ultimate-video-50"
                                class="ult-video vc_custom_50 ult-adjust-bottom-margin ultimate-video-50 ultv-50 dmt_25 mmt_10">
                                <div class="ultv-video ultv-aspect-ratio-16_9 ultv-subscribe-responsive-none"
                                    data-videotype="vimeo_video">
                                    <div class="ultv-video__outer-wrap" data-autoplay="0" data-device="false"
                                        data-iconbg="#3A3A3A" data-overcolor="" data-defaultbg="#1f1f1e"
                                        data-defaultplay="image" style="color: rgb(58, 58, 58);">
                                        <div class="ultv-video__play"
                                            data-src="https://player.vimeo.com/video/565157058?loop=0&title=0&portrait=0&byline=0&color=b94f26&autopause=0&autoplay=1">
                                            <img class="ultv-video__thumb" src="https://www.vasarimalaysia.com/assets/images/Vimeo/Metropolitan-Jack-Lee.jpg">
                                            <div class="ultv-video__play-icon  ultv-animation-none"><img
                                                    src="images/section3/play.png"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 col-lg-6 centerMe">
                        <p class="text_baskervville_38px_40_191919">Award-Winning Surface Finishes (Metropolitan)</p>
                        <p>
                            <span class="text_roboto_20px_26_191919">CEO of </span>
                            <span class="text_ephesis_58px_75_b29057">Vasari</span>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section id="sec4">
            <div class="container">
                <h2 class="text_baskervville_38px_40_191919 margin_top_40">We have all your needs for Floor, Wall & Ceiling
                    covered!</h2>
                <p class="text_roboto_18px_21_191919">We produce, Import & Dealership to Give You The Ideal Finishing You
                    are Looking for! </p>
                <div class="row d-flex justify-content-center dealer-logo">
                    <div class="col-6 col-md-4 col-lg-3">
                        <img src="images/section4/cebos.png" alt="cebos">
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <img src="images/section4/loggia.png" alt="loggia">
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <img src="images/section4/marmorino.png" alt="marmorino">
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <img src="images/section4/mokaypaint.png" alt="mokaypaint">
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <img src="images/section4/surfacearichi.png" alt="surfacearichi">
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <img src="images/section4/vasari.png" alt="vasari">
                    </div>
                </div>
                <!-- <div class="buttonBox">
                        <div class="likeButtonBox">
                            <div class="eclipse"></div>
                            <p class="text55"><span>Talk to our Specialist</span></p>
                            <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                        </div>
                    </div> -->

                <div class="buttonBox">
                    <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi">
                        <button class="dgBtn">
                            <p class="text55"><span>Talk to our Specialist</span></p>
                            <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                        </button>
                    </a>
                </div>
            </div>
        </section>
        <section id="sec5">
            <div class="container">
                <div class="row">
                    <h2 class=" text_baskervville_38px_49_ffffff">Say Goodbye to<br />Smelly Paints, Boring Tiles & Dull
                        Ceilings!</h2>
                    <p class="text_roboto_20px_23_dddddd margin_top_10">We produce, Import & Dealership to Give You The
                        Ideal Finishing You are Looking for!</p>
                    <ul class="gapme">
                        <li><span class="text_roboto_22px_42_dddddd relative_top-10">Newly VP-ed home? Or bored of the same
                                old look of your house?</span></li>
                        <li><span class="text_roboto_22px_42_dddddd relative_top-10">Thinking of transforming your home into
                                a Designer Home?</span></li>
                        <li><span class="text_roboto_22px_42_dddddd relative_top-10">Here is what you can choose
                                from!</span></li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="sec6">
            <div class="container">
                <div class="row">
                    <h2 class="text_baskervville_46px_59_191919 margin_top_40">Designer Wall Finishes <span
                            class="text_ephesis_58px_75_b29057">Internal</span></h2>
                    <p class="text_roboto_22px_26_191919">We produce, Import & Dealership to Give You The Ideal Finishing
                        You are Looking for!</p>
                    <div class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section6/17.jpg" alt="17" />
                                        <br />
                                        <img src="images/section6/18.jpg" alt="18" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section6/19.jpg" alt="19" />
                                        <br />
                                        <img src="images/section6/20.jpg" alt="20" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section6/21.jpg" alt="21" />
                                        <br />
                                        <img src="images/section6/23.jpg" alt="23" />

                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section6/24.jpg" alt="24" />
                                        <br />
                                        <img src="images/section6/25.jpg" alt="25" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section6/26.jpg" alt="26" />
                                        <br />
                                        <img src="images/section6/27.jpg" alt="27" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section6/28.jpg" alt="28" />
                                        <br />
                                        <img src="images/section6/29.jpg" alt="29" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section6/30.jpg" alt="30" />
                                        <br />
                                        <img src="images/section6/31.jpg" alt="31" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section6/32.jpg" alt="32" />
                                        <br />
                                        <img src="images/section6/33.jpg" alt="33" />
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            new Splide('#sec6 .splide', {
                type: 'loop',
                perPage: 3,
                autoplay: true,
                speed: '1000',
                pauseOnHover: true,
                gap: {
                    row: '1rem',
                    col: '1rem'
                },
                breakpoints: {
                    640: {
                        perPage: 1,
                        focus: 'center'
                    }
                },
                interval: 3000
            }).mount();
        </script>
        <section id="sec7">
            <div class="container">
                <div class="row">
                    <h2 class="text_baskervville_46px_59_191919 margin_top_40">Designer Wall Finishes <span
                            class="text_ephesis_58px_75_b29057">External</span></h2>
                    <p class="text_roboto_22px_26_191919">Pebble-stones like finishes for your exterior wall</p>
                    <div class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section7/external1.jpg" alt="external1" />
                                        <br />
                                        <img src="images/section7/external2.jpg" alt="external2" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section7/external3.jpg" alt="external3" />
                                        <br />
                                        <img src="images/section7/external4.jpg" alt="external4" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section7/external5.jpg" alt="external5" />
                                        <br />
                                        <img src="images/section7/external6.jpg" alt="external6" />

                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section7/external7.jpg" alt="external7" />
                                        <br />
                                        <img src="images/section7/external8.jpg" alt="external8" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section7/external9.jpg" alt="external9" />
                                        <br />
                                        <img src="images/section7/external10.jpg" alt="external10" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section7/external11.jpg" alt="external11" />
                                        <br />
                                        <img src="images/section7/external12.jpg" alt="external12" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section7/external13.jpg" alt="external13" />
                                        <br />
                                        <img src="images/section7/external14.jpg" alt="external14" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section7/external15.jpg" alt="external15" />
                                        <br />
                                        <img src="images/section7/external16.jpg" alt="external16" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section7/external17.jpg" alt="external17" />
                                        <br />
                                        <img src="images/section7/external18.jpg" alt="external18" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section7/external19.jpg" alt="external19" />
                                        <br />
                                        <img src="images/section7/external20.jpg" alt="external20" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section7/external21.jpg" alt="external21" />
                                        <br />
                                        <img src="images/section7/external22.jpg" alt="external22" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section7/external23.jpg" alt="external23" />
                                        <br />
                                        <img src="images/section7/external24.jpg" alt="external24" />
                                    </div>
                                </li>
                                <li class="splide__slide card">
                                    <div>
                                        <img src="images/section7/external25.jpg" alt="external25" />
                                        <br />
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            new Splide('#sec7 .splide', {
                type: 'loop',
                perPage: 3,
                autoplay: true,
                speed: '1000',
                pauseOnHover: true,
                gap: {
                    row: '1rem',
                    col: '1rem'
                },
                breakpoints: {
                    640: {
                        perPage: 1,
                        focus: 'center'
                    }
                },
                interval: 3000
            }).mount();
        </script>
        <section id="sec8">
            <div class="container">
                <div class="row">
                    <h2 class="text_baskervville_46px_59_191919 margin_top_40">Designer <span
                            class="text_ephesis_58px_75_b29057">Ceiling</span> Finishes</h2>
                    <p class="text_roboto_22px_26_191919">Creative colored texture that dress up your plaster ceiling</p>
                    <div class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide card">
                                    <img src="images/section8/img01.jpg" alt="img01" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section8/img02.jpg" alt="img02" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section8/img03.jpg" alt="img03" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section8/img04.jpg" alt="img04" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section8/img05.jpg" alt="img05" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            new Splide('#sec8 .splide', {
                type: 'loop',
                perPage: 3,
                autoplay: true,
                pauseOnHover: true,
                speed: '1000',
                gap: {
                    row: '1rem',
                    col: '1rem'
                },
                breakpoints: {
                    640: {
                        perPage: 1,
                        focus: 'center'
                    }
                },
                interval: 3000
            }).mount();
        </script>
        <section id="sec9">
            <div class="row">
                <h2 class=" text_baskervville_38px_49_ffffff margin_top_40">Designer <span
                        class="text_ephesis_58px_75_b29057">Floor</span> Finishes</h2>
                <p class="text_roboto_22px_26_191919">Durable for flooring with polished marble-like effect.</p>
                <div class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide card">
                                <img src="images/section9/img01.jpg" alt="img01" />
                            </li>
                            <li class="splide__slide card">
                                <img src="images/section9/img02.jpg" alt="img02" />
                            </li>
                            <li class="splide__slide card">
                                <img src="images/section9/img03.jpg" alt="img03" />
                            </li>
                            <li class="splide__slide card">
                                <img src="images/section9/img04.jpg" alt="img04" />
                            </li>
                            <li class="splide__slide card">
                                <img src="images/section9/img05.jpg" alt="img05" />
                            </li>
                            <li class="splide__slide card">
                                <img src="images/section9/img06.jpg" alt="img06" />
                            </li>
                            <li class="splide__slide card">
                                <img src="images/section9/img07.jpg" alt="img07" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="buttonBox container">
                <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi">
                    <button class="dgBtn">
                        <p class="text55"><span>Talk to our Specialist</span></p>
                        <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                    </button>
                </a>
            </div>
        </section>
        <script>
            new Splide('#sec9 .splide', {
                type: 'loop',
                perPage: 3,
                autoplay: true,
                pauseOnHover: true,
                speed: '1000',
                gap: {
                    row: '1rem',
                    col: '1rem'
                },
                breakpoints: {
                    640: {
                        perPage: 1,
                        focus: 'center'
                    }
                },
                interval: 3000
            }).mount();
        </script>
        <section id="sec10">
            <div class="container">
                <div class="row">
                    <h2 class="text_baskervville_46px_59_191919">Bathroom <span
                            class="text_ephesis_60px_78_b29057">Refurbishment</span></h2>
                    <p class="text_roboto_22px_26_191919">Direct application on tiles finishing without any hacking works.
                    </p>
                    <div class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide card">
                                    <img src="images/section10/bathroom1.jpg" alt="bathroom1" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section10/bathroom2.jpg" alt="bathroom2" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section10/bathroom3.jpg" alt="bathroom3" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section10/bathroom4.jpg" alt="bathroom4" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section10/bathroom5.jpg" alt="bathroom5" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section10/bathroom6.jpg" alt="bathroom6" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section10/bathroom7.jpg" alt="bathroom7" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section10/bathroom8.jpg" alt="bathroom8" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section10/bathroom9.jpg" alt="bathroom9" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section10/bathroom10.jpg" alt="bathroom10" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="buttonBox">
                    <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi">
                        <button class="dgBtn">
                            <p class="text55"><span>Talk to our Specialist</span></p>
                            <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                        </button>
                    </a>
                </div>
            </div>
        </section>
        <script>
            new Splide('#sec10 .splide', {
                type: 'loop',
                perPage: 3,
                autoplay: true,
                pauseOnHover: true,
                speed: '1000',
                gap: {
                    row: '1rem',
                    col: '1rem'
                },
                breakpoints: {
                    640: {
                        perPage: 1,
                        focus: 'center'
                    }
                },
                interval: 3000
            }).mount();
        </script>
        <section id="sec11">
            <div class="container">
                <div class="row">
                    <h2 class="text_baskervville_38px_40_191919 margin_top_40 mobileBreak">
                        2021 Surface Archi - 
                        <img class="img1" src="images/section11/icon11.png" alt="icon11" />
                        #1 Best Selling
                    </h2>
                    <p class="text_roboto_18px_21_191919">Durable for flooring with polished marble-like effect.</p>

                    <h2 class="text_baskervville_38px_40_191919">
                        <span class="text_ephesis_58px_75_b29057">Vasari</span>
                        - Veneziano
                    </h2>
                    <p class="text_roboto_18px_21_191919">
                        Minimal to light texture / Medium to high sheen / Dramatic color variation
                        <br />
                        Simple yet exuding the artistic and natural look for your designer home
                    </p>
                </div>
            </div>
            <div class="container removePaddingMobile">
                <div id="wrapper" class="grid-wrapper">
                    <div>
                        <a href="images/section11/img01.jpg" class="lightbox_trigger removePadding">
                            <img src="images/section11/img01.jpg" alt="img01" />
                        </a>
                    </div>
                    <div class="tall">
                        <a href="images/section11/img03.jpeg" class="lightbox_trigger">
                            <img src="images/section11/img03.jpeg" alt="img03">
                        </a>
                    </div>
                    <div class="wide">
                        <a href="images/section11/img04.jpeg" class="lightbox_trigger">
                            <img src="images/section11/img04.jpeg" alt="img04" />
                        </a>
                    </div>
                    <div>
                        <a href="images/section11/img02.jpg" class="lightbox_trigger">
                            <img src="images/section11/img02.jpg" alt="img02" />
                        </a>
                    </div>
                    <div>
                        <a href="images/section11/img05.jpg" class="lightbox_trigger">
                            <img src="images/section11/img05.jpg" alt="img05">
                        </a>
                    </div>
                    <div>
                        <a href="images/section11/img06.jpg" class="lightbox_trigger">
                            <img src="images/section11/img06.jpg" alt="img06">
                        </a>
                    </div>
                    <div>
                        <a href="images/section11/img07.jpg" class="lightbox_trigger">
                            <img src="images/section11/img07.jpg" alt="img07" />
                        </a>
                    </div>
                    <div class="tall">
                        <a href="images/section11/img09.jpg" class="lightbox_trigger">
                            <img src="images/section11/img09.jpg" alt="img09">
                        </a>
                    </div>
                    <div class="wide">
                        <a href="images/section11/img10.jpg" class="lightbox_trigger">
                            <img src="images/section11/img10.jpg" alt="img10" />
                        </a>
                    </div>
                    <div>
                        <a href="images/section11/img08.jpeg" class="lightbox_trigger">
                            <img src="images/section11/img08.jpeg" alt="img08" />
                        </a>
                    </div>
                    <div>
                        <a href="images/section11/img11.jpg" class="lightbox_trigger">
                            <img src="images/section11/img11.jpg" alt="img11">
                        </a>
                    </div>
                    <div>
                        <a href="images/section11/img12.jpg" class="lightbox_trigger">
                            <img src="images/section11/img12.jpg" alt="img12">
                        </a> 
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="buttonBox">
                    <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi">
                        <button class="dgBtn">
                            <p class="text55"><span>Talk to our Specialist</span></p>
                            <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                        </button>
                    </a>
                </div>
            </div>
            <!-- <div id="wrapper">
                    <h1>Super Simple Lightbox Window</h1>
                    <p>Our super simple lightbox window demo. Here are the images, courtesy of <a href="https://mixkit.co/free-stock-art/" target="_blank">Mixkit</a>:
                    <ul>
                    <li>
                    <a href="https://assets.codepen.io/210284/cat-1.jpg" class="lightbox_trigger">
                    Picture 1
                    </a>
                    </li>
                    <li>
                    <a href="https://assets.codepen.io/210284/hand.jpg" class="lightbox_trigger">
                    Picture 2
                    </a>
                    </li>
                    <li>
                    <a href="https://assets.codepen.io/210284/cat-2.jpg" class="lightbox_trigger">
                    Picture 3
                    </a>
                    </li>
                    <li>
                    <a href="https://assets.codepen.io/210284/woman.jpg" class="lightbox_trigger">
                    Picture 4
                    </a>
                    </li>
                    </ul>
                     </p>
                </div> -->
        </section>
        <section id="sec12">
            <div class="container">
                <div class="row">
                    <h2 class="text_baskervville_38px_40_191919 margin_top_40 mobileBreak">
                        2021 Surface Archi -
                        <img class="img1" src="images/section12/best-icon1.png" alt="best-icon1" />
                        #2 Best Selling
                    </h2>
                    <p class="text_roboto_18px_21_191919">
                        Durable for flooring with polished marble-like effect.</p>

                    <h2 class="text_baskervville_38px_40_191919"><span class="text_ephesis_58px_75_b29057">Vasari</span> -
                        Lime Paint</h2>
                    <p class="text_roboto_18px_21_191919">
                        Light texture / Matte to Soft Sheen / Soft Color Variation / Indoor
                        <br />
                        Be the artisans yourself! You can now DIY your designer wall!
                    </p>
                </div>
            </div>
            <div class="container removePaddingMobile">
                <div id="wrapper" class="grid-wrapper">
                    <div>
                        <a href="images/section12/img01.jpg" class="lightbox_trigger">
                            <img src="images/section12/img01.jpg" alt="img01" />
                        </a>
                    </div>
                    <div class="tall">
                        <a href="images/section12/img02.jpg" class="lightbox_trigger">
                            <img src="images/section12/img02.jpg" alt="img02">
                        </a>
                    </div>
                    <div class="wide">
                        <a href="images/section12/img03.jpg" class="lightbox_trigger">
                            <img src="images/section12/img03.jpg" alt="img03" />
                        </a>
                    </div>
                    <div class="tall">
                        <a href="images/section12/img04.jpg" class="lightbox_trigger">
                            <img src="images/section12/img04.jpg" alt="img04" />
                        </a>
                    </div>
                    <div>
                        <a href="images/section12/img05.jpg" class="lightbox_trigger">
                            <img src="images/section12/img05.jpg" alt="img05">
                        </a>
                    </div>
                    <div class="wide">
                        <a href="images/section12/img05.jpg" class="lightbox_trigger">
                            <img src="images/section12/img06.jpg" alt="img06">
                        </a>
                    </div>

                </div>
                <!-- <div class="grid-wrapper">
                        <div>
                            <img src="images/section12/img01.jpg" alt="img01" />
                        </div>
                        <div class="tall">
                            <img src="images/section12/img02.jpg" alt="img02">
                        </div>
                        <div class="wide">
                            <img src="images/section12/img03.jpg" alt="img03" />
                        </div>
                        <div class="tall">
                            <img src="images/section12/img04.jpg" alt="img04" />
                        </div>
                        <div>
                            <img src="images/section12/img05.jpg" alt="img05">
                        </div>
                        <div class="wide">
                            <img src="images/section12/img06.jpg" alt="img06">
                        </div>
                    </div> -->
            </div>
            <div class="container">
                <div class="buttonBox">
                    <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi">
                        <button class="dgBtn">
                            <p class="text55"><span>Talk to our Specialist</span></p>
                            <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                        </button>
                    </a>
                </div>
            </div>
        </section>
        <section id="sec13">
            <div class="container">
                <div class="row">
                    <h2 class="text_baskervville_38px_40_191919 margin_top_40 my-pb-3">2021 Surface Archi - Italy Imported
                        Products</h2>
                    <h2 class="text_baskervville_38px_40_191919">
                        Cebos Color - Decorative
                        <span class="text_ephesis_58px_75_b29057">Paint</span>
                    </h2>
                    <p class="text_roboto_18px_21_191919">
                        Highly specialized in formulates and produces a wide range of quality decorative finishes.
                        Decorative designer wall that instantly spices up your living space.
                    </p>
                    <div id="part1" class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide card">
                                    <img src="images/section13/img1.jpg" alt="img1" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img2.jpg" alt="img2" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img3.jpg" alt="img3" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img4.jpg" alt="img4" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img5.jpg" alt="img5" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img6.jpg" alt="img6" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img7.jpg" alt="img7" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img8.jpg" alt="img8" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img9.jpg" alt="img9" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h2 class="text_baskervville_38px_40_191919 margin_top_40">Loggia - 3D
                        <span class="text_ephesis_58px_75_b29057">Plasma</span>
                    </h2>
                    <p class="text_roboto_18px_21_191919">Wide range of coating products for walls, floors, and furniture,
                        that are versatile, innovative, and patented.</p>
                    <div id="part2" class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide card">
                                    <img src="images/section13/img10.jpg" alt="img10" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img11.jpg" alt="img11" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img12.jpg" alt="img12" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img13.jpg" alt="img13" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img14.jpg" alt="img14" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img15.jpg" alt="img15" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img16.jpg" alt="img16" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img17.jpg" alt="img17" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section13/img18.jpg" alt="img18" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="buttonBox">
                    <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi">
                        <button class="dgBtn">
                            <p class="text55"><span>Talk to our Specialist</span></p>
                            <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                        </button>
                    </a>
                </div>
            </div>
        </section>
        <script>
            new Splide('#sec13 #part1.splide', {
                type: 'loop',
                perPage: 3,
                autoplay: true,
                speed: '1000',
                pauseOnHover: true,
                gap: {
                    row: '1rem',
                    col: '1rem'
                },
                breakpoints: {
                    640: {
                        perPage: 1,
                        focus: 'center'
                    }
                },
                interval: 3000
            }).mount();
            new Splide('#sec13 #part2.splide', {
                type: 'loop',
                perPage: 3,
                autoplay: true,
                pauseOnHover: true,
                speed: '1000',
                gap: {
                    row: '1rem',
                    col: '1rem'
                },
                breakpoints: {
                    640: {
                        perPage: 1,
                        focus: 'center'
                    }
                },
                interval: 3000
            }).mount();
        </script>
        <section id="sec14">
            <div class="container">
                <div class="row">
                    <h2 class="text_baskervville_38px_40_191919">Commercial Project</h2>
                    <div id="part1" class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide card">
                                    <img src="images/section14/img1.jpg" alt="img1" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section14/img2.jpg" alt="img2" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section14/img3.jpg" alt="img3" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section14/img4.jpg" alt="img4" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section14/img5.jpg" alt="img5" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section14/img6.jpg" alt="img6" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section14/img7.jpg" alt="img7" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section14/img8.jpg" alt="img8" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section14/img9.jpg" alt="img9" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section14/img10.jpg" alt="img10" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section14/img11.jpg" alt="img11" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section14/img12.jpg" alt="img12" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            new Splide('#sec14 .splide', {
                type: 'loop',
                perPage: 1,
                autoplay: true,
                pauseOnHover: true,
                speed: '1000',
                gap: {
                    row: '1rem',
                    col: '1rem'
                },
                breakpoints: {
                    640: {
                        perPage: 1,
                        focus: 'center'
                    }
                },
                interval: 3000
            }).mount();
        </script>
        <section id="sec15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 padding_80">
                        <h2 class=" text_baskervville_38px_49_ffffff text_align_left">Vasari Venetian Plaster - The “ONLY”
                            wall finishes that provide you</h2>
                        <h2 class="text_baskervville_38px_49_b29057 text_align_left">Aesthetics that Cools your Home </h2>
                        <p class="text_roboto_18px_21_dddddd text_align_left">If you enjoy being in a refreshing natural
                            atmosphere,</p>
                        <p class="text_roboto_18px_21_dddddd text_align_left">Well, we’ve got good news for you...</p>
                        <p class="text_roboto_18px_21_dddddd text_align_left">You can emulate that very atmosphere in your
                            home by applying【Venetian Plaster】from Vasari!</p>
                        <p class="text_roboto_18px_21_dddddd text_align_left">Your walls will ‘work’ throughout the day to
                            provide the naturally cooling atmosphere subtly - especially at night!</p>
                        <p class="text_roboto_18px_21_dddddd text_align_left">You can’t tell it, but you will definitely
                            feel the difference throughout the day</p>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </section>
        <section id="sec16">
            <div class="container margin_top_40 padding_80">
                <div class="row">
                    <div class="col-lg-7">
                        <h2 class="text_baskervville_38px_40_191919 text_align_left">What is the Magic behind Vasari’s
                            Venetian Plaster?</h2>
                        <p class="text_roboto_18px_30_1b1b1b text_align_left">In fact, the ‘natural cooling atmosphere’ that
                            surrounds you is due to the high lime and marble purity content.</p>
                        <p class="text_roboto_18px_30_1b1b1b text_align_left">
                            By nature, limestone absorbs carbon dioxide (CO2) and repels water vapour...
                            <br />
                            ...causing it to exudes cool air, like being in a cave
                        </p>
                        <p class="text_roboto_18px_30_1b1b1b text_align_left">In 2003, Vasari successfully launched the
                            Venetian Plaster series that is made </p>

                        <p class="text_roboto_18px_21_a46c10 text_align_left">
                            <img src="images/section16/icon02.png">
                            100% of natural elements (lime and marble dust) and it’s VOC Free.
                        </p>

                        <div class="row bg_ededed">
                            <div class="col-lg-9">
                                <p class="text_roboto_17px_28_700_1b1b1b text_align_left">Fyi, VOC (Volatile organic
                                    compounds)</p>
                                <p class="text_roboto_17px_28_400_1b1b1b text_align_left">Every liquified product such as
                                    paint, texture paint, glue releases harmful substances day in day out,</p>
                                <p class="text_roboto_17px_28_700_1b1b1b text_align_left">THAT IS WHY PAINT SMELLS SO BAD
                                    and it is detrimental for your health!!</p>
                            </div>
                            <div class="col-lg-3"><img src="images/section16/icon01.png"></div>
                        </div>
                    </div>
                    <div class="moveFirst col-lg-5">
                        <img class="width_100" src="images/section16/img01.png">
                    </div>
                </div>

                <div class="row margin_top_40">
                    <div class="col-lg-7"><img class="width_100" src="images/section16/img02.png"></div>
                    <div class="col-lg-5">
                        <h2 class="text_ephesis_58px_75_b29057 text_align_left my-mt-5">Vasari Venetian</h2>
                        <p class="text_roboto_18px_32_1b1b1b text_align_left">With that said...<br />Vasari Venetian Plaster
                            can be described as</p>
                        <p class="text_roboto_28px_28_a46c10 text_align_left">the largest air diffuser for your home…</p>
                        <p class="text_roboto_18px_32_1b1b1b text_align_left">It constantly improves the indoor air quality
                            by absorbing unwanted CO2 and maintaining a low wall temperature which eventually gives you a
                            lower room temperature...</p>
                    </div>
                </div>

                <div class="row margin_top_40">
                    <div class="col-lg-6">
                        <h2 class="text_ephesis_58px_75_b29057 text_align_left my-mt-3">Venetian Plaster</h2>
                        <p class="text_roboto_18px_32_1b1b1b">Though we did not invent Venetian plaster, we have definitely
                        </p>
                        <p class="text_roboto_18px_32_a46c10">
                            improved it...
                        </p>
                        <p class="text_roboto_18px_32_1b1b1b">Our Venetian Plaster aims to deliver you a home that is
                            visually aesthetic and improves health!</p>

                        <p class="text_roboto_18px_32_1b1b1b">
                            and we are proud to say that Vasari is the
                            <span class="text_roboto_18px_28_a46c10">first and largest</span>
                            Venetian Plaster Manufacturer in South East Asia…
                        </p>
                    </div>
                    <div class="moveFirst col-lg-6">
                        <img class="width_100" src="images/section16/img03.png" alt="img">
                    </div>
                </div>
            </div>
        </section>
        <section id="sec17">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mapBackground">
                    </div>
                    <div class="col-lg-6">
                        <div class="text_align_left_m margin_top_40">
                            <h2 class="text_baskervville_38px_40_191919">Distribution to South East Asia</h2>
                            <img class="map text_align_left" src="images/section17/flag1.png" alt="flag1" />
                            <img class="map text_align_left" src="images/section17/flag2.png" alt="flag2" />
                            <img class="map text_align_left" src="images/section17/flag3.png" alt="flag3" />
                            <img class="map text_align_left" src="images/section17/flag4.png" alt="flag4" />
                            <img class="map text_align_left" src="images/section17/flag5.png" alt="flag5" />
                            <img class="map text_align_left margin0" src="images/section17/flag6.png" alt="flag6" />
                        </div>
                        <div class="buttonBox marginSpeacial1 text-left">
                            <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi">
                                <button class="dgBtn">
                                    <p class="text55"><span>Talk to our Specialist</span></p>
                                    <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span>
                                    </p>
                                </button>
                            </a>
                        </div>
                        <!-- <div class="buttonBox">
                                <div class="likeButtonBox marginSpeacial1">
                                    <div class="eclipse"></div>
                                    <p class="text55"><span>Talk to our Specialist</span></p>
                                    <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
        </section>
        <section id="sec18">
            <div class="container">
                <div class="row my-dis-flex">
                    <div class="col-lg-4">
                        <h2 class="text_baskervville_38px_49_191919">Recognition & Events</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <img src="images/section18/logo01.png" alt="logo01" />
                            </div>
                            <div class="col-3">
                                <img src="images/section18/logo04.png" alt="logo04" />
                            </div>
                            <div class="col-3">
                                <img src="images/section18/logo02.png" alt="logo02" />
                            </div>
                            <div class="col-3">
                                <img src="images/section18/logo03.png" alt="logo03" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="sec19">
            <div class="container">
                <div class="row my-sec19-pad">
                    <h2 class="text_baskervville_38px_49_191919">As Seen On</h2>
                    <!-- <div class="col-lg-1">&nbsp;</div> -->
                    <div class="col-4 col-md-2 width80">
                        <img src="images/section19/tv7.png" alt="designspeak">
                    </div>
                    <div class="col-4 col-md-2 width80">
                        <img src="images/section19/designspeak.png" alt="designspeak">
                    </div>
                    <div class="col-4 col-md-2 width80">
                        <img src="images/section19/viral-cham.png" alt="viral-cham">
                    </div>
                    <div class="col-4 col-md-2 width80">
                        <img src="images/section19/juice.png" alt="juice">
                    </div>
                    <div class="col-4 col-md-2 width80">
                        <img src="images/section19/houzz.png" alt="houzz">
                    </div>
                    <div class="col-4 col-md-2 width92">
                        <img class="width_100 padding_30" src="images/section19/lifestyle-asia.png" alt="lifestyle-asia">
                    </div>
                    <div class="col-3 col-md-3 width70">
                        <img class="width_100 padding_30" src="images/section19/homex.png" alt="homex">
                    </div>
                    <div class="col-3 col-md-3 width70">
                        <img class="width_100 padding_30" src="images/section19/habitat.png" alt="habitat">
                    </div>
                    <div class="col-3 col-md-3 width70">
                        <img class="width_100 padding_30" src="images/section19/tallypress.png" alt="tallypress">
                    </div>
                    <div class="col-3 col-md-3 width70">
                        <img class="width_100 padding_30" src="images/section19/siraplimau.png" alt="siraplimau">
                    </div>
                </div>
                <div class="facebook-responsive">
                    <iframe class="embed-responsive-item"
                            src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fwatch%2F%3Fv%3D787351711628841&width=500&show_text=false&appId=636632939829837&height=275"
                            width="500" height="275" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                            allowfullscreen="true" allow="autoplay; clipboard-write; 
                            encrypted-media; picture-in-picture; 
                            web-share" allowFullScreen="true"></iframe>
                    <!-- sample video -->
                    <!-- <iframe class="embed-responsive-item" 
                                src="images/section23/Lizz Chloe Video.mp4" 
                                width="500" height="275" 
                                style="border:none;overflow:hidden" 
                                scrolling="no" frameborder="0" allowfullscreen="true" 
                                allow="autoplay; clipboard-write; 
                                encrypted-media; picture-in-picture; 
                                web-share" allowFullScreen="true"></iframe> -->
                </div>
                <div class="buttonBox">
                    <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi">
                        <button class="dgBtn">
                            <p class="text55"><span>Talk to our Specialist</span></p>
                            <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                        </button>
                    </a>
                </div>
            </div>
        </section>
        <section id="sec20">
            <div class="container">
                <div class="row">
                    <h2 class="margin_top_80 text_baskervville_38px_49_ffffff">Who Are We?</h2>
                    <p class="text_roboto_20px_23_dddddd">The Biggest Lime Plaster Factory in Malaysia. Do not worry about
                        substandard materials.</p>

                </div>
            </div>
            <div class="container removePaddingMobile">
                <img class="width_100" src="images/section20/img1.jpg" alt="img1.jpg" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 removePaddingMobile">
                        <img class="width_100 margin_top_30 margin_bottom_30" src="images/section20/img2.jpg" alt="img2">
                    </div>
                    <div class="col-lg-6 my-mt-2">
                        <h2 class="text_ephesis_58px_75_b29057 text_align_left">28years</h2>
                        <h2 class="text_baskervville_38px_49_ffffff text_align_left">in Building Materials Industry</h2>
                        <p class="text_roboto_18px_21_dddddd text_align_left">Surface Archi Core Product, Vasari originated
                            in California USA.</p>
                        <p class="text_roboto_18px_21_dddddd text_align_left">In serving our customers better, we have
                            jointly set up a Venetian Plaster plant in Rawang, Selangor!</p>
                        <p class="text_roboto_18px_21_dddddd text_align_left">Just so you know, our plant at Rawang has been
                            around for more than
                            <span class="text_roboto_18px_21_a46c10">28 years...</span>

                        </p>
                        <p class="text_roboto_18px_21_dddddd text_align_left">and we were the first in Malaysia to introduce
                            putty lime and lime-based plastering & skim coating products back in 1993.</p>
                        <p class="text_roboto_18px_21_dddddd text_align_left">(In case you do not know what a “skim coat”
                            is, it is the product that makes your wall silky smooth…)</p>
                    </div>
                </div>
                <div class="row addPadding">
                    <div class="col-lg-2_4 removePaddingMobile">
                        <img class="width_100" src="images/section20/img5.jpg" alt="img5">
                    </div>
                    <div class="col-lg-2_4 removePaddingMobile">
                        <img class="width_100" src="images/section20/img6.jpg" alt="img6">
                    </div>
                    <div class="col-lg-4_6 removePaddingMobile">
                        <img class="width_100" src="images/section20/img3.jpg" alt="img3">
                    </div>
                    <div class="col-lg-4_6 margin_bottom_80 removePaddingMobile">
                        <img class="width_100" src="images/section20/img4.jpg" alt="img4">
                    </div>
                </div>
            </div>
        </section>
        <section id="sec21">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 margin_top_40">
                        <h2 class="text_baskervville_38px_49_191919">We are not Plasterers, we are Artisans..</h2>
                        <img class="img1" src="images/section21/img1.png" alt="img1">
                    </div>
                </div>
                <div class="row margin_top_40">
                    <div class="col-lg-6 mobile padding_40 ">
                        <h2 class="text_ephesis_58px_75_b29057 text_align_left">SurfaceArchi</h2>
                        <p class="text_roboto_18px_26_1b1b1b text_align_left">Unlike conventional cement plasters,</p>
                        <p class="text_roboto_18px_26_1b1b1b text_align_left">the finishing products offered by Surface
                            Archi is highly depend on workmanship.</p>
                        <p class="text_roboto_18px_26_1b1b1b text_align_left">They are troweled layer by layer until their
                            respective characteristic is achieved.</p>
                        <p class="text_roboto_18px_26_1b1b1b text_align_left">No words can describe it until you experience
                            it for yourself...</p>
                    </div>
                    <div class="col-lg-6 padding_40 moveFirst"><img class="img2" src="images/section21/img2.png"></div>
                </div>
                <div class="row margin_top_40">
                    <div class="col-lg-6 padding_40 padding-minus">
                        <div class="splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide card">
                                        <img src="images/section21/slider1.png" alt="slider1" />
                                    </li>
                                    <li class="splide__slide card">
                                        <img src="images/section21/slider2.png" alt="slider2" />
                                    </li>
                                    <li class="splide__slide card">
                                        <img src="images/section21/slider3.png" alt="slider3" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 padding_40">
                        <p class="text_roboto_18px_26_1b1b1b text_align_left">In order to maintain the artistic look and
                            feel..</p>
                        <p class="text_roboto_18px_26_1b1b1b text_align_left">All of our applicators have undergone
                            necessary training before carrying out the work on-site..</p>
                        <p class="text_roboto_18px_26_1b1b1b text_align_left">Not only are they required to
                            <span class="text_roboto_18px_26_a46c10">attend training</span>,
                        </p>
                        <p class="text_roboto_18px_26_1b1b1b text_align_left">They must also be able to create the standard
                            finishing by themselves..</p>
                        <p class="text_roboto_18px_26_1b1b1b text_align_left">Applicators that are not up to par will not be
                            put to attend the actual job on-site...</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 padding_40">
                        <p class="text_roboto_18px_26_1b1b1b text_align_left">Most Surface Archi Products also required
                            dedicated tools (
                            <span class="text_roboto_18px_26_a46c10">Marmorino Tools</span>
                            from Italy) to create the respective textures and designs..
                        </p>
                        <p class="text_roboto_18px_26_1b1b1b text_align_left">and the trowels are specifically made with a
                            full 304 stainless steel body and polished edges... </p>
                        <p class="text_roboto_18px_26_1b1b1b text_align_left">With this lasting metal and ergonomic design
                            of the trowel,</p>
                        <p class="text_roboto_18px_26_1b1b1b text_align_left">it is able to achieve a sturdy yet agile
                            characteristic for the applicator to handle adroitly...
                        <div class="buttonBox marginSpeacial2">
                            <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi">
                                <button class="dgBtn">
                                    <p class="text55"><span>Talk to our Specialist</span></p>
                                    <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span>
                                    </p>
                                </button>
                            </a>
                        </div>
                        <!-- <div class="buttonBox">
                                <div class="likeButtonBox marginSpeacial2">
                                    <div class="eclipse"></div>
                                    <p class="text55"><span>Talk to our Specialist</span></p>
                                    <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                                </div>
                            </div> -->
                    </div>
                    <div class="col-lg-6 padding_40 moveFirst"><img class="width_100" src="images/section21/img3.png"></div>
                </div>
            </div>
        </section>
        <script>
            new Splide('#sec21 .splide', {
                type: 'loop',
                perPage: 1,
                autoplay: true,
                pauseOnHover: true,
                speed: '1000',
                gap: {
                    row: '1rem',
                    col: '1rem'
                },
                breakpoints: {
                    640: {
                        perPage: 1,
                        focus: 'center'
                    }
                },
                interval: 3000
            }).mount();
        </script>
        <section id="sec22">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 removePaddingMobile">
                        <h2 class="text_baskervville_38px_49_ffffff margin_top_80 my-mb-3">Meet our applicators</h2>
                        <div class="embed-responsive embed-responsive-16by9">
                            <div class="facebook-responsive">
                                <iframe
                                    src="https://www.facebook.com/plugins/video.php?height=317&href=https://www.facebook.com/374999566191787/videos/588445289210694&show_text=false&width=560&t=0"
                                    width="560" height="317" style="border:none;overflow:hidden" scrolling="no"
                                    frameborder="0" allowfullscreen="true"
                                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                    allowFullScreen="true"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="row">-->
                <!--    <div class="col-lg-6 removePaddingMobile">-->
                <!--        <div class="facebook-responsive">-->
                <!--            <iframe-->
                <!--                src="https://www.facebook.com/plugins/video.php?height=317&href=https://www.facebook.com/374999566191787/videos/256118908742898&show_text=false&width=560&t=0"-->
                <!--                width="560" height="317" style="border:none;overflow:hidden" scrolling="no" frameborder="0"-->
                <!--                allowfullscreen="true"-->
                <!--                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"-->
                <!--                allowFullScreen="true"></iframe>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="col-lg-6 removePaddingMobile">-->
                <!--        <div class="facebook-responsive">-->
                <!--            <iframe-->
                <!--                src="https://www.facebook.com/plugins/video.php?height=317&href=https://www.facebook.com/374999566191787/videos/2826835370660969&show_text=false&width=560&t=0"-->
                <!--                width="560" height="317" style="border:none;overflow:hidden" scrolling="no" frameborder="0"-->
                <!--                allowfullscreen="true"-->
                <!--                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"-->
                <!--                allowFullScreen="true"></iframe>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="row">-->
                <!--    <div class="col-lg-6 removePaddingMobile">-->
                <!--        <div class="facebook-responsive">-->
                <!--            <iframe-->
                <!--                src="https://www.facebook.com/plugins/video.php?height=317&href=https://www.facebook.com/374999566191787/videos/478404756459796&show_text=false&width=560&t=0"-->
                <!--                width="560" height="317" style="border:none;overflow:hidden" scrolling="no" frameborder="0"-->
                <!--                allowfullscreen="true"-->
                <!--                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"-->
                <!--                allowFullScreen="true"></iframe>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="col-lg-6 margin_bottom_80 removePaddingMobile">-->
                <!--        <div class="facebook-responsive">-->
                <!--            <iframe-->
                <!--                src="https://www.facebook.com/plugins/video.php?height=317&href=https://www.facebook.com/374999566191787/videos/212990477192167&show_text=false&width=560&t=0"-->
                <!--                width="560" height="317" style="border:none;overflow:hidden" scrolling="no" frameborder="0"-->
                <!--                allowfullscreen="true"-->
                <!--                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"-->
                <!--                allowFullScreen="true"></iframe>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="row">
                    <div id="" class="col-md-365 mpbothside-0">
                        <div class="col-inner">
                            <div id="ultimate-video-52"
                                class="ult-video vc_custom_52 ult-adjust-bottom-margin ultimate-video-52 ultv-52 dmt_25 mmt_0">
                                <div class="ultv-video ultv-aspect-ratio-16_9 ultv-subscribe-responsive-none" data-videotype="vimeo_video">
                                    <div class="ultv-video__outer-wrap" data-autoplay="0" data-device="false" data-iconbg="#3A3A3A"
                                        data-overcolor="" data-defaultbg="#1f1f1e" data-defaultplay="image" style="color: rgb(58, 58, 58);">
                                        <div class="ultv-video__play"
                                            data-src="https://player.vimeo.com/video/565516613?loop=0&title=0&portrait=0&byline=0&color=ff5700&autopause=0&autoplay=1">
                                            <img class="ultv-video__thumb" src="https://www.vasarimalaysia.com/assets/images/Vimeo/Vasari Applicator 02.jpg">
                                            <div class="ultv-video__play-icon  ultv-animation-none"><img src="https://www.vasarimalaysia.com/assets/images/big play button.png"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="" class="col-md-635 mpbothside-0">
                        <div class="col-inner">
                            <div id="ultimate-video-53"
                                class="ult-video vc_custom_53 ult-adjust-bottom-margin ultimate-video-53 ultv-53 dmt_25 mmt_20">
                                <div class="ultv-video ultv-aspect-ratio-16_9 ultv-subscribe-responsive-none" data-videotype="vimeo_video">
                                    <div class="ultv-video__outer-wrap" data-autoplay="0" data-device="false" data-iconbg="#3A3A3A"
                                        data-overcolor="" data-defaultbg="#1f1f1e" data-defaultplay="image" style="color: rgb(58, 58, 58);">
                                        <div class="ultv-video__play"
                                            data-src="https://player.vimeo.com/video/565515966?loop=0&title=0&portrait=0&byline=0&color=ff5700&autopause=0&autoplay=1">
                                            <img class="ultv-video__thumb" src="https://www.vasarimalaysia.com/assets/images/Vimeo/Apply Vasari Veneziano Plaster.jpg">
                                            <div class="ultv-video__play-icon  ultv-animation-none"><img src="https://www.vasarimalaysia.com/assets/images/big play button.png"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row videoup">
                    <div id="" class="col-md-6 mpbothside-0">
                        <div class="col-inner">
                            <div id="ultimate-video-54"
                                class="ult-video vc_custom_54 ult-adjust-bottom-margin ultimate-video-54 ultv-54 dmt_25 mmt_0">
                                <div class="ultv-video ultv-aspect-ratio-16_9 ultv-subscribe-responsive-none" data-videotype="vimeo_video">
                                    <div class="ultv-video__outer-wrap" data-autoplay="0" data-device="false" data-iconbg="#3A3A3A"
                                        data-overcolor="" data-defaultbg="#1f1f1e" data-defaultplay="image" style="color: rgb(58, 58, 58);">
                                        <div class="ultv-video__play"
                                            data-src="https://player.vimeo.com/video/565516921?loop=0&title=0&portrait=0&byline=0&color=ff5700&autopause=0&autoplay=1">
                                            <img class="ultv-video__thumb" src="https://www.vasarimalaysia.com/assets/images/Vimeo/Apply Vasari Lustro.jpg">
                                            <div class="ultv-video__play-icon  ultv-animation-none"><img src="https://www.vasarimalaysia.com/assets/images/big play button.png"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="" class="col-md-6 mpbothside-0">
                        <div class="col-inner">
                            <div id="ultimate-video-55"
                                class="ult-video vc_custom_55 ult-adjust-bottom-margin ultimate-video-55 ultv-55 dmt_25">
                                <div class="ultv-video ultv-aspect-ratio-16_9 ultv-subscribe-responsive-none" data-videotype="vimeo_video">
                                    <div class="ultv-video__outer-wrap" data-autoplay="0" data-device="false" data-iconbg="#3A3A3A"
                                        data-overcolor="" data-defaultbg="#1f1f1e" data-defaultplay="image" style="color: rgb(58, 58, 58);">
                                        <div class="ultv-video__play"
                                            data-src="https://player.vimeo.com/video/565518512?loop=0&title=0&portrait=0&byline=0&color=ff5700&autopause=0&autoplay=1">
                                            <img class="ultv-video__thumb" src="https://www.vasarimalaysia.com/assets/images/Vimeo/Apply Limewash.jpg">
                                            <div class="ultv-video__play-icon  ultv-animation-none"><img src="https://www.vasarimalaysia.com/assets/images/big play button.png"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="sec23">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text_baskervville_38px_49_191919 margin_top_80 mobileBreak2">Some call Vasari “the celebrity wall”
                        </h2>
                        <p class="text_roboto_18px_32_1b1b1b">Though we did not invent Venetian plaster, we have definitely
                            home / studio and offices..</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 removePaddingMobile">
                        <div class="facebook-responsive">
                            <iframe
                                src="https://www.facebook.com/plugins/video.php?height=317&href=https://www.facebook.com/374999566191787/videos/3847310861949518&show_text=false&width=560&t=0"
                                width="560" height="317" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                allowfullscreen="true"
                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                allowFullScreen="true"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-6 removePaddingMobile">
                        <div class="facebook-responsive">
                            <iframe
                                src="https://www.facebook.com/plugins/video.php?height=317&href=https://www.facebook.com/374999566191787/videos/265580964431267&show_text=false&width=560&t=0"
                                width="560" height="317" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                allowfullscreen="true"
                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                allowFullScreen="true"></iframe>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 removePaddingMobile">
                        <div class="facebook-responsive padding-bottom">
                            <!-- <button class="playBtn active toVideo2"></button> -->
                            <video id="myVideo2" class="myVideo2" playsinline controls="controls" poster="images/section23/Lizz-Chloe-Thumbnail.jpg">
                                <source src="images/section23/Lizz Chloe Video.mp4" type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                            <script>
                                $('.myVideo2').click(function () {
                                    console.log("click");
                                    var video1 = document.getElementById('myVideo2');
                                    video1.addEventListener('ended', function () {
                                        video1.load();
                                        console.log("finish played");
                                        $('.myVideo2').removeClass("playing");
                                    });
                                    if (!$('.myVideo2').hasClass("playing")) {
                                        video1.play();
                                        $(this).addClass("playing");
                                    } else {
                                        video1.pause();
                                        $(this).removeClass("playing");
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-lg-6 removePaddingMobile">
                        <div class="facebook-responsive">
                            <iframe
                                src="https://www.facebook.com/plugins/video.php?height=317&href=https://www.facebook.com/374999566191787/videos/2321051917908389&show_text=false&width=560&t=0"
                                width="560" height="317" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                allowfullscreen="true"
                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                allowFullScreen="true"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col" style="padding: 0px;">
                        <div class="splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                        <img src="images/section23/slider1.png" alt="slider1" />
                                    </li>
                                    <li class="splide__slide">
                                        <img src="images/section23/slider2.png" alt="slider2" />
                                    </li>
                                    <li class="splide__slide">
                                        <img src="images/section23/slider3.png" alt="slider3" />
                                    </li>
                                    <li class="splide__slide">
                                        <img src="images/section23/slider4.png" alt="slider4" />
                                    </li>
                                    <li class="splide__slide">
                                        <img src="images/section23/slider5.png" alt="slider5" />
                                    </li>
                                    <li class="splide__slide">
                                        <img src="images/section23/slider6.png" alt="slider6" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="margin_top_40">
                        &nbsp;
                    </div>
                </div>
            </div>
        </section>
        <script>
            new Splide('#sec23 .splide', {
                type: 'loop',
                perPage: 3,
                autoplay: true,
                pauseOnHover: true,
                speed: '1000',
                focus: 'center',
                gap: {
                    row: '1rem',
                    col: '1rem'
                },
                breakpoints: {
                    640: {
                        perPage: 1,
                        focus: 'center'
                    }
                },
                interval: 3000
            }).mount();
        </script>
        <section id="sec24">
            <div class="container">
                <div class="row">
                    <h2 class="text_baskervville_38px_49_191919 margin_top_40">So...where should you apply Vasari?</h2>
                    <p class="text_roboto_18px_32_1b1b1b">Though we did not invent Venetian plaster, we have definitely home
                        / studio and offices..</p>
                    <div class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide card">
                                    <img src="images/section24/img01.jpg" alt="img01" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section24/img02.jpg" alt="img02" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section24/img03.jpg" alt="img03" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section24/img04.jpg" alt="img04" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section24/img05.jpg" alt="img05" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section24/img06.jpg" alt="img06" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section24/img07.jpg" alt="img07" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section24/img08.jpg" alt="img08" />
                                </li>
                                <li class="splide__slide card">
                                    <img src="images/section24/img09.jpg" alt="img09" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="buttonBox">
                    <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi">
                        <button class="dgBtn">
                            <p class="text55"><span>Talk to our Specialist</span></p>
                            <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                        </button>
                    </a>
                </div>
            </div>
        </section>
        <script>
            new Splide('#sec24 .splide', {
                type: 'loop',
                perPage: 3,
                autoplay: true,
                pauseOnHover: true,
                speed: '1000',
                gap: {
                    row: '1rem',
                    col: '1rem'
                },
                breakpoints: {
                    640: {
                        perPage: 1,
                        focus: 'center'
                    }
                },
                interval: 3000
            }).mount();
        </script>
        <section id="sec25">
            <div class="container">
                <div class="row">
                    <h2 class="text_baskervville_38px_49_191919 margin_top_40">Ours Accomplishments</h2>
                </div>
                <div class="row margin_top_40">
                    <div class="col-md-12 col-lg-3 col-6 mr-1 mt-2 mobile1 box">
                        <p class="text_roboto_20px_32_1b1b1b">&nbsp;</p>
                        <p class="text_roboto_40px_32_c3871b">2673</p>
                        <p class="text_roboto_20px_32_1b1b1b">Customers Served</p>
                    </div>
                    <div class="col-md-12 col-lg-3 col-6 ml-1 mr-1 mt-2 mobile2 box">
                        <p class="text_roboto_20px_32_1b1b1b">Plastered</p>
                        <p class="text_roboto_40px_32_c3871b">828,127 sqft</p>
                        <p class="text_roboto_20px_32_1b1b1b">Venetian Plaster</p>
                    </div>
                    <div class="col-md-12 col-lg-3 col-6 ml-1 mr-1 mt-2 mobile1 box">
                        <p class="text_roboto_20px_32_1b1b1b">Completed</p>
                        <p class="text_roboto_40px_32_c3871b">368</p>
                        <p class="text_roboto_20px_32_1b1b1b">Offices and Retails</p>
                    </div>
                    <div class="col-md-12 col-lg-3 col-6 ml-1 mt-2 mobile2 box">
                        <p class="text_roboto_20px_32_1b1b1b">Delivered</p>
                        <p class="text_roboto_40px_32_c3871b">1,933</p>
                        <p class="text_roboto_20px_32_1b1b1b">Beautiful Homes</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-4 mr-2 mt-2 bigbox">
                        <p class="text_roboto_20px_32_252525 title">Plaster</p>
                        <img class="width_auto padding_30" src="images/section25/icon1.png" alt="icon1" />
                        <p class="text_roboto_40px_32_c3871b">14 Branches</p>
                        <p class="text_roboto_20px_32_252525">In Malaysia</p>
                    </div>
                    <div class="col-md-12 col-lg-4 ml-2 mr-2 mt-2 bigbox">
                        <p class="text_roboto_20px_32_252525 title">Homes</p>
                        <img class="width_auto padding_30" src="images/section25/icon2.png" alt="icon2" />
                        <p class="text_roboto_20px_32_252525">Present in</p>
                        <p class="text_roboto_40px_32_c3871b">7 Countries</p>
                    </div>
                    <div class="col-md-12 col-lg-4 ml-2 mt-2 bigbox">
                        <p class="text_roboto_20px_32_252525 title">Premises</p>
                        <img class="width_auto padding_30" src="images/section25/icon3.png" alt="icon3" />
                        <p class="text_roboto_20px_32_252525">Developed over</p>
                        <p class="text_roboto_40px_32_c3871b">1,082</p>
                        <p class="text_roboto_20px_32_252525">Varieties of Wall Finishing</p>
                    </div>
                </div>
                <div class="buttonBox">
                    <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi">
                        <button class="dgBtn">
                            <p class="text55"><span>Talk to our Specialist</span></p>
                            <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                        </button>
                    </a>
                </div>
            </div>
        </section>
        <section id="sec26">
            <div class="container">
                <div class="row">
                    <h2 class="text_baskervville_38px_49_191919 margin_top_80">Our Dedicated Team..</h2>
                </div>
                <div class="row display_flex_center">
                    <div class="col-lg-6 padding_30 removePaddingMobile">
                        <img class="width_100" src="images/section26/team02.jpg" alt="team02" />

                    </div>
                    <div class="col-lg-6 padding_30 removePaddingMobile">
                        <img class="width_100" src="images/section26/team03.jpg" alt="team03" />
                    </div>
                </div>
                <div class="row display_flex_center">
                    <div class="col-lg-6 padding_30 removePaddingMobile">
                        <img class="width_100" src="images/section26/team04.jpg" alt="team04" />
                    </div>
                    <div class="col-lg-6 padding_30 removePaddingMobile">
                        <img class="width_100" src="images/section26/team01.jpg" alt="team01" />
                    </div>
                </div>
            </div>
        </section>
        <section id="sec27">
            <div class="container">
                <div class="row">
                    <h2 class="text_baskervville_38px_49_191919 margin_top_80 margin_bottom_80">Our Honored Collaborators
                    </h2>
                </div>
                <div class="row my-pb-5">
                    <div class="col-3 col-md-2">
                        <img src="images/section27/collaborators01.png" alt="collaborators01" />
                    </div>
                    <div class="col-3 col-md-2">
                        <img src="images/section27/collaborators02.png" alt="collaborators02" />
                    </div>
                    <div class="col-3 col-md-2">
                        <img src="images/section27/collaborators03.png" alt="collaborators03" />
                    </div>
                    <div class="col-3 col-md-2">
                        <img src="images/section27/collaborators04.png" alt="collaborators04" />
                    </div>
                    <div class="col-3 col-md-2">
                        <img src="images/section27/collaborators05.png" alt="collaborators05" />
                    </div>
                    <div class="col-3 col-md-2">
                        <img src="images/section27/collaborators06.png" alt="collaborators06" />
                    </div>
                    <div class="col-3 col-md-2">
                        <img src="images/section27/collaborators07.png" alt="collaborators07" />
                    </div>
                    <div class="col-3 col-md-2">
                        <img src="images/section27/collaborators08.png" alt="collaborators08" />
                    </div>
                    <div class="col-3 col-md-2">
                        <img src="images/section27/collaborators09.png" alt="collaborators09" />
                    </div>
                    <div class="col-3 col-md-2">
                        <img src="images/section27/collaborators10.png" alt="collaborators10" />
                    </div>
                    <div class="col-3 col-md-2">
                        <img src="images/section27/collaborators11.png" alt="collaborators11" />
                    </div>
                    <div class="col-3 col-md-2">
                        <img src="images/section27/collaborators12.png" alt="collaborators12" />
                    </div>
                </div>
            </div>
        </section>
        <section id="sec28">
            <div class="container">
                <div class="row">
                    <h2 class="location text_baskervville_38px_49_191919 margin_top_80 margin_bottom_80">Location We Cover
                    </h2>
                </div>
                <div class="row">
                    <img class="width_100" src="images/section28/map.jpg" alt="map" />
                </div>
                <div class="row margin_top_80">
                    <div class="col-lg-3 col-6">
                        <ul class="gapme">
                            <li><span class="location"></span><span>Johor Bahru</span></li>
                            <li><span class="location"></span><span>Batu Pahat</span></li>
                            <li><span class="location"></span><span>Kota Kinabalu</span></li>
                            <li><span class="location"></span><span>Seremban</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-6">
                        <ul class="gapme">
                            <li><span class="location"></span><span>Selangor</span></li>
                            <li><span class="location"></span><span>Kuantan</span></li>
                            <li><span class="location"></span><span>Penang</span></li>
                            <li><span class="location"></span><span>Melacca</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-6">
                        <ul class="gapme">
                            <li><span class="location"></span><span>Kuala Lumpur</span></li>
                            <li><span class="location"></span><span>Kuching</span></li>
                            <li><span class="location"></span><span>Alor Setar</span></li>
                            <li><span class="location"></span><span>Tawau</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-6">
                        <ul class="gapme">
                            <li><span class="location"></span><span>Kuala Terengganu</span></li>
                            <li><span class="location"></span><span>Ipoh</span></li>
                        </ul>
                    </div>
                </div>
                <div class="buttonBox">
                    <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi">
                        <button class="dgBtn">
                            <p class="text55"><span>Talk to our Specialist</span></p>
                            <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                        </button>
                    </a>
                </div>
            </div>
        </section>
        <section id="sec29">
            <div class="row my-dis-flex">
                <div class="col-lg-6">
                    <img class="width_100" src="images/section29/bg1.jpg" alt="bg1" />
                </div>
                <div class="col-lg-6 padding_50">
                    <div class="stroke">
                        <h2 class="text_baskervville_38px_49_ffffff text_align_left padding_center_text">The Master Artisan
                            of Designer Finishing</h2>
                    </div>
                    <p class="text_roboto_18px_21_ffffff text_align_left">If you are planning for a new house renovation, or
                        even just looking to refurbish it,</p>
                    <p class="text_roboto_18px_21_ffffff text_align_left">You can always add in the element of
                        <span class="text_roboto_18px_21_a46c10">Venetian Plaster</span>
                        to make your interior design standout...
                    </p>
                    <p class="text_roboto_18px_21_ffffff text_align_left">Click the button to get in touch with our Vasari
                        wall designer..</p>
                </div>
            </div>
        </section>
        <section id="sec30" class="container">
            <h2 class="text_baskervville_38px_49_191919 margin_top_80 margin_bottom_40">Virtual Tour of our Showroom</h2>
            <!--<div class="facebook-responsive">-->
            <!--    <iframe-->
            <!--        src="https://www.facebook.com/plugins/video.php?height=317&href=https://www.facebook.com/374999566191787/videos/204937871432877&show_text=false&width=560&t=0"-->
            <!--        width="560" height="317" style="border:none;overflow:hidden" scrolling="no" frameborder="0"-->
            <!--        allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"-->
            <!--        allowFullScreen="true"></iframe>-->
            <!--</div>-->
            <div class="row d-flex justify-content-center">
                    <div id="" class="col-lg-9 col-xl-7 mpbothside-0">
                        <div class="col-inner">
                            <div id="ultimate-video-60"
                                class="ult-video vc_custom_60 ult-adjust-bottom-margin ultimate-video-60 ultv-60 dmt_45 mmt_20">
                                <div class="ultv-video ultv-aspect-ratio-16_9 ultv-subscribe-responsive-none" data-videotype="vimeo_video">
                                    <div class="ultv-video__outer-wrap" data-autoplay="0" data-device="false" data-iconbg="#3A3A3A"
                                        data-overcolor="" data-defaultbg="#1f1f1e" data-defaultplay="image" style="color: rgb(58, 58, 58);">
                                        <div class="ultv-video__play"
                                            data-src="https://player.vimeo.com/video/565579482?loop=0&title=0&portrait=0&byline=0&color=ff5700&autopause=0&autoplay=1">
                                            <img class="ultv-video__thumb" src="https://www.vasarimalaysia.com/assets/images/Vimeo/Vasari Showroom.jpg">
                                            <div class="ultv-video__play-icon  ultv-animation-none"><img src="https://www.vasarimalaysia.com/assets/images/big play button.png"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div id="AddThreeAddress" class="row justify-content-md-center">
                <div class="col-md-4">
                    <div class="address-item address-item-first">
                        <img src="images/icon-location.png" alt="Location" class="img-fluid add-loc" />
                        <div class="address-penang">
                            <div class="locationImage"><img src="images/Selayang-HQ.jpg"></div>
                            <div class="address-place">Selayang</div>
                            <address>A-07, Emerald Avenue, Jalan PS 11, Prima Selayang, 68100 Selangor.</address>
                            <div class="add-direction">
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <a href="https://www.waze.com/en/live-map/directions/my/selangor/batu-caves/emerald-avenue?place=ChIJgfTIguVGzDERHg1UpVn4cO0" target="_blank">
                                            <img src="images/icon-waze.png" alt="Waze" class="img-fluid" />
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="https://goo.gl/maps/F96Nd2ujsH9pKFkb8" target="_blank">
                                            <img src="images/icon-gmap.png" alt="Google Map" class="img-fluid" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="address-item address-item-second">
                        <img src="images/icon-location.png" alt="Location" class="img-fluid add-loc" />
                        <div class="address-puchong">
                            <div class="locationImage"><img src="images/Old-Klang-Road.jpg"></div>
                            <div class="address-place">Old Klang Road</div>
                            <address>
                            3&5, Jalan Telok Panglima Garang, Off Jalan Klang Lama, 58000 Kuala Lumpur.
                            </address>
                            <div class="add-direction">
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <a href="https://waze.com/ul/hw2839yc30" target="_blank">
                                            <img src="images/icon-waze.png" alt="Waze" class="img-fluid" />
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="https://goo.gl/maps/b9xhev1Cam1B3q2v8" target="_blank">
                                            <img src="images/icon-gmap.png" alt="Google Map" class="img-fluid" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="address-item">
                        <img src="images/icon-location.png" alt="Location" class="img-fluid add-loc" />
                        <div class="address-puchong">
                            <div class="locationImage"><img src="images/Setia-Alam-HQ.jpg"></div>
                            <div class="address-place">Setia Alam</div>
                            <address>
                                    Lot 23-G, Jalan Setia Utama AT U13/AT, 40170 Shah Alam, Selangor.
                            </address>
                            <div class="add-direction">
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <a href="https://waze.com/ul/hw281ubyhr" target="_blank">
                                            <img src="images/icon-waze.png" alt="Waze" class="img-fluid" />
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="https://goo.gl/maps/cwM8zRDW4ZUi3Yim9" target="_blank">
                                            <img src="images/icon-gmap.png" alt="Google Map" class="img-fluid" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="buttonBox">
                <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi">
                    <button class="dgBtn">
                        <p class="text55"><span>Talk to our Specialist</span></p>
                        <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                    </button>
                </a>
            </div>
        </section>
        <footer class="footer">
            <div class="container">
                <a href="">
                    <img class="title" src="images/footer/logo2.png" alt="logo">
                </a>
                <div class="buttonBox mobilehide">
                    <a href="https://api.whatsapp.com/send?phone=60127271962&text=I%27m%20interested,%20would%20like%20to%20know%20more%20about%20Surface%20Archi">
                        <button class="dgBtn">
                            <p class="text55"><span>Talk to our Specialist</span></p>
                            <p class="text66"><span>Over 100+ Surface Designs for your Floor, Wall & Ceiling</span></p>
                        </button>
                    </a>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <script>
            // Mobile Menu
            // $(function () {
            //     $(".navbar-collapse li").on("click", function () {
            //         $(".navbar-collapse li.active").removeClass('active');
            //     });
            // });
    
            $(document).ready(function () {
                $('.navbar-collapse li').click(function () {
                    $('.navbar-collapse li').removeClass("active");
                    $(this).addClass("active");
                });
            });
        </script>
    </body>

</html>