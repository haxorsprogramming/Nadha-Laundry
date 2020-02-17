<?php

class Login extends Route{
    
    public function index()
    {       
        $this -> bind('/login/loginPage');
    }
    public function prosesLogin()
    {
        $data['user'] = $this -> inp('username');
        echo $data['user'];
    }  

}
