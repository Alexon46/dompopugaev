<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$is_registration = isset($_GET['action']) && $_GET['action'] === 'register';
?>
<div class="container">

	<div class="woocommerce-form-login-wrapper">
			
		<?php do_action( 'woocommerce_before_customer_login_form' ); ?>
		<?php if ( !$is_registration ) : ?>
			<form class="woocommerce-form woocommerce-form-login login" method="post" novalidate>

				<h1 class="woocommerce-form__title text-size-32">Вход</h1>

				<?php do_action( 'woocommerce_login_form_start' ); ?>
				
				<div class="form-fields">

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-field">
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" placeholder="E-mail" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
					</p>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-field">
						<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" placeholder="Пароль" autocomplete="current-password" required aria-required="true" />
					</p>

				</div>

				<?php do_action( 'woocommerce_login_form' ); ?>

				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit btn <?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Войти', 'woocommerce' ); ?>"><?php esc_html_e( 'Войти', 'woocommerce' ); ?></button>

				<p class="woocommerce-LostPassword lost_password">
					<a href="?action=register"><?php esc_html_e( 'Зарегистрироваться', 'woocommerce' ); ?></a>
				</p>

				<?php do_action( 'woocommerce_login_form_end' ); ?>

			</form>
		<?php else : ?>
			<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

				<form method="post" id="register" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

					<h1 class="woocommerce-form__title text-size-32"><?php esc_html_e( 'Регистрация', 'woocommerce' ); ?></h1>

					<?php do_action( 'woocommerce_register_form_start' ); ?>

					<div class="form-fields">

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-field">
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="Ваше имя" name="name" id="reg_name" autocomplete="name" value="<?php echo ( ! empty( $_POST['name'] ) ) ? esc_attr( wp_unslash( $_POST['name'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
						</p>

						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-field">
								<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="Имя пользователя" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
							</p>

						<?php endif; ?>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-field">
							<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" placeholder="E-mail" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
						</p>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-field">
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="phone" id="reg_phone" autocomplete="phone" value="<?php echo ( ! empty( $_POST['phone'] ) ) ? esc_attr( wp_unslash( $_POST['phone'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
						</p>

						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-field">
								<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="Придумайте пароль" name="password" id="reg_password" autocomplete="new-password" required aria-required="true" />
							</p>

							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-field">
								<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="Повторите пароль" name="password_repeat" id="reg_user_pass_repeat" required aria-required="true" />
							</p>

						<?php else : ?>

							<p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>

						<?php endif; ?>
						
					</div>

					<?php do_action( 'woocommerce_register_form' ); ?>

					<p class="woocommerce-form-row form-row">
						<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
						<button type="submit" class="woocommerce-Button woocommerce-button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit btn" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Зарегистрироваться', 'woocommerce' ); ?></button>
					</p>

					<?php do_action( 'woocommerce_register_form_end' ); ?>

				</form>

			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

	</div>

</div>