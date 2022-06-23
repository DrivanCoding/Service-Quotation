capacite=document.querySelector("#capaciter")
ram=document.querySelector("#ram")
nbrCpu=document.querySelector("#nbrVcpu")
nbrsite=document.querySelector("#nbrsite")
nbremail=document.querySelector("#nbremail")
nbrbd=document.querySelector("#nbrBd")
securite=document.querySelector("#securiter")
var modeH=document.querySelector("#ModeHeber")   
setInterval(()=>{
 
switch (modeH.selectedIndex) {
case 0:
     capacite.innerHTML="100 GB"
     ram.innerHTML="4 GB"
     nbrCpu.innerHTML="6"
     nbrsite.innerHTML="2"
     nbremail.innerHTML="10"
     nbrbd.innerHTML="1"
     securite.innerHTML="License SSL "            
    break;
    case 1:
     capacite.innerHTML="250 GB" 
     ram.innerHTML="8 GB"
     nbrCpu.innerHTML="12"
     nbrsite.innerHTML="20"
     nbremail.innerHTML="25"
     nbrbd.innerHTML="5"
     securite.innerHTML="License SSL"            
    break;
    case 2:
     capacite.innerHTML="Illimiter"
     ram.innerHTML="16 GB"
     nbrCpu.innerHTML="12"
     nbrsite.innerHTML="Illimiter"
     nbremail.innerHTML="200"
     nbrbd.innerHTML="Illimiter"
     securite.innerHTML="License SSL"            
    break;
    case 3:
     capacite.innerHTML="Illimiter"
     ram.innerHTML="32 GB"
     nbrCpu.innerHTML="14"
     nbrsite.innerHTML="Illimiter"
     nbremail.innerHTML="Illimiter"
     nbrbd.innerHTML="Illimiter"
     securite.innerHTML="License SSL"            
    break;
}   
},100)