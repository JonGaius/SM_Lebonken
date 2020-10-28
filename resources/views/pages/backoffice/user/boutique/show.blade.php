@extends('layouts.user_app')
@section('content')
<div class="box-user-t">
    <div class="row w-100 m-auto">
        <div class="col-12 col-md-6 col-lg-3 pl-0 pr-0">
            <div class="card w-100">
                <div class="banner-boutique w-100" style="height: 290px">
                    <img src="{{$boutique->banner}}" alt="" class="img-fluid" style="height:100%">
                </div>
                <div class="boutique-images m-auto boxshadow" style="width: 140px; height:140px; border-radius:50%; overflow:hidden; transform: translateY(-50%)">
                    <img src="{{$boutique->image}}" alt="" class="img-fluid" style="height:100%">
                </div>

                <div class="boutique-info w-100 text-center" style="margin-top: -40px">
                    <span>Boutique</span><br>
                    <h3>{{$boutique->name}}</h3>
                </div>
                <div class="boutique p-3" style="margin-top: 20px">
                    <a href="{{route('boutique.article.create',$boutique->slug)}}" class="btn btn-primary w-100 mb-2">
                        <i class="ti ti-plus"></i> Ajouter un article
                    </a>
                    <a href="" class="btn btn-light w-100 mb-2" style="color: #f5a25e">
                        Demander une certification
                    </a>
                </div>
            </div>
            <div class="card p-3 mt-3 text-center">

                <span class="mb-3">Créée le {{$boutique->created_at->format('j-m-Y')}}</span>
                <div class="row w-100 m-auto">
                    <div class="col-6 pl-0">
                        <a href="{{route('boutique.edit',$boutique->slug)}}" class="btn btn-primary w-100">
                            <i class="far fa-edit"></i> Modifier
                        </a>
                    </div>
                    <div class="col-6 pr-0">
                        <a href="" class="btn btn-light w-100" style="color: #f5a25e">
                            <i class="ti ti-na"></i> Desactiver
                        </a>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-9 pr-0">
            <div class="row w-100 m-auto">
                <div class="col-12 col-md-6 pr-0 pl-0">
                    <div class="card w-100 p-3">
                        <h5>Annonce Sponsorisée</h5>
                        <div class="img-spons-prt w-100 mt-2" style="max-height: 200px; overflow: hidden;">
                          <img src="{{asset('images/pages/block2.jpg')}}" alt="" class="img-fluid">
                        </div>
                        <div class="stats w-100 mt-2">
                            <span style="font-size: 16px;">
                                Titre de l'annonce sponsorisée
                            </span>
                            <div class="row mt-2">
                              <div class="col-8">
                                  <span>
                                      Nombre de visites
                                  </span>
                              </div>
                              <div class="col-4">
                                  <strong>
                                    12k
                                  </strong>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-8">
                                  <span>
                                      Nombre de commandes
                                  </span>
                              </div>
                              <div class="col-4">
                                  <strong>
                                    10k
                                  </strong>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-8">
                                  <span>
                                      Quantité restante
                                  </span>
                              </div>
                              <div class="col-4">
                                  <strong>
                                    7% (10)
                                  </strong>
                              </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="row w-100 mt-2">
                              <div class="col-12">
                                <a href="" class="btn btn-link"  style="color: #f5a25e">Afficher les commandes</a>
                              </div>
                              <div class="col-12">
                                <a href="" class="btn btn-link"  style="color: #f5a25e">Voir plus de détails</a>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="card w-100 p-3 mt-3">
                        <h5>Nouvelles Commandes</h5>
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
                <div class="col-12 col-md-6 pr-0">
                    <div class="card p-3">
                        <h5>Résumé</h5>
                        <div class="row">
                          <div class="col-8"><span style="font-size: 11px">Articles publiés</span></div>
                          <div class="col-4"><div class="w-100 text-right"><span style="color: #000; font-size: 1.8rem">{{$articles->count()}}</span></div> </div>
                        </div>
                        <div class="row mt-1">
                          <div class="col-8"><span style="font-size: 11px">Commandes réçues</span></div>
                          <div class="col-4 "><div class="w-100 text-right"><span style="color: #000; font-size: 1.8rem">140k</span></div></div>
                        </div>
                    </div>
                    <div class="card p-3 mt-3">
                        <h5>Statut sur les produits</h5>
                        @if ($articles->count() > 0)
                        <div class="w-100 p-0 mt-2 mb-2">
                          <table class="table" style="font-size: 14px">
                              <thead>
                                  <tr>
                                      <th>Image</th>
                                      <th>Produit</th>
                                      <th>Nombre de vues</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($articles_take as $item)
                                  <tr>
                                    <td>
                                        <a href=""><img src="{{explodeImage($item->images)[0]}}" alt="" style="width: 60px"></a>
                                    </td>
                                    <td><a href="">{{$item->name}}</a> </td>
                                    <td>{{$item->view}} <i class="ti ti-eye"></i></td>
                                  </tr>
                                  @endforeach 
                              </tbody>
                          </table>
                        </div>
                        <a href="{{route('boutique.article.index',$boutique->slug)}}" class="btn btn-link mt-2" style="color: #f5a25e">Afficher toutes les annonces</a>
                      @else 
                        Aucun article enrégistré
                        <a href="{{route('boutique.article.create',$boutique->slug)}}" class="btn btn-primary w-100"><i class="ti ti-plus"></i> Ajouter un article</a>
                      @endif
              
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    
@endsection