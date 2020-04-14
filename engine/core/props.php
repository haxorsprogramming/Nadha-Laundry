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
* @link		http://haxorsprogrammingclub.id
* @since	Version 3.5 (stable)
*/

/**
* hh     hh  aaaaaaaaaa    xx      xx      oooooooooo       rrrrr            sssssssssss
* hh     hh  aa      aa     xx    xx      oo        oo      rr   rrr        ss
* hh     hh  aa      aa      xx  xx       oo        oo      rr    rrr       ss
* hhhhhhhhh  aaaaaaaaaa       xxxx        oo        oo      rr   rrr        ss
* hhhhhhhhh  aaaaaaaaaa       xxxx        oo        oo      rrrrr           sssssssssss
* hh     hh  aa      aa      xx  xx       oo        oo      rr  rr                   ss
* hh     hh  aa      aa     xx    xx      oo        oo      rr   rr                  ss 
* hh     hh  aa      aa    xx      xx      oooooooooo       rr    rrr      ssssssssssss

*
*
*/
error_reporting(E_ERROR | E_WARNING | E_PARSE);
class Props{

    protected $route = MAINROUTE;
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
       $url = $this -> cekUrl();
       if( file_exists('engine/route/'.$url[0].'.route.php')){
           $this -> route = $url[0];           
           unset($url[0]);
       }     
       require_once 'engine/route/'.$this->route.'.route.php';
       $this -> route = new $this -> route;

       if(isset($url[1])){
           if(method_exists($this -> route, $url[1])){
               $this -> method = $url[1];
               unset($url[1]);
           }
       }
      
       if( !empty($url)){
        $this->params = array_values($url);       
        //  require_once 'engine/error/no_route.html';
        //  die();
       }
       call_user_func_array([$this -> route, $this -> method], $this -> params);

    }

    public function cekUrl()
    {
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }    
}
