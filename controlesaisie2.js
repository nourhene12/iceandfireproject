
function verifa2()
{
	var nom=document.getElementById('name1').value;
	var prenom=document.getElementById('prename1').value;
	//var nom=document.forms["myForm"]["Nom"].value;
	//var prenom=document.forms["myForm"]["Prenom"].value;

	var cIN=document.getElementById('cin1').value;
	var mail=document.getElementById('mail1').value;
	var pWD=document.getElementById('pass1').value;
	//var photo=document.forms["myForm"]["Photo"].value;
	var tel=document.getElementById('tel1').value
	

	if( nom.length==0)
	{
		alert("Nom doit être non vide");
		return false;
	}
	if(prenom.length==0)
	{
		alert("prenom doit être non vide");
		return false;
	}



	if( isNaN(cIN) )
	{
		alert("cin doit être numerique");
		return false;
	}



	if( cIN==0 )
	{
		alert("cin doit être non vide");
		return false;
	}



	if(pWD.length==0)
	{
		alert("password doit être non vide");
			return false;
	}

	if (mail.indexOf("@")==-1) 
	{
		alert("Veuillez inclure @ dans l'adresse e-mail");
			return false;
	}
	if( (isNaN(tel) || (tel.length)!=8 ) )
	{
		alert("Numero telephone incorrect");
			return false;
	}

	


	}
