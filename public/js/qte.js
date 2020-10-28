var plus = document.querySelector('#plus');
var moins = document.querySelector('#moins');
var nbre = document.querySelector('#qte');
var cpt = parseInt(nbre.innerText);

console.log(qt);

plus.addEventListener('click', function(){
    //console.log(cpt);
    cpt = cpt + 1;
    nbre.innerHTML = cpt;
});
moins.addEventListener('click', function(){
    //console.log(cpt);
    if(cpt>0){
        cpt = cpt - 1;
        nbre.innerHTML = cpt;
    }
});
