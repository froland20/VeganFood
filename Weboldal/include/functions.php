<?php
	function getRestaurantReview(int $rest_id) {
		global $connection;
		$sql = "SELECT stars FROM reviews where rest_id= '".$rest_id."'";
		$result = $connection->query($sql);
					
		if ($result->num_rows > 0) {
			$reviews = 0;
			while($row = $result->fetch_assoc()) {
				$reviews += $row["stars"];
			}
					
			$reviews = $reviews / $result->num_rows;
			
			if(is_numeric( $reviews ) && floor( $reviews ) != $reviews)
				$reviews = number_format($reviews,1);
		}
		else {
			$reviews = 0;
		}
			
		return $reviews;
	}
	
	function getRestaurantLogo(int $rest_id) {
		global $connection;
		
		$sql = "SELECT logo FROM restaurants where id= '".$rest_id."'";
		$row = mysqli_fetch_assoc(mysqli_query($connection,$sql));
		
		$logo = $row['logo'] == "" ? "pizza.png" : $row['logo'];
		return $logo;
	}
	
	function formatCost(int $cost) {
		$cost = number_format($cost, 0, '', ' ');	
		return $cost.' Ft';
	}
	
	function getRestaurantName(int $rest_id) {
		global $connection;
		
		$sql = "SELECT name FROM restaurants where id= '".$rest_id."'";
		$row = mysqli_fetch_assoc(mysqli_query($connection,$sql));

		return $row['name'];
	}
	
	function checkFood(int $food_id, int $rest_id) {
		global $connection;
		
		$sql = "SELECT * FROM foods where rest_id= '".$rest_id."' and id = '".$food_id."'";
		
		$result = mysqli_num_rows(mysqli_query($connection,$sql));
		$return = $result > 0 ? true : false;
		
		return $return;
	}

?>