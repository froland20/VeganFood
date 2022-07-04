  <?php 	
		if(isset($_SESSION["user_perm"])) {
			if(isset($_POST["redirect"]) && !empty($_POST["redirect"])) {
				header('Location: index.php?p='.$_POST["redirect"].'');
				exit;
			} else {	
				header('Location: index.php?p=my_account');
				exit;
			}
		} 
	?>
  
  <section class="reglog_section layout_padding">
    <div class="container">
	  <?php if(isset($_GET["from"]) && $_GET["from"] == "checkout") echo '<div class="alert alert-primary" role="alert">Figyelem, rendelés leadása előtt be kell lépjél, vagy fiókot kell létrehozzál.</div>'; ?>
      <div class="heading_container heading_center">
        <h2>
          Belépés
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="index.php?p=login" method="post">
              <div>
                <input type="email" class="form-control" maxlength="50" id="email" name="email" placeholder="Email"  required />
              </div>
			  <div>
                <input type="password" class="form-control" maxlength="50" id="password" name="password" placeholder="Jelszó" required />
              </div>
              <div class="btn-box">
			    <input type="hidden" name="redirect" value="<?php echo $_GET["from"]; ?>"/>
                <input type="submit" name="user_login" value="Belépés">
              </div>
			  <div class="link_box">
				<a href="index.php?p=register">Nincs még fiókod? Kattints ide.</a>
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