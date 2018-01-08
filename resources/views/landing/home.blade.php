<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ env('NAME') }} - xat Bot Service Provider">
    <meta name="author" content="Guillaume">

    <title>{{ env('NAME') }}</title>

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap core CSS -->
    <link href="/landing/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animate -->
    <link href="/landing/css/animate.css" rel="stylesheet">

    <!-- Magnific-popup -->
    <link rel="stylesheet" href="/landing/css/magnific-popup.css">
    
    <!-- Icon-font -->
    <link rel="stylesheet" type="text/css" href="/landing/css/themify-icons.css">

    <!-- Custom styles for this template -->
    <link href="/landing/css/style.css" rel="stylesheet">

  </head>

<body>

  <!-- Pre-loader -->
  <div class="preloader">
     <div class="status">&nbsp;</div>
  </div>

  <div class="tagline hidden-xs"> 
      <div class="container"> 
        <div class="pull-left"> 
          <div class="email">
            <a href="https://xat.com/OceanProject" target="_blank">
              <i class=" ti-email"></i> {{ env('NAME') }}
            </a>
          </div>
        </div>
        <div class="pull-right"> 
          <ul class="top_socials"> 
            <li><a href="https://github.com/llomgui/xatbot-Website"><i class=" ti-github"></i></a></li>
          </ul> 
        </div>
        <div class="clear"></div>
      </div>
    </div>

  <div class="navbar navbar-custom sticky" role="navigation">
      <div class="container">
        <!-- Navbar-header -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <i class=" ti-menu"></i>
          </button>
          <!-- LOGO -->
          <a class="navbar-brand logo" href="index.html">
            <i class="glyphicon glyphicon-stats"></i>
              <span>{{ env('NAME') }}</span>
          </a>
        </div>
        <!-- end navbar-header -->

        <!-- menu -->
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="#how-it-works">How it works</a>
            </li>
            <li>
              <a href="#features">Features</a>
            </li>
            <li>
              <a href="#pricing">Pricing</a>
            </li>
            <li>
              <a href="#faq">FAQ</a>
            </li>
            <li>
              <a href="/panel/home" class="btn btn-default w-xs">Panel</a>
            </li>
          </ul>
        </div>
        <!--/Menu -->
      </div>
      <!-- end container -->
    </div>
    <div class="clearfix"></div>

 


  <!-- HOME -->
  <section class="home bg-img-1 parallax" data-stellar-background-ratio="0.5">
    <div class="bg-overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="home-wrapper text-center">
            <h1 class="animated fadeInDown wow" data-wow-delay=".1s">{{ env('NAME') }}</h1>
            <p class="animated fadeInDown wow" data-wow-delay=".2s">Welcome to {{ env('NAME') }}! Our bots are made to moderate and animate your xat chat!</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-rounded w-lg animated fadeInDown wow" data-wow-delay=".4s">Register Now</a>
            <div class="clearfix"></div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END HOME -->


  <!-- SERVICES -->
  <section class="section" id="how-it-works">
    <div class="container">

      <div class="row">
        <div class="col-sm-12 text-center">
          <h2 class="title zoomIn animated wow" data-wow-delay=".1s">How It Works ?</h2>
          <p class="sub-title zoomIn animated wow" data-wow-delay=".2s">Assign the power bot to your xat chat and set it up with the xat ID 10101. Then register on this site to set up your bot! <a href="{{ route('setupbot') }}">Tutorials</a> are available in multiple languages! If you still need help, visit our chat <a href="//xat.com/OceanProject">here</a> and our team of helpers will be happy to assist you!</p>
        </div> 
      </div>
      <!--
      <div class="row">
        <div class="col-sm-4">
          <div class="service-item animated fadeInLeft wow" data-wow-delay=".1s">
            <i class=" ti-desktop"></i>
            <div class="service-detail">
              <h4>Strategy Solutions</h4>
              <p>We put a lot of effort in design, as it’s the most important ingredient of successful website.Sed ut perspiciatis unde omnis iste natus error sit.</p>
            </div> <!-- /service-detail 
          </div> <!-- /service-item 
        </div> <!-- /col 

        <div class="col-sm-4">
          <div class="service-item animated fadeInDown wow" data-wow-delay=".3s">
            <i class=" ti-shield"></i>
            <div class="service-detail">
              <h4>Digital Design</h4>
              <p>We put a lot of effort in design, as it’s the most important ingredient of successful website.Sed ut perspiciatis unde omnis iste natus error sit.</p>
            </div> <!-- /service-detail 
          </div> <!-- /service-item 
        </div> <!-- /col 

        <div class="col-sm-4">
          <div class="service-item animated fadeInRight wow" data-wow-delay=".5s">
            <i class=" ti-server"></i>
            <div class="service-detail">
              <h4>SEO</h4>
              <p>We put a lot of effort in design, as it’s the most important ingredient of successful website.Sed ut perspiciatis unde omnis iste natus error sit.</p>
            </div> <!-- /service-detail 
          </div> <!-- /service-item 
        </div> <!-- /col  
      </div> <!--end row
      -->


    </div>
  </section>
  <!-- END SERVICES -->


  <!-- SCREENSHOTS -->
  <section class="section bg-gray" id="features">
    <div class="container">

      <div class="row">
        <div class="col-sm-6">
          <div class="feature-detail">
            <h2 class="title fadeIn animated wow" data-wow-delay=".1s">Fast and Customizable</h2>
            <p class="sub fadeIn animated wow" data-wow-delay=".2s">Once registered, create a bot, then use the buttons on the top menu to customize your bot! </p>

            <ul class="list-unstyled">
              <li>
                <i class=" ti-arrow-circle-right"></i>
                You can customize basic features such as the bot's name, avatar, homepage and more!
              </li>
              <li>
                <i class=" ti-arrow-circle-right"></i>
                You can also customize the bot's reason for kicking, banning, as well as adding aliases and others cool features!
              </li>

            </ul>

            <a href="{{ route('register') }}" class="btn btn-primary btn-rounded w-lg animated fadeInDown wow" data-wow-delay=".4s">Register Now</a>
          </div>
        </div>

        <div class="col-sm-6">
          <img src="landing/images/mac.png" class="img-responsive">
        </div>

      </div>
    </div>
  </section>
  <!-- END SCREENSHOTS -->

  <section class="section" id="features1">
    <div class="container">
      <div class="row">
        <div class="col-sm-5">
          <img src="//i.cubeupload.com/KfdMfX.png" class="img-responsive screen-space" width="420">
        </div>

        <div class="col-sm-6 col-sm-offset-1">
          <div class="feature-detail">
            <h2 class="title fadeIn animated wow animated" data-wow-delay=".1s">Special Features</h2>
            <p class="sub fadeIn animated wow animated" data-wow-delay=".2s">Special and unique features of xatbot</p>
            <ul class="list-unstyled">
              <li>
                <i class=" ti-arrow-circle-right"></i>
                ShareBot - The ShareBot feature allows you to share your bot with your friends, simply just by adding the key of your friend. A key can be obtained at the Profile page, top right of the panel.
              </li>
              <li>
                <i class=" ti-arrow-circle-right"></i>Spotify - With the exclusive Spotify feature of xatbot, you can show other users what you’re currently listening to on Spotify. To use this feature, connect your Spotify account at the Profile page of our panel and use the !spotify command in the chat.
              </li>
            </ul>
            <a href="{{ route('register') }}" class="btn btn-primary btn-rounded w-lg animated fadeInDown wow" data-wow-delay=".4s">Register Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SCREENSHOTS -->
  <section class="section bg-gray" id="features2">
    <div class="container">

      <div class="row">

        <div class="col-sm-6">
          <div class="feature-detail">
            <h2 class="title fadeIn animated wow" data-wow-delay=".1s">Clean and Reliable</h2>
            <p class="sub fadeIn animated wow" data-wow-delay=".2s">Available in multiple languages! </p>

            <ul class="list-unstyled">
              <li>
                <i class=" ti-arrow-circle-right"></i>
                We currently offer assistance in English, Spanish, French and Portuguese!
              </li>
              <li>
                <i class=" ti-arrow-circle-right"></i>
                You can choose between different languages of how you want the website to be displayed!
              </li>

            </ul>

            <a href="{{ route('register') }}" class="btn btn-primary btn-rounded w-lg animated fadeInDown wow" data-wow-delay=".4s">Register Now</a>
          </div>
        </div>

        <div class="col-sm-6">
          <img src="landing/images/tab2.png" class="img-responsive screen-space">
        </div>        

      </div>
    </div>
  </section>
  <!-- END SCREENSHOTS -->

  <!-- HOME -->
  <section class="fun-facts bg-img-2 parallax" data-stellar-background-ratio="0.5">
    <div class="bg-overlay"></div>
    <div class="container">

            <div class="row text-center">
                <div class="col-md-3 col-sm-3 facts">
                  <i class="ti-pencil-alt"></i>
                    <h1><span class="counter">{{ $totalLines }}</span></h1>
                    <h4>Lines Coded</h4>
                </div>
                <!-- /facts-1 -->
                <div class="col-md-3 col-sm-3 facts">
                  <i class="ti-comments"></i>
                    <h1> <span class="counter">{{ $totalMessageHandled }}</span> +</h1>
                    <h4>Messages Handled</h4>
                </div>
                <!-- /facts-2 -->
                <div class="col-md-3 col-sm-3 facts">
                  <i class="ti-briefcase"></i>
                    <h1 class="counter">{{ $totalCommands }}</h1>
                    <h4>No. Of Commands</h4>
                </div>
                <!-- /facts-3 -->
                <div class="col-md-3 col-sm-3 facts">
                  <i class=" ti-user"></i>
                    <h1 class="counter">{{ $totalBots }}</h1>
                    <h4>Bots</h4>
                </div>
                <!-- /facts-4 -->
            </div>
    </div>
  </section>
  <!-- END HOME -->

  <!-- PRICING -->
  <section class="section" id="pricing">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-center">
          <h1 class="title zoomIn animated wow" data-wow-delay=".1s">Simple Pricing</h1>
          <p class="sub-title zoomIn animated wow" data-wow-delay=".2s">Buy premium package just by transferring xats to your bot on your chat.</p>
        </div> 
      </div> <!-- end row -->

      <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
          <div class="row">
                          
                <!-- Pricing Item -->
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="pricing-item animated fadeInLeft wow" data-wow-delay=".3s">
                    <div class="pricing-item-inner">
                      <div class="pricing-wrap">   

                        <div class="pricing-num pricing-num-pink">
                          <sup>xats</sup>0
                        </div>
                        <div class="pr-per">
                          per month
                        </div>    

                        <!-- Pricing Title -->
                        <div class="pricing-title">
                          Free Pack
                        </div>          
                        <!-- Pricing Features -->
                        <div class="pricing-features">
                          <ul class="sf-list pr-list">
                            <li>No Powers</li>
                            <li>Few commands</li>
                            <li>Free Support</li>
                          </ul>
                        </div>
                                          
                        <!-- Button -->                     
                        <div class="pr-button">
                          <a href="{{ route('register') }}" class="btn btn-primary btn-rnd">Register Now</a> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- End Pricing Item -->

              <!-- Pricing Item -->
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="pricing-item main animated fadeInLeft wow" data-wow-delay=".5s">
                     <div class="ribbon"><span>POPULAR</span></div>
                    <div class="pricing-item-inner">
                      <div class="pricing-wrap">   


                        <div class="pricing-num">
                          <sup>xats</sup>250
                        </div>
                        <div class="pr-per">
                          per month
                        </div>      

                        <!-- Pricing Title -->
                        <div class="pricing-title">
                          Professional Pack
                        </div>          
                        <!-- Pricing Features -->
                        <div class="pricing-features">
                          <ul class="sf-list pr-list">
                            <li>Everypower</li>
                            <li>All commands</li>
                            <li>Free Support</li>
                          </ul>
                        </div>                
                        <!-- Button -->                     
                        <div class="pr-button">
                          <a href="{{ route('register') }}" class="btn btn-primary btn-rnd">Register Now</a> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- End Pricing Item -->

            </div>
        </div>
      </div>
    </div>
  </section>

  <!-- END PRICING -->


  <!-- FAQ -->
  <section class="section bg-gray" id="faq">
    <div class="container">


      <div class="row">
        <div class="col-sm-12 text-center">
          <h1 class="title zoomIn animated wow" data-wow-delay=".1s">FAQ</h1>
          <p class="sub-title zoomIn animated wow" data-wow-delay=".2s">List of commonly asked questions about the bot.</p>
        </div> 
      </div> <!-- end row -->

      <div class="row">
        <div class="col-md-5 col-md-offset-1">
          <!-- Question/Answer -->
          <div class="animated fadeInLeft wow" data-wow-delay=".1s">
            <h4 class="question" data-wow-delay=".1s">I want to insert a bot for my chat on the panel, but it says "This chat is taken!" What should I do?</h4>
            <p class="answer">If you get this error, you need to open a ticket by clicking the "Support" menu on the website so an admin or helper can help you to fix it.</p>
          </div>

          <!-- Question/Answer -->
          <div class="animated fadeInLeft wow" data-wow-delay=".3s">
            <h4 class="question">How do I make my bot main owner in my chat?</h4>
            <p class="answer m-b-0">You must private chat the bot and do the command "!getmain [chat password]". If your chat password is "Helloworld1234", then you need to do "!getmain Helloworld1234" in the bot pc.</p>
          </div>

        </div>
        <!--/col-md-5 -->

        <div class="col-md-5">
          <!-- Question/Answer -->
          <div class="animated fadeInRight wow" data-wow-delay=".2s">
            <h4 class="question">I set up my bot power correctly, and the bot is set up in the panel correctly too, but I'm getting "Error." What does this mean?</h4>
            <p class="answer">It means there is an issue with xat servers so your bot can't connect on your chat. Please be patient. </p>
          </div>

          <!-- Question/Answer -->
          <div class="animated fadeInRight wow" data-wow-delay=".4s">
            <h4 class="question">How do I create a bot?</h4>
            <p class="answer m-b-0">Assign the power bot to your chat and set it up in your chat settings with the xat ID 10101. Then register on our site, click "Create a bot" and use the menu functions on the top of the website to customize your bot. Finally, when you are done creating your bot, go back to the dashboard and then start your bot!</p>
          </div>

        </div>
        <!--/col-md-5-->
      </div>

    </div>
  </section>
  <!-- END FAQ -->

  <footer class="footer bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <p class="copyright">2017 © {{ env('NAME') }}</p>
        </div>
        <div class="col-sm-9">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="#how-it-works">How it works</a>
            </li>
            <li>
              <a href="#features">Features</a>
            </li>
            <li>
              <a href="#pricing">Pricing</a>
            </li>
            <li>
              <a href="#faq">FAQ</a>
            </li>
          </ul>
        </div>
      </div> <!-- end row -->
    </div> <!-- end container -->
  </footer>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="/landing/js/jquery.js"></script>
  <script src="/landing/js/bootstrap.min.js"></script>
  <!-- Jquery easing -->                                                      
  <script type="text/javascript" src="/landing/js/jquery.easing.1.3.min.js"></script>
  <script src="/landing/js/SmoothScroll.js"></script>
  <script src="/landing/js/wow.min.js"></script>
  <!-- Jquery stellar for Parallax -->                                                      
  <script type="text/javascript" src="/landing/js/jquery.stellar.min.js"></script>
  <script src="/landing/js/waypoints.min.js" type="text/javascript"></script>
  <script src="/landing/js/jquery.counterup.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="/landing/js/jquery.magnific-popup.min.js"></script>
  <!--sticky header-->
  <script type="text/javascript" src="/landing/js/jquery.sticky.js"></script>
      
  <!--common script for all pages-->
  <script src="/landing/js/jquery.app.js"></script>

  <script type="text/javascript">
      jQuery(document).ready(function($) {
          $('.counter').counterUp({
              delay: 100,
              time: 1200
          });
      });
  </script>

    
  </body>
</html>
