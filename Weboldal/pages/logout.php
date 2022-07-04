  <section class="account_section layout_padding">
    <div class="container">
	  <div class="alert alert-primary" role="alert">Sikeresen kijelentkeztél az oldalunkról.<br/>Néhány másodpercen belül átirányítunk a kezdőlapra.</div>
	  <meta http-equiv="refresh" content="3;URL='index.php'" />
      <div class="heading_container heading_center">
        <h2>
          Kijelentkezés
        </h2>
      </div>  
		<?php
			require('include/user_menu.php');
		
			if(isset($_SESSION["user_perm"])) {
				unset($_SESSION["user_email"]); 
				unset($_SESSION["user_fn"]); 
				unset($_SESSION["user_ln"]); 
				unset($_SESSION["user_perm"]); 
				unset($_SESSION["user_cd"]); 
			}
		?>    
    </div>
  </section>