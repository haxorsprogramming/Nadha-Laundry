<?php

class login extends Route{

    public function index()
    {       
        $this -> bind('/login/loginPage');
    }
    public function prosesLogin()
    {
        $user = $this -> inp('username');
        $password = $this -> inp('password');
        $passHash = md5($password);
        $jlhUser = $this -> state('loginpage') -> jlhUser($user, $passHash);
        $data['jlh'] = $jlhUser;
        if($jlhUser > 0){
            $this -> setses('userSes', $user);
            $waktu = $this -> waktu();
            $this -> state('loginpage') -> updateLogin($waktu, $user);
        }else{

        }
        $this -> toJson($data);
    }  

}
