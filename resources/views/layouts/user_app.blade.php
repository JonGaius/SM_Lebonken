<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Lebonken Burkina Faso" />
    <meta name="description" content="Lebonken" />
    <meta name="author" content="Switch Maker" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{$titrePage.' - LebonKen'}}</title>
    <link rel="shortcut icon" href="images/favicon.png" />		
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
    <link rel="stylesheet" type="text/css" href="{{asset('select2/css/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('select2/css/select2.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
    <script type="module" src="//unpkg.com/{{"@"}}grafikart/drop-files-element"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/my-add-cs.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}"/>
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/insc-cs.css')}}"/> --}}
</head>
<body>
    
    <div id="page">
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Header -->
        <header class="header-part">
            <div class="header-content d-flex justify-content-between">
                <div class="logo">
                    <a href="{{route('welcome')}}">
                        <img src="{{asset('images/logo.png')}}" alt="" class="img-logo">
                    </a>
                </div>

                <div class="user-box-part">
                    <div class="d-flex">
                        <div class="add-btn mt-2">
                            @if (authUser()->boutiques->count() > 0)
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#choiceModal" style="color: #fff">
                                    <i class="ti ti-plus"></i> <span>Ajouter une annonce</span>
                                </a>
                               
                            @else
                                <a href="{{route('user.article.create')}}" class="btn btn-primary" style="color: #fff">
                                    <i class="ti ti-plus"></i> <span>Ajouter une annonce</span>
                                </a>
                            @endif
                        </div>
                        <div class="user-part ml-2">
                            <div class="avatar">
                                <img src="{{asset('images/avatar/woman_avatar.png')}}" alt=""class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="responsive-search">
                    <button class="rounded-button" data-toggle="modal" data-target="#searchModal">
                        <i class="ti ti-search"></i>
                    </button>
                </div>
            </div>
            <button class="first-toggle-button">
                <i class="ti ti-menu"></i>
            </button>
            <button class="responsive-toggle-button">
                <i class="ti ti-menu"></i>
            </button>
        </header>
        <div class="vertical-menu">
            <div class="user">
                <div class="avatar-img">
                    <img src="{{asset('images/avatar/woman_avatar.png')}}" alt=""class="img-fluid">
                </div>
                <span>Bienvenu(e)</span><br>
                <strong>{{authUser()->name}}</strong>
            </div>

            <nav class="vertical-nav">
                <ul class="vertical-nav-list mt-2">
                    <li class="vertical-nav-link {{$active_home ?? ''}}"><a href="{{route('user.home')}}" class="row w-100">
                        <div class="col-2"><i class="fas fa-home"></i></div>
                        <div class="col-10 for-span"><span>Tableau de board</span></div>   
                    </a></li>
                    <li class="vertical-nav-link {{$active_boutique ?? ''}}"><a href="{{route('user.boutique')}}" class="row w-100">
                        <div class="col-2"><i class="fas fa-store"></i></div>
                        <div class="col-10 for-span"><span>Mes boutiques</span></div>   
                    </a></li>
                    <li class="vertical-nav-link {{$active_annonce ?? ''}}"><a href="{{route('user.article.index')}}" class="row w-100">
                        <div class="col-2"><i class="fas fa-bullhorn"></i></div>
                        <div class="col-10 for-span"><span>Mes annonces</span></div>   
                    </a></li>
                    <li class="vertical-nav-link"><a href="" class="row w-100">
                        <div class="col-2"><i class="fas fa-shopping-bag"></i></div>
                        <div class="col-10 for-span"><span>Mes commandes</span></div>   
                    </a></li>
                    <li class="vertical-nav-link {{$active_message ?? ''}}"><a href="" class="row w-100">
                        <div class="col-2"><i class="fas fa-comments"></i></div>
                        <div class="col-10 for-span"><span>Mes messages</span></div>   
                    </a></li>
                    <li class="vertical-nav-link {{$active_profil ?? ''}}"><a href="{{route('user.show')}}" class="row w-100">
                        <div class="col-2"><i class="fas fa-user"></i></div>
                        <div class="col-10 for-span"><span>Profil</span></div>   
                    </a></li>
                    <li class="vertical-nav-link">
                        <a href="{{route('logout')}}" class="row w-100"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <div class="col-2"><i class="fas fa-sign-out-alt"></i></div>
                            <div class="col-10 for-span"><span>Deconnexion</span></div>   
                        </a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
        <main class="main">
            @yield('content')
        </main>
        <!-- Modal -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5>Recherche</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="" class=" form-head d-flex w-100">
                        <div class="input-box-search">
                            <input type="text" placeholder="Mot clé...">
                        </div>
                        <div class="btn-box">
                            <button type="submit"><i class="ti ti-search"></i></button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

        @if (authUser()->boutiques->count() > 0)
        <div class="modal fade" id="choiceModal" tabindex="-1" aria-labelledby="choiceModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ajouter un article</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row w-100 m-auto">
                        <div class="col-6">
                            <div class="card p-2 text-center" style="background: #ffaf6e">
                                <a href="{{route('user.article.create')}}" class="w-100" style="color: #fff">
                                    <i class="fas fa-user"></i><br><span>Avec votre compte</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card p-2 text-center">
                                <a href="#" class="w-100" style="color: #f5a25e"  data-toggle="modal" data-target="#storeModal">
                                    <i class="fas fa-store"></i><br><span>Avec une boutique</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="modal fade" id="storeModal" tabindex="-1" aria-labelledby="storeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Choisir la boutique</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body p-3">
                    <form action="{{route('boutique.article.redirect.create')}}" method="POST">
                        @csrf
                        <select class="form-control w-100" name="redirect">
                            @foreach (authUser()->boutiques as $items)
                                <option value="{{$items->slug}}">{{$items->name}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary w-100 mt-3" style="text-transform: none">
                            Continuer
                        </button>
                    </form>
                    
                </div>
              </div>
            </div>
          </div>
        @endif
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
    <script src="{{asset('js/main.js')}}"></script>
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
    <script>
        const firstBtn = document.querySelector('.first-toggle-button');
        const menuBtn = document.querySelector('.responsive-toggle-button');
        const navVertical = document.querySelector('.vertical-menu'); 
        const main = document.querySelector('.main');

        firstBtn.addEventListener('click', function(){
            navVertical.classList.toggle('reduce');
            main.classList.toggle('reduce');
            
        });
        menuBtn.addEventListener('click', function(){
            navVertical.classList.toggle('appear');     
        });
    </script>
<script>
    
    $(document).ready(function()
    {
        $('#s1').click(function(){
            $('#formul1').toggle('fast');
            $('#formul2').hide('fast');
            $('#formul3').hide('fast');
            $('#formul4').hide('fast');
        })

        $('#s2').click(function(){
            $('#formul2').toggle('fast');
            $('#formul1').hide('fast');
            $('#formul3').hide('fast');
            $('#formul4').hide('fast');
        })

        $('#s3').click(function(){
            $('#formul3').toggle('fast');
            $('#formul1').hide('fast');
            $('#formul2').hide('fast');
            $('#formul4').hide('fast');
        })

        
        $('#s4').click(function(){
            $('#formul4').toggle('fast');
            $('#formul1').hide('fast');
            $('#formul2').hide('fast');
            $('#formul3').hide('fast');
        })

        $('#bt0').click(function(){
            $('#delivery').toggle('fast');
            $('#deliv').hide('fast');
           
        })
        
        $('#bt1').click(function(){
            $('#deliv').toggle('fast');
            $('#delivery').hide('fast');
           
        })
    });
 
</script>
<script>
     $(document).ready(function(){
            $('.slide_img').slick({
                
                prevArrow: '.three_prev',
                nextArrow: '.three_next',
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: false,
                autoplay: false,
                autoplaySpeed: 2000,
                speed: 500,
                dots: false,

                responsive: [
                    {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                    },
                    {
                    breakpoint: 850,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                    },
                    {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    }
                    
                ]
            });
        })
</script>
    @yield('javascript')
</body>
</html>