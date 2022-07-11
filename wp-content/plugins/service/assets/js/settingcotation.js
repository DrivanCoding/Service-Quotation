console.log("dfsfs")
let a=2
let v=1
b=null
// setInterval(()=>{
    
//     for (let k = 1; k < a; k++) {
//              btnajourval=document.querySelector("#btnajouteVal"+k)
//              btnajourval.addEventListener("click",function(){ 
//             value_item=jQuery('<div class="valeur_item"  ><input type="text" placeholder="Nom"   name="nomVal1[]" class="input"><input type="number" placeholder="Montant($)" name="montantVal1[]" class="input"><textarea name="detailleVal1[]" id="" ></textarea> </div>')
//               jQuery(".valeur"+k).append(value_item)   
//               k=a;
//               clearInterval();
//             });
//           console.log("k="+k)
//        }
       
// },1000)


jQuery(document).ready(function ($) {
   
   $("#btnajouteProp").on("click",()=>{
        prop_item=$('  <div class="prop_item"><div class="element"><input type="text" placeholder="Nom de la propriete" name="prop[]" id=""></div><div class="valeur'+a+'"><h2>Valeur</h2><div class="valeur_item"><input type="text" placeholder="Nom"  name="nomVal'+a+'[]" class="input"><input type="number" placeholder="Montant($)" name="montantVal'+a+'[]" class="input"><textarea name="detailleVal'+a+'[]" id="" ></textarea></div><div class="valeur_item"><input type="text" placeholder="Nom"  name="nomVal'+a+'[]" class="input"><input type="number" placeholder="Montant($)" name="montantVal'+a+'[]" class="input"><textarea name="detailleVal'+a+'[]" id="" ></textarea></div><div class="valeur_item"><input type="text" placeholder="Nom"  name="nomVal'+a+'[]" class="input"><input type="number" placeholder="Montant($)" name="montantVal'+a+'[]" class="input"><textarea name="detailleVal'+a+'[]" id="" ></textarea></div><div class="valeur_item"><input type="text" placeholder="Nom"  name="nomVal'+a+'[]" class="input"><input type="number" placeholder="Montant($)" name="montantVal'+a+'[]" class="input"><textarea name="detailleVal'+a+'[]" id="" ></textarea></div></div><div class="btnajouteVal"><button type="button" class="btnajout" id="btnajouteVal'+a+'">+</button></div></div><hr></div>')
       $(".prop").append(prop_item) 
       console.log(a)
       a++
    });  
      $("#btnajouteVal").on("click",()=>{ 
        value_item=$('<div class="valeur_item"  ><input type="text" placeholder="Nom"   name="nomVal1[]" class="input"><input type="number" placeholder="Montant($)" name="montantVal1[]" class="input"><textarea name="detailleVal1[]" id="" ></textarea> </div>')
          $(".valeur").append(value_item)   

        });   
     
});


// setInterval(function(){
//     detaille_open=document.querySelectorAll(".more")
//     detaille_close=document.querySelectorAll(".fermer")
//    display_more=document.querySelectorAll(".detaille")
//     input=document.querySelectorAll(".input");
//     btn=document.querySelector("#save")
//     for (let i = 0; i < input.length; i++) {
//         if((input[i]='') || input[i].value<0){
//             input[i].style.border="solid red 2px"
//             save.type="button" 
//             break;
//         }
//         else{
//             input[i].style.border="solid 1px green"
//             save.type="submit"          
//         }
        
//     }
//  for (let i = 0; i < detaille_open.length; i++) {
//     detaille_open[i].addEventListener("click",()=>{
//         display_more[i].style.display="table-cell";
//     })
    
//  }
//  for (let i = 0; i < detaille_close.length; i++) {
//     detaille_close[i].addEventListener("click",()=>{
//         display_more[i].style.display="none";
//     })
    
//  }

// },1000)

