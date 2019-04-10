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
function verifTel(champ)
{
  var regex = /^[0-9]*$/;
   if(!regex.test(champ.value)  || champ.value.length > 7 || champ.value.length < 7  )
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


function verifNom(champ)
{
	var regex = /^[a-zA-Z ]*$/;
   if(!regex.test(champ.value) || champ.value.length < 5 || champ.value.length > 25)
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



function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{1,3}$/;
   if(!regex.test(champ.value))
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



function veriflivreur(f)
{
  var telOK = verifTel(f.telLivreur);
   var nomOK = verifNom(f.nomLivreur);
   var emailOK = verifMail(f.mailLivreur);
   
   if( nomOK  && telOK && emailOK )
   {
      alert("Un livreur est ajouté avec succès. ");
      return true;
   }
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}

function confirmDelete(f) {
    if (confirm("Etes vous sur de supprimer ce livreur  ?")) {
       return true;
    } else {
      alert("Suppression annulée");
        return false;
    }       
}
