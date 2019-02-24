<?php
	$name_instagram = (get_option('name-instargram-field')) ? get_option('name-instargram-field') : '';
	$title_page_gallary = (get_option('title-page-gallary')) ? get_option('title-page-gallary') : '';
	$access_token_field = (get_option('access-token-field')) ? get_option('access-token-field') : '';
?>
<h2>Setting Access token Instagram</h2>
<div class="container">
  <form action="options.php" method="post" accept-charset="utf-8">
  	<?php settings_fields('instagram_admin_setting') ?>
  <div class="row">
    <div class="col-25">
      <label for="fname">Name Instargram</label>
    </div>
    <div class="col-75">
      <input id="name-instargram-field" type="text" name="name-instargram-field" placeholder="Name Instargram" value = "<?php echo $name_instagram ?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="subject">Title Page Gallary</label>
    </div>
    <div class="col-75">
    	<input id="title-page-gallary" type="text" name="title-page-gallary" placeholder="Title Page Gallary" value = "<?php echo $title_page_gallary ?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="lname">Your Access Token</label>
    </div>
    <div class="col-75">
      <input id="access-token-field" type="text" name="access-token-field" placeholder="Your Access Token" value = "<?php echo $access_token_field ?>">
    </div>
  </div>
  <div class="row">
    <?php submit_button('Saves') ?>
  </div>
  </form>
</div>