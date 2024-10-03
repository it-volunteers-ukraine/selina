<?php
/*
Template Name: Login
*/

$error_message = ''; // Variable to store error messages

if ($_POST) {
    global $wpdb;

    // Sanitize input fields to prevent SQL injection
    $username = sanitize_text_field($_REQUEST['username']);
    $password = sanitize_text_field($_REQUEST['password']);
    $remember = isset($_REQUEST['rememberme']) ? sanitize_text_field($_REQUEST['rememberme']) : false;

    // Set up login data
    $login_data = array(
        'user_login'    => $username,
        'user_password' => $password,
        'remember'      => $remember ? "true" : "false"
    );

    // Authenticate user
    $user_verify = wp_signon($login_data, false);

    // Check for errors and display them under the form
    if (is_wp_error($user_verify)) {
        $error_code = $user_verify->get_error_code();
        if ($error_code == 'invalid_username') {
      $error_message = get_field('login-log-error');
        } elseif ($error_code == 'incorrect_password') {
      $error_message = get_field('login-password-error');
        } else {
      $error_message = get_field('login-error');
        }
    } else {
        // Successful login, redirect to the desired page
         $page_lang = pll_current_language();
                    if ($page_lang == 'ua') {
                       header("Location: " . home_url() . "/osobystyj-kabinet");
                    } elseif ($page_lang == 'en') {
                       header("Location: " . home_url() . "/user-cabinet");
                    }
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

        <!-- Display error message under form fields -->
        <?php if (!empty($error_message)) : ?>
          <div class="login-page-section__error-message">
            <?php echo esc_html($error_message); ?>
          </div>
        <?php endif; ?>

        <form id="login" name="form" action="" method="post">
          <p class="login-page-section__form-field">
            <label for="username"><?php the_field('login-page__login'); ?></label>
            <input id="username" type="text" placeholder="<?php the_field('login-page__login-field'); ?>"
              name="username" value="<?php echo isset($_POST['username']) ? esc_attr($_POST['username']) : ''; ?>" required>
          </p>
          <p class="login-page-section__form-field">
            <label for="password"><?php the_field('login-page__password'); ?></label>
            <input id="password" type="password" placeholder="<?php the_field('login-page__password-field'); ?>"
              name="password">
          </p>
          
          <!-- Submit Button -->
          <button class="button red_medium_button login-page-section__button" id="submit" type="submit" name="submit">
            <?php the_field('login-page__enter'); ?>
            <svg class="login-page-section__button-svg" width="16" height="15">
              <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
              </use>
            </svg>
          </button>

          <!-- Forgot Password Button -->
            <button class="login-page-section__forgot_password" type="submit" name="forgot_password">
              <?php the_field('forgot_password') ?>
            </button>
            <?php
            // Process forgot password request
if (isset($_POST['forgot_password'])) {
    if (!empty($_POST['username'])) {
        // Make sure the user exists
        $user = get_user_by('login', $_POST['username']);
        
        if ($user) {
            // Use the built-in WordPress function to handle the password retrieval process
            $retrieve_password_result = retrieve_password($_POST['username']);
            
            if (is_wp_error($retrieve_password_result)) {
                // Error during password reset process (e.g., user doesn't exist)
                echo '<div class="login-page-section__error-message">';
                the_field('password_recovery'); // Custom field for success message
                echo '</div>';
            } else {
                // Success message after password reset email is sent
                echo '<div class="login-page-section__success-message">';
                the_field('password_recovery'); // Custom field for success message
                echo '</div>';
            }
        } else {
            echo '<div class="login-page-section__error-message">';
            the_field('password_recovery_name'); // Custom field for user not found error
            echo '</div>';
        }
    } else {
        // No username entered
        echo '<div class="login-page-section__error-message">';
        the_field('password_recovery_name'); // Custom field for missing username error
        echo '</div>';
    }
}
            ?>
        </form>
      </div>
      <div class="login-page-section__wrapper-img">
            <img class="login-page-section__img" src="<?php the_field('login-page__img') ?>" />
        </div>
    </div>
  </section>
</main>

<?php


get_footer();
?>

