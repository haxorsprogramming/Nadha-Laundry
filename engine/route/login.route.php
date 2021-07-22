<?php

class login extends Route{

    private $sn = 'loginpage';

    public function index()
    {       
        $this -> bind('/login/loginPage');
    }
    
    public function prosesLogin()
    {
        $user           = $this -> inp('username');
        $password       = $this -> inp('password');
        $passHash       = md5($password);
        $jlhUser        = $this -> state($this -> sn) -> jlhUser($user, $passHash);
        $data['jlh']    = $jlhUser;
        if($jlhUser > 0){
            $this -> setses('userSes', $user);
            $waktu = $this -> waktu();
            $this -> state($this -> sn) -> updateLogin($waktu, $user);
        }else{
            //do something boys :D 
        }
        $this -> toJson($data);
    }  

}
