
function verifa3()
{
	var name=document.getElementById('name1').value;
	var prenom=document.getElementById('prenom1').value;
	//var nom=document.forms["myForm"]["Nom"].value;
	//var prenom=document.forms["myForm"]["Prenom"].value;

	var adresse=document.getElementById('adresse1').value;
	var ville=document.getElementById('ville1').value;
	var code=document.getElementById('code1').value;
	var cmp=document.getElementById('cmp1').value;
	//var photo=document.forms["myForm"]["Photo"].value;
	var civ=document.getElementById('civ1').value
	

	if( name.length==0)
	{
		alert("Nom doit être non vide");
		return false;
	}
	if(prenom.length==0)
	{
		alert("prenom doit être non vide");
		return false;
	}

if(adresse.length==0)
	{
		alert("l'adresse doit être non vide");
		return false;
	}

if(ville.length==0)
	{
		alert("la ville doit être non vide");
		return false;
	}


	if(code.length==0)
	{
		alert("prenom doit être non vide");
		return false;
	}

	if(cmp.length==0)
	{
		alert("le complement d'adresse doit être non vide");
		return false;
	}

	if(civ.length==0)
	{
		alert("civ doit être non vide");
		return false;
	}

	



	}
