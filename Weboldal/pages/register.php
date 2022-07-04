<?php if(isset($_SESSION["user_perm"])) {
			header('Location: index.php?p=my_account');
			exit;
		}
	?>
  

  <section class="reglog_section layout_padding">
    <div class="container">
	  <?php 
		if(isset($_POST["submit"])) {
			if(strlen($_POST["vezeteknev"]) > 0 && strlen($_POST["vezeteknev"]) < 50) {
				if(strlen($_POST["keresztnev"]) > 0 && strlen($_POST["keresztnev"]) < 50) {
					if(strlen($_POST["email"]) > 0 && strlen($_POST["email"]) < 50) {
						if(strlen($_POST["jelszo"]) > 6 && strlen($_POST["jelszo"]) < 50 && $_POST["jelszo"] == $_POST["jelszo_ujra"]) {
							$jelszoMd5 = md5($_POST["jelszo"]);
							$sql = "INSERT INTO accounts (email,first_name,last_name,password,permission,create_date) VALUES ('".$_POST["email"]."', '".$_POST["keresztnev"]."', '".$_POST["vezeteknev"]."','".$jelszoMd5."','0',NOW())";
							if ($connection->query($sql) === TRUE) {
							  echo '<div class="alert alert-success" role="alert">Sikeres volt a regisztráció, most már beléphetsz.</div>';
							} else {
							  echo '<div class="alert alert-danger" role="alert">Hibás adatot adtál meg, vagy ezzel az email címmel már regisztráltál.</div>';
							}
						}
						else {
							echo '<div class="alert alert-danger" role="alert">Hibás / eltérő jelszót adtál meg! (A jelszavad több, mint 6 karakternek kell legyen!)<br>A jelszó és jelszó ismétnek egyeznie kell!</div>';
						}
					}
				}	
			}
		}	
	  ?>
      <div class="heading_container heading_center">
        <h2>
          Regisztráció
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="index.php?p=register" method="post">
              <div>
                <input type="text" class="form-control" maxlength="50" id="vezeteknev" name="vezeteknev" placeholder="Vezetéknév" required />
              </div>
              <div>
                <input type="text" class="form-control" maxlength="50" id="keresztnev" name="keresztnev" placeholder="Keresztnév" required />
              </div>
              <div>
                <input type="email" class="form-control" maxlength="50" id="email" name="email" placeholder="Email" required />
              </div>
			  <div>
                <input type="password" class="form-control" maxlength="50" id="jelszo" name="jelszo" placeholder="Jelszó" required />
              </div>
			  <div>
                <input type="password" class="form-control" maxlength="50" id="jelszo_ujra" name="jelszo_ujra" placeholder="Jelszó ismét" required />
              </div>
              <div class="btn_box">
                <input type="submit" id="submit2" name="submit" value="Regisztrálás">
              </div>
			  <div class="link_box">
				<a href="index.php?p=login">Van már fiókod? Kattints ide.</a>
			  </div>
            </form>
          </div>
        </div>
		<div class="col-md-6">
          <div class="reglog-image">
            <img src="appearance/images/logreg.png">
          </div>
        </div>
      </div>
    </div>
  </section>
