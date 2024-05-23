<?php
class admin extends Acore_admin {
	
	//вывод центральной информационной части
	public function get_content(){
		echo '<div class="cards-wrapper" >
		<ul>  ';
	
		//вывод товара и его количества.
	    $query = "select id,name,colvo,cat from tovar;" ;
		
		 $res = mysqli_query($this->db, $query);
		
		 if (!$res) {
            exit (mysqli_error());
        }	
		$row = array();
		for ($i = 0; $i< mysqli_num_rows($res); $i++) {
            $row[] = mysqli_fetch_array($res);
		}
				
		foreach ($row as $x) {
			
			printf('<li style = "font-size: 17px;"> <p> <b>Номер Товара: </b> %s,  <b> Имя:</b> %s,  <b> Количество:</b> %s,
			<b> Категория:</b> %s</p> <p> <a href="?option=update_tovar&id_text=%s" class="cards-wrapper-sdvig">Редактировать информацию о товаре <a> </p> 
			<hr><a class="cards-wrapper-sdvig" href="?option=del_tovar&id_text=%s">Удалить неактуальный товар</a></li><br>'
			,$x['id'],$x['name'],$x['colvo'],$x['cat'],$x['id'],$x['id']);
            
        }
		
		echo '	</ul> ';
		printf( '<hr><a style="font-size: 22px;" class="cards-wrapper-sdvig" href="?option=add_tovar">Добавить новый товар</a>');
		 echo '       </div>
				</main>
				</body>
				</html>'; 
		//include "classes/content.php";
	}
	
}


?>