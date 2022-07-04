<?php
	if(isset($_GET["clear"])) {
		unset($_SESSION["restaurant"]);
		unset($_SESSION["cart"]);
	}
	
	if(isset($_SESSION["restaurant"])) {
		$sql = "SELECT id,name,address,open_hours,company,delivery_time FROM restaurants WHERE id = '".$_SESSION["restaurant"]."'";
		$result = $connection->query($sql);
		while($row = $result->fetch_assoc()) {
			$rest_id = $row['id'];
			$rest_name = $row['name'];
			$rest_address = $row['address'];
			$rest_oh = $row['open_hours'];
			$rest_company = $row['company'];
			$rest_dt = $row['delivery_time'];
		}
			
?>
<section class="food_section layout_padding">
	<div class="container">
		<?php
			if(isset($_GET["id"]) && checkFood($_GET["id"],$_SESSION["restaurant"])) {
				echo '<div class="alert alert-success" role="alert">Sikeresen hozzáadtad az ételt a kosaradhoz. <a href="index.php?p=cart">Tovább a kosárhoz</a></div>';
				if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
					if (array_key_exists($_GET["id"], $_SESSION['cart'])) {
					$_SESSION['cart'][$_GET["id"]] += 1;
					} else {
					$_SESSION['cart'][$_GET["id"]] = 1;
					}
					} else {
					$_SESSION['cart'] = array($_GET["id"] => 1);
				}
			}
		?>
		<div class="heading_container heading_center">
			<h2>
				<?php echo $rest_name; ?> <i class="fa fa-info-circle tooltip2 no-mobile" aria-hidden="true" style="font-size: 2rem;">
					<span class="tooltiptext">
						<?php 
							echo 'Cégnév: '.$rest_company.'<br/><br/>'; 
							echo 'Nyitvatartás: <br/>'.$rest_oh.'<br/><br/>'; 
							echo 'Várható szállítási idő: '.$rest_dt.' perc'; 
						?>
					</span>
				</i>
			</h2>
			
			<div class="link_box" style="margin-top: 0;">
				<a href="index.php?p=foods&clear=true">Vissza az éttermekhez</a>
			</div>	
		</div>
		
		
	<ul class="filters_menu">
        <li class="active" data-filter="*">Összes</li>
	<?php
		$sql2 = "SELECT DISTINCT category FROM foods WHERE rest_id = '".$_SESSION["restaurant"]."'";
		$result2 = $connection->query($sql2);
		while($row2 = $result2->fetch_assoc()) {
			echo '<li data-filter=".'.$row2["category"].'">'.$row2["category"].'</li>';
		}
	?>
	</ul>
	
	
	<div class="filters-content">
        <div class="row grid">
			<?php
			$sql3 = "SELECT id,name,category,price,ingredients,image FROM foods WHERE rest_id = '".$_SESSION["restaurant"]."'";
			$result3 = $connection->query($sql3);
			
			while($row3 = $result3->fetch_assoc()) {
			?>
		<div class="col-sm-4 col-lg-3 all <?php echo $row3["category"]; ?>">
            <div class="box" style="height: 23rem; max-height: auto;">
              <div>
                <div class="img-box">
                  <img src="./appearance/images/foods/<?php echo $row3["image"]; ?>" alt="">
                </div>
                <div class="detail-box">
                  <h5 style="font-size: 0.9rem;" title="<?php echo $row3["ingredients"]; ?>">
                    <?php echo $row3["name"]; ?>
                  </h5>
                  <div class="options" style="margin-top: 2rem;">
                    <h6 onclick="clearCart()">
                      <?php echo formatCost($row3["price"]); ?>
                    </h6>
                    <a href="index.php?p=foods&id=<?php echo $row3["id"]; ?>">
                     <span class="fa fa-shopping-cart" style="color: white; font-size: 1.2rem;"></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
			<?php } ?>
		</div>
    </div>
			
</section>
  
<?php
	}
	else {
		header('Location: index.php?p=restaurants');
		exit;
	}
?>