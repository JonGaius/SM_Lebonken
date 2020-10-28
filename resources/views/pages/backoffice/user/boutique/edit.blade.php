@extends('layouts.user_app')
@section('content')
<div class="box-user-t"> 
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
    <div class="box-list-title pt-4 pl-2 pr-2 w-100">
        <div class="d-md-block d-lg-flex justify-content-between">
            <div class="mb-2 mb-md-0">
                <ol class="breadcrumb p-0" style="background: transparent">
                    <li class="breadcrumb-item"><a href="{{route('boutique.show',$boutique->slug)}}">Boutique: {{$boutique->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #f5a25e; font-weight: bold; font-size: 18px">Edition</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row w-100 m-auto">
        <div class="col-12 col-md-6 col-lg-4 pl-0 pr-0" >
            <div class="card w-100"  style="border: none">
                <form action="{{route('boutique.updateImg',$boutique->slug)}}" method="POST" class="w-100" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="banner-boutique w-100" style="height: 290px;position:relative;">
                        <img src="{{$boutique->banner}}" alt="" class="img-fluid" style="height:100%" id="outputban">
                        <input type="file" name="banner" id="banner" accept="images/jpg,png,jpeg" class="d-none" value="" onchange="loadFileBanner(event)">
                        <label for="banner" class="btn btn-primary" style="position: absolute; bottom:5px; right:5px" >
                            <i class="fas fa-camera"></i>
                        </label>
                    </div>
                    <div class="boutique-images m-auto boxshadow" style="">
                        <img src="{{$boutique->image}}" alt="" class="img-fluid" style="height:100%" id="outputimg">
                        <input type="file" name="image" id="image" accept="images/jpg,png,jpeg" class="d-none" onchange="loadFileImg(event)">
                        <label for="image" class="label-img">
                            <span class="btn btn-primary">
                                <i class="fas fa-camera"></i>
                            </span>
                        </label>
                    </div>
                    <div class="boutique p-3" style="margin-top: -60px">
                        <button type="submit" class="btn btn-light w-100 mb-2" style="color: #f8a968; text-transform: none;">
                            Enrégistrer les modifications
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-8 pr-0">
            <div class="card w-100 p-3" style="border: none">
                <h5>Informations de la boutique</h5>
                <form action="{{route('boutique.updateInfo',$boutique->slug)}}" method="POST" class="w-100 mt-2">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label text-right">Nom de la boutique</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Entrer le nom de la boutique" value="{{old('name') ?? $boutique->name}}">
                            @error('name')
                            <span class="invalid-feedback">
                               {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label text-right">Email de la boutique</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Ex: adresse@email.example" value="{{old('email') ?? $boutique->email}}">
                            @error('email')
                            <span class="invalid-feedback">
                               {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label text-right">Telephone de la boutique</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Ex: +226 70 00 00 00" value="{{old('phone') ?? $boutique->phone}}">
                            @error('phone')
                            <span class="invalid-feedback">
                               {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="location" class="col-sm-3 col-form-label text-right">Localisation de la boutique</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" placeholder="Entrer la localisation de la boutique" value="{{old('location') ?? $boutique->location}}">
                            @error('location')
                            <span class="invalid-feedback">
                               {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 text-right pr-2 m-2">
                        <button type="submit" class="btn btn-primary" style="text-transform: none">Sauvegarder les modifications</button>
                    </div>
                </form>
            </div>
            <div class="card w-100 p-3 mt-3"  style="border: none">
                <h5>Reseaux sociaux</h5>
                <form action="{{route('boutique.updatesocial',$boutique->slug)}}" method="POST" class="mt-2 w-100">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="facebook_social_link" class="col-sm-3 col-form-label text-right">Lien Facebook</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('facebook_social_link') is-invalid @enderror" id="facebook_social_link" name="facebook_social_link" placeholder="Entrer le lien de la page facebook de la boutique" value="{{old('facebook_social_link') ?? $boutique->facebook()}}">
                            @error('facebook_social_link')
                            <span class="invalid-feedback">
                               {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="twitter_social_link" class="col-sm-3 col-form-label text-right">Lien Twitter</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('twitter_social_link') is-invalid @enderror" id="twitter_social_link" name="twitter_social_link" placeholder="Entrer le lien du compte twitter de la boutique" value="{{old('twitter_social_link') ?? $boutique->twitter()}}">
                            @error('twitter_social_link')
                            <span class="invalid-feedback">
                               {{$message}}
                            </span>
                            @enderror 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="youtube_social_link" class="col-sm-3 col-form-label text-right">Lien Youtube</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('youtube_social_link') is-invalid @enderror" id="youtube_social_link" name="youtube_social_link" placeholder="Entrer le lien de lachaine youtube de la boutique" value="{{old('youtube_social_link') ?? $boutique->youtube()}}">
                            @error('youtube_social_link')
                            <span class="invalid-feedback">
                               {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 text-right pr-2 m-2">
                        <button type="submit" class="btn btn-primary" style="text-transform: none">Sauvegarder les modifications</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script>
        var loadFileImg = function(event) {
            var image = document.getElementById('outputimg');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        var loadFileBanner = function(event) {
            var image = document.getElementById('outputban');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection