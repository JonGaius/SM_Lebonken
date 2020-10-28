<div class="product">
    <div class="ttm-product-box">
        <!-- ttm-product-box-inner -->
        <div class="ttm-product-box-inner">
            <div class="ttm-shop-icon">
                <div class="product-btn search-btn"><a href="{{route('frontoffice.article.show',$item->slug)}}"><i class="ti ti-eye"></i></a></div>
                <div class="product-btn add-to-cart-btn"><a href="#"><i class="ti ti-shopping-cart"></i>AJOUTER</a></div>
                <div class="product-btn favourite-btn"><a href="#"><i class="ti ti-heart"></i></a></div>
            </div>
            <div class="ttm-product-image-box"> 
            
                <img src="{{explodeImage($item->images)[0]}}" alt="" class="img-fluid" style="height: 200px">
            </div>
        </div><!-- ttm-product-box-inner end -->
        <div class="ttm-product-content">
            
            <a class="ttm-product-title" href="{{route('frontoffice.article.show',$item->slug)}}">
                <h2 style="font-size: 16px">{{$item->name}}</h2>
            </a>
            <div class="price">
                <span class="price"><span class="product-Price-amount">
                    {{number_format($item->price,0,' ',' ')}} FR
                </span>
            </div>
        </div>
    </div>    
</div>