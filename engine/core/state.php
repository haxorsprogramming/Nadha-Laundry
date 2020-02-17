<?php
/**
* Uinsu Web Framework
* Small, Fast, & Secure Web Framework
* Based on PHP
* Thanks for support
* Muhammad Ikhsan, ST. M.Kom (Pembina Haxors Programming Club)
* Muhammad Furqan, S.Si, Sc, M.Comp (Ketua Prodi Ilmu Komputer UINSU)
* 
* @package	Uinsu Web Framework
* @author	Haxors Programming Club
* @link	http://haxorsprogrammingclub.id
* @since	Version 3.5
*/


/**
*
*
*/
class state{  
  
  private $server = DB_SERVER;
  private $user = DB_USER;
  private $pass = DB_PASSWORD;
  private $dbName = DB_NAME;
  
  public function __construct()
  {
     $dsn = 'mysql:host='.$this -> server.';dbname='.$this -> dbName;
     $option = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
     ];

    try{
      $this -> dbh = new PDO($dsn, $this -> user, $this -> pass);
    }catch(PDOException $e){
      die($e -> getMessage());
    }

  }

  public function query($query)
  {
    $this -> stmt = $this -> dbh -> prepare($query);
  }

  public function querySet($param, $value, $type = null)
    {
      if(is_null($type)){
        switch(true){
          case is_int($value) :
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value) :
            $type = PDO::PARAM_BOOL;
            break;
            case is_null($value) :
            $type = PDO::PARAM_NULL;
            break;
          default :
            $type = PDO::PARAM_STR;
          }
        }
        $this -> stmt -> bindValue($param, $value, $type);
      }

    public function queryRun()
    {
      $this -> stmt -> execute();
    }

    public function queryAll()
    {
      $this -> queryRun();
      return $this -> stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
  
    public function numRow()
    {
       $this -> queryRun();
       return $this -> stmt -> rowCount(PDO::FETCH_ASSOC);
    }

    public function querySingle()
    {
      $this -> queryRun();
      return $this -> stmt -> fetch(PDO::FETCH_ASSOC);
    }

  }



