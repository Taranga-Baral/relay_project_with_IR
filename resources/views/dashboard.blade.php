    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with Meyawo landing page.">
        <meta name="author" content="Devcrud">
        <title>Control My Home LED using Relay</title>
        <!-- font icons -->
        <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
        <!-- Bootstrap + Meyawo main styles -->
        <link rel="stylesheet" href="assets/css/meyawo.css">
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

        <!-- Page Navbar -->
        <nav class="custom-navbar" data-spy="affix" data-offset-top="20">
            <div class="container">
                <a class="logo" href="#">Taranga Home</a>
                <ul class="nav">
                    <li class="item">
                        <a class="link" href="#home">Home</a>
                    </li>
                    <li class="item">
                        <a class="link" href="#about">About</a>
                    </li>

                    <li class="item">
                        <a class="link" href="#service">Service</a>
                    </li>


                    <li class="item">
                        <a class="link" href="#controller">Controller</a>
                    </li>
                    <li class="item ml-md-3">
                        <a href="/first-relay" class="btn btn-primary">First Relay</a>
                    </li>
                </ul>
                <a href="javascript:void(0)" id="nav-toggle" class="hamburger hamburger--elastic">
                    <div class="hamburger-box">
                      <div class="hamburger-inner"></div>
                    </div>
                </a>
            </div>
        </nav><!-- End of Page Navbar -->

        <!-- page header -->
        <header id="home" class="header">
            <div class="overlay"></div>
            <div class="container header-content">
                <h1 class="header-title">
                    <span class="up">HI!</span>
                    <span class="down">I am Taranga Baral</span>
                </h1>
                <p class="header-subtitle">Control My Home Relay - 8 CH</p>
                <a href="https://www.tuktuk.tarangabaral.com.np" target="_blank" ><button class="btn btn-primary">Visit My Works</button></a>
            </div>
        </header><!-- end of page header -->

        <!-- about section -->
        <section class="pt-0 section" id="about">
            <!-- container -->
            <div class="container text-center">
                <!-- about wrapper -->
                <div class="about">
                    <div class="about-img-holder">
                        <img src="assets/imgs/man.png" class="about-img" alt="Image">
                    </div>
                    <div class="about-caption">
                        <p class="section-subtitle">Who Am I ?</p>
                        <h2 class="mb-3 section-title">About Me</h2>
                        <p>
                          <strong>Google It : </strong> <br> <br> "Who is Taranga Baral" <br> <br> Kind of Bragging -- Hahaaa <br> <br>This site acts as Server for my Home Automation. I used 8 Channel Relay using Node MCU to Control my Bulbs and all.
                        </p><a href="CV Resume.pdf" download="Taranga Baral CV"><button class="mt-4 btn-rounded btn btn-outline-primary">Download My CV</button></a>

                    </div>
                </div><!-- end of about wrapper -->
            </div><!-- end of container -->
        </section> <!-- end of about section -->

        <!-- service section -->
        <section class="section" id="service">
            <div class="container text-center">
                <p class="section-subtitle">Why this Site ?</p>
                <h6 class="mb-6 section-title">Service</h6>
                <!-- row -->
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="service-card">
                            <div class="body">
                                <img src="assets/imgs/pencil-case.svg" alt="Image" class="icon">
                                <h6 class="title">Automation</h6>
                                <p class="subtitle">From Anywhere in the World, I can Control my Device located at my Home via this Website</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="service-card">
                            <div class="body">
                                <img src="assets/imgs/responsive.svg" alt="Image" class="icon">
                                <h6 class="title">Node MCU</h6>
                                <p class="subtitle">I used ESP 32 Controller to connect with WiFi. It handles HTTP Request securely to and from the Web.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="service-card">
                            <div class="body">
                                <img src="assets/imgs/toolbox.svg" alt="Image" class="icon">
                                <h6 class="title">8 Chn Relay</h6>
                                <p class="subtitle">It is capable of Controlling 8 Devices, via Relay Module. I can view their Status via this Web</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="service-card">
                            <div class="body">
                                <img src="assets/imgs/analytics.svg" alt="Image" class="icon">
                                <h6 class="title">Baral Home Controller</h6>
                                <p class="subtitle">This site is for my Home Appliances. Hence, I am a bit Lazy to go around to pull that boring Classical Switch</p>
                            </div>
                        </div>
                    </div>
                </div><!-- end of row -->

            </div>
        </section><!-- end of service section -->

        <!-- Controller section -->
        <section class="section" id="controller">
            <div class="container text-center">
                <p class="section-subtitle">Control Baral's Home Relay ?</p>
                <h6 class="mb-6 section-title">Relay Controller</h6>
                <!-- row -->
                <div class="row">



                        <div class="col-md-3">


                            <a href="/first-relay" class="portfolio-card">
                                <form action="{{ route('first-relay.store') }}" method="POST">

                                    @csrf
                               @if ($relay1==0)
                               <img src="images/bulb_off.gif" class="portfolio-card-img" alt="Image">
                               @endif

                               @if ($relay1==1)
                               <img src="images/bulb_on.gif" class="portfolio-card-img" alt="Image">
                               @endif

                                <span class="portfolio-card-overlay">
                                    <span class="portfolio-card-caption">
                                        <h4>Relay 1 / 8 : @if ($relay1==1)
                                            ON
                                            @endif

                                            @if ($relay1==0)
                                            OFF
                                            @endif

                                        </h5><br>
                                            <button class="btn btn-outline-primary" id="Relay 1" type="submit">Toggle Relay 1</button>

                                    </span>
                                </span>

                            </form>
                            </a>
                        </div>




                        <div class="col-md-3">


                            <a href="/second-relay" class="portfolio-card">
                                <form action="{{ route('second-relay.store') }}" method="POST">

                                    @csrf
                               @if ($relay2==0)
                               <img src="images/bulb_off.gif" class="portfolio-card-img" alt="Image">
                               @endif

                               @if ($relay2==1)
                               <img src="images/bulb_on.gif" class="portfolio-card-img" alt="Image">
                               @endif

                                <span class="portfolio-card-overlay">
                                    <span class="portfolio-card-caption">
                                        <h4>Relay 2 / 8 : @if ($relay2==1)
                                            ON
                                            @endif

                                            @if ($relay2==0)
                                            OFF
                                            @endif

                                        </h5><br>
                                            <button class="btn btn-outline-primary" id="Relay 2" type="submit">Toggle Relay 2</button>

                                    </span>
                                </span>

                            </form>
                            </a>
                        </div>






                        <div class="col-md-3">


                            <a href="" class="portfolio-card">
                                <form action="{{ route('third-relay.store') }}" method="POST">

                                    @csrf




                                    @if ($relay3==0)
                                    <img src="images/bulb_off.gif" class="portfolio-card-img" alt="Image">
                                    @endif

                                    @if ($relay3==1)
                                    <img src="images/bulb_on.gif" class="portfolio-card-img" alt="Image">
                                    @endif






                                <span class="portfolio-card-overlay">
                                    <span class="portfolio-card-caption">
                                        <h4>Relay 3 / 8 : @if ($relay3==1)
                                            ON
                                            @endif

                                            @if ($relay3==0)
                                            OFF
                                            @endif
                                        </h5><br>
                                            <button class="btn btn-outline-primary" id="Relay 3" type="submit">Toggle Relay 3</button>

                                    </span>
                                </span>

                            </form>
                            </a>
                        </div>






                        <div class="col-md-3">


                            <a href="" class="portfolio-card">
                                <form action="{{ route('fourth-relay.store') }}" method="POST">

                                    @csrf


                                    @if ($relay4==0)
                                    <img src="images/bulb_off.gif" class="portfolio-card-img" alt="Image">
                                    @endif

                                    @if ($relay4==1)
                                    <img src="images/bulb_on.gif" class="portfolio-card-img" alt="Image">
                                    @endif


                                <span class="portfolio-card-overlay">
                                    <span class="portfolio-card-caption">
                                        <h4>Relay 4 / 8 : @if ($relay4==1)
                                            ON
                                            @endif

                                            @if ($relay4==0)
                                            OFF
                                            @endif</h5><br>
                                            <button class="btn btn-outline-primary" id="Relay 1" type="submit">Toggle Relay 4</button>

                                    </span>
                                </span>

                            </form>
                            </a>
                        </div>


                </div><!-- end of row -->
                <br><br>    <!-- row -->
                <div class="row">










                    <div class="col-md-3">


                        <a href="" class="portfolio-card">
                            <form action="{{ route('fifth-relay.store') }}" method="POST">

                                @csrf


                                @if ($relay5==0)
                                    <img src="images/bulb_off.gif" class="portfolio-card-img" alt="Image">
                                    @endif

                                    @if ($relay5==1)
                                    <img src="images/bulb_on.gif" class="portfolio-card-img" alt="Image">
                                    @endif



                            <span class="portfolio-card-overlay">
                                <span class="portfolio-card-caption">
                                    <h4>Relay 5 / 8 : @if ($relay5==1)
                                        ON
                                        @endif

                                        @if ($relay5==0)
                                        OFF
                                        @endif
                                    </h5><br>
                                        <button class="btn btn-outline-primary" id="Relay 5" type="submit">Toggle Relay 5</button>

                                </span>
                            </span>

                        </form>
                        </a>
                    </div>









                    <div class="col-md-3">


                        <a href="" class="portfolio-card">
                            <form action="{{ route('sixth-relay.store') }}" method="POST">

                                @csrf



                                @if ($relay6==0)
                                <img src="images/bulb_off.gif" class="portfolio-card-img" alt="Image">
                                @endif

                                @if ($relay6==1)
                                <img src="images/bulb_on.gif" class="portfolio-card-img" alt="Image">
                                @endif




                            <span class="portfolio-card-overlay">
                                <span class="portfolio-card-caption">
                                    <h4>Relay 6 / 8 : @if ($relay6==1)
                                        ON
                                        @endif

                                        @if ($relay6==0)
                                        OFF
                                        @endif</h5><br>
                                        <button class="btn btn-outline-primary" id="Relay 6" type="submit">Toggle Relay 6</button>

                                </span>
                            </span>

                        </form>
                        </a>
                    </div>





                    <div class="col-md-3">


                        <a href="" class="portfolio-card">
                            <form action="{{ route('seventh-relay.store') }}" method="POST">

                                @csrf

                                @if ($relay7==0)
                                <img src="images/bulb_off.gif" class="portfolio-card-img" alt="Image">
                                @endif

                                @if ($relay7==1)
                                <img src="images/bulb_on.gif" class="portfolio-card-img" alt="Image">
                                @endif


                            <span class="portfolio-card-overlay">
                                <span class="portfolio-card-caption">
                                    <h4>Relay 7 / 8 : @if ($relay7==1)
                                        ON
                                        @endif

                                        @if ($relay7==0)
                                        OFF
                                        @endif</h5><br>
                                        <button class="btn btn-outline-primary" id="Relay 7" type="submit">Toggle Relay 7</button>

                                </span>
                            </span>

                        </form>
                        </a>
                    </div>

                    <div class="col-md-3">


                        <a href="" class="portfolio-card">
                            <form action="{{ route('eighth-relay.store') }}" method="POST">

                                @csrf




                                @if ($relay8==0)
                                <img src="images/bulb_off.gif" class="portfolio-card-img" alt="Image">
                                @endif

                                @if ($relay8==1)
                                <img src="images/bulb_on.gif" class="portfolio-card-img" alt="Image">
                                @endif




                            <span class="portfolio-card-overlay">
                                <span class="portfolio-card-caption">
                                    <h4>Relay 8 / 8 : @if ($relay8==1)
                                        ON
                                        @endif

                                        @if ($relay8==0)
                                        OFF
                                        @endif</h5><br>
                                        <button class="btn btn-outline-primary" id="Relay 1" type="submit">Toggle Relay 8</button>

                                </span>
                            </span>

                        </form>
                        </a>
                    </div>






                </div><!-- end of row -->
            </div><!-- end of container -->
        </section> <!-- end of portfolio section -->


        <!-- section -->
        <section class="section-sm bg-primary">
            <!-- container -->
            <div class="container text-center text-sm-left">
                <!-- row -->
                <div class="row align-items-center">
                    <div class="mb-4 col-sm offset-md-1 mb-md-0">
                        <h6 class="title text-light">Want to work with me?</h6>
                        <p class="m-0 text-light">Always feel Free to Contact & Hire me</p>
                    </div>
                    <div class="col-sm offset-sm-2 offset-md-3">
                        <button class="rounded btn btn-lg my-font btn-light">Hire Me</button>
                    </div>
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </section> <!-- end of section -->




        <!-- footer -->
        <div class="container">
            <footer class="footer">
                <p class="mb-0">Copyright <script>document.write(new Date().getFullYear())</script> &copy; <a href="http://www.tuktuk.tarangabaral.com.np">Taranga Baral</a></p>
                <div class="m-auto text-right social-links ml-sm-auto">
                    <a href="https://www.facebook.com/profile.php?id=100081127939222" class="link" target="_blank"><i class="ti-facebook"></i></a>
                    <a id="myId" target="_blank" class="link"><i class="ti-github"></i></a>

                </div>
            </footer>
        </div> <!-- end of page footer -->

        <!-- core  -->
        <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
        <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

        <!-- bootstrap 3 affix -->
        <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

        <!-- Meyawo js -->
        <script src="assets/js/meyawo.js"></script>

    </body>
    <script>
        var myId = document.getElementById("myId");
myId.onclick=function(){
  window.open("https://www.github.com/Taranga1","_blank");
  window.open("https://www.github.com/Taranga-Baral","_blank");
}
    </script>
    </html>
