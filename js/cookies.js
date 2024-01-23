/* 	Basic JavaScript Cookie Toolset
	Author: Dr Andreas Schoter
	Date: 2014/01/17
	Last Update: 2019/02/05
*/

/* ==== DO NOT EDIT BELOW HERE ================================================================== */

/* Cookie stuff modified from code at http://www.w3schools.com/JS/js_cookies.asp
*/
/*	Set a cookie with the specified name and value.

	@param cookieName - the name to use for the cookie
	@param cvalue - the value for the cookie
	@param exdays - the number of days before the cookie expires
*/
function setCookie(cookieName, cvalue, exdays)
{
	var d, expires;
	
	if (exdays > 0) {
		d = new Date();
		if (exdays > 0) {
			d.setTime(d.getTime()+(exdays*24*60*60*1000));
		}
		expires = "expires="+d.toGMTString();
	}
	else {
		expires = "";
	}
	document.cookie = cookieName + "=" + cvalue + "; " + expires;
}

/*	Get the value for the specified cookie

	@param cookieName - the name of the cookie to get
	
	@return the value of the given cookie or null if the cookie is not set
*/
function getCookie(cookieName)
{
	var name = cookieName + "=";
	var ca = document.cookie.split(';');
	for(var i = 0; i < ca.length; i++) {
		var c = ca[i].trim();
  		if (c.indexOf(name)==0) return c.substring(name.length,c.length);
	}
	
	return null;
}