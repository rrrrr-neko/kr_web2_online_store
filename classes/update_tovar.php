<?php

class update_tovar extends Acore_admin {
	
	//функция обработки формы
	protected function obr() {
		 
		 /*if(!empty($_FILES['img_src']['tmp_name'])) {
				if(!move_uploaded_file($_FILES['img_src']['tmp_name'],
										'img/'.$_FILES['img_src']['name'])) {
											print_r($_FILES);
					exit("Не удалось загрузить изображение");
				}
				$img_scr='img/'.$_FILES['img_src']['name'];
			}
			else {exit ("Необходимо загрузить файл");} */
		
			
		//$name=$_POST['name'];
		$colvo=$_POST['colvo'];
		//$cat=$_POST['cat'];
		//$img_scr=$_POST['img_scr'];
		
		if(empty($colvo)) {
			exit ("Не введены данные");
		}
		$query = 'UPDATE tovar SET colvo = "'.$colvo.'" WHERE id = '.$_GET['id_text'];
		//$query = "insert into tovar(name,colvo,img_scr,cat) values ('$name', '$colvo','$img_scr', '$cat'); ";
		if(!mysqli_query($this->db,$query)){
			exit (mysqli_error());
		}
		else {
			
			$_SESSION['row']="Изменения сохранены.";
			header("Location:?option=admin");
			exit;	
		
		}
		
	}
	
	
	
	//вывод формы для дополнения товара
	public function get_content(){
		$row=array();
		if ($_GET['id_text']){
			$id_text=(int)$_GET['id_text'];			
		}
		else {exit ("Некорректные данные"); }
		//$text = array();
		//$text = $this->get_info($id_text);
		//print_r($text);
		echo '<div class="cards-wrapper" >
		      <p> Введите новые данные о количестве товара:</p>';
		
		if(isset($_SESSION['row'])){
			echo $_SESSION['row']; //вывод сообщения что товар добавлен
			unset($_SESSION['row']); //удаляем сессионную переменную
		}
		
		
		
		printf ('  <form action="" method="post">
            <table>
			<td>
			<tr>
			Новое Количество  <input type="number" id="colvo" name="colvo" > <br>
			<br>
			</tr>
			 </td>
			 <table>
	   <center> <input type="submit" class="cards-wrapper-sdvig" value="Отредактировать информацию о товаре">  </center>
	   		
        </form> ');
echo ' </div>
				</main>
				</body>
				</html>'; 
	}
	
	
	
}


?>