function surligne(champ, erreur)
{
   if(erreur)
   	  {
   	  champ.style.borderLeft = "";
      champ.style.backgroundColor = "#fba";
   	  }
   else
   	  {
   	  champ.style.borderLeft = "6px solid green";
      champ.style.backgroundColor = "lightgreen";
   	  }
}



function confirmDelete(f) {
    if (confirm("Etes vous sur de supprimer cet article de votre panier ?")) {
        return true;
    } else {
        alert("Suppression annulée");
        return false;
    }
}