<?php

function index_rees46_hook($obj,$row) {
var_dump($row);die();
//	if(!empty($row['user_security']) and empty($_SESSION['userName'])) {
//		$obj->set('pageContent',ParseTemplateReturn($GLOBALS['SysValue']['templates']['users']['users_forma'],true));
//		$obj->set('pageTitle','Только для авторизованных пользователей');
//	}

}

$addHandler=array(
	'index'=>'index_rees46_hook'
);