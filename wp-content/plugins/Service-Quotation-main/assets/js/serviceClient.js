block_cotation=document.querySelector(".cotation")
block_congratulation=document.querySelector(".congratulation_all")
prix_cotations=document.querySelector("#prix_quotation").innerHTML
capacite=document.querySelector("#capaciter")
ram=document.querySelector("#ram")
nbrCpu=document.querySelector("#nbrVcpu")
nbrsite=document.querySelector("#nbrsite")
nbremail=document.querySelector("#nbremail")
nbrbd=document.querySelector("#nbrBd")
securite=document.querySelector("#securiter")
var modeH=document.querySelector("#ModeHeber")   
var domaine=document.querySelector("#nomDomain")   
 let devis=""
 let prix_cotation=prix_cotations.split("|")
 let prix_cotation_mode=prix_cotation[1].split(",")
 let prix_cotation_domaine=prix_cotation[0].split(",")
 let affiche_devis=document.querySelector("#devis")
setInterval(()=>{
 request.addEventListener("click",()=>{
    block_cotation.style.display="none"
    block_congratulation.style.display="flex"
 })
switch (modeH.selectedIndex) {
case 0:
     capacite.innerHTML="100 GB"
     ram.innerHTML="4 GB"
     nbrCpu.innerHTML="6"
     nbrsite.innerHTML="2"
     nbremail.innerHTML="10"
     nbrbd.innerHTML="1"
     securite.innerHTML="License SSL "
     devis=prix_cotation_mode[0]            
    break;
    case 1:
     capacite.innerHTML="250 GB" 
     ram.innerHTML="8 GB"
     nbrCpu.innerHTML="12"
     nbrsite.innerHTML="20"
     nbremail.innerHTML="25"
     nbrbd.innerHTML="5"
     securite.innerHTML="License SSL" 
     devis=prix_cotation_mode[1]           
    break;
    case 2:
     capacite.innerHTML="Illimiter"
     ram.innerHTML="16 GB"
     nbrCpu.innerHTML="12"
     nbrsite.innerHTML="Illimiter"
     nbremail.innerHTML="200"
     nbrbd.innerHTML="Illimiter"
     securite.innerHTML="License SSL" 
     devis=prix_cotation_mode[2]           
    break;
    case 3:
     capacite.innerHTML="Illimiter"
     ram.innerHTML="32 GB"
     nbrCpu.innerHTML="14"
     nbrsite.innerHTML="Illimiter"
     nbremail.innerHTML="Illimiter"
     nbrbd.innerHTML="Illimiter"
     securite.innerHTML="License SSL" 
     devis=prix_cotation_mode[3]           
    break;
} 

switch (domaine.selectedIndex) {
    case 0:
        devis=parseInt(devis)+parseInt(prix_cotation_domaine[0])
        break;
    case 1:
        devis=parseInt(devis)+parseInt(prix_cotation_domaine[1])
        
        break;
    case 2:
        devis=parseInt(devis)+parseInt(prix_cotation_domaine[2])
           
        break;
    case 3:
        devis=parseInt(devis)+parseInt(prix_cotation_domaine[3])
                
        break;

} 
affiche_devis.innerHTML="Devis Estimative [0,5-"+devis+"]($) "       
},1000)