<?php

class GoogleAuth{

    protected $client;

    public function __construct(Google_Client $googleClient = null){
        $this->client = $googleClient;
        if($this->client){
            $this->client->setClientId('866211024368-7f5hcc8l5hq3028dd5jg01ep8pinkh7r.apps.googleusercontent.com');
            $this->client->setClientSecret('k__7CJow0u24y67_bPXMOrEL');
            $this->client->setRedirectUri('http://localhost:80/Login_v4-copia/index.php');
            $this->client->setScopes('email');
        }
    }

    public function isLoggedIn(){
        return isset($_SESSION['access_token']);
    }

    public function getAuthUrl(){
        return $this->client->createAuthUrl();
    }

    public function checkRedirectCode(){
        if(isset($_GET['code'])){
            $this->client->authenticate($_GET['code']);
            $this->setToken($this->client->getAccessToken());
            return true;
        }
        return false;
    }

    public function setToken(){
        $_SESSION['access_token'] = $token;
        $this->client->setAccessToken($token);
    }
}

?>