<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="commerce,ouagadougou,bobo,kaya,afrique,chaussures,voitures,burkina faso,telephone" />
    <meta name="description" content="Lebonken, Leader du Ecommerce en Afrique de l'Ouest" />
    <meta name="author" content="Switch Maker" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{$titrePage ?? 'Bienvenue sur Lebonken'}}</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />		
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/themify-icons.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/flaticon.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('revolution/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('revolution/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/prettyPhoto.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/shortcodes.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}"/>
    
</head>
<body>
    <div id="page">
        
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
          <header id="masthead" class="header ttm-header-style-infostack">
              <div class="ttm-topbar-wrapper ttm-bgcolor-darkgrey ttm-textcolor-white clearfix">
                  <div class="container">
                      <div class="ttm-topbar-content">
                          <ul class="top-contact text-left ttm-highlight-left">
                              <li><i class="fa fa-clock-o"></i><strong>Heures:</strong> Lun - Sam 9.00 - 18.00</li>
                          </ul>
                          <div class="topbar-right text-right">
                              <ul class="top-contact">
                                  <li><strong><i class="fa fa-phone"></i>Parlez au service clientèle :</strong> <span class="tel-no">+ (226) 70 00 00 00</span></li>
                              </ul>
                              <div class="ttm-social-links-wrapper list-inline">
                                  <ul class="social-icons">
                                      <li><a href="#"><i class="fa fa-facebook"></i></a>
                                      </li>
                                      <li><a href="#"><i class="fa fa-twitter"></i></a>
                                      </li>
                                      <li><a href="#"><i class="fa fa-flickr"></i></a>
                                      </li>
                                      <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- ttm-topbar-wrapper end -->
              <!-- ttm-header-wrap -->
              <div class="ttm-header-wrap">
                  <div class="container">
                      <div class="ttm-header-top-wrapper clearfix">
                          <!-- site-branding -->
                          <div class="site-branding">
                              <a class="home-link" href="{{route('welcome')}}" title="Fondex" rel="home">
                                  <img id="logo-img" class="img-center" src="{{asset ('images/logo.png')}}" alt="logo-img">
                              </a>
                          </div><!-- site-branding end -->
                          <!-- ttm-top-info-con-->
                          <div class="ttm-top-info-con clearfix">
                            
                        
                          </div>
                          <!-- ttm-top-info-con end -->
                      </div>
                      <!-- ttm-stickable-header-w -->
                      <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
                          <div id="site-header-menu" class="site-header-menu">
                                  <div class="site-header-menu-inner ttm-stickable-header">
                                      <div class="container">
                                      <!--site-navigation -->
                                      <div id="site-navigation" class="site-navigation m">
                                          <div class="ttm-rt-contact">
                                              <!-- header-icins -->
                                              <div class="ttm-header-icons ">
                                                <span class="ttm-header-icon ttm-header-cart-link">
                                                    <a href="#"><i class="ti ti-shopping-cart"></i>
                                                        <span class="number-cart">0</span>
                                                    </a>
                                                </span>
                                                    
                                                <span class="ttm-header-icon ttm-header-user-link">
                                                    <a href="{{route('login')}}"><i class="far fa-user"></i></a>
                                                </span>
                                                
                                                  <div class="ttm-header-icon ttm-header-search-link">
                                                      <a href="#" class="sclose"><i class="ti ti-search"></i></a>
                                                      <div class="ttm-search-overlay">
                                                          <form method="get" class="ttm-site-searchform" action="">
                                                            @csrf
                                                              <div class="w-search-form-h">
                                                                  <div class="w-search-form-row">
                                                                      <div class="w-search-input">
                                                                          <input type="search" class="field searchform-s" name="s" placeholder="Type Word Then Enter...">
                                                                          <button type="submit">
                                                                              <i class="ti ti-search"></i>
                                                                          </button>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </form>
                                                      </div>
                                                  </div>
                                              </div><!-- header-icons end -->
                                              <div class="ttm-custombutton" style="z-index: 99;">
                                                  <a href="">Ajouter une annonce<i class="fa fa-caret-right"></i></a>
                                              </div>
                                          </div>
                                          <div class="ttm-menu-toggle">
                                              <input type="checkbox" id="menu-toggle-form">
                                              <label for="menu-toggle-form" class="ttm-menu-toggle-block">
                                                  <span class="toggle-block toggle-blocks-1"></span>
                                                  <span class="toggle-block toggle-blocks-2"></span>
                                                  <span class="toggle-block toggle-blocks-3"></span>
                                              </label>
                                          </div>
                                          <nav id="menu" class="menu">
                                              <ul class="dropdown">
                                                  <li class="{{$home_active ?? ''}} text-center"><a href="{{route('welcome')}}">Accueil</a></li>
                                                  <li class="{{$boutique_active ?? ''}} text-center">
                                                      <a href="">Boutique</a>
                                                  </li>
                                                  <li class="{{$categorie_active ?? ''}} text-center"><a href="">Catégories</a>
                                                      
                                                  </li>
                                                  <li class="{{$solde_active ?? ''}} text-center"><a href="">En Promos</a></li>
                                              </ul>
                                          </nav>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          
                      </div>
                  </div>
              </div>
          </header>

            <main>
                @yield('content')
            </main>
        
            <footer class="footer widget-footer clearfix shadow-lg">
                <div class="second-footer ttm-textcolor-white">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-12 text-center widget-area">
                                <div class="widget  clearfix">
                                    <h3 class="text-center">Rejoingnez-nous</h3>
                                    <div class="textwidget widget-text">
                                        <br><br>
                                        <div class="social-icons circle social-hover">
                                            <ul class="list-inline">
                                                <li class="social-facebook"><a class="tooltip-top" target="_blank" href="#" data-tooltip="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li class="social-twitter"><a class="tooltip-top" target="_blank" href="#" data-tooltip="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                <li class="social-linkedin"><a class=" tooltip-top" target="_blank" href="" data-tooltip="LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                <li class="social-linkedin"><a class=" tooltip-top" target="_blank" href="" data-tooltip="WhatsApp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bottom-footer-text ttm-textcolor-white">
                    <div class="container">
                        <div class="row copyright">
                            <div class="col-md-12">
                                <div class="">
                                    <span>Copyright © 2020&nbsp;<a href="#">LEBONKEN</a>. Tous droits réservés.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        
        <a id="totop" href="#top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>


    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/tether.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.js')}}"></script>    
    <script src="{{asset('js/jquery-waypoints.js')}}"></script>    
    <script src="{{asset('js/jquery-validate.js')}}"></script> 
    <script src="{{asset('js/owl.carousel.js')}}"></script>
    <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('js/numinate.min.js?ver=4.9.3')}}"></script>
    <script src="{{asset('js/chart.js')}}"></script>
    <script src="{{asset('js/slick.js')}}"></script>
    <script src="{{asset('revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('revolution/js/slider.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @yield('javascript')
</body>
</html>