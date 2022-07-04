<?php
	if(isset($_POST["user_login"])) {
		$email = $_POST["email"];
		$pw = md5($_POST["password"]);
		
		$sql = "SELECT id,email,first_name,last_name,permission,create_date FROM accounts WHERE email = '".$email."' and password = '".$pw."' LIMIT 1";
		$result = $connection->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$_SESSION["user_id"] = $row["id"];
				$_SESSION["user_email"] = $row["email"]; 
				$_SESSION["user_fn"] = $row["first_name"]; 
				$_SESSION["user_ln"] = $row["last_name"]; 
				$_SESSION["user_perm"] = $row["permission"]; 
				$_SESSION["user_cd"] = $row["create_date"]; 
			}
		} else {
			echo '<script> alert("Sikertelen belépés!"); </script>';
		}
	}
?>