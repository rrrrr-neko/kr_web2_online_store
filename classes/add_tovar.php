<?php

class add_tovar extends Acore_admin {
	
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
		
			
		$name=$_POST['name'];
		$colvo=$_POST['colvo'];
		$cat=$_POST['cat'];
		$img_scr=$_POST['img_scr'];
		
		if(empty($name) || empty($colvo) || empty($cat)) {
			exit ("необходимо заполнить все поля");
		}
		
		$query = "insert into tovar(name,colvo,img_scr,cat) values ('$name', '$colvo','$img_scr', '$cat'); ";
		if(!mysqli_query($this->db,$query)){
			exit (mysqli_error());
		}
		else {
			$_SESSION['rew']="Изменения сохранены.";
			header("Location:?option=add_tovar");
			exit;	
		
		}
	}
	
	
	
	//вывод формы для дополнения товара
	public function get_content(){
		echo '<div class="cards-wrapper" >';
		
		if(isset($_SESSION['rew'])){
			echo $_SESSION['rew']; //вывод сообщения что товар добавлен
			unset($_SESSION['rew']); //удаляем сессионную переменную
		}
		
		
		
		printf ('  <form action="" method="post">
            <table>
			<td>
			<tr>
			<p> Название товара <input type="text"  name = "name"> </p> <br>
			<br>
			</tr>
			<tr>
			Количество  <input type="number" id="colvo" name="colvo" > <br>
			<br>
			</tr>
			<tr>
			Категория <input type="radio" id="cat"
						name="cat" value="1"> clothes
						<input type="radio" id="cat"
						name="cat" value="2"> shoes
						<input type="radio" id="cat"
						name="cat" value="3"> bag <br>
			<br>
			</tr>
			<tr>
	       <!--  Ссылка на изображение <input type="file" name = "img_scr"> <br> -->
		   <p>Ссылка на изображение <input type="text"  name = "img_scr"> </p> <br>
			<br>
			<br>
			</tr> 
			 </td>
			 <table>
	   <center> <input type="submit" class="cards-wrapper-sdvig" value="Добавить товар">  </center>
	   		
        </form> ');
echo ' </div>
				</main>
				</body>
				</html>'; 
	}
	
	
	
}


?>