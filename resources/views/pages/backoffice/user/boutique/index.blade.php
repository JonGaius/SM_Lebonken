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
                        <h5>Mes boutiques</h5>
                    </div>
                    <div>
                        <a href="{{route('user.boutique.create')}}" class="btn btn-primary" style="color: #fff"><i class="ti ti-plus"></i> Créer une boutique</a>
                    </div>
                </div>
            </div>
            
        </div>   
        @if ($boutiques->count() > 0)   
        <div class="w-100 mt-3 card" style="border: none">   
            <div class="row p-2 w-100 m-auto" style="color: black; border-bottom: 0.3px solid rgba(0, 0, 0, 0.123)">
                <div class="col-1 p-0 text-center responsive-col">#</div>
                <div class="col-12 col-md-12 col-lg-4 text-left" style="padding-left: 20px">Boutique</div>
                <div class="col-2 p-0 text-center responsive-col">Nombre d'articles</div>
                <div class="col-1 p-0 text-center responsive-col">Certifiée</div>
                <div class="col-2 p-0 text-center responsive-col">Status</div>
                <div class="col-2 p-0 text-center responsive-col">Actions</div>
            </div>
            <?php $i = 0?>
            @foreach ($boutiques as $item)  
            <?php $i++?>
            <div class="box-list-items w-100 pl-3 pr-3">
                <div class="row p-2 w-100 m-auto">
                    <div class="col-1 p-0 text-center responsive-col">{{$i}}</div>
                    <div class="col-12 col-md-12 col-lg-4 text-left" style="padding-left: 20px;">
                        <div class="item-info d-flex pt-5 p-sm-3 ">
                            <div class="product-img mr-2" style="width: 100px;">
                                
                                <img src="{{$item->image}}" alt="" class="img-fluid">
                            </div>
                            <div class="info-product">
                                <a href="{{route('boutique.show', $item->slug)}}" style="color: #000">{{$item->name}}</a><br>
                                    @if ($item->certified == true)
                                        <span class="responsive-span">
                                            Certifiée
                                        </span>
                                    @endif
                                <span class="responsive-span">
                                    @if ($item->activate == true)
                                        Activée
                                    @else
                                        Désactivée
                                    @endif
                                </span>
                                <span class="responsive-span">{{$item->created_at}}</span>
                                <span class="responsive-span">{{$item->articles->count()}} articles</span>
                            </div>
                        </div>
                    </div>
                <div class="col-2 p-0 text-center responsive-col"><a href="{{route('boutique.article.index',$item->slug)}}">{{$item->articles->count()}} article{{$item->articles->count() > 1 ? 's':' '}}</a></div> 
                    <div class="col-1 p-0 text-center responsive-col">
                        @if ($item->certified == true)
                            Oui
                        @else
                            Non
                        @endif
                    </div>
                    <div class="col-2 p-0 text-center responsive-col">
                        @if ($item->activate == true)
                            Activée
                        @else
                            Désactivée
                        @endif
                    </div>
                    <div class="col-2 p-0 text-center responsive-col">
                        <a href="{{route('boutique.show', $item->slug)}}" class="btn btn-primary mb-2" style="color: #fff"><i class="ti ti-eye"></i></a>
                        <a href="{{route('boutique.edit', $item->slug)}}" class="btn btn-light mb-2"><i class="far fa-edit"></i></a>
                        <a href="{{route('boutique.destroy', $item->slug)}}" class="btn btn-danger mb-2" style="color: #fff" onclick="event.preventDefault();
                            document.getElementById('delete-form').submit();"><i class="ti ti-na"></i>
                            </a>
                            <form id="delete-form" action="{{route('boutique.destroy', $item->slug)}}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </div>
                </div>
            </div>
            @endforeach  
        </div>
        @else
            <p class="text-center">Vous n'avez pas de boutique</p>
        @endif
    </div>
</div>
@endsection
@section('javascript')
    
@endsection