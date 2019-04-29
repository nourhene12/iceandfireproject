function verifa()
{
	var nom=document.forms["livrai"]["nom"].value;
	var prenom=document.forms["livrai"]["prenom"].value;
	var adresse=document.forms["livrai"]["adresse"].value;
	var ville=document.forms["livrai"]["ville"];
	var code=document.forms["livrai"]["code"].value;
	var cmp=document.forms["livrai"]["cmp"];
	var civ=document.forms["livrai"]["civ"].value;
	
	if(nom.length==0)
	{
		alert("Nom doit être non vide")
	}
	if(prenom.length==0)
	{
		alert("prenom doit être non vide")
	}
	if(adresse.length==0)
	{
		alert("adresse doit être non vide")
	}
	if(ville.length==0)
	{
		alert("ville doit être non vide")
	}

	if(code.length==0)
	{
		alert("code doit être non vide")
	}
	if(cmp.length==0)
	{
		alert("cmpdoit être non vide")
	}
	if(civ.length==0)
	{
		alert("civ doit être non vide")
	}





	}