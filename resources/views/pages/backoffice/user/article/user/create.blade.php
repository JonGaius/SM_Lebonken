@extends('layouts.user_app')
@section('content')
<div class="box-user-t">
    <h3 style="font-size: 18px">Vendez votre article</h3>
    <div class="row w-100 m-auto">
        <div class="col-12 col-md-6 col-lg-9 p-0">
            <form action="{{route('user.article.store')}}" method="POST" class="w-100" id="create-form" enctype="multipart/form-data">
                @csrf
                @include('partials.backoffice.annonces._create_partials')
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
@section('javascript')
<script>
    class LinkedSelect{
        /**
        * @param = {HTMLSelectElement} $select
        */
        constructor($select){
            this.$select = $select;
            this.$target =  document.querySelector(this.$select.dataset.target);
            this.$placeholder = this.$target.firstElementChild
            this.onChange = this.onChange.bind(this);
            this.$loader = null;
            this.$select.addEventListener('change', this.onChange);
        }
        /**
        * @param {Event} e
        */

        onChange (e) {
            //this.showLoader();
            let request = new XMLHttpRequest();
            request.open('GET',this.$select.dataset.source.replace('id',e.target.value), true);
            request.onload = () =>{
                if(request.status >= 200 && request.status < 400){
                    let data = JSON.parse(request.responseText);
                    if(data != null){
                        if(this.$select.dataset.target == "#souscategorie"){
                            let options = data.reduce(function(acc, option){
                                return acc + '<option value="'+option.value+'">'+ option.label +'</option>'
                            }, '');
                            this.$target.innerHTML = options;
                            this.$target.insertBefore(this.$placeholder, this.$target.firstChild);
                            this.$target.selectedIndex = 0;
                            this.$select.style.display = 'none';
                            this.$target.parentNode.style.display = 'block';
                            document.querySelector('.subc-name').innerHTML = "Categorie : "+this.$select.options[this.$select.selectedIndex].text;
                        }
                        if(this.$select.dataset.target == "#attribute"){  
                            if(this.$target.style.display == "none"){
                                this.$target.style.display = "block";
                            }
                            let options = data.reduce(function(acc, option){
                                return acc + '<div class="form-group row"><label for="attribute[]" class="col-sm-2 col-md-4 col-form-label text-rigth" style="font-size: 16px; padding-left: 20px">'+option.label+'</label><div class="col-sm-12 col-md-8"><input type="hidden" name="subattribute[]" value="'+option.ref+'"><input type="'+option.type+'" class="form-control" name="value[]" id="attribute[]"></div></div>';
                            }, '');
                            let subhidden = '<input type=hidden value="'+this.$select.options[this.$select.selectedIndex].value+'" name ="subcategorie_ref">';
                            this.$target.innerHTML = subhidden+options;
                        }
                    }
                    //this.hideLoader();    
                }else{
                    alert('impossible de charger la liste');
                }
            }
            request.onerror = function(){
                alert('impossible de charger la liste');
            }
            request.send();
        }
        // showLoader(){
        //     this.$loader = document.createTextNode('Chargement...');
        //     this.$target.parentNode.appendChild(this.$loader);
        // }
        // hideLoader(){  
        //     if(this.$loader != null){
        //         this.$loader.parentNode.removeChild(this.$loader);
        //         this.$loader = null;
        //     }
        // }

    }
   var $selects = document.querySelectorAll('.linked-select');
    $selects.forEach(function($select){
        new LinkedSelect($select);
    })
   
</script>
<script>
    document.querySelector('.closed').addEventListener('click', function(){
        document.querySelector('.subc').style.display = "none";
        document.querySelector('#attribute').style.display = "none";
        document.querySelector('.cate').style.display = "block";
    });
</script>
<script src="{{asset('select2/js/select2.js')}}"></script>
<script src="{{asset('select2/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $(".boutique").select2({
            placeholder: "Choisir une de votre boutique",
            allowClear: true
        });
    })
</script>
@endsection