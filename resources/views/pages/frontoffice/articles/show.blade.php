@extends('layouts.app')
@section('content')
<div class="container mb-3" style="margin-top: 50px">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <div class="row w-100 m-auto">
        <div class="col-12 col-md-6 col-lg-5 pl-0">
                <div class="annonce-picture w-100">
                    <div class="picture w-100" style="height: 420px; border: 1px solid rgb(248, 171, 71)">
                        
                        <img src="{{explodeImage($article->images)[0]}}" alt="" id="mainImg" class="img-fluid" style="height: 100%">
                    </div>
                </div>
                <div class="w-100" style="position: relative">
                    <div class="silde-img">
                        @foreach (explodeImage($article->images) as $item)
                            <div class="lil-img p-1">
                                <img src="{{$item}}" alt="" onmouseover="chooseIt(this)" onclick="chooseIt(this)" class="img-fluid" style="height: 50px;margin-right: 10px">
                            </div>
                        @endforeach
                    </div>
                    <button class="my-arrow three_prev">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <button class="my-arrow three_next">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
        </div>
        <div class="col-12 col-md-6 col-lg-7 p-0">
            <div class="card p-3"  style="border-radius: 0; border:none">
                    <h4>{{$article->title}}</h4>
                    <div class="row w-100 m-auto">
                        <div class="col-12 p-0 text-left ">
                            <span>Vendeur </span>: 
                                @if ($article->boutique == false)
                                    <a href="" style="color: #000;" class="text-capitalize">
                                        {{$article->user->name}}
                                    </a>
                                @else
                                
                                    <a href="" style="color: #000;" class="text-capitalize">
                                        {{$article->laBoutique->name}}
                                    </a>
                                @endif
                        </div>
                    </div>
                    <div class="dropdown-divider p-1"></div>
                    <div class="row w-100 m-auto">
                        <div class="col-4 p-0 text-left ">
                            <span>Sous-catégorie </span>
                        </div>
                        <div class="col-12 col-md-8 text-left ">
                            : <a href="" style="color: #000;" class="text-capitalize">{{$article->subcategory->name}}</a>
                        </div>
                    </div>
                    <div class="dropdown-divider p-1"></div>
                    <div class="row w-100 m-auto">
                        <div class="col-4 p-0 text-left ">
                            <span>Prix: </span>
                        </div>
                        <div class="col-12 col-md-8 text-left ">
                            : <span style="color: #000">{{number_format($article->price,0,' ',' ')}} Fr</span>
                        </div>
                    </div>
                    @if ($article->attributes->count() > 0)
                        @foreach ($article->attributes as $item)
                        <div class="row w-100 m-auto">
                            <div class="col-4 text-left p-0">
                                <span class="text-capitalize">{{$item->subcategoryattribute->name}}</span>
                            </div>
                            <div class="col-12 col-md-8 text-left">
                                <span  style="color: #000">: {{$item->value}}</span>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    <div class="dropdown-divider p-1"></div>
                    <div class="row w-100 m-auto">
                        <div class="col-4 p-0 text-left ">
                            <span>Livraison</span>
                        </div>
                        <div class="col-12 col-md-8 text-left ">
                            
                            : <span style="color: #000">
                                @if ($article->livraison == 0 )
                                    Gratuite
                                @else
                                    {{number_format($article->livraison, 0, ' ',' ').' XOF'}}
                                @endif
                                
                            </span>
                        </div>
                    </div>
                    <div class="dropdown-divider p-1"></div>
                    En stock: <span id="#qt">{{$article->quantity}}</span>
                    <div class="row w-100 m-auto">
                        <div class="col-4 p-0 text-left">
                            Quantité
                        </div>
                        <div class="col-12 col-md-5 p-0 text-left">
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary" id="moins">-</button>
                                <span id="qte" style="margin-top: 5px; margin-left: 10px; margin-right: 10px;">0</span>
                                <button type="button" class="btn btn-primary" id="plus">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="p-3"></div>
                    <div class="row w-100 m-auto">
                        <div class="col-12 col-md-6 col-lg-4 pl-0">
                            <a href="" class="btn btn-stroke w-100">
                                <i class="ti ti-shopping-cart"></i> Panier
                            </a>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 p-0">
                            <a href="" class="btn btn-primary w-100" style="color: #fff; border-radius: 2px;">
                                Commander
                            </a>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 pr-0">
                            <a href="" class="btn btn-light w-100">
                                <i class="ti ti-heart"></i> Favoris
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="card w-100 mt-3 mb-3 p-3" style="position: relative; border-radius:0; border: none;">
        <ul class="nav nav-pills mb-3 w-100 justify-content-around" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-vendeur-tab" data-toggle="pill" href="#pills-vendeur" role="tab" aria-controls="pills-vendeur" aria-selected="true">Le vendeur</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-selected="false">Description</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-vendeur" role="tabpanel" aria-labelledby="pills-vendeur-tab">1..</div>
            <div class="tab-pane fade" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                <p>
                    {{$article->description}}
                </p>
            </div>
          </div>
    </div>
    @isset($other)
    <div class="card w-100 mt-3 mb-3 p-3" style="position: relative; border-radius:0; border: none;">
        <div class="title-scon">
            <h3 style="font-size: 18px">Du même vendeur</h3>
        </div>
        
        <div class="w-100 mt-3" style="position: relative;">
            <div class="slider-content products">
                    @foreach ($other as $item)
                        <div class="p-1">
                           @include('partials.frontoffice._article_item')
                        </div>
                    @endforeach
            </div>
            <button class="my-arrow arrow_prev">
                <i class="fas fa-arrow-left"></i>
            </button>
            <button class="my-arrow arrow_next">
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>
    @endisset

    <div class="card mb-3 p-3 w-100" style="position: relative; border-radius:0; border: none;">
        <div class="title-scon">
            <h3 style="font-size: 18px">Cela pourrait vous interesser</h3>
        </div>
        <div class="row w-100 m-auto">
            @foreach ($subcategory as $item)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="products">
                        @include('partials.frontoffice._article_item')
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    function chooseIt(lilImg){
        fullImg = document.getElementById("mainImg");
        fullImg.src = lilImg.src;  
    }
</script>
<script>
var plus = document.querySelector('#plus');
var moins = document.querySelector('#moins');
var nbre = document.querySelector('#qte');
var cpt = parseInt(nbre.innerText);

var p = JSON.parse("{{ json_encode($article->quantity) }}");

plus.addEventListener('click', function(){
    //console.log(cpt);
    if(cpt < parseInt(p)){
        cpt = cpt + 1;
        nbre.innerHTML = cpt;
    }
});
moins.addEventListener('click', function(){
    //console.log(cpt);
    if(cpt>0){
        cpt = cpt - 1;
        nbre.innerHTML = cpt;
    }
});

</script>
@endsection