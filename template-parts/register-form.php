<h3 class="title-account"><?php echo esc_html__('Register','rekon'); ?></h3>
<div class="form-register">
  <div class="inner">
  	<div class="container-form">
          <form name="apusRegisterForm" method="post" class="apus-register-form">
              <div id="apus-reg-loader-info" class="apus-loader hidden">
                  <span><?php esc_html_e('Please wait ...', 'rekon'); ?></span>
              </div>
              <div id="apus-register-alert" class="alert alert-danger" role="alert" style="display:none;"></div>
              <div id="apus-mail-alert" class="alert alert-danger" role="alert" style="display:none;"></div>

             	<div class="form-group">
                	<label class="hidden" for="username"><?php esc_html_e('Username', 'rekon'); ?></label>
                	<sup class="apus-required-field hidden">*</sup>
                	<input type="text" class="form-control style2" name="username" id="username" placeholder="<?php esc_attr_e("Enter Username",'rekon'); ?>">
            	</div>
            	<div class="form-group">
                	<label class="hidden" for="reg-email"><?php esc_html_e('Email', 'rekon'); ?></label>
                	<sup class="apus-required-field hidden">*</sup>
                	<input type="text" class="form-control style2" name="email" id="reg-email" placeholder="<?php esc_attr_e("Enter Email",'rekon'); ?>">
            	</div>
              <div class="form-group">
                  <label class="hidden" for="password"><?php esc_html_e('Password', 'rekon'); ?></label>
                  <sup class="apus-required-field hidden">*</sup>
                  <input type="password" class="form-control style2" name="password" id="password" placeholder="<?php esc_attr_e("Enter Password",'rekon'); ?>">
              </div>
              <div class="form-group space-bottom-30">
                  <label class="hidden" for="confirmpassword"><?php esc_html_e('Confirm Password', 'rekon'); ?></label>
                  <sup class="apus-required-field hidden">*</sup>
                  <input type="password" class="form-control style2" name="confirmpassword" id="confirmpassword" placeholder="<?php esc_attr_e("Confirm Password",'rekon'); ?>">
              </div>
              
              <?php wp_nonce_field('ajax-apus-register-nonce', 'security_register'); ?>

              <div class="form-group clear-submit">
                <button type="submit" class="btn btn-theme btn-block" name="submitRegister">
                    <?php echo esc_html__('Register now', 'rekon'); ?>
                </button>
              </div>

              <?php do_action('register_form'); ?>
          </form>
    </div>
	</div>
</div>
<div class="bottom-login text-center">
  <?php echo esc_html__('Already have an account?','rekon') ?>
</div>