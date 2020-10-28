<div class="card w-100 mb-2 for-image" style="padding: 15px;">
    <span>Cliquez pour ajouter des images</span>
    <div class="center-picture">
        <input type="file" accept="image/jpeg, image/png, image/jpg"
        id="files" 
        multiple
        name="images[]"
        label="Cliquer pour ajouter des photos"
        help=""
        is="drop-files" value="{{old('pictures')}}">
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
        <label for="name" class="col-sm-2 col-md-4 col-form-label text-rigth" style="font-size: 16px; padding-left: 20px">Nom de l'article</label>
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
        <label for="condition" class="col-sm-2 col-md-4 col-form-label text-rigth" style="font-size: 16px; padding-left: 20px">Etat de l'article sur 10</label>
        <div class="col-sm-12 col-md-8">
            <input type="number" class="form-control @error('condition') is-invalid @enderror" placeholder="ex: 8" name="condition" id="condition" value="{{old('condition')}}">
            @error('condition')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="dropdown-divider p-1"></div>
    <div class="form-group row">
        <label for="price" class="col-sm-2 col-md-4 col-form-label text-rigth" style="font-size: 16px; padding-left: 20px">Prix de l'article en FrsCFA</label>
        <div class="col-sm-12 col-md-8">
            <input type="number" class="form-control @error('price') is-invalid @enderror" placeholder="ex: 1500" name="price" id="price" value="{{old('price')}}">
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="dropdown-divider p-1"></div>
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-md-4 col-form-label text-rigth" style="font-size: 16px; padding-left: 20px">Decrivez votre article</label>
        <div class="col-sm-12 col-md-8">
          <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Décrivez l'article" required style="height: 150px; resize:none; border-radius: 0;" name="description">{{old('description')}}</textarea>
          @error('description')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
    </div>
</div>
<div class="card w-100 mb-2" style="padding: 15px">
    <div class="form-group row">
        <label for="categorie" class="col-sm-2 col-md-4 col-form-label text-rigth" style="font-size: 16px; padding-left: 20px">Categorie</label>
        <div class="col-sm-12 col-md-8">
            <div class="content w-100" style="position: relative;">
                
                <select class="form-control cate linked-select" data-target="#souscategorie" data-source="{{route('fetch.subcategorie','id')}}" id="categorie" style=" border-radius: 0;">
                    <option value="">Categorie</option>
                    @foreach ($categories as $item)
                        <option value="{{$item->slug}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <div class="subc w-100" style="display: none">
                    <div class="subc-head w-100 text-center" style="position: relative">
                        <div class="closed" style="position: absolute; top:0; left:0; color: rgb(224, 113, 69); cursor:pointer">
                            <i class="ti ti-arrow-left"></i>
                        </div>
                        <span class="text-center subc-name" style="font-size: 16px; color: rgb(224, 126, 69);">Sous Categorie</span>
                    </div>
                    <select name="subcategory_id" id="souscategorie" class="form-control linked-select" data-target="#attribute" data-source="{{route('fetch.subcategorie.attributes','id')}}"  style=" border-radius: 0;">
                        <option value="">Choisir la sous-categorie</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="diviser-dropdown"></div>
    <div id="attribute" class="w-100">
       
    </div>

    @if(session('erreurs'))
    <div class="alert alert-danger" role="alert">
       <ul>
           @foreach (explode(',',session('erreurs')) as $item)
                <li>{{$item}}</li>
           @endforeach
       </ul>
    </div>
    @endif
</div>

<div class="card w-100 mb-2" style="padding: 15px">

    <div class="form-group row">
        <label for="quantity" class="col-sm-2 col-md-4 col-form-label text-rigth" style="font-size: 16px; padding-left: 20px">Quantité</label>
        <div class="col-sm-12 col-md-8">
            <input type="number" class="form-control @error('quantity') is-invalid @enderror" placeholder="ex: 1500" name="quantity" id="quantity" value="{{old('quantity')}}">
            @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="dropdown-divider p-1"></div>
    <div class="form-group row">
        <label for="livraison" class="col-sm-2 col-md-4 col-form-label text-rigth" style="font-size: 16px; padding-left: 20px">Prix de la livraison en francs CFA</label>
        <div class="col-sm-12 col-md-8">
            <input type="number" class="form-control @error('livraison') is-invalid @enderror" placeholder="ex: 1500" name="livraison" id="livraison" value="{{old('livraison')}}">
            @error('livraison')
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
                <label class="btn btn-stroke-brouillon w-100" style="text-transform: none;" for="brouillon" >Enrégistrer en brouillon</label>
                <input type="checkbox" name="brouillon" id="brouillon" class="d-none" onclick="event.preventDefault();
                document.getElementById('create-form').submit();">
            </div>
            <div class="col-6 pr-0">
                <button class="btn btn-primary w-100" style="text-transform: none; background:  linear-gradient(45deg, #fa8c61, #df6412);" id="submitBtn" type="submit">Ajouter</button>
            </div>
        </div>
    </div>
</div>