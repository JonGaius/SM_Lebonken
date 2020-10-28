@extends('layouts.user_app')
@section('content')
<div class="box-user-t">
    <h3 style="font-size: 18px">Vendez votre article</h3>
    <div class="row w-100 m-auto">
        <div class="col-12 col-md-6 col-lg-9 p-0">
            <form action="{{route('boutique.store')}}" method="POST" class="w-100" id="create-form" enctype="multipart/form-data">
                @csrf
                <div class="card w-100 mb-2 for-image" style="padding: 15px;">
                    <span>Entrer des images de votre CNIB</span>
                    <div class="center-picture">
                        <input type="file" accept="image/jpeg, image/png, image/jpg"
                        id="files" 
                        multiple
                        name="document_images[]"
                        label="Cliquer pour ajouter des images"
                        help=""
                        is="drop-files" value="{{old('document_images')}}">
                    </div>
                    <style>
                        .drop-files__file {
                            position: relative;
                            max-width: 133.5px;
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
                <div class="card w-100 mb-2" style="padding: 15px">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-md-4 col-form-label text-rigth" style="font-size: 16px; padding-left: 20px">Nom de la boutique</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="ex: Chaussure Nike converse..." name="name" id="name" value="{{old('name')}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="dropdown-divider p-1"></div>
                    <div class="form-group row">
                        <label for="location" class="col-sm-2 col-md-4 col-form-label text-rigth" style="font-size: 16px; padding-left: 20px">Localisation</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" class="form-control @error('condition') is-invalid @enderror" placeholder="localisation" name="location" id="location" value="{{old('location')}}">
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="w-100 row m-auto">
                    <div class="col-md-12 col-lg-5"></div>
                    <div class="col-md-12 col-lg-7 p-0">
                        <div class="row w-100 m-auto">
                            <div class="col-6">
                            </div>
                            <div class="col-6 pr-0">
                                <button class="btn btn-primary w-100" style="text-transform: none; background:  linear-gradient(45deg, #fa8c61, #df6412);" id="submitBtn" type="submit">Créer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="ads">
                ADS
            </div>
        </div>
    </div>

</div>
@endsection
@section('javscript')
    
@endsection