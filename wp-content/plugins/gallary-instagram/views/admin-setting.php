<?php
	$name_instagram = (get_option('name-instargram-field')) ? get_option('name-instargram-field') : '';
  $access_token_field = (get_option('access-token-field')) ? get_option('access-token-field') : '';
?>
<h2>Setting Access token Instagram</h2>
<div id="message-ajax"></div>
<div class="container">
  <form action="options.php" method="post">
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
      <label for="lname">Your Access Token</label>
    </div>
    <div class="col-75">
      <input id="access-token-field" type="text" name="access-token-field" placeholder="Your Access Token" value = "<?php echo $access_token_field ?>">
    </div>
  </div>
  <div class="row">
    <p class="submit">
      <input type="submit" id="submit-setting-instagram" class="button button-primary" value="Saves">
    </p>  
  </div>
  </form>
</div>
<div id = 'tesst-result'>
  
</div>