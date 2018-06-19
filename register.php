	<html>
	<head>
		<title>新規登録</title>
	</head>
	<body>
		<?php
		require_once("lib/connection.php");
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$username = $_POST["username"];
  			$password = $_POST["pass"];
 			 $name = $_POST["name"];
  			$email = $_POST["email"];
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($username == "" || $password == "" || $name == "" || $email == "") 
                              {
				   echo "入力してください";
  			}else{
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="select * from users where username='$username'";
					$kt=mysqli_query($conn, $sql);

					if(mysqli_num_rows($kt)  > 0){
						echo "IDがありました。";
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO users(
	    					username,
	    					password,
	    					name,
						    email
	    					) VALUES (
	    					'$username',
	    					'$password',
						    '$name',
	    					'$email'
	    					)";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($conn,$sql);
				   		echo "登録しました。";
					}
									    
					
			  }
	}
	?>
	<form action="register.php" method="post">
		<table>
			<tr>
				<td colspan="2">新規登録</td>
			</tr>	
			<tr>
				<td>ＩＤ :</td>
				<td><input type="text" id="username" name="username"></td>
			</tr>
			<tr>
				<td>パスワード :</td>
				<td><input type="password" id="pass" name="pass"></td>
			</tr>
			<tr>
				<td>名前 :</td>
				<td><input type="text" id="name" name="name"></td>
			</tr>
			<tr>
				<td>メール :</td>
				<td><input type="text" id="email" name="email"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="登録する"></td>
			</tr>

		</table>

	</form>
	</body>
	</html>