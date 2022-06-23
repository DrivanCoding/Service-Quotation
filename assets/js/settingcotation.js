console.log("c est la")
setInterval(function(){
    input=document.querySelectorAll(".input");
    btn=document.querySelector("#save")
    for (let i = 0; i < input.length; i++) {
        if(input[i].value<0){
            input[i].style.border="solid red 2px"
            save.type="button" 
            break;
        }else{
            input[i].style.border="solid 1px green"
        }
        
    }
},1000)