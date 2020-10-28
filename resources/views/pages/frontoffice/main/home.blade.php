@extends('layouts.app')
@section('content')

<div class="element">
    <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container slide-overlay" data-alias="classic4export" data-source="gallery">
        <div id="rev_slider_4_1" class="rev_slider fullwidthabanner rev_slider_4_1_height" data-version="5.4.8.1">
            <ul>
                <li data-index="rs-19" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="images/slider/slide-9.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <img src="{{asset("images/pages/block1.jpg")}}"  alt="Lebonken" title="Home 2"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina  style="height: 80vh">
                </li>   
            </ul>
        </div>
    </div>
    <div class="text-element">
        <div class="content">
            <div class="play-btn">
                <a href="#" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-play"></i></a>
            </div> 
            <div class="product-name">
                <h1 style="font-size: 22px;"></h1>
                <span style="font-size: 3em;">Phrase accrocheuse</span>
            </div>
            <div class="price-and-btn-action">
                <p>A partir de <span></span></p>
                <a href="" class="btn btn-primary">Oui, j'en veux un</a>
            </div>
            <div class="part-bottom">
                <div class="content">
                    <div class="progress-bar">
                        <div class="progress-value" style="width: 100%;"></div>
                    </div>
                    <div class="text d-flex justify-content-between">
                        <div>
                            <!-- Restant -->
                            <div class="d-flex ">
                                <div class="disapp"><span>Il n'y a pas mal d'amateurs: il ne reste que </span></div>
                                <div class="disapp"><span class="number-rest"> </span></div>
                                <div class="disapp"><span>n'attends plus</span></div>
                                <div  class="for-responsive">
                                    <!-- For responsive -->
                                    <span>
                                    
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="decompte">
                            <!-- Decompte -->
                            <div class="d-flex">
                                <div id="days" style="margin-right: 8px;">
                                    
                                </div>
                                <div id="hours">
                                    
                                </div>
                                <div id="minutes">
                                    
                                </div>
                                <div id="seconds">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3 mb-3">

    <div class="first-container  w-100 row" style="margin: auto; margin-top: 25px"">
        <div class="col-12 mb-2 p-0">
            <h3 style="font-size: 18px">Sponsorisés</h3>
        </div>
        <div class="col-12 col-md-6 col-lg-4 pl-0">
            <div class="card w-100 p-2">
                <strong class="text-center" style="color: #000; font-size: 16px; ">Nom title</strong>
                <div class="row w-100 m-auto justify-content-center">
                    <div class="col-12 p-0" style="max-height: 260px; overflow:hidden;">
                        
                        <img src="{{asset('images/pages/block1.jpg')}}" alt="" class="img-fluid" style="height: 300px">
                    </div>
                </div>
                <a href="" class="text-right">Decouvrir</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 pl-0">
            <div class="card w-100 p-2">
                <strong class="text-center" style="color: #000; font-size: 16px; ">Nom title</strong>
                <div class="row w-100 m-auto justify-content-center">
                    <div class="col-12 p-0" style="max-height: 260px; overflow:hidden;">
                        
                        <img src="{{asset('images/pages/block1.jpg')}}" alt="" class="img-fluid" style="height: 300px">
                    </div>
                </div>
                <a href="" class="text-right">Decouvrir</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 pr-0 pl-0">
            <div class="card c-login mb-2 p-2">
                <div class="cont" style="background: transparent">
                    <p>Créer un compte</p>

                    <a href="" class="btn btn-primary" style="color: #fff">
                    S'inscrire maintenant
                    </a>
                </div>
            </div>
            <div class="card ads p-2">
                ADS
            </div>
        </div>

    </div>

    <div class="second-container w-100 row" style="margin: auto; margin-top: 25px">
        <div class="col-12 p-0">
            <div class="card w-100 p-2" style="border: none; border-radius: 0">
                <div class="title-scon">
                    <h3 style="font-size: 18px">A la Une</h3>
                </div>
                
                <div class="w-100 mt-3" style="position: relative;">
                    <div class="slider-content products">
                        @isset($alaune)
                            @foreach ($alaune as $item)
                                <div class="p-1">
                                   @include('partials.frontoffice._article_item')
                                </div>
                            @endforeach
                        @endisset
                        @empty($alaune)
                            <p>Aucun article</p>
                        @endempty
                    </div>
                    <button class="my-arrow arrow_prev">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <button class="my-arrow arrow_next">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        
    </div>

    <div class="w-100" style="margin-top: 25px">
        <div class="big-ads">
            Ads
        </div>
    </div>
    
    <div class="second-container w-100 row" style="margin: auto; margin-top: 25px">
        <div class="col-12 p-0">
            <div class="card w-100 p-2" style="border: none; border-radius: 0">
                <div class="title-scon">
                    <h3 style="font-size: 18px">En soldes</h3>
                </div>
                
                <div class="w-100 mt-3" style="position: relative;">
                    <div class="slider-contenti products">
                        @isset($solde)
                            @foreach ($solde as $item)
                                <div class="p-1">
                                    @include('partials.frontoffice._article_item')
                                </div>
                            @endforeach
                        @endisset
                        @empty($solde)
                            <p>Aucun article</p>
                        @endempty
                    </div>
                    <button class="my-arrow one_prev">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <button class="my-arrow one_next">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="third-container w-100 row"  style="margin: auto; margin-top: 25px">
        <div class="col-12 col-md-4 col-lg-3 pl-0">
            <div class="card c-login mb-2 p-2" style="border-radius: 0; border: none;">
                <div class="cont" style="background: transparent">
                    <p>Créer votre boutique dès maintenant</p>
                    <a href="" class="btn btn-primary" style="color: #fff">
                        Créer une boutique
                    </a>
                </div>
            </div>
            <div class="card ads p-2 mb-3" style="border-radius: 0; border: none; height:285px">
                ADS
            </div>
        </div>
        
        <div class="col-12 col-md-8 col-lg-9  pl-0 pr-0" >
            <div class="card p-2"  style="border-radius: 0; border: none;">
                <div class="p-1 pb-0 w-100">
                    <div class="d-flex justify-content-between mb-2">
                        <h3 style="font-size: 18px">Mode Femme - Les plus populaires</h3>
                        <a href="" class="text-right">Afficher les autres</a>
                    </div>
                    <div class="w-100" style="position: relative;">
                        <div class="slider-contentr products">
                            @isset($femme)
                                @foreach ($femme as $item)
                                    <div class="p-1">
                                        @include('partials.frontoffice._article_item')
                                    </div>
                                @endforeach
                            @endisset
                            @empty($femme)
                                <p>Aucun article</p>
                            @endempty
                        </div>
                        <button class="my-arrow two_prev">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <button class="my-arrow two_next">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                        
                    </div>
                </div>    
            </div>
        </div>
    </div>

    <div class="four-container w-100" style="margin: auto; margin-top: 25px ;position: relative">
        <div class="w-100 four-box-slide">
            @isset($categories)
                @foreach ($categories as $item)  
                    <div class="pr-1">
                        <div class="card p-2">
                            <a href="" class="w-100 text-center">
                                <strong style="color: #000; margin-bottom: 10px;">{{$item->title}}</strong>
                                <div class="cat-img w-100">
                                    <img src="{{$item->image}}" class="img-fluid" alt="" style="height: 310px">
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endisset
            @empty($categories)
                <p>Aucune categorie</p>
            @endempty
        </div>
        <button class="my-arrow three_prev">
            <i class="fas fa-arrow-left"></i>
        </button>
        <button class="my-arrow three_next">
            <i class="fas fa-arrow-right"></i>
        </button>
    </div>
    <div class="third-container w-100 row"  style="margin: auto; margin-top: 25px">
        <div class="col-12 p-0" >
            <div class="card p-2"  style="border-radius: 0; border: none;">
                <div class="p-1 pb-0 w-100">
                    <div class="d-flex justify-content-between mb-2">
                        <h3 style="font-size: 18px">Mode Homme - Les plus populaires</h3>
                        <a href="" class="text-right">Afficher les autres</a>
                    </div>
                    <div class="w-100" style="position: relative;">
                        <div class="slider-contentp products">
                            @isset($homme)
                                @foreach ($homme as $item)
                                    <div class="p-1">
                                        @include('partials.frontoffice._article_item')
                                    </div>
                                @endforeach
                            @endisset
                            @empty($homme)
                                <p>Aucun article</p>
                            @endempty
                        </div>
                        <button class="my-arrow trois_prev">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <button class="my-arrow trois_next">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                        
                    </div>
                </div>    
            </div>
        </div>
    </div>

</div>

<div class="modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" >
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Nom de l'article</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <span>ici la video</span>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    
@endsection