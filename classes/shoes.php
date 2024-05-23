<?php
class shoes extends Acore {
	
	//вывод центральной информационной части
	public function get_content(){
		echo '<div class="cards-wrapper" >
		<div class="cards-wrapper-col">
					<div>
					<!-- <div class="cards-wrapper-row"> -->
					';
		//выводим всю одежду
		$query = "select img_scr from tovar where tovar.cat=2";
		$res = mysqli_query($this->db, $query);
		
		 if (!$res) {
            exit (mysqli_error());
        }
		//создали массив одежды
		$row = array();
		for ($i = 0; $i< mysqli_num_rows($res); $i++) {
            $row[] = mysqli_fetch_array($res);
		}
		foreach ($row as $x) {
			
			printf('<img src=%s alt="." > 
			<select size=1 name = "razmer">
                                <option>S
                                <option>M
                                <option>L
                            </select>
					<input type="submit" value="Добавить в корзину" class="cards-wrapper-sdvig"> <br>',$x['img_scr']);
            
        }
		
		printf('
		<!--Первая строка -->
									
					</div>						
				</div>
							
							
				
				</div>
		
		');
		
				echo '	</div>
				</main>
				</body>
				</html>'; 
		}
    }

?>