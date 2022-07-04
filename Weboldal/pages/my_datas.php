  <?php 
	if(!isset($_SESSION["user_perm"])) {
		header('Location: index.php?p=login');
		exit;
	}
?> 
  <section class="account_section layout_padding">
    <div class="container">
	<?php 
		if(isset($_POST["submit"])) {
			$sql = "SELECT * FROM accounts WHERE email = '".$_SESSION["user_email"]."' and password = '".md5($_POST["rjelszo"])."'";
			$result = $connection->query($sql);
			
			$result = $result->num_rows > 0 ? true : false;
			if(strlen($_POST["jelszo"]) > 6 && strlen($_POST["jelszo"]) < 50 && $_POST["jelszo"] == $_POST["uj_jelszo"] && $result) {
				$sql = "UPDATE accounts SET password = '".md5($_POST["jelszo"])."' WHERE email = '".$_SESSION["user_email"]."';";
				if ($connection->query($sql) === TRUE) {
					echo '<div class="alert alert-success" role="alert">Sikeresen elmentetted az adataidat.</div>';
				} else {
					echo '<div class="alert alert-danger" role="alert">Valami hiba történt.</div>';
				}
			} else {
				echo '<div class="alert alert-danger" role="alert">Hibás jelszót adtál meg.</div>';
			}
		}	
	  ?>
      <div class="heading_container heading_center">
        <h2>
          Saját adataim
        </h2>
      </div>
		<?php require('include/user_menu.php'); ?>
		<div class="row layout_padding">
			<div class="col-md-12">
			  <div class="form_container">
				<form action="index.php?p=my_datas" method="post">
				  <div>
					<input type="text" class="form-control" maxlength="50" id="vezeteknev" name="vezeteknev" placeholder="Vezetéknév" value="<?php echo $_SESSION["user_ln"]; ?>" disabled />
				  </div>
				  <div>
					<input type="text" class="form-control" maxlength="50" id="keresztnev" name="keresztnev" placeholder="Keresztnév" value="<?php echo $_SESSION["user_fn"]; ?>" disabled />
				  </div>
				  <div>
					<input type="email" class="form-control" maxlength="50" id="email" name="email" placeholder="Email" value="<?php echo $_SESSION["user_email"]; ?>" disabled />
				  </div>
				  <div style="margin-top: 5rem;">
					<input type="password" class="form-control" maxlength="50" id="rjelszo" name="rjelszo" placeholder="Régi jelszó" required />
				  </div>
				  <div>
					<input type="password" class="form-control" maxlength="50" id="jelszo" name="jelszo" placeholder="Új jelszó" required />
				  </div>
				  <div>
					<input type="password" class="form-control" maxlength="50" id="uj_jelszo" name="uj_jelszo" placeholder="Új jelszó ismét" required />
				  </div>
				  <div class="btn_box">
					<input type="submit" name="submit" value="Adatok mentése">
				  </div>
				</form>
			  </div>
			</div>
		  </div>
		</div>
    </div>
  </section>