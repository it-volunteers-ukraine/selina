<?php
/*
Template Name: Register
*/

require_once(ABSPATH . WPINC . '/registration.php');
global $wpdb, $user_ID;
//Перевіряємо, чи вже користувач увійшов до системи
if ($user_ID) {

    //Залогіненого користувача перенаправляємо на головну сторінку.
    header('Location:' . home_url());

} else {
    $errors = array();

    if ($_POST) {

        //Переконайтеся, що ім'я користувача є і ще не використовується
        $username = $wpdb->escape($_REQUEST['username']);
        if (strpos($username, ' ') !== false) {
            $errors['username'] = get_field('username-errors');
        }
        //якщо поле з ім'ям користувача порожнє
        if (empty($username)) {
            $errors['username'] = get_field('username-empty');
        } elseif (username_exists($username)) {
            //якщо такий користувач уже зареєстровано
            $errors['username'] = get_field('username-exists');
        }

        // Перевіряємо, чи є email і чи дійсний він
        $email = $wpdb->escape($_REQUEST['email']);
        if (!is_email($email)) {
            $errors['email'] = get_field('email-exists');
        } elseif (email_exists($email)) {
            $errors['email'] = get_field('email-registered');
        }

        // Перевірка пароля на валідність
        if (0 === preg_match("/.{6,}/", $_POST['password'])) {
            $errors['password'] = get_field('password-six');
        }

        // Перевірка повторного введення пароля
        if (0 !== strcmp($_POST['password'], $_POST['password_confirmation'])) {
            $errors['password_confirmation'] = get_field('password-match');
        }

        // Перевірити згоду з умовами обслуговування
        if ($_POST['terms'] != "Yes") {
            $errors['terms'] = get_field('to-agree');
        }
        // якщо помилок немає
        if (0 === count($errors)) {

            $password = $_POST['password'];

            $new_user_id = wp_create_user($username, $password, $email);

            // Тут ви можете робити все, що завгодно, наприклад, надсилати електронний лист користувачеві і т.д.

            $success = 1;

            header('Location:' . get_bloginfo('url') . '/login/?success=1&u=' . $username);

        } else {
            $message = get_field('last-errors');
        }
    }
}
?>

<?php get_header(); ?>
<main>
    <section class="section register-page-section">
        <div class="container register-page-section__container">
           <div class="register-page-section__wrapper">
             <h3 class="section_heading register-page-section__heading">
                <svg class="register-page-heading-svg" width="42" height="60">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('register-page__title'); ?>
            </h3>
            <p class="register-page-section__first-message" id="message"><?= isset($message) ? $message : '' ?></p>
            <p class="register-page-section__message">
                <?php the_field('register-page__message'); ?>
                <a class="register-page-section__message-link" href="<?php the_field('register-page__link'); ?>">
                    <?php the_field('register-page__message-link'); ?>
                </a>
            </p>
            <form id="wp_signup_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                <div class="register-page-section__form-wrapper">
                <div>
                <p class="register-page-section__form-field">
                    <label for="username"><?php the_field('register-page__name'); ?></label>
                    <input type="text" name="username" id="username" 
                    placeholder="<?php the_field('register-page__name_field'); ?>"
                        value="<?= isset($_REQUEST['username']) ? $_REQUEST['username'] : '' ?>">
                    <span class="register-page-section__error error"><?= isset($errors['username']) ? $errors['username'] : '' ?></span>
                </p>

                <p class="register-page-section__form-field">
                    <label for="email"><?php the_field('register-page__email'); ?></label>
                    <input type="text" name="email" id="email"
                     placeholder="<?php the_field('register-page__email-field'); ?>"
                        value="<?= isset($_REQUEST['email']) ? $_REQUEST['email'] : '' ?>">
                    <span class="register-page-section__error error"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
                </p>
                </div>

                <div>
                <p class="register-page-section__form-field">
                    <label for="password"><?php the_field('register-page__password'); ?></label>
                    <input type="password" name="password" id="password"
                    placeholder="<?php the_field('register-page__password-field'); ?>"
                        value="<?= isset($_REQUEST['password']) ? $_REQUEST['password'] : '' ?>">
                    <span class="register-page-section__error error"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
                </p>

                <p class="register-page-section__form-field">
                    <label for="password_confirmation"><?php the_field('register-page__password-repeat'); ?></label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="<?php the_field('register-page__password-repeat-field'); ?>"
                        value="<?= isset($_REQUEST['password_confirmation']) ? $_REQUEST['password_confirmation'] : '' ?>">
                    <span
                        class="register-page-section__error error"><?= isset($errors['password_confirmation']) ? $errors['password_confirmation'] : '' ?></span>
                </p>
                </div>
                </div>
                 <p class="register-page-section__message-star">
                    <?php the_field('register-page__message-field'); ?>
                </p>

                <div class="register-page-section__form-wrapper">
                <p class="register-page-section__message-agree"> 
                    <input name="terms" id="terms" type="checkbox" value="Yes">
                    <label for="terms"><?php the_field('register-page__message-agree'); ?></label><br>
                    <span class="register-page-section__error error"><?= isset($errors['terms']) ? $errors['terms'] : '' ?></span>
                </p>
                <button class="button red_medium_button register-page-section__button"
                type="submit" id="submitbtn" name="submit">
                <?php the_field('register-page__btn-text'); ?>
                 <svg class="register-page-section__button-svg" width="16" height="15">
                <use
                href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                </use>
                </svg>
                </button>
                </div>
           </form>
        </div>
        <div class="register-page-section__wrapper-img">
            <img class="register-page-section__img" src="<?php the_field('register-page__img') ?>" />
        </div>
        </div>
    </section>
</main>
<?php
get_footer();
?>