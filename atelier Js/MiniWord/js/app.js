/**
 * Created by aymen on 13/02/2017.
 */
var apparait = function () {
    {
        this.classList.toggle('exergue');
    }
}
var ps = document.querySelectorAll('.para');
var mesLiens = document.querySelectorAll('a');

for (var i = 0; i < mesLiens.length; i++) {
    mesLiens[i].addEventListener('click', function (e) {
        var reponse = confirm('Voulez vous vraiment quitter notre site :( ');

        if (!reponse) {
            e.preventDefault();
        }
    })
}

var checkApparit = document.querySelector('#exergueCheck');
checkApparit.addEventListener('click', function (e) {
    //var ps = document.querySelectorAll('.para');
    console.log(ps);
    if (!this.checked) {
        console.log('unchek');
        for (var i = 0; i < ps.length; i++) {
            var p= ps[i];
            console.log(p);
            p.removeEventListener('click', apparait);
        }
        //this.classList.add('allow');
    } else {
        console.log('i m checked');
        //this.classList.add('Allow');
        for (var i = 0; i < ps.length; i++) {
            var p = ps[i];
            console.log('j associe a ce paragraphe au click le listener');

            p.addEventListener('click', apparait);
        }
    }
})

function validePseudo(char){
console.log(char);
if((char>='0'&&char<'9')||(char.toLowerCase()>='a'&&char.toLowerCase()<='z'))
    return true;
    return false;

};

var Pseudo=document.querySelector('#pseudo');
//keydown lorsqu'on appuye sur le bouton keyup quand on le lache
Pseudo.addEventListener('keydown',function(e){
    if(!validePseudo(String.fromCharCode(e.keyCode))){
        console.log('Not valide');
        e.preventDefault();
    }
})

var myForm=document.querySelector('#monForm');

myForm.addEventListener('submit',function(e){
})

var taille =document.querySelector('#tailleEcri');
taille.addEventListener('change',function (e) {
    for(var i=0;i<ps.length;i++){
        var p=ps[i];
        p.style.fontSize = taille.value+"px";
    }
})
var police = document.querySelector('#policeSelec');
var oldpolice=police.selectedOptions[0].value;
police.addEventListener('change',function(e){
    for(var i=0;i<ps.length;i++){
        var p=ps[i];
        p.style.fontFamily = police.selectedOptions[0].value;
    }
})