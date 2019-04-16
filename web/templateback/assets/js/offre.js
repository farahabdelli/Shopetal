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
function verifTaux(champ)
{
  var regex = /^[0-9]*$/;
   if(!regex.test(champ.value)  || champ.value.length > 1 || champ.value.length < 0  )
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}






function verifOffre(f)
{
  var tauxOK = verifTaux(f.taux);

   
   if( tauxOK )
   {
      alert("Votre offre a été ajoutée avec succès. ");
      return true;
   }
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}

function confirmDelete(f) {
    if (confirm("Etes vous sur de supprimer cette offre  ?")) {
       return true;
    } else {
      alert("Suppression annulée");
        return false;
    }       
}
