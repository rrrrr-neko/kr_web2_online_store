<?php
session_start();
	//единая точка входа на наш сайт
	header("Content_Type:text/html;charset='UTF-8'"); //проверка кодировки для корректной работы
	require_once("config.php"); //подключение необходимых файлов
	require_once("classes/Acore.php");
	require_once("classes/Acore_admin.php");
	
		
	if (isset($_GET['option']) && $_GET['option']) {  //если подключен класс, то обращаемся
		$class = trim(strip_tags($_GET['option'])); //принимаем наш get-параметр
		
	}
	else { //иначе отправляем пользователя на главную страницу
		$class = 'mani';
	}
	
	if (file_exists("classes/".$class.".php")){ //проверяем, существует ли наш файл
	
		include("classes/".$class.".php");
		
		if (class_exists($class)){ //проверяем, существует ли наш класс
		
	     	$obj = new $class ;
			$obj->get_body();
		}
		else {
			exit("<p>Не верное имя класса </p>");
		}
	}
	else {
		exit("<p>Не верный адресс </p>");
	}
	
?>