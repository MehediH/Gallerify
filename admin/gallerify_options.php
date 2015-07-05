<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
<style type="text/css">#wpcontent {Margin-left: 140px !important;}#wpbody {background-color: #fff;}#footer-left {display: none;}<?php if (!get_option("gallerify_accent")){$gallerify_admin_accent =  "#00b0ff";} else{$gallerify_admin_accent = get_option("gallerify_accent");}if ( 1 == get_option('gallerify_change_accent_admin')) {$gallerify_accent_color = $gallerify_admin_accent;} else{$gallerify_accent_color = "#00b0ff";}?>#setting-error-settings_updated{margin:0;border:0;background-color:<?php echo $gallerify_accent_color;?>;color:#fff}#setting-error-settings_updated p{margin:0 auto;max-width:1280px;width:90%}@media only screen and (min-width:601px){#setting-error-settings_updated p{width:85%}}@media only screen and (min-width:993px){#setting-error-settings_updated p{width:70%}}.notice-dismiss{display:none!important}</style>
<form method="post" class="gallerify-settings-form" action="options.php">
	<?php wp_nonce_field('update-options'); ?>
	<?php settings_fields('gallerify');?>		
	<div class="gallerify-wrap">
		<div class="section gallerify-header" id="index-banner">
		  <div class="container">
				<h1 class="header center-on-small-only">Gallerify</h1>
				<h4 class="light text-lighten-4 center-on-small-only">Customize Gallerify to suit your needs.</h4>
		  </div>
		</div>
		<div class="gallerify-container container">
			
					<h2 class="header">General Settings</h2>

					<p>
						<input type="checkbox" class="filled-in gallerify-input" id="filled-in-box" name="replace_wordpress_gallerify" value="1" <?php if ( 1 == get_option('replace_wordpress_gallerify') ) echo 'checked="checked"'; ?> />
						<label for="filled-in-box">Replace default WordPress' Default Gallery (not recommended)</label>
					</p>

					<p>
						<input type="checkbox" class="filled-in gallerify-input" id="filled-in-box-fs" name="gallerify_fullscreen" value="1" <?php if ( 1 == get_option('gallerify_fullscreen') ) echo 'checked="checked"'; ?> />
						<label for="filled-in-box-fs">Enable Fullscreen option</label>
					</p>

					<p>
						<input type="checkbox" class="filled-in gallerify-input" id="filled-in-box-tn" name="gallerify_thumb_nav" value="1" <?php if ( 1 == get_option('gallerify_thumb_nav') ) echo 'checked="checked"'; ?> />
						<label for="filled-in-box-tn">Enable Thumbnail navigation</label>
					</p>

					<p>
						<input type="checkbox" class="filled-in gallerify-input" id="filled-in-box-keys" name="gallerify_keys" value="1" <?php if ( 1 == get_option('gallerify_keys') ) echo 'checked="checked"'; ?> />
						<label for="filled-in-box-keys">Enable Keyboard shortcuts (left and right keys)</label>
					</p>

					<p>
						<input type="checkbox" class="filled-in gallerify-input" id="filled-in-box-ap" name="gallerify_autoplay" value="1" <?php if ( 1 == get_option('gallerify_autoplay') ) echo 'checked="checked"'; ?> />
						<label for="filled-in-box-ap">Enable Autoplay</label>
					</p>

					<p>
						<input type="checkbox" class="filled-in gallerify-input" id="filled-in-box-tg" name="gallerify_trackpad" value="1" <?php if ( 1 == get_option('gallerify_trackpad') ) echo 'checked="checked"'; ?> />
						<label for="filled-in-box-tg">Enable Trackpad Gestures</label>
					</p>

					<h2 class="header">Accent Color</h2>
					<div class="input-field">
				      <input type="text" id="color" value="<?php echo get_option('gallerify_accent'); ?>" name="gallerify_accent" class="color-picker" />
				      <label class="active">Change Accent Color</label>
				    </div>

				    <div class="input-field">
				      <input type="text" id="color" value="<?php echo get_option('gallerify_accent_title'); ?>" name="gallerify_accent_title" class="color-picker" />
				      <label class="active">Change Titlebar color</label>
				    </div>

					<p>
						<input type="checkbox" class="filled-in gallerify-input" id="filled-in-box-admin" name="gallerify_change_accent_admin" value="1" <?php if ( 1 == get_option('gallerify_change_accent_admin') ) echo 'checked="checked"'; ?> />
						<label for="filled-in-box-admin">Change admin panel color based on the accent color</label>
					</p>

					<p class="submit"><input type="submit" class="waves-effect waves-light btn" value="<?php _e('Save Changes') ?>" /></p>

					<hr />

					<div class="gallerify-plugin-details">
						<h2 class="header">Changelog<span>Latest version: 1.0</span></h2>
						<p>Version 1.0</p>
						<ul class="collection">
							<li class="collection-item">Initial Release</li>
							<li class="collection-item">¯\_(ツ)_/¯</li>
							<li class="collection-item">(╯°□°）╯︵ ┻━┻</li>
						</ul>
					</div>
					<hr/>
					<h2 class="header"><a href="http://twitter.com/mehedih_" target="_blank">Follow the developer on Twitter!</a></h2>
					<h2 class="header"><a href="https://wordpress.org/support/view/plugin-reviews/gallerify" target="_blank">Leave a review</a></h2>
					<h2 class="header"><a href="https://wordpress.org/support/plugin/gallerify" target="_blank">Get Support</a></h2>
		</div>          
	</div>
</form>	