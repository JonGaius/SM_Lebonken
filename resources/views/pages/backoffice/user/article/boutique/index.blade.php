@extends('layouts.user_app')
@section('content')
    
<div class="box-user-t">
    <div class="box-list w-100">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session('erreur'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('erreur') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="head-list">
            <div class="box-list-title pt-4 pl-2 pr-2 w-100">
                <div class="d-md-block d-lg-flex justify-content-between">
                    <div class="mb-2 mb-md-0">
                        <ol class="breadcrumb p-0" style="background: transparent">
                            <li class="breadcrumb-item"><a href="{{route('boutique.show',$boutique->slug)}}">Boutique: {{$boutique->name}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color: #f5a25e; font-weight: bold; font-size: 18px">Mes articles</li>
                        </ol>
                    </div>
                    <div>
                        <a href="{{route('boutique.article.create',$boutique->slug)}}" class="btn btn-primary mb-2 mb-md-0" style="color: #fff"><i class="ti ti-plus"></i> Deposer une annonce</a>
                        <a href="#" class="btn btn-link"><i class="ti ti-help-alt"></i> Comment Sponsoriser un produit?</a>
                    </div>
                </div>
            </div>

            <div class="w-100 pl-3 pr-3" style="background: #fff">
                <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-annonce-tab" data-toggle="pill" href="#pills-annonce" role="tab" aria-controls="pills-annonce" aria-selected="true">Annonces</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-sale-tab" data-toggle="pill" href="#pills-sale" role="tab" aria-controls="pills-sale" aria-selected="false">Brouillon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-sale-tab" data-toggle="pill" href="#pills-trash" role="tab" aria-controls="pills-trash" aria-selected="false">Corbeille</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content w-100" id="pills-tabContent" style="background: #fff">
            
            <div class="tab-pane show active w-100" id="pills-annonce" role="tabpanel" aria-labelledby="pills-annonce-tab">
                @if ($articles->count() > 0)   
                    <div class="row p-2 w-100 m-auto" style="color: black; border-bottom: 0.3px solid rgba(0, 0, 0, 0.123)">
                        <div class="col-1 p-0 text-center responsive-col">#</div>
                        <div class="col-12 col-md-12 col-lg-4 text-left" style="padding-left: 20px">Produit</div>
                        <div class="col-2 p-0 text-center responsive-col">Statut</div>
                        <div class="col-2 p-0 text-center responsive-col">Date d'ajout</div>
                        <div class="col-1 p-0 text-center responsive-col">Nombre de vues</div>
                        <div class="col-2 p-0 text-center responsive-col">Actions</div>
                    </div>
                    <?php $i = 0?>
                    @foreach ($articles as $item)  
                    <?php $i++ ?>
                    <div class="box-list-items w-100 pl-3 pr-3"  style="color: black; border-bottom: 0.3px solid rgba(0, 0, 0, 0.123)">
                        <div class="row p-2 w-100 m-auto">
                            <div class="col-1 p-0 text-center responsive-col">
                                {{$i}}
                            </div>
                            <div class="col-12 col-md-12 col-lg-4 text-left" style="padding-left: 20px">
                                <div class="item-info d-flex pt-5 p-sm-3 ">
                                    <div class="product-img mr-2" style="width: 100px;">
                                        <img src="{{explodeImage($item->images)[0]}}" alt="" class="img-fluid">
                                    </div>
                                    <div class="info-product">
                                        <a href="{{route('boutique.article.show', $item->slug)}}" style="color: #000">{{$item->name}}</a><br>
                                            
                                        @if ($item->admin_active == true)
                                            <span class="responsive-span">
                                                Bloqué par un administrateur
                                            </span>
                                        @else 
                                            @if ($item->active == false)
                                                <span class="responsive-span">
                                                    Inactif
                                                </span>
                                            @else 
                                                @if ($item->type == true)
                                                    <span class="responsive-span">
                                                        En solde
                                                    </span>
                                                @else 
                                                    <span class="responsive-span">
                                                        Actif
                                                    </span>
                                                @endif 
                                            @endif
                                        @endif
                                        
                                        <span class="responsive-span">{{$item->created_at}}</span>
                                        <span class="responsive-span">{{$item->view}} vues</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 p-0 text-center responsive-col">
                                @if ($item->admin_active == true)
                                    <span>
                                        Bloqué par un administrateur
                                    </span>
                                @else 
                                    @if ($item->active == false)
                                        <span>
                                            Inactif
                                        </span>
                                    @else 
                                        @if ($item->type == true)
                                            <span>
                                                En solde
                                            </span>
                                        @else 
                                            <span>
                                                Actif
                                            </span>
                                        @endif 
                                    @endif
                                @endif
                            </div>
                            <div class="col-2 p-0 text-center responsive-col">{{$item->created_at}}</div>
                            <div class="col-1 p-0 text-center responsive-col">{{$item->view}} vues</div>
                            <div class="col-2 p-0 text-center responsive-col">
                                <a href="{{route('boutique.article.show', $item->slug)}}" class="btn btn-primary mb-2" style="color: #fff"><i class="ti ti-eye"></i></a>
                                <a href="{{route('boutique.article.edit', $item->slug)}}" class="btn btn-light mb-2"><i class="far fa-edit"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach                  
                @else
                    <p>Aucun article enrégistré</p>
                @endif
    
            </div>
           
            <div class="tab-pane" id="pills-sale" role="tabpanel" aria-labelledby="pills-sale-tab">
                @if ($brouillon->count() > 0)   
                    <div class="row p-2 w-100 m-auto" style="color: black; border-bottom: 0.3px solid rgba(0, 0, 0, 0.123)">
                        <div class="col-1 p-0 text-center responsive-col">#</div>
                        <div class="col-12 col-md-12 col-lg-4 text-left" style="padding-left: 20px">Produit</div>
                        <div class="col-2 p-0 text-center responsive-col">Date d'ajout</div>
                        <div class="col-1 p-0 text-center responsive-col">Nombre de vues</div>
                        <div class="col-2 p-0 text-center responsive-col">Actions</div>
                    </div>
                    <?php $i = 0?>
                    <form action="" class="w-100">
                        @foreach ($brouillon as $item)  
                            <?php $i++ ?>            
                            <div class="box-list-items w-100 pl-3 pr-3">
                                <div class="row p-2 w-100 m-auto" style="color: black; border-bottom: 0.3px solid rgba(0, 0, 0, 0.123)">
                                    <div class="col-1 p-0 text-center responsive-col">
                                        <input type="checkbox" name="article_slug[]" id="article_slug[]" value="{{$item->slug}}">
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-4 text-left" style="padding-left: 20px">
                                        <div class="item-info d-flex pt-5 p-sm-3 ">
                                            <div class="product-img mr-2" style="width: 100px;">
                                                <img src="{{explodeImage($item->images)[0]}}" alt="" class="img-fluid">
                                            </div>
                                            <div class="info-product">
                                                <label style="color: #000" for="article_slug[]">{{$item->name}}</label><br>
                                                <span class="responsive-span">{{$item->created_at}}</span>
                                                <span class="responsive-span">{{$item->view}} vues</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 p-0 text-center responsive-col">{{$item->created_at}}</div>
                                    <div class="col-1 p-0 text-center responsive-col">{{$item->view}} vues</div>
                                    <div class="col-2 p-0 text-center responsive-col">
                                        <a href="{{route('boutique.article.show', $item->slug)}}" class="btn btn-primary mb-2" style="color: #fff"><i class="ti ti-eye"></i></a>
                                        <a href="{{route('boutique.article.edit', $item->slug)}}" class="btn btn-light mb-2"><i class="far fa-edit"></i></a>
                                        <a href="{{route('boutique.article.online', $item->slug)}}" class="btn btn-light mb-2"><i class="fas fa-bullhorn"></i></a>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach  
                    </form>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="ttm-pagination">
                                {{$articles->links()}}
                            </div>
                        </div>
                    </div>
                @else
                    <p>Aucun article enrégistré</p>
                @endif
            </div>
            <div class="tab-pane" id="pills-trash" role="tabpanel" aria-labelledby="pills-trash-tab">
                @if ($brouillon->count() > 0)   
                    <div class="row p-2 w-100 m-auto" style="color: black; border-bottom: 0.3px solid rgba(0, 0, 0, 0.123)">
                        <div class="col-1 p-0 text-center responsive-col">#</div>
                        <div class="col-12 col-md-12 col-lg-4 text-left" style="padding-left: 20px">Produit</div>
                        <div class="col-2 p-0 text-center responsive-col">Date d'ajout</div>
                        <div class="col-1 p-0 text-center responsive-col">Nombre de vues</div>
                        <div class="col-2 p-0 text-center responsive-col">Actions</div>
                    </div>
                    <?php $i = 0?>
                    @foreach ($brouillon as $item)  
                    <?php $i++ ?>
                    <div class="box-list-items w-100 pl-3 pr-3">
                        <div class="row p-2 w-100 m-auto" style="color: black; border-bottom: 0.3px solid rgba(0, 0, 0, 0.123)">
                            <div class="col-1 p-0 text-center responsive-col">{{$i}}</div>
                            <div class="col-12 col-md-12 col-lg-4 text-left" style="padding-left: 20px">
                                <div class="item-info d-flex pt-5 p-sm-3 ">
                                    <div class="product-img mr-2" style="width: 100px;">
                                        <img src="{{explodeImage($item->images)[0]}}" alt="" class="img-fluid">
                                    </div>
                                    <div class="info-product">
                                        <a href="{{route('user.article.show', $item->slug)}}" style="color: #000">{{$item->name}}</a><br>
                                        <span class="responsive-span">{{$item->created_at}}</span>
                                        <span class="responsive-span">{{$item->view}} vues</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 p-0 text-center responsive-col">{{$item->created_at}}</div>
                            <div class="col-1 p-0 text-center responsive-col">{{$item->view}} vues</div>
                            <div class="col-2 p-0 text-center responsive-col">
                                <a href="" class="btn btn-primary mb-2"  style="color: #fff"><i class="fas fa-recycle"></i></a>
                                <a href="" class="btn btn-light mb-2"><i class="fas fa-trash"></i></a>  
                            </div>
                        </div>
                    </div>
                    @endforeach  
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="ttm-pagination">
                                {{$articles->links()}}
                            </div>
                        </div>
                    </div>
                @else
                    <p>Aucun article enrégistré</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
   
@endsection