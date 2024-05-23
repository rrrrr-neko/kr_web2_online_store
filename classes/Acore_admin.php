<?php
abstract class Acore_admin {
	
	protected $db;	
	
	public function __construct() {			
		//Соединение с базой данных
		
	if(!$_SESSION['user'] || !$_SESSION['level']) {
		header("Location:?option=login");
	}


		
		$this->db = mysqli_connect('localhost', 'root', 'Seta2001', 'kr_magaz' );
        if (!$this->db) {
            exit("Ошибка подключения к базе данных: ".mysqli_error());
        }
     
        if (!mysqli_select_db ($this->db,'kr_magaz'))  {
            exit ("База данных не определена"); 
        }
	}
	
	//вывод шапки (корзина и пользователь)
	protected function get_header(){
		include "classes/header.php";
	}
	
	//вывод боковой панели навигации
	protected function get_sidebar(){
		
		 //Выводим лого и что у нас есть до перечня категорий
		 printf('
		 <!DOCTYPE html>
<html lang="ru">
	<head>
		<!-- кодировка -->
		<meta charset="UTF-8" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- Title and SEO -->
		<title>Магазин Коняева А-12-19</title>
		<meta name="description" content="Описание страницы" />
		<meta name="keywords" content="ключевые слова, фразы" />

		<!-- Стили -->
		<link rel="stylesheet" href="./css/reset.css" />
		<link rel="stylesheet" href="./css/base.css" />
		<link rel="stylesheet" href="./css/main.css" />
       <!-- // <script src = "index.js"></script>-->
	
		
	</head>
	<body>
	    <!-- Боковая панель с навигацией (будет постоянно) -->
        <div class="sidebar"> 
		    <div class="sidebar-logo">
		        <div class = "logo">
     			    <img src="./img/logo.svg" alt="Caped shop"> <!-- Логотип -->
			     </div>
		     </div>	
			
			<nav class="nav">
			 <h2 class="nav-title"> <b>Разделы админа</b> </h2>
			  <ul class="nav-list" id="menu">
			  <li> <a href="?option=admin"> <img src="./img/1.png" alt=".">Главная</a></li>
			  <li> <a href="?option=mani"> <img src="./img/4.png" alt=".">Выйти из меню админа</a></li>
			 <!-- <li> <a href="?option=edit_tovar"> <img src="./img/1.png" alt=".">Товар</a></li>
			  <li> <a href="?option=edit_cat"> <img src="./img/4.png" alt=".">Категории</a></li> -->
			   </ul>
			</nav>
			<div class="sidebar-help">
			   <a href="#">
			    <img src="./img/help.svg" alt=".">Поддержка
			   </a>
			</div>	
		</div>
		');
		
	}
	
	
	
	public function get_body() {
		
		if($_POST) {
			$this->obr();
		}
		$row=array();
		$this->get_sidebar();
		$this->get_header();
		$this->get_content();
	}
	
	abstract function get_content();
	
	protected function get_info($id) {
		$query = "Select name, colvo from tovar;";
		$res = mysqli_query($this->db, $query);
		if(!$res){
			exit(mysqli_error());
		}
		$row=array();
		 $row[] = mysqli_fetch_array($res);
		 
		 return $row;
	}
	
	
	
}

 
?>