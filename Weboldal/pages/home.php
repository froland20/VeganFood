 <section class="offer_section layout_padding-bottom">
    <div class="offer_container">
      <div class="container ">
	   <div class="heading_container heading_center">
        <h2>
          Különleges ajánlataink
        </h2>
      </div>
        <div class="row">
          <div class="col-md-6 ">
            <div class="box ">
              <div class="img-box">
                <img src="./appearance/images/o1.png" alt="">
              </div>
              <div class="detail-box">
                <h5 style="margin-bottom: 2rem;">
                  Ingyenes szállítás
                </h5>
                <a href="index.php?p=restaurants&offer=free_delivery">
                  Tovább az éttermekre
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="./appearance/images/o2.png" alt="">
              </div>
              <div class="detail-box">
                 <h5 style="margin-bottom: 2rem;">
                  Gluténmentes ételek
                </h5>
                <a href="index.php?p=restaurants&offer=gluten_free">
                  Tovább az éttermekre
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end offer section -->

  <!-- food section -->

  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Legnépszerűbb ételeink
        </h2>
      </div>

        <div class="row grid">
			<?php
			$sql3 = "SELECT id,rest_id,name,category,price,ingredients,image FROM foods ORDER BY RAND() LIMIT 12";
			$result3 = $connection->query($sql3);
			
			while($row3 = $result3->fetch_assoc()) {
			?>
		<div class="col-sm-6 col-lg-4 col-xl-3 all <?php echo $row3["category"]; ?>">
            <div class="box" style="height: 23rem; max-height: auto;">
              <div>
			    <a href="index.php?p=restaurants&id=<?php echo $row3["rest_id"]; ?>">
                <div class="img-box">
                  <img src="./appearance/images/foods/<?php echo $row3["image"]; ?>" alt="">
                </div>
				</a>
                <div class="detail-box">
                  <h5 style="font-size: 0.9rem;" title="<?php echo $row3["ingredients"]; ?>">
                    <?php echo $row3["name"]; ?>
                  </h5>
				  <p style="margin-bottom: 0px; font-size: 0.7rem;">(<?php echo getRestaurantName($row3["rest_id"]); ?>)</p>
                  <div class="options" style="margin-top: 1rem;">
                    <h6>
                      <?php echo formatCost($row3["price"]); ?>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
			<?php } ?>
		</div>
    </div>
  </section>

  <!-- end food section -->

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="./appearance/images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Mi vagyunk a <?php echo $siteSettings['site_logo']; ?>
              </h2>
            </div>
            <p>
              <?php echo $siteSettings['site_long_description']; ?>
            </p>
            <a href="index.php?p=restaurants">
              Tovább az éttermekre
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>
          Amit a rendelőink mondanak
        </h2>
      </div>
      <div class="carousel-wrap row ">
        <div class="owl-carousel client_owl-carousel">
          
		  <?php
		  $sql = "
		  SELECT reviews.comment,reviews.stars,restaurants.name,restaurants.id,accounts.first_name
		  FROM reviews
		  LEFT JOIN restaurants ON reviews.rest_id = restaurants.id
		  LEFT JOIN accounts ON reviews.account_id = accounts.id LIMIT 10;
		  
		  ";
		  $result = $connection->query($sql);
		  
		  
		 while($row = $result->fetch_assoc()) {
			echo '
		  <div class="item">
            <div class="box">
              <div class="detail-box review-box">
                <p>
                  '.$row["comment"].'
                </p>
                <h6>
                  '.$row["first_name"].'
                </h6>
                <p>
                  '.$row["name"].' 
                </p>
				<p>';
				for ($x = 1; $x <= $row["stars"]; $x++) {
					echo '<span class="fa fa-star stars"></span>';
				}
			echo'
                </p>
              </div>
            </div>
          </div>
		  '; 
		 }
		?>
		
		</div>
      </div>
    </div>
  </section>