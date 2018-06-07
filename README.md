# APNet-PHP
A simple library based on CURL For PHP, You can use this library to send requests

# Example

Instagram Login Script
```
<?php
$username = $_GET["userName"];
$password = $_GET["passWord"];
include "APNet.php";
$Request = new APNet();
$PostFields = "username=$username&password=$password&queryParams=%7B%7D";
$Cookie = "Cookie: rur=FTW; csrftoken=vWvPmDpfC0cuyohcFtnRUqG68DSRjBJ0; mid=WxgRagALAAFfQ1Ovi5AT6uALqKNk; ig_cb=1; mcd=3;;";
$header = array(
     'x-csrftoken: vWvPmDpfC0cuyohcFtnRUqG68DSRjBJ0',
     'x-instagram-ajax: 82b04fd172a3',
     'x-requested-with: XMLHttpRequest',
);
$Request->customHeader = $header;
$Request->timeOut = 1000;
$Request->redirectAble = true;
$Request->Referer = "https://www.instagram.com/";
$Request->cookie = $Cookie;
$request = $Request->Post("https://www.instagram.com/accounts/login/ajax/", "defult", $PostFields);
$source = $Request->getResponse($request);
echo $source;
?>

```

# How to use

download <b>APNet.php</b> file from this git and use Examples.
