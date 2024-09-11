<?php
/*
Template Name: Login
*/

if ($_POST) {

  global $wpdb;

  //Перевіряємо всі поля введення перед запитом SQL
  $username = $wpdb->escape($_REQUEST['username']);
  $password = $wpdb->escape($_REQUEST['password']);
  $remember = $wpdb->escape($_REQUEST['rememberme']);

  if ($remember)
    $remember = "true";
  else
    $remember = "false";

  $login_data = array();
  $login_data['user_login'] = $username;
  $login_data['user_password'] = $password;
  $login_data['remember'] = $remember;

  $user_verify = wp_signon($login_data, false);

  if (is_wp_error($user_verify)) {
    //Передаємо параметр error для використання його потім у скрипті
    header("Location: " . home_url() . "/login?error=true");
  } else {
    header("Location: " . home_url());
    exit();
  }
}
get_header();
?>
<main>
  <section class="section login-page-section">
    <div class="container login-page-section__container">
      <div class="login-page-section__wrapper">
        <h3 class="section_heading login-page-section__heading">
          <?php the_field('login-page__title'); ?>
        </h3>
        <p class="login-page-section__message">
          <?php the_field('login-page__first-message'); ?>
          <a class="login-page-section__message-link" href="<?php the_field('login-page__link'); ?>">
            <?php the_field('login-page__message-link'); ?>
          </a>
        </p>
        <form id="login" name="form" action="<?php echo home_url(); ?>/login/" method="post">
          <p class="login-page-section__form-field">
            <label for="username"><?php the_field('login-page__login'); ?></label>
            <input id="username" type="text" placeholder="<?php the_field('login-page__login-field'); ?>"
              name="username">
          </p>
          <p class="login-page-section__form-field">
            <label for="password"><?php the_field('login-page__password'); ?></label>
            <input id="password" type="password" placeholder="<?php the_field('login-page__password-field'); ?>"
              name="password">
          </p>
          <button class="button red_medium_button login-page-section__button" id="submit" type="submit" name="submit">
            <?php the_field('login-page__enter'); ?>
            <svg class="login-page-section__button-svg" width="16" height="15">
              <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
              </use>
            </svg>
          </button>
        </form>
      </div>
      <div class="register-page-section__wrapper-img">
            <img class="register-page-section__img" src="<?php the_field('login-page__img') ?>" />
        </div>
    </div>
  </section>
</main>
<?php
get_footer();
?>