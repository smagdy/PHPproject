function validateForm() {
	valid = true;
	if($(input[name='name']).val()== NULL){
		alert("Name is empty");
		$(input[name='name']).focus();
		valid=false;
	}
	else if($(input[name='email']).val()==""){
		alert("Email is empty");
		$(input[name='email']).focus();
		valid=false;
	}
	/*else
	{
		if(document.inputForm.email.value.indexOf("@",0)==-1||document.inputForm.email.value.indexOf(".",0)==-1)
		{
			alert("Please Enter valid email, e.g:info@iti.net");
			document.inputForm.email.focus();
			valid=false;
		}
	}
	
	//firstname
	if(document.inputForm.firstname.value==""){
		alert("firstname is empty");
		document.inputForm.firstname.focus();
		valid=false;
	}
	//lastname
	if(document.inputForm.lastname.value==""){
		alert("lastname is empty");
		document.inputForm.lastname.focus();
		valid=false;
	}
	//Username
	if(document.inputForm.Username.value==""){
		alert("Username is empty");
		document.inputForm.Username.focus();
		valid=false;
	}
	//Password
	if(document.inputForm.Password.value==""){
		alert("Password is empty");
		document.inputForm.Password.focus();
		valid=false;
	}
	//comfPassword
	if(document.inputForm.comfPassword.value==""){
		alert("ComfirmPassword is empty");
		document.inputForm.comfPassword.focus();
		valid=false;
	}
	//password
	if(document.inputForm.comfPassword.value!=document.inputForm.Password.value){
		alert("Password and ComfirmPassword is not match");
		document.inputForm.comfPassword.focus();
		valid=false;
	}
	//mobile
	if(!checkMobile(document.inputForm.mobile.value)){
		alert("Please Enter valid mobile, e.g:+2010-12345678");
		document.inputForm.mobile.focus();
		valid=false;
	}
*/
	return valid;
}

