@extends('layouts.user_app')
@section('content')
    
<div class="box-user-t">
    <h3 style="font-size: 18px">Tableau de board</h3>
  
    <div class="row user-r" style="margin-top: -20px">
      <div class="col-md-12  col-lg-4">
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
        <div class="card mt-2 p-3">
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
      <div class="col-md-12  col-lg-4">
        <div class="card p-3">
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
          <a href="{{route('user.article.index')}}" class="btn btn-link mt-2" style="color: #f5a25e">Afficher toutes les annonces</a>
          @else 
            <a href="{{route('user.article.create')}}" class="btn btn-primary w-100">Ajouter un article</a>
          @endif
  
        </div>
        <div class="card p-3 mt-2">
            <h5>Messages non lus</h5>
            <div class="w-100 p-0 mt-2 mb-2">
              <table class="table" style="font-size: 14px">
                  <thead>
                      <tr>
                          <th>Expétideur</th>
                          <th>Date</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <a href="" class="d-flex">
                          <div class="avat mr-2">
                              <img src="{{asset('images/pages/block1.jpg')}}" class="img-fluid" alt="">
                          </div>
                          <div class="name-exp" style="line-height: 40px; color:#000">
                              <span>Nom expéditeur</span>
                          </div>
                        </a> 
                      </td>
                      <td style="line-height: 40px; color:#000">12-08-2020 </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="" class="d-flex">
                          <div class="avat mr-2">
                              <img src="{{asset('images/pages/block1.jpg')}}" class="img-fluid" alt="">
                          </div>
                          <div class="name-exp" style="line-height: 40px; color:#000">
                              <span>Nom expéditeur</span>
                          </div>
                        </a> 
                      </td>
                      <td style="line-height: 40px; color:#000">12-08-2020 </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="" class="d-flex">
                          <div class="avat mr-2">
                              <img src="{{asset('images/pages/block1.jpg')}}" class="img-fluid" alt="">
                          </div>
                          <div class="name-exp" style="line-height: 40px; color:#000">
                              <span>Nom expéditeur</span>
                          </div>
                        </a> 
                      </td>
                      <td style="line-height: 40px; color:#000">12-08-2020 </td>
                    </tr>
                  </tbody>
              </table>
          </div>
          <a href="" class="btn btn-link mt-2">Afficher la messagerie</a>
  
        </div>
      </div>
      <div class="col-md-12  col-lg-4">
        <div class="card p-3">
            <h5>Résumé</h5>
            <div class="row">
              <div class="col-8"><span style="font-size: 11px">Articles publiés</span></div>
              <div class="col-4"><div class="w-100 text-right"><span style="color: #000; font-size: 1.8rem">{{$articles->count()}}</span></div> </div>
            </div>
            <div class="row">
              <div class="col-8"><span style="font-size: 11px">Nombre de boutique</span></div>
              <div class="col-4"><div class="w-100 text-right"><span style="color: #000; font-size: 1.8rem">{{$boutiques->count()}}</span></div> </div>
            </div>
            <div class="row mt-1">
              <div class="col-8"><span style="font-size: 11px">Commandes réçues</span></div>
              <div class="col-4 "><div class="w-100 text-right"><span style="color: #000; font-size: 1.8rem">140k</span></div></div>
            </div>
        </div>
        <div class="card p-3 mt-2"> 
            <div class="svg-icon" class="w-100">
                <img src="{{asset('images/svg-icon/sponsoring.svg')}}" alt="" class="img-fluid">
            </div>
            <strong class=" mt-2"><a href="" style="color: #000; font-size: 18px">Sponsoriser vos produits</a></strong>
        </div>
        <div class="card p-3 mt-2"> 
          <div class="svg-icon" class="w-100">
              <img src="{{asset('images/svg-icon/visibility.svg')}}" alt="" class="img-fluid">
          </div>
          <strong class="mt-2"><a href="" style="color: #000; font-size: 18px">Comment augmenter sa notoriété?</a></strong>
        </div>
  
      </div>
    </div>
</div>
@endsection
@section('javascript')
    
@endsection