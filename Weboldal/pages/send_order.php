<?php
	if(isset($_SESSION["user_perm"])) {
		
	$query = "SELECT id,delivery_time,order_date FROM orders WHERE account_id = '".$_SESSION["user_id"]."' ORDER BY id DESC LIMIT 1";
	$result = $connection->query($query);	
	$orders = $result->fetch_assoc();
	
	
	$date1 = strtotime(date($orders["order_date"]));
	$date2 = strtotime(date('Y-m-d H:i:s'));
	$diff = abs($date2 - $date1);
	
	$minutes = floor($diff);
	
	$percentage = $minutes * 100 / $orders["delivery_time"];
	
	$percentage = $percentage > 100 ? 100 : $percentage;
	
	if($percentage == 100) $text = 'Teljesítettük a rendelésed.';
	else if($percentage > 70) $text = 'Már a futárnál van a rendelésed.';
	else if($percentage >= 20 && $percentage <= 70) $text = 'Készítjük össze a rendelésed.';
	else $text = '';
?>

<section class="sendorder_section layout_padding">
	<div class="container centering">
		<div class="heading_container heading_center">
			<h2>
				Rendelés elküldve (#<?php echo $orders["id"]; ?>)
			</h2>
		</div>
		
		<img src="./appearance/images/videos/food-delivery.gif" style="width: 50%;">
		
		<div class="progress" style="height: 2rem;">
			<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="background-color: #83AB52; width: <?php echo $percentage;?>%;" aria-valuenow="<?php echo $percentage;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $text; ?></div>
		</div>
		<h4 style="margin-top: 2rem;">Várható szállítási idő: <?php echo ($orders["delivery_time"]-5)." - ".($orders["delivery_time"]+5)." perc"; ?></h4>
	</div>	
</section>
<?php
	} else { header('Location: index.php?p=404'); exit; }
?>