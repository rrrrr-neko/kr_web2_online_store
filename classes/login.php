<?php
class login extends Acore {
	
	protected function obr(){
		$login=strip_tags(mysqli_real_escape_string($this->db,$_POST['login']));
		$password=strip_tags(mysqli_real_escape_string($this->db,$_POST['password']));
		
		if(!empty($login) AND !empty($password)){
			$password=md5($password);
			//$password = password_hash($password, PASSWORD_DEFAULT);
			$query = "select id from users where users.login='$login' and users.password='$password';";
			$res = mysqli_query($this->db,$query);
		
			$flag = false;
			if(!mysqli_query($this->db,$query)){
				exit (mysqli_error());
			}
			if(mysqli_num_rows($res)==1){
				$_SESSION['user']=true;
				$_SESSION['level']=true;
				$flag = true;
				header("Location:?option=admin");
				exit();
			}
			else {
				
				$query = "select id from byuer where byuer.log='$login' and byuer.password='$password';";
				$res2 = mysqli_query($this->db,$query);
		
		
				if(!mysqli_query($this->db,$query)){
					exit (mysqli_error());
				}
				if(mysqli_num_rows($res2)==1){
						$_SESSION['user']=true;
						$flag = true;
						header("Location:?option=mani");
						exit();
					}
				if($flag==false){				
				        exit("Данный пользователь не зарегистрирован"); }
			}
		}
		else {
			exit("Заполните обязательные поля");
		}
	}
	
	//авторизация пользователей
	public function get_content(){
		
		printf( '<div class="cards-wrapper" >
		 <center>
        <form action="" method="post">
           
                <b>
                  Зайдите на сайт
                </b>
            
            <br>
            <br>
			 Введите логин: <input type="text"size="39" name = "login"><br><br>
			 Введите пароль: <input type="password"size="39" name = "password"><br><br>
			 <input type="submit" value="Вход">
			 <input type="submit" value="Войти как администратор">
            
        </form>
		 </center>
		
		</div>
				</main>
				</body>
				</html>');
		
	}
	
}


?>