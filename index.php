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
* @author	Haxors Programming Club (Club Pemrogramman Uinsu)
* @link		http://haxorsprogrammingclub.id
* @since	Version 3.5 (stable)
*
* The schema for this framework
* props -> core 
* route -> controller
* bind -> view
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

function __construct(){
	$getSelfData = [];
}



class exportAll{
	/**
	* Page 
	*/
	private $page = "";
	/**
	* Props 
	*/
	private $props = "";
	/**
	* Route 
	*/
	private $route = "";
	/**
	* Bind 
	*/
	private $bind = "";
	/**
	* State 
	*/
	private $state = "";

	function exPage($id)
	{
		return $id;
	}

}


/**
* Call all function with init.php file
*/
require_once 'engine/init.php';


/**
* Instance new props to global & stack the function
*/
$props = new Props;
