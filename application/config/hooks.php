<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['post_controller_constructor']=function(){
	$CI=& get_instance();
	// switch($CI->uri->segment(1)){
	// 		case 'dashboard' : ;
	// 		case 'view' : ;
	// 		case 'login': ;
	// 		case '' : $auth = true; break;
	// 		default : $auth = false;
	// 	}
	// if(!$auth){
	// 	$CI->mysessioncheck->checkSession('id_user','login');		
	// }

};