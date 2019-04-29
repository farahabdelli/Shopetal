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
function verifTauxOffre(champ)
{
    var regex = /^[0-9]\d*$/;
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
    var tauxOK = verifTauxOffre(f.taux);


    if( tauxOK )
    {
        alert("Votre coupon a été ajouté avec succès. ");
        return true;
    }
    else
    {
        alert("Veuillez remplir correctement tous les champs");
        return false;
    }
}

function confirmDeleteOffre(f) {
    if (confirm("Etes vous sur de supprimer ce coupon  ?")) {
        return true;
    } else {
        alert("Suppression annulée");
        return false;
    }
}
