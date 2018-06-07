<?php

class APNet
{
    public $useProxy;
    public $proxyType;
    public $userAgent = "hi";
    public $keepAlive;
    public $timeOut;
    public $cookie;
    public $acceptEncoding = "gzip, deflate";
    public $Referer;
    public $redirectAble;
    public $customHeader;

    public function setProxy_Type($type = "null")
    {
        $this->proxyType = $type;
    }

    public function Get($reqUrl, $contentType = "application/x-www-form-urlencoded")
    {
        try {
            $curl = curl_init();
            $proxyType = $this->proxyType;
            $keepAlive = $this->keepAlive;
            if ($proxyType = "socks5") {
                curl_setopt($curl, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
            } else if ($proxyType = "socks4") {
                curl_setopt($curl, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
            } else if ($proxyType = "socks4.5") {
                curl_setopt($curl, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4A);
            } else if ($proxyType = "http") {
                curl_setopt($curl, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
            }
            if ($keepAlive == true) {
                curl_setopt($curl, CURLOPT_TCP_KEEPALIVE, 1);
            } else {
                curl_setopt($curl, CURLOPT_TCP_KEEPALIVE, 0);
            }
            if (strlen($this->Referer) > 0) {
                curl_setopt($curl, CURLOPT_REFERER, $this->Referer);
            }
            if (strlen($this->cookie) > 0) {
                curl_setopt($curl, CURLOPT_COOKIE, $this->cookie);
            }
            if ($this->redirectAble = true) {
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            } else if ($this->redirectAble != true) {
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);
            }
            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->customHeader);
            curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeOut);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_URL, $reqUrl);
            curl_setopt($curl, CURLINFO_CONTENT_TYPE, $contentType);
            curl_setopt($curl, CURLOPT_ACCEPT_ENCODING, $this->acceptEncoding);
            curl_setopt($curl, CURLOPT_VERBOSE, true);
            return $curl;
        } catch (Exception $E) {
            return $E->getMessage();
        }
    }

    public function Post($reqUrl, $contentType = "application/x-www-form-urlencoded", $postFields)
    {
        try {
            $curl = curl_init();
            $proxyType = $this->proxyType;
            $keepAlive = $this->keepAlive;
            if ($proxyType = "socks5") {
                curl_setopt($curl, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
            } else if ($proxyType = "socks4") {
                curl_setopt($curl, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
            } else if ($proxyType = "socks4.5") {
                curl_setopt($curl, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4A);
            } else if ($proxyType = "http") {
                curl_setopt($curl, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
            }
            if ($keepAlive == true) {
                curl_setopt($curl, CURLOPT_TCP_KEEPALIVE, 1);
            } else {
                curl_setopt($curl, CURLOPT_TCP_KEEPALIVE, 0);
            }
            if (strlen($this->Referer) > 0) {
                curl_setopt($curl, CURLOPT_REFERER, $this->Referer);
            }
            if (strlen($this->cookie) > 0) {
                curl_setopt($curl, CURLOPT_COOKIE, $this->cookie);
            }
            if ($this->redirectAble = true) {
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            } else if ($this->redirectAble != true) {
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);
            }
            if ($contentType = "defult") {
                curl_setopt($curl, CURLINFO_CONTENT_TYPE, "application/x-www-form-urlencoded");
            }
            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->customHeader);
            curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeOut);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_URL, $reqUrl);
            curl_setopt($curl, CURLOPT_ACCEPT_ENCODING, $this->acceptEncoding);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
            curl_setopt($curl, CURLOPT_VERBOSE, true);
            return $curl;
        } catch (Exception $E) {
            return $E->getMessage();
        }
    }


    public function getResponse($request)
    {
        return curl_exec($request);
    }

    public function addCookie($name, $value)
    {
        setcookie($name, $value);
    }

    public function getHeader_Cookies($response)
    {
        preg_match_all('/set-cookie: (.*)\b/', $response, $cookies);
        if (strlen($cookies) > 6) {
            return $cookies;
        } else {
            preg_match_all('/Set-Cookie: (.*)\b/', $response, $cookies2);
            if (strlen($cookies2) > 6) {
                return $cookies2;
            } else {
                preg_match_all('/[C-c]ookie: (.*)\b/', $response, $cookies3);
                return $cookies3;
            }
        }
    }

    public function getStringBetween($stringFirst, $stringLast, $source)
    {
        preg_match("/$stringFirst(.*)\b$stringLast/", $source, $matches);
        return $matches;
    }
}
?>
