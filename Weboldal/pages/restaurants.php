<?php
	if(isset($_GET["id"]))
		$_SESSION["restaurant"] = $_GET["id"];
	
	if(isset($_SESSION["restaurant"])) {
		header('Location: index.php?p=foods');
		exit;
	}
		
?>  

  
  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Éttermek
        </h2>
      </div>
        <div class="row grid">
		<?php
			
			if(isset($_GET["offer"])) {
				if($_GET["offer"] == "free_delivery") $sql = "SELECT id,name,rest_category,delivery_cost FROM restaurants WHERE delivery_cost = 0";
				else $sql = "SELECT id,name,rest_category,delivery_cost FROM restaurants";
			}
			else {
				$sql = "SELECT id,name,rest_category,delivery_cost FROM restaurants";
			}
			$result = $connection->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$delivery_cost = $row["delivery_cost"] == 0 ? "Ingyenes kiszállítás" : formatCost($row["delivery_cost"])." szállítási díj";
					
					$restaurant_review = getRestaurantReview($row["id"]);
					
					if($restaurant_review != 0)
						$restaurant_stars = '<div class="review"><span class="fa fa-star icon-size"></span> <b>'.$restaurant_review.'</b>/5</div>';
					else
						$restaurant_stars = '';
					echo ' <div class="col-sm-6 col-lg-4 col-xl-3 all pizza">
					
					<div class="box">
					  <div>
					  <a href="index.php?p=restaurants&id='.$row["id"].'">
						<div class="img-box">
						 <img src="./appearance/images/rest/'.getRestaurantLogo($row["id"]).'" alt="">
						  '.$restaurant_stars.'
						</div>
						</a>
						<div class="detail-box fixed-box">
						  <h5>
							'. $row["name"] .'
						  </h5>
						  <p>
							'. $row["rest_category"] .'
						  </p>
							<span class="delivery_text">'. $delivery_cost .'</span>
						</div>
					  </div>
					</div>
					
				  </div>';
		  
				}
			} else {
				echo "0 találat";
			}
		?>
		</div>
    </div>
  </section>