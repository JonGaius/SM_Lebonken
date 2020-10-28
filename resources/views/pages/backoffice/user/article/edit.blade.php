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
                    @if ($boutique)
                    <div class="mb-2 mb-md-0">
                        <ol class="breadcrumb p-0" style="background: transparent">
                            <li class="breadcrumb-item"><a href="{{route('boutique.show',$article->laBoutique->slug)}}">Boutique: {{$article->laBoutique->name}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('boutique.article.index',$article->laBoutique->slug)}}">Articles</a></li>
                            <li class="breadcrumb-item"><a href="{{route('boutique.article.show',$article->slug)}}">{{$article->name}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color: #f5a25e; font-weight: bold; font-size: 18px">Edition</li>
                        </ol>
                    </div>
                    @else
                        <div class="mb-2 mb-md-0">
                            <h5>Edition - Article: {{$article->name}}</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row w-100 m-auto">
            <div class="col-12 col-md-6 col-lg-4 pl-0 pr-0">
                <div class="card w-100 p-3">
                    <form action="{{route('article.update.images', $article->slug)}}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <h5 style="margin-left: 8px; margin-bottom: 0px">Images de l'article</h5>
                        <div class="w-100 row m-auto" id="prev">
                            @if (explodeImage($article->images) != null)
                                @foreach (explodeImage($article->images) as $item)
                                    <div class="col-12 col-md-6 p-2">
                                        <img src="{{$item}}" alt="" style="height: 150px; width: 100%;border: 1px solid rgba(0, 0, 0, 0.253);">
                                        <input type="hidden" name="pictures[]" value="{{$item}}">
                                        <button type="button" class="btn btn-danger btn-remove mt-2 w-100 text-capitalize">Supprimer</button>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 text-center">
                                    Aucune image
                                </div>
                            @endif   
                        </div>
                        <div class="w-100 mb-2 for-image" style="padding: 15px;">
                            <span>Cliquez pour ajouter des images</span>
                            <div class="center-picture">
                                <input type="file" accept="image/jpeg, image/png, image/jpg"
                                id="files" 
                                multiple
                                name="new-pictures[]"
                                label="Cliquer pour ajouter des photos"
                                help=""
                                is="drop-files">
                            </div>
                            <style>
                                .drop-files__file {
                                    position: relative;
                                    max-width: 130px;
                                    width: 100%;
                                    flex: none;
                                    display: flex;
                                    flex-direction: column;
                                    justify-content: center;
                                    align-items: center;
                                    margin: 5px;
                                    z-index: 2;
                                }
                                .drop-files__file img {
                                    width: 100%;
                                    height: 130px;
                                    object-fit: cover;
                                }
                                .drop-files__fileinfo {
                                    margin-top: .5rem;
                                    display: none;
                                }
                                .drop-files__delete {
                                    box-sizing: border-box;
                                    color: #000000;
                                    background: #fff;
                                    position: absolute;
                                    top: 2px;
                                    right: 2px;
                                    padding: 8px 10px;
                                    width: 40px !important;
                                    height: 40px !important;
                                    transition: opacity .3s;
                                    opacity: 0.8;
                                    border-radius: 4px;
                                    cursor: pointer;
                                    width: 20px;
                                }
                            </style>
                        </div>
                        <button type="submit" class="btn btn-light w-100 mt-3" style="color:  #df6412; text-transform: none">Sauvegarder les changements</button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8 pr-0">
                <div class="card w-100 p-3">
                    <h5>Information sur l'article</h5>
                    <form action="{{route('article.update.information', $article->slug)}}" class="w-100 mt-2" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label text-right">Titre de l'article</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Entrer le titre de l'article" value="{{old('name') ?? $article->name}}">
                                @error('name')
                                <span class="invalid-feedback">
                                   {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label text-right">Prix de l'article</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Entrer le prix de l'article" value="{{old('price') ?? $article->price}}">
                                @error('price')
                                <span class="invalid-feedback">
                                   {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="condition" class="col-sm-3 col-form-label text-right">Etat de l'article /10</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('condition') is-invalid @enderror" id="condition" name="condition" placeholder="Entrer l'etat de l'article" value="{{old('condition') ?? $article->condition}}">
                                @error('condition')
                                <span class="invalid-feedback">
                                   {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label text-right">Description de l'article</label>
                            <div class="col-sm-9">
                                <textarea type="number" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Description de l'article" style="height: 150px; resize: none">{{old('description') ?? $article->description}}</textarea>
                                @error('description')
                                <span class="invalid-feedback">
                                   {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantity" class="col-sm-3 col-form-label text-right">Quantité</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" placeholder="ex: 1500" name="quantity" id="quantity" value="{{old('quantity') ?? $article->quantity}}">
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="livraison" class="col-sm-3 col-form-label text-right">Prix de la livraison <br>(0 si c'est gratuit)</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('livraison') is-invalid @enderror" placeholder="ex: 1500" name="livraison" id="livraison" value="{{old('livraison')  ?? $article->livraison}}">
                                @error('livraison')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 text-right pr-2 m-2">
                            <button type="submit" class="btn btn-primary" style="text-transform: none">Sauvegarder les modifications</button>
                        </div>
                    </form>
                </div>
                <div class="card w-100 p-3 mt-3">
                    <h5>Caractéristiques de l'article</h5>
                    @if ($article->attributes->count() > 0)
                    <form action="{{route('article.update.attribut',$article->slug)}}" method="POST" class="mt-3 w-100">
                        @method('PATCH')
                        @csrf
                        @foreach ($article->attributes as $item)
                        <div class="form-group row">
                            <label for="livraison" class="col-sm-3 col-form-label text-right">{{$item->subcategoryattribute->name}}</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="subattribute[]" value="{{$item->subcategoryattribute->ref}}">
                                <input type="{{$item->subcategoryattribute->type}}" class="form-control" name="value[]" id="livraison" value="{{$item->value}}">
                            </div>
                            
                        </div>
                        @endforeach
                        <div class="col-12 text-right pr-2 m-2">
                            <button type="submit" class="btn btn-primary" style="text-transform: none">Sauvegarder les modifications</button>
                        </div>
                    </form>
                    @else
                        <p class="text-center mt-2">
                            Aucune Caractéristique
                        </p>
                    @endif
                    
                </div>
            </div>
           
        </div>
    </div>
</div>

  
@endsection
@section('javascript')
<script>
    var btnRemoves = document.querySelectorAll('.btn-remove');
    btnRemoves.forEach(btnRemove =>{
        btnRemove.addEventListener('click', function(){
            this.parentNode.remove();
        });
    })
</script>
@endsection