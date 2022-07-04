<?php
	if(isset($_SESSION["user_perm"])) {
		
	if(isset($_POST["submit"])) {
		$items = "";
		foreach ($_SESSION["cart"] as $key => $value):
		$sql = "SELECT name,price FROM foods WHERE id = '" . $key . "'";
		$result = $connection->query($sql);	
		while ($row = $result->fetch_assoc()) {
			$items .= $row["name"].";".$value.";".$row["price"].";";
		}			
		endforeach;
		
		$address = $_POST["postalcode"]." ".$_POST["city"]. ", ".$_POST["street"]." ".$_POST["plusinfo"];
		$sql = "INSERT INTO orders (account_id,rest_id,items,delivery_time,delivery_cost,full_cost,payment_method,delivery_address,order_date,state,note) 
				VALUES 
				('".$_SESSION["user_id"]."','".$_SESSION["restaurant"]."','".$items."','".$_POST["dt"]."','".$_POST["dc"]."','".$_POST["fc"]."','".$_POST["pm"]."','".$address."',NOW(),'0','".$_POST["note"]."')";

		if ($connection->query($sql) === TRUE) {
			unset($_SESSION["restaurant"]);
			unset($_SESSION["cart"]);
			$_SESSION["order_processing"] = true;
            header('Location: index.php?p=send_order'); 
			exit;
		}
	}

	
		
	$query = "SELECT name,delivery_cost,delivery_time FROM restaurants WHERE id = '".$_SESSION["restaurant"]."'";
	$result = $connection->query($query);	
	$restaurants = $result->fetch_assoc();
?>

<section class="checkout_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Pénztár
            </h2>
        </div>
        <form action="index.php?p=checkout" method="POST">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <h4>Szállítási adatok</h4>
                    <hr class="my-4">
                    <div class="form-row">
                        <div class="col">
                            <label for="lastName">Vezetéknév</label>
                            <input type="text" class="form-control" name="lastname"
                                value="<?php echo $_SESSION["user_ln"]; ?>" disabled />
                        </div>
                        <div class="col">
                            <label for="firstName">Keresztnév</label>
                            <input type="text" class="form-control" name="firstname"
                                value="<?php echo $_SESSION["user_fn"]; ?>" disabled />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="postalCode">Irányítószám</label>
                            <input type="number" class="form-control" name="postalcode" maxlength="4" required>
                        </div>
                        <div class="col">
                            <label for="city">Város</label>
                            <input type="text" maxlength="30" name="city" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="street">Utca, házszám</label>
                            <input type="text" class="form-control" name="street" placeholder="Utcanév, házszám"
                                required>
                            <input type="text" class="form-control" name="plusinfo"
                                placeholder="Emelet, lépcsőház, lakás, stb." style="margin-top: 1rem;">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="phoneNumber">Telefonszám</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                        <div class="col">
                            <label for="email">Email cím</label>
                            <input type="text" class="form-control" name="email"
                                value="<?php echo $_SESSION["user_email"]; ?>" disabled />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="note">Megjegyzés</label>
                            <textarea class="form-control" maxlength="200" name="note"
                                style="max-height: 6rem;"></textarea>
                        </div>
                    </div>
                </div>



                <div class="col-lg-6 col-md-12">
                    <h4>Válassz fizetési módot</h4>
                    <hr class="my-4">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Fizetési mód</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							foreach($paymentMethods as $key=>$value):
							if($key == 0) $checked = 'checked';
							else $checked = '';
							echo '<tr>
									<td>'.$value.'</td>
									<td><input type="radio" name="pm" value="'.$key.'" '.$checked.'></td>
								  </tr>';
							endforeach;
						?>
                        </tbody>
                    </table>

                    <h4 style="margin-top: 3rem;">Rendelés összesítő</h4>
                    <hr class="my-4">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Megnevezés</th>
                                <th>Ár</th>
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
                                <td><?php echo $row["name"]; ?> <small>x</small> <b><?php echo $value; ?></b></td>
                                <td><?php echo formatCost($row["price"]); ?></td>
                            </tr>
                            <?php } endforeach; ?>
                            <tr>
                            <tr>
                                <td class="table-secondary table-important">Részösszeg</td>
                                <td class="table-secondary table-important"><?php echo formatCost($fullPrice); ?></td>
                            </tr>
                            <tr>
                                <td class="table-secondary table-important">Szállítási költség (Étterem:
                                    <?php echo $restaurants["name"]; ?>)</td>
                                <td class="table-secondary table-important">
                                    <?php echo formatCost($restaurants["delivery_cost"]); ?></td>
                                <input type="hidden" name="dc" value="<?php echo $restaurants["delivery_cost"]; ?>">
                                <input type="hidden" name="dt" value="<?php echo $restaurants["delivery_time"]; ?>">
                            </tr>
                            <tr>
                                <td class="table-dark table-important">Végösszeg</td>
                                <td class="table-dark table-important">
                                    <?php echo formatCost($fullPrice+$restaurants["delivery_cost"]); ?></td>
                                <input type="hidden" name="fc"
                                    value="<?php echo ($fullPrice+$restaurants["delivery_cost"]); ?>">
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr class="my-4">
            <div class="checkout-box">
                <input type="submit" name="submit" value="Rendelés leadása">
            </div>
        </form>
    </div>
</section>
<?php
	} else { header('Location: index.php?p=login&from=checkout'); exit; }
?>