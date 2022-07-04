<section class="cart_section layout_padding">
	<div class="container">
		<div class="heading_container heading_center">
			<h2>
				Kosár
			</h2>
		</div>
		<?php
			if(isset($_GET["clear"]))
			unset($_SESSION["cart"]);
							
			if(isset($_POST["cartItem"])) {
				unset($_SESSION["cart"]);
				$_SESSION["cart"] = array_filter($_POST['cartItem']);
			}	
								
			if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
		?>
		<form method="POST" action="index.php?p=cart">
		<div class="table-responsive-lg">
			<table class="table table-striped table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>Megnevezés</th>
						<th>Ár</th>
						<th>Darab</th>
						<th>Részösszeg</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$fullPrice = 0;
						  
						foreach ($_SESSION["cart"] as $key => $value):
						$sql = "SELECT name,price FROM foods WHERE id = '" . $key . "'";
						$result = $connection->query($sql);
						
						while ($row = $result->fetch_assoc()) { 
						$fullPrice += $row["price"] * $value;  ?>
					<tr>
						<td><?php echo $row["name"]; ?></td>
						<td><?php echo formatCost($row["price"]); ?></td>
						<td><input type="number" onchange="this.form.submit()" name="cartItem[<?php echo $key; ?>]" size="5" min="0" max="10" value="<?php echo $value; ?>"></td>
						<td><?php echo formatCost($row["price"] * $value); ?></td>
					</tr>
					<?php } endforeach; ?> 
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4"><span class="price">Végösszeg: <?php echo formatCost($fullPrice); ?></span> <span class="vat">(ÁFA: <?php echo formatCost($fullPrice-($fullPrice/1.27)); ?>)</span></td>
					<tr>
					<tr>
						<td colspan="4" style="border: none;"><div class="btn-box">
						<a href="index.php?p=cart&clear=true">Kosár ürítése</a>
						<a href="index.php?p=checkout">Tovább a pénztárhoz</a>
					</div></td>
					<tr>
				</tfoot>
			</table>
			</div>
		</form>
		<?php  } else { echo '<div class="alert alert-danger" role="alert">Jelenleg a kosarad üres.</div>'; } ?>
</section>