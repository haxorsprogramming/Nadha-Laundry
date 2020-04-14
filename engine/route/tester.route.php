<?php

class Tester extends Route{
    
    public function index()
    {       
        $this -> bind('/tester/default');
    }  
   
    public function datatable()
    {
        $this -> bind('/tester/datatable');
    }

    public function formDatabase()
    {
        $this -> bind('/tester/formDatabase');    
    }
  
    public function tes_email()
    {
      $email = 'alditha.forum@gmail.com';
      $emailValid = $this -> emck($email);
      echo $emailValid;
    }
  
    public function tes_random()
    {
      $id = $this -> rnstr(10);
      echo $id;
    }

    public function sqlCommand()
    {
        $status = ['status_command ' => 'Table successfully created'];
        $this -> state('test') ->  buatTabel();
        echo "Table successfully created";
    }
    
}
