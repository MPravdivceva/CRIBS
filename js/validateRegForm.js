/*
	A JS function for validating the username and password in the signin form.
	
	Author: Andreas Schoter
*/
function validateRegForm(formName)
{
	"use strict";

	// a username begins with an uppercase letter and consists of letters
	var uNameRegex = /^[A-Z][A-Za-z]{1,29}$/;
	
	// get the form from the DOM
	var form = document.forms[formName];
	
	// get the form data and trim leading & trailing whitespace
	var username = form["userName"].value.trim();
	var pw = form["pw"].value.trim();
	var pwcheck = form["pwcheck"].value.trim();
	
	// validate username format
	if (!uNameRegex.test(username)) {
		alert("A username must begin with an uppercase letter and contain only letters");
		form["userName"].focus();
		return false;
	}
	
	// check password and confirm are the same
	if (pw != pwcheck) {
		alert("Your password and password check do not match");
		form["pw"].focus();
		return false;
	}
	
	// everything was ok
	return true;
}
