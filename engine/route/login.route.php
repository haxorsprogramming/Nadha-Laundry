<?php

class Login extends Route{

    public function __construct()
    {
    $this -> st = new state;
    }

    public function index()
    {       
        $this -> bind('/login/loginPage');
    }
    public function prosesLogin()
    {
        $user = $this -> inp('username');
        $password = $this -> inp('password');
        $passHash = md5($password);
        $this -> st -> query("SELECT id FROM tbl_user WHERE username='$user' AND password='$passHash';");
        $data['jlh'] = $this -> st -> numRow();
        if($data['jlh'] > 0){
            $this -> setses('userSes',$user);
        }else{

        }
        echo json_encode($data);
    }  

}
