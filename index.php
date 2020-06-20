<?php
/**
* Uinsu Web Framework 
* Small, Fast, & Secure Web Framework
* Based on PHP
* Special thanks to 
* Bapak Sandika Galih (Web Programmign Unpas)
*
* Thanks for support
* Muhammad Ikhsan, ST. M.Kom (Pembina Haxors Programming Club)
* Muhammad Furqan, S.Si, Sc, M.Comp (Ketua Prodi Ilmu Komputer UINSU)
* All lecturer of program study Computer Science, UINSU 
*
* @package	Uinsu Web Framework
* @author	Haxors Programming Club (Club Pemrogramman Uinsu)
* @link		http://haxors.or.id
* @since	Version 3.5 (stable)
*
* The MVC schema for this framework
* props -> core 
* route -> controller
* bind -> view
* state -> model
*
* hh     hh  aaaaaaaaaa    xx      xx      oooooooooo       rrrrr           sssssssssss
* hh     hh  aa      aa     xx    xx      oo        oo      rr   rrr        ss
* hh     hh  aa      aa      xx  xx       oo        oo      rr    rrr       ss
* hhhhhhhhh  aaaaaaaaaa       xxxx        oo        oo      rr   rrr        ss
* hhhhhhhhh  aaaaaaaaaa       xxxx        oo        oo      rrrrr           sssssssssss
* hh     hh  aa      aa      xx  xx       oo        oo      rr  rr                   ss
* hh     hh  aa      aa     xx    xx      oo        oo      rr   rr                  ss 
* hh     hh  aa      aa    xx      xx      oooooooooo       rr    rrr      ssssssssssss
*
* ------------------ SPIRIT OF COLLABORATIVE, NEVER STOP CODING ----------------------
*/

function __construct(){
	$getSelfData = [];
}

/**
* Call all function with init.php file
*/
require_once 'engine/init.php';

/**
* Instance new props to global & stack the function
*/
$props = new Props;
