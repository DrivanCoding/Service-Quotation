
setInterval(function(){
    detaille_open=document.querySelectorAll(".more")
    detaille_close=document.querySelectorAll(".fermer")
   display_more=document.querySelectorAll(".detaille")
    input=document.querySelectorAll(".input");
    btn=document.querySelector("#save")
    for (let i = 0; i < input.length; i++) {
        if((input[i]='') || input[i].value<0){
            input[i].style.border="solid red 2px"
            save.type="button" 
            break;
        }
        else{
            input[i].style.border="solid 1px green"
            save.type="submit"          
        }
        
    }
 for (let i = 0; i < detaille_open.length; i++) {
    detaille_open[i].addEventListener("click",()=>{
        display_more[i].style.display="table-cell";
    })
    
 }
 for (let i = 0; i < detaille_close.length; i++) {
    detaille_close[i].addEventListener("click",()=>{
        display_more[i].style.display="none";
    })
    
 }

},1000)
