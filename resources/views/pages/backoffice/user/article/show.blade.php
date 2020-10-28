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
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('erreur') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="head-list">
            <div class="box-list-title pt-4 pl-2 pr-2 w-100">
                <div class="d-md-block d-lg-flex justify-content-between">               
                    @if ($boutique)
                    <div class="mb-2 mb-md-0">
                        <ol class="breadcrumb p-0" style="background: transparent">
                            <li class="breadcrumb-item"><a href="{{route('boutique.show',$article->laBoutique->slug)}}">Boutique: {{$article->laBoutique->name}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('boutique.article.index',$article->laBoutique->slug)}}">Articles</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color: #f5a25e; font-weight: bold; font-size: 18px">Article: {{$article->name}}</li>
                        </ol>
                    </div>
                    @else
                        <div class="mb-2 mb-md-0">
                            <h5>Article: {{$article->name}}</h5>
                        </div>
                        @if (authUser()->boutiques->count() > 0)  
                            <div>
                                <a href="#" class="btn btn-primary" style="color: #fff" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-exchange-alt"></i> Transférer vers une boutique</a>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <div class="row w-100 m-auto">
            <div class="col-12 col-md-6 col-lg-3 pl-0 pr-0">
                <div class="card w-100 p-3">
                    <h5 class="mb-2">Images de l'article</h5>
                    <div class="row w-100 m-auto">
                        @foreach (explodeImage($article->images) as $itemf)
                            <div class="p-2 col-6">
                                <img src="{{$itemf}}" alt="" onmouseover="chooseIt(this)" onclick="chooseIt(this)" class="img-fluid" style="height: 150px;">
                            </div>
                        @endforeach
                    </div>
                    
                </div>
                <div class="card p-3 mt-3 text-left">
                    <h5>{{$article->name}}</h5>
                    <span>Prix: {{number_format($article->price,0,' ',' ')}} FR</span>
                    <span>Prix de Livraison: {{number_format($article->livraison,0,' ',' ')}} FR</span>
                    <span>Quantité: {{number_format($article->livraison,0,' ',' ')}}</span>
                    @if ($article->admin_active == true)
                        <span>
                            Bloqué par un administrateur
                        </span>
                    @else 
                        @if ($article->active == false)
                            <span>
                                Inactif
                            </span>
                        @else 
                            @if ($article->type == true)
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
                    <span class="mb-3">Créée le {{$article->created_at->format('j-m-Y')}}</span>
                    <div class="row w-100 m-auto">
                        <div class="col-12 mb-2 pl-0 pr-0">
                            <a href="{{route('frontoffice.article.show',$article->slug)}}" class="btn btn-light w-100" style="color: #f5a25e" target="_blank">
                                <i class="ti ti-eye"></i> Voir un apercu
                            </a>
                        </div>
                        @if ($boutique)
                            <div class="col-6 pl-0">
                                <a href="{{route('boutique.article.edit',$article->slug)}}" class="btn btn-primary w-100" style="color: #fff">
                                    <i class="far fa-edit"></i> Modifier
                                </a>
                            </div>
                            <div class="col-6 pr-0">
                                <a href="" class="btn btn-danger w-100" style="color: #fff">
                                    <i class="ti ti-na"></i> Supprimer
                                </a>
                            </div>

                        @else
                            <div class="col-6 pl-0">
                                <a href="{{route('user.article.edit',$article->slug)}}" class="btn btn-primary w-100" style="color: #fff">
                                    <i class="far fa-edit"></i> Modifier
                                </a>
                            </div>
                            <div class="col-6 pr-0">
                                <a href="" class="btn btn-danger w-100" style="color: #fff">
                                    <i class="ti ti-na"></i> Supprimer
                                </a>
                            </div>
                        @endif
                       
                        
                    </div>
                   
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-9 pr-0">
                <div class="row w-100 m-auto">
                    <div class="col-12 col-md-6 pr-0 pl-0">
                        <div class="card w-100 p-3">
                            <h5 class="mb-2">Attributs de l'article</h5>
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
                        </div>
                        <div class="card w-100 p-3 mt-3">
                            <h5>Description</h5>
                            <p>{{$article->description}}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 pr-0">
                        <div class="card p-3">
                            <h5>Statut sur le produit</h5>
                            <div class="row">
                                <div class="col-8"><span style="font-size: 11px">Les favoris</span></div>
                                <div class="col-4"><div class="w-100 text-right"><span style="color: #000; font-size: 1.8rem">100K</span></div> </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-8"><span style="font-size: 11px">Vues</span></div>
                                <div class="col-4 "><div class="w-100 text-right"><span style="color: #000; font-size: 1.8rem">{{$article->view}}</span></div></div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-8"><span style="font-size: 11px">Commandes</span></div>
                                <div class="col-4 "><div class="w-100 text-right"><span style="color: #000; font-size: 1.8rem">0</span></div></div>
                            </div>
                        </div>
                        <div class="card p-3  mt-3">
                            <h5>Nouvelles commandes </h5>
                            <div class="w-100 p-0 mt-2 mb-2">
                                <table class="table" style="font-size: 14px">
                                    <thead>
                                        <tr>
                                            <th>Produit</th>
                                            <th>Quantité</th>
                                            <th>N. Client</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td><a href="">Product name</a></td>
                                        <td>10</td>
                                        <td>75 59 25 45</td>
                                      </tr>
                                      <tr>
                                        <td><a href="">Product name</a></td>
                                        <td>10</td>
                                        <td>75 59 25 45</td>
                                      </tr>
                                      <tr>
                                        <td><a href="">Product name</a></td>
                                        <td>10</td>
                                        <td>75 59 25 45</td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="" class="btn btn-link mt-2"  style="color: #f5a25e">Afficher toutes les commandes</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @if ($boutique == null)
        @if (authUser()->boutiques->count() > 0)  
             <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title text-left" id="staticBackdropLabel">Transférer l'article<br>{{$article->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{route('user.article.transferUpdate',$article->slug)}}" method="POST" id="transfer-form">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <div class="form-group row w-100 m-auto">
                                <label for="formGroupExampleInput" class="col-12 text-left">Choisir la boutique</label>
                                <select class="form-control col-12" name="boutique_slug">
                                    @foreach (authUser()->boutiques as $boutique)
                                    <option value="{{$boutique->slug}}">
                                        {{$boutique->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="text-transform: none">Annuler</button>
                            <button type="button" class="btn btn-primary" style="text-transform: none"  onclick="event.preventDefault();
                            document.getElementById('transfer-form').submit();">Transférer</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        @endif
    @endif
   
@endsection
@section('javascript')
   
@endsection