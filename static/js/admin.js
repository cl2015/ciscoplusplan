var userAgent = navigator.userAgent.toLowerCase();
var is_opera = userAgent.indexOf('opera') != -1 && opera.version();
var is_moz = (navigator.product == 'Gecko') && userAgent.substr(userAgent.indexOf('firefox') + 8, 3);
var is_ie = (userAgent.indexOf('msie') != -1 && !is_opera) && userAgent.substr(userAgent.indexOf('msie') + 5, 3);
function switchbtn(btn) {
$('srchuserdiv').style.display = btn == 'srch' ? '' : 'none';
$('srchuserdiv').className = btn == 'srch' ? 'tabcontentcur' : '' ;
$('srchuserbtn').className = btn == 'srch' ? 'tabcurrent' : '';
$('adduserdiv').style.display = btn == 'srch' ? 'none' : '';
$('adduserdiv').className = btn == 'srch' ? '' : 'tabcontentcur';
$('adduserbtn').className = btn == 'srch' ? '' : 'tabcurrent';
}
function $(id) {
	return document.getElementById(id);
}