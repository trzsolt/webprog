function validateEmailForm() {
  var re = /\S+@\S+\.\S+/;	
  var emailcim = document.forms["email_form"]["s_email"].value;
  var szoveg = document.forms["email_form"]["s_szoveg"].value;
  var valid = re.test(emailcim);
  
  if (emailcim == "" ) {
    alert("Nem megfelelő email cím");
    return false;
  }
  if(valid == false){
	alert("Nem megfelelő email cím");
    return false;  
  }
  
  if (szoveg == ""){
	alert("Az üzenet nincs kitöltve!");
	return false;
  }
}
