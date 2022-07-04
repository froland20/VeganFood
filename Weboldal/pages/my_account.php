<?php 
	if(!isset($_SESSION["user_perm"])) {
		header('Location: index.php?p=login');
		exit;
	}
?> 
  <section class="account_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Saját fiókom
        </h2>
      </div>
		<?php require('include/user_menu.php'); ?>
		
		<h2 class="site-message">Úgy tűnik mai napon még nem adtál le étel rendelést.<br />
			Talán itt volna épp az ideje nem? &#128521; &#128521;</h2>
		</div>
    </div>
  </section>