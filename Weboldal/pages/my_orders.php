  <?php 
	if(!isset($_SESSION["user_perm"])) {
		header('Location: index.php?p=login');
		exit;
	}
?> 
  <section class="account_section layout_padding">
    <div class="container">
	<?php
		if($_POST["submit"]) {
			$sql = "SELECT rest_id FROM orders where id = '".$_POST["order_id"]."'";
			$row = mysqli_fetch_assoc(mysqli_query($connection,$sql));
			$rest_id = $row['rest_id'];
			
			$sql = "INSERT INTO reviews (account_id,rest_id,order_id,comment,stars,review_date)VALUES ('".$_SESSION["user_id"]."', '".$rest_id."', '".$_POST["order_id"]."','".$_POST["rest_review"]."','".$_POST["stars"]."', NOW())";

			$connection->query($sql);

			echo '<div class="alert alert-success" role="alert">Sikeresen véleményt írtál az alábbi étteremről: <b>'.getRestaurantName($rest_id).'</b></div>';
		}
	?>
      <div class="heading_container heading_center">
        <h2>
          Korábbi rendeléseim
        </h2>
      </div>
		<?php require('include/user_menu.php'); ?>
		
		<div class="table-responsive layout_padding">
			<table class="table table-striped table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>Azonosító</th>
						<th>Étterem</th>
						<th>Megrendelés végösszeg</th>
						<th>Rendelés állapota</th>
						<th>Dátum</th>
						<th>Értékelés</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT id,rest_id,full_cost,state,order_date FROM orders WHERE account_id = '" . $_SESSION["user_id"] . "'";
						$result = $connection->query($sql);
						
						while ($row = $result->fetch_assoc()) { 
						
						$sql2 = "SELECT * FROM reviews where rest_id= '".$row["rest_id"]."' and order_id = '".$row["id"]."' and account_id = '".$_SESSION["user_id"]."'";
		
						$result2 = mysqli_num_rows(mysqli_query($connection,$sql2));
						
						$is_reviewed = $result2 > 0 ? true : false;
					?>
					<tr>
						<td>#<?php echo $row["id"]; ?></td>
						<td><?php echo getRestaurantName($row["rest_id"]); ?></td>
						<td><?php echo formatCost($row["full_cost"]); ?></td>
						<td><?php echo $orderState[$row["state"]]; ?></td>
						<td><?php echo $row["order_date"]; ?></td>
						<?php
							if($is_reviewed) {
								$row2 = mysqli_fetch_assoc(mysqli_query($connection,$sql2));
								echo '<td>';
								for ($x = 1; $x <= $row2["stars"]; $x++) {
									echo '<span class="fa fa-star stars"></span>';
								}
								echo '</td>';
							} else {
						?>
						<td><button data-id="<?php echo $row["id"]; ?>" onclick="$('#order_id').val($(this).data('id'));" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Értékelés írása</button></td>
						<?php } ?>
					</tr>
					<?php } ?> 
				</tbody>
			</table>
			</div>
		</div>
    </div>
  </section>
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Új értékelés írása</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="index.php?p=my_orders">
		 <div class="form-group">
            <label for="rest_review" class="col-form-label">Megrendelés azonosító:</label>
            <input type="text" class="form-control" id="order_id" name="order_id" value="order_id" readonly>
          </div>
          <div class="form-group">
            <label for="rest_review" class="col-form-label">Étterem vélemény:</label>
            <textarea class="form-control" id="rest_review" name="rest_review" maxlength="250"></textarea>
          </div>
		  <div class="form-group">
            <label for="rest_review" class="col-form-label">Étterem értékelés:</label>
            <br><input type="radio" name="stars" value="1"> <span class="fa fa-star icon-size"></span>
            <br><input type="radio" name="stars" value="2"> <span class="fa fa-star icon-size"></span> <span class="fa fa-star icon-size"></span>
            <br><input type="radio" name="stars" value="3" checked> <span class="fa fa-star icon-size"></span> <span class="fa fa-star icon-size"></span> <span class="fa fa-star icon-size"></span>
            <br><input type="radio" name="stars" value="4"> <span class="fa fa-star icon-size"></span> <span class="fa fa-star icon-size"></span> <span class="fa fa-star icon-size"></span> <span class="fa fa-star icon-size"></span>
            <br><input type="radio" name="stars" value="5"> <span class="fa fa-star icon-size"></span> <span class="fa fa-star icon-size"></span> <span class="fa fa-star icon-size"></span> <span class="fa fa-star icon-size"></span> <span class="fa fa-star icon-size"></span>
          </div>
		  <div class="form-group">
            <input type="submit" class="form-control" id="submit" name="submit" value="Beküldés" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

