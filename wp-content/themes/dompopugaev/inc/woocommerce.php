<?php

remove_action( 'woocommerce_register_form', 'wc_registration_privacy_policy_text', 20 );

// Проверяем поля при регистрации
add_filter('woocommerce_registration_errors', function($errors, $sanitized_user_login, $user_email) {
    if (empty($_POST['name'])) {
        $errors->add('fullname_error', '<strong>Ошибка</strong>: Пожалуйста, введите ваше имя.');
    }
    if (empty($_POST['phone'])) {
        $errors->add('phone_error', '<strong>Ошибка</strong>: Пожалуйста, введите телефон.');
    }
    if ($_POST['password'] !== $_POST['password_repeat']) {
        $errors->add('password_repeat_error', '<strong>Ошибка</strong>: Пароли не совпадают.');
    }
    return $errors;
}, 10, 3);

// Сохраняем новые поля в мета пользователя
add_action('user_register', function($user_id) {
    if (!empty($_POST['user_fullname'])) {
        update_user_meta($user_id, 'user_fullname', sanitize_text_field($_POST['user_fullname']));
    }
    if (!empty($_POST['user_phone'])) {
        update_user_meta($user_id, 'user_phone', sanitize_text_field($_POST['user_phone']));
    }
});