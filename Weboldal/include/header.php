  <div class="hero_area">
    <div class="bg-box">
      <img src="./appearance/images/hero-bg.webp" alt=""/>
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>
              <?php echo $siteSettings['site_logo']; ?>
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Kezdőlap</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?p=restaurants">Éttermek</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?p=partners">Partnereinknek</a>
              </li>
            </ul>
            <div class="user_option">
			<?php 	if(isset($_SESSION["user_perm"])) {
						echo '<a href="index.php?p=my_account" class="user_link"><i class="fa fa-user" aria-hidden="true"></i></a>'; 
					} else {
						echo '<a href="index.php?p=login" class="user_link"><i class="fa fa-user" aria-hidden="true"></i></a>'; 	
					}
			?>
              <a href="index.php?p=cart" style="line-height: 50%;" class="order_online">
              <span class="fa fa-shopping-cart" style="font-size: 20px;"></span> 
            </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
	
	<?php if (!isset($_GET['p'])) { ?>
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
				 <div class="col-md-12 col-lg-12" style="text-align: right;">
                  <div class="detail-box">
                    <h1>
                      Éttermek otthonodban
                    </h1>
                    <p>
						Kedvenc éttermeid és ételeid, házhoz szállítva.
                    </p>
                    <div class="btn-box">
                      <a href="index.php?p=restaurants" class="btn1">
                        Tovább az éttermekre
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- end slider section -->
<?php } ?>
  </div>