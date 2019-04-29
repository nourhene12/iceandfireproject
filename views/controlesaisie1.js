
function verif()
{
	var id_client=document.getElementById('id_client1').value;


	var facture=document.getElementById('facture1').value;
	

	if( id_client.length==0)
	{
		alert("id_client doit être non vide");
		return false;
	}
	if(facture.length==0)
	{
		alert("facture doit être non vide");
		return false;
	}



	if( isNaN(facture) )
	{
		alert("facture doit être numerique");
		return false;
	}



	


	


	}
