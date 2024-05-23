<?php

class del_tovar extends Acore_admin {
	

	//вывод формы для дополнения товара
	public function get_content(){
		
		if ($_GET['id_text']){
			$id_text=(int)$_GET['id_text'];			
		}
		else {exit ("Некорректные данные"); }
		
		echo '<div class="cards-wrapper" >';
		 
		 
		$query = "delete from tovar WHERE id ='$id_text ';";
		
		if(!mysqli_query($this->db,$query)){
			exit (mysqli_error());
		}
		else {
			
			header("Location:?option=admin");
			exit;	
		
		}
        echo ' </div>
				</main>
				</body>
				</html>'; 
	}
	
	
	
}


?>