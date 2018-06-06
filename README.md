# APNet-PHP
A simple library based on CURL For PHP, You can use this library to send requests

# Example

<pre>
include "APNet.php";
$AP = new APNet();
$AP->addCookie("cookieName","cookieValue");
$AP->timeOut=1000 (must be int)
$Req = $AP->Get("yoursite.com"); //this is your created request , ready to get response
$Source = $AP->getResponse($Req); 
$Cookies = $AP->getHeader_Cookies($Source); //you have to get cookies from response , no request!
</pre>

# How to use

download <b>APNet.php</b> file from this git and use Examples.
