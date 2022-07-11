<?php
if( !is_user_logged_in() ) : ?>

    <div class="gutenix-header-login-popup">
        <div class="gutenix-header-login-popup__container">
            <button class="header-login-close btn-initial"><?php echo gutenix_get_icon_svg( 'close' ); ?></button>
            <div class="gutenix-header-login-popup__tabs">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:void(0);" data-target="login_form_enter"><?php echo esc_html__( 'Login', 'gutenix' ); ?></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-target="login_form_registration"><?php echo esc_html__( 'Register', 'gutenix' ); ?></a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="login_form_enter">
                    <div class="gutenix-login-popup-content gutenix-login-popup-content-login">
                        <?php wp_login_form(); ?>
                        <p class="gutenix-login-popup-LostPassword">
                            <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost password?', 'gutenix' ); ?></a>
                        </p>
                    </div>
                </div>
                <div class="tab-pane" id="login_form_registration">
                    <div class="gutenix-login-popup-content">
                        <?php if ( !get_option( 'users_can_register' ) )  : ?>

                            <p id="reg_passmail"><?php esc_html_e( 'Registration is closed.', 'gutenix' ); ?></p>

                        <?php else : ?>
                            <?php if ( is_multisite() ) : ?>
                                <form id="registerform" method="post" action="<?php echo wp_registration_url(); ?>" novalidate="novalidate">
                                	<p id="reg_passmail"><?php esc_html_e( 'Registration confirmation will be emailed to you.', 'gutenix' ); ?></p>
                                	<p class="submit">
                                        <input id="signupblog2" type="hidden" name="signup_for" value="user">
                                        <input type="submit" name="submit" id="wp-submit2" class="button button-primary button-large" value="Start Registration">
                                    </p>
                                </form>
                            <?php else : ?>
                                <form name="registerform" id="registerform" action="<?php echo wp_registration_url(); ?>" method="post" novalidate="novalidate">
                                	<p>
                                		<label for="user_login"><?php esc_html_e( 'Username', 'gutenix' ); ?></label>
                                		<input type="text" name="user_login" id="user_login2" class="input" value="" size="20" required>
                                	</p>
                                	<p>
                                		<label for="user_email"><?php esc_html_e( 'Email', 'gutenix' ); ?></label>
                                		<input type="email" name="user_email" id="user_email2" class="input" value="" size="25" required>
                                	</p>
                                	<p id="reg_passmail"><?php esc_html_e( 'Registration confirmation will be emailed to you.', 'gutenix' ); ?></p>
                                	<input type="hidden" name="redirect_to" value="">
                                	<p class="submit">
                                        <input type="submit" name="wp-submit" id="wp-submit2" class="button button-primary button-large" value="Register">
                                    </p>
                                </form>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="gutenix-header-login-popup__overlay"></div>
    </div>
<?php endif; ?>
