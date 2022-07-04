<footer class="footer_section">
  <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Kapcsolat
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  <?php echo $siteSettings['company_address']; ?>
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
				<?php echo $siteSettings['company_phone_number']; ?>
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  <?php echo $siteSettings['company_mail']; ?>
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              <?php echo $siteSettings['site_logo']; ?>
            </a>
            <p>
              <?php echo $siteSettings['site_description']; ?>
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Ügyfélszolgálat
          </h4>
          <p>
            Mindennap
          </p>
          <p>
            10:00 - 18:00
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
			<?php echo $siteSettings['site_footer_text']; ?>
		</p>
      </div>
    </div>
  </footer>